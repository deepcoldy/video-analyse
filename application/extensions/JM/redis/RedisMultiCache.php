<?php

include_once __DIR__ . '/RedisCache.php';
/*
 * 如果你在一个项目里面用到了很多个集群，那么用这个
 */

/**
 * Description of RedisMultiStorage
 *
 * @author guoxinhua
 */
class RedisMultiCache {

    public static $instance;
    public static $config;

    public static function getInstance($name) {
        if (!isset(self::$instance[$name])) {
            RedisCache::config(self::$config[$name]);
            self::$instance[$name] = RedisCache::getInstance();
        }
        return self::$instance[$name];
    }

    public static function config(array $config) {
        self::$config = $config;
    }

}
