<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.


define('ENV', 'QINIU');

global $CONFIG;

$CONFIG['Database']['Read'] = array(
    'dsn'=>'mysql:host=;port=;dbname=',
    'user'=>'',
    'password'=>'',
    'charset'=>'utf-8',
);

$CONFIG['Database']['Read1'] = array(
    'dsn'=>'mysql:host=;port=;dbname=',
    'user'=>'',
    'password'=>'',
    'charset'=>'utf-8',
);

$CONFIG['Database']['Write'] = array(
    'dsn'=>'mysql:host=;port=;dbname=',
    'user'=>'',
    'password'=>'',
    'charset'=>'utf-8',
);

$CONFIG['Database']['Test'] = array(
    'dsn'=>'mysql:host=;port=;dbname=',
    'user'=>'',
    'password'=>'',
    'charset'=>'utf-8',
);


$CONFIG['Database']['NewProducts'] = array(
	'dsn'=>'mysql:host=;port=;dbname=',
	'user'=>'',
	'password'=>'',
	'charset'=>'utf-8',
);

$CONFIG['SphinxServer'] = array(
    'host'=>'',
    'port'=>'',
);

$CONFIG['CDN_SERVERS']['ALI_CDN'] = array(
    'AccessKeyId'=>'',
    'AccessKeySecret'=>'',
    'Bucket'=>'',
    'Endpoint'=>'http://oss-cn-hangzhou.aliyuncs.com',
);

$CONFIG['CDN_SERVERS']['AWS_CDN'] = array(
	'key'    => '',
	'secret' => '',
	'region' => 'ap-southeast-1',
	'bucket' => ''
);

$CONFIG['CDN_SERVERS']['QINIU_CDN'] = array(
	'key'    => '',
	'secret' => '',
	'region' => '',
	'bucket' => ''
);

$CONFIG['SIGN_KEY'] = '';

$CONFIG['RedisStorage']['Session'] = array(//存储的配置，要求的配置格式。
    'nodes' => array(
        array('master' => "", 'slave' => ""),
    ),
    'db' => 1,
    'auth'=>'',
);

$CONFIG['RedisStorage']['Cache'] = array(//存储的配置，要求的配置格式。
    'nodes' => array(
        array('master' => "", 'slave' => ""),
    ),
    'db' => 1,
    'auth'=>'',
);

// 自动框选服务器
$CONFIG['CropServer'] = array(
    'Url'=>'',
);

$CONFIG['FeatureExtractServer'] = array(
	'Url'=>'',
);

$CONFIG['FeatureSearchServer'] = array(
	'Url'=>'',
);


$CONFIG['FeatureExtractServerTest'] = array(
	'Url'=>'',
);

$CONFIG['FeatureSearchServerTest'] = array(
	'Url'=>'',
);

$CONFIG['FaceDetectServerTest'] = array(
	'Url'=>'',
);

$CONFIG['FaceCompareServerTest'] = array(
	'Url'=>'',
);

$CONFIG['Server_List'] = [
	0 => [
		'host' => '',
		'port' => ['', ''],
	],
	1 => [
		'host' => '',
		'port' => ['', ''],
	]
];

$CONFIG['ObjectDetectServers'] = [
	[
		'host' => '',
		'port' => ['', '']
	]
];

$CONFIG['StarDetectServers'] = [
	[
		'host' => '',
		'port' => ['', '']
	]
];

$CONFIG['categoryMapping'] = array(
	// 上装
	1062 => 8001,
	1063 => 8001,
	1064 => 8001,
	1066 => 8001,
	1069 => 8001,
	1070 => 8001,
	1071 => 8001,
	1072 => 8001,
	1073 => 8001,

	// 裙装
	1060 => 8002,
	1061 => 8002,

	// 裤子
	1074 => 8003,
	1075 => 8003,
	1076 => 8003,
	1077 => 8003,
	1079 => 8003,
	1082 => 8003,
	// 鞋
	1083 => 8004,
	1084 => 8004,
	1085 => 8004,
	1086 => 8004,
	1087 => 8004,
	1088 => 8004,
	1089 => 8004,
	1090 => 8004,
	1091 => 8004,

	// 包
	1092 => 8005,
	1093 => 8005,
	1094 => 8005,
	1095 => 8005,
	1096 => 8005,
	1097 => 8005,

	// 其他
	1068 => 8006,

	// -------男装-----
	// 上装
	2001 => 8101,
	2002 => 8101,
	2003 => 8101,
	2004 => 8101,
	2006 => 8101,
	2008 => 8101,
	2009 => 8101,

	// 裤子
	2010 => 8103,
	2011 => 8103,

	// 鞋
	2101 => 8104,
	2102 => 8104,
	2103 => 8104,
	2104 => 8104,

	// 包
	2105 => 8105,
	2106 => 8105,
	2107 => 8105,
	2108 => 8105,

	// ------海外类目----
	// 上装
	1 => 8201,
	2 => 8201,
	3 => 8201,
	4 => 8201,
	10 => 8201,
	12 => 8201,
	15 => 8201,
	16 => 8201,
	17 => 8201,

	// 裙子
	5 => 8202,
	13 => 8202,

	// 裤子
	7 => 8203,
	11 => 8203,
	18 => 8203,

	// 鞋
	30 => 8204,
	31 => 8204,
	32 => 8204,
	33 => 8204,
	34 => 8204,
	35 => 8204,
	36 => 8204,
	37 => 8204,
	38 => 8204,
	39 => 8204,
	40 => 8204,
	41 => 8204,

	// 鞋
	60 => 8205,
	61 => 8205,
	62 => 8205,
	63 => 8205,
	64 => 8205,
	65 => 8205,
	66 => 8205,
	68 => 8205,
	69 => 8205,
	70 => 8205,
	71 => 8205,
	72 => 8205,

	// 鞋
	14 => 8206,

	// ------优酷男女混合类目------
);


if (defined('ENV') && ENV == 'AWS') {

	define('UPLOAD_PATH', __DIR__ . '/../../upload/');
	define('STAR_UPLOAD_PATH', __DIR__ . '/../../upload/');
	define('CDN_PATH', '');
	define('SEARCH_CDN_PATH', '');
	define('CDN_THUMB_PATH', '');
	define('CDN_THUMB_PATH_OLD', '');
	define('CDN_STAR_PATH', '');
} else if (defined('ENV') && ENV == 'QINIU') {
	define('UPLOAD_PATH', __DIR__ . '/../../upload/');
	define('STAR_UPLOAD_PATH', __DIR__ . '/../../upload/');
	define('CDN_PATH', '');
	define('SEARCH_CDN_PATH', '');
	define('CDN_THUMB_PATH', '');
	define('CDN_THUMB_PATH_OLD', '');
	define('CDN_STAR_PATH', '');
} else {

	define('UPLOAD_PATH', __DIR__ . '/../../upload/');
	define('STAR_UPLOAD_PATH', __DIR__ . '/../../upload/');
	define('CDN_PATH', '');
	define('SEARCH_CDN_PATH', '');
	define('CDN_THUMB_PATH', '');
	define('CDN_THUMB_PATH_OLD', '');
	define('CDN_STAR_PATH', '');
}
define('BACKEND_URL', '');

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'',

	// preloading 'log' component
	'preload'=>array('log'),
	
	'defaultController' => 'index',

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.extensions.JM.JMDbMysqlReadWriteSplit',
        'application.extensions.AliyunUpload',
        'application.extensions.mail.Mail',
        'application.extensions.JM.redis.*',
        'application.extensions.*',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool


		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array(''),
		),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format

		'urlManager'=>array(
			'urlFormat'=>'path',
			'showScriptName'=>false,
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),

		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		/*
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=testdrive',
			'emulatePrepare' => true,
			'username' => '',
			'password' => '',
			'charset' => 'utf8',
		),
		*/
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
        'webmaster'=>array(
            'email'=>'dresssupport@dress-plus.com',
            'name'=>'Dress Support',
            'password'=>'dressipo2018',
            'host'=>'ssl://smtp.exmail.qq.com',
            'port'=>'465',
        ),
	),
);
