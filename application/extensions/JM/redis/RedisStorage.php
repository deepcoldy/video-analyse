<?php

include_once __DIR__ . '/RedisBase.php';
include_once __DIR__ . '/ConsistentHash.php';

/**
 * 当存储用的redis
 *
 * @author xinhuag@jumei.com
 */
class RedisStorage extends RedisBase {
    /*
     * 目标物理结点
     */

    private $targets;

    /*
     * 单例
     */
    private static $instance = false;

    /*
     * redis实例
     */
    private $redis = array();
    /*
     * config
     */
    public $config = array();

    private function __construct() {
        
    }
    
    /*
     * 关闭socket
     */

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

    public function Init() {
        $ShmList = ShmConfig::getStorageAvailableAddress($this->config); //从内存中获得可用列表
        if (empty($ShmList)) {//内存中没有，可能ping脚本没启,直接用配置
            foreach ($this->config['nodes'] as $value) {
                $list[] = $value['master'];
            }
        } else {
            $list = $ShmList;
        }
        $this->targets = $list; //和cache不一样，失效后是false不能剔除
    }

    /*
     * 根据key和实际结点建立链接
     */

    public function ConnectTarget($key) {
        $this->target = $target = $this->hash($key);
        if (!$target) {//主从都down了
            return false;
        }
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
            } catch (Exception $e) {
                unset($this->redis[$target]);
                Yii::log($e->getMessage(), CLogger::LEVEL_ERROR, 'redis');
                throw new Exception("connect error!");
            }
        }

        return $this->redis[$target];
    }

    /*
     * 取模打散
     */
    private function hash($key) {

        $hash = abs(crc32($key));
        $count = count($this->targets);
        $mod = $hash % $count;
        return $this->targets[$mod];
    }

}

?>
