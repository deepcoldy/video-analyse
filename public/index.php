<?php
session_start();
error_reporting(E_ERROR);

date_default_timezone_set('Asia/Shanghai');

header("Content-type: text/html; charset=utf-8");

// change the following paths if necessary
$yii=dirname(__FILE__).'/../framework/yii.php';
$config=dirname(__FILE__).'/../application/config/online.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',0);

define('VIEW_PATH', __DIR__ . '/../application/views/');

require_once($yii);
require_once('../vendor/autoload.php');
// var_dump($config);

Yii::createWebApplication($config)->run();
