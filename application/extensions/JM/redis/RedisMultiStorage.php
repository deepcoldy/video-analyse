<?php
include_once __DIR__ . '/RedisStorage.php';
/*
 * 如果你在一个项目里面用到了很多个集群，那么用这个
 */

/**
 * Description of RedisMultiStorage
 *
 * @author guoxinhua
 */
class RedisMultiStorage {

    private static $instance;
    
    private static $config;

    /**
     * @param $name
     * @return RedisStorage
     */
    public static function getInstance($name) {
        if (!isset(self::$instance[$name])) {
            RedisStorage::config(self::$config[$name]);
            self::$instance[$name] = RedisStorage::getInstance();
        }
        return self::$instance[$name];
    }
    
    public static function config(array $config){
        self::$config = $config;
    }

}
