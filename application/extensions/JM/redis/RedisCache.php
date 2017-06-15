<?php

include_once __DIR__ . '/RedisBase.php';
include_once __DIR__ . '/ConsistentHash.php';

/**
 * 当cache用的redis
 *
 * @author xinhuag@jumei.com
 */
class RedisCache extends RedisBase {
    /*
     * hash类的引用
     */

    private $hash;
    private $MasterOrSlave;
    /*
     * 配置
     */
    public $config;
    /*
     * redis实例
     */
    private $redis;
    /*
     * 单例
     */
    private static $instance = false;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function config($config) {
        if (empty($config)) {
            throw new Exception("config error!");
        }
        $instance = self::getInstance();
        $instance->config = $config;
        $instance->Init();
    }

    public function close() {
        foreach ((array) $this->redis as $target => $value) {
            try {
                $value->close();
                unset($this->redis[$target]);
            } catch (Exception $exc) {
                throw new Exception("close error!");
            }
        }
    }

    public function Init() {
        $this->hash = new ConsistentHash();
        $this->MasterOrSlave = $ShmList = ShmConfig::getCacheAvailableAddress($this->config); //从内存中获得可用列表
        $list = array();
        if (empty($ShmList)) {//内存中没有，可能ping脚本没启,直接用配置
            foreach ($this->config['nodes'] as $node) {
                $list[] = $node['master'];
            }
        } else {
            foreach ($ShmList as $node) {//false已过滤,主/从在逻辑上都hash主的值
                $list[] = $node['master']['target'];
            }
        }
        $this->hash->addTargets($list); //传入逻辑结点列表
    }

    /*
     * 根据key和实际结点建立链接
     */
    public function ConnectTarget($key) {
        $target = $this->hash->lookup($key);
        foreach ($this->MasterOrSlave as $node) {
            if (strcmp("slave", $node['use']) === 0 && strcmp($target, $node['master']['target']) === 0) {//因为缓存也做了主从，所以主挂了逻辑上可用，但是实际得用从
                $target = $node['slave']['target'];
            }
        }
        $this->target = $target;
        if (!isset($this->redis[$target])) {//每个物理机对应一个new redis
            $this->redis[$target] = new Redis();
            $ip_port = explode(":", $target);
            try {
                $this->redis[$target]->connect($ip_port[0], $ip_port[1], 5);
                if (isset($this->config['auth'])) {//如果设置了db
                    $res = $this->redis[$target]->auth($this->config['auth']);
                    if ($res !== true) {
                        throw new Exception("Auth Failed!");
                    }
                }
                if (isset($this->config['db'])) {//如果设置了db
                    $this->redis[$target]->select($this->config['db']);
                }
            } catch (Exception $e) {//todo 打日志 某个cache集群挂了
                unset($this->redis[$target]);
                Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, 'redis');
                throw new Exception("connect error!");
            }
        }

        return $this->redis[$target];
    }

}

?>
