<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 14-8-30
 * Time: 下午12:55
 */
require_once 'JM/redis/RedisMultiStorage.php';

class RedisSession extends CComponent{
    protected static  $_instance;

    /**
     * @var RedisStorage
     */
    protected $redis;

    protected $sessionId;

    protected $sessionData;

    protected $expire = 2073600;        // 30天过期时间

    public static  function instance(){
         if (self::$_instance === null) {
             self::$_instance = new RedisSession();
         }
        return self::$_instance;
    }


    public function __construct(){
        global $CONFIG;
        RedisMultiStorage::config($CONFIG['RedisStorage']);     // 初始化redis
        $this->redis = RedisMultiStorage::getInstance('Session');
    }

    public function start($sessionId) {
        $this->sessionId = $sessionId;
        $this->sessionData = $this->redis->hgetall($sessionId);
    }

    public function get($name = null){
        if ($name === null) {
            return $this->sessionData;
        }
        if (isset($this->sessionData[$name])){
            return json_decode($this->sessionData[$name], true);
        } else {
            return null;
        }
    }

    public function set($key, $value){
        $this->sessionData[$key] = $value;
        $this->redis->hset($this->sessionId, $key, json_encode($value));
    }

    public function exists($key){
        return isset($this->sessionData[$key]);
    }

    /**
     * session是否已经过期。
     * @param $sessionId
     * @return bool
     */
    public function isExpired($sessionId){
        return !$this->redis->exists($sessionId);
    }
    /**
     * 刷新过期时间
     */
    public function refreshExpire(){
        $this->redis->expire($this->sessionId, $this->expire);
    }
} 