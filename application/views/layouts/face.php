<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="format-detection" content="telephone=no">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp"/>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">
	<link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<style>

        .content {
            width: 600px;
            margin: auto;
            padding: 10px;
        }
		#posts {
			margin: 20px 10px 90px;
		}
		#posts .product_image{
			width: 32%;
			height: 32%;
			position: absolute;
			overflow: hidden;
		}

		#posts .product_image img{
			width: 100%;
			height: 100%;
			text-align: center;
		}

		#posts .product_image0{
			left: 0;
			top: 0;
			width: 66%;
			height: 66%;
		}

		#posts .product_image1{
			top: 0;
			right: 0;
		}
		#posts .product_image2{
			top: 34%;
			right: 0;
		}

		#posts .product_image3{
			left: 0;
			bottom: 0;
		}

		#posts .product_image4{
			left: 34%;
			bottom: 0;
		}

		#posts .product_image5{
			right: 0;
			bottom: 0;
		}

		#posts .product_image6{
			width: 31%;
			padding: 1.5%;
		}

		.head {
			border-bottom: 1px solid #e5e5e5;
			padding-bottom: 15px;
		}
		.products {
			position: relative;
			padding: 15px;
			margin: 15px -5px;
		}

		.comments {
			padding-top: 15px;
			margin-top: 20px;
			border-top: 1px solid #e5e5e5;
		}
        #search_result a {
            position: relative;
            display: block;
            padding: 50% 0;
            overflow: hidden;
            margin-bottom: 15px;
        }

        #search_result img {
            width: 100%;
            position: absolute;
            left: 0;
            top: 0;
        }
	</style>

	<script src="//cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="//cdn.bootcss.com/angular.js/1.4.8/angular.min.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse" role="navigation">
    <div class="navbar-header ">
        <a href="/test" class="navbar-brand ">衣+</a>
    </div>
    <ul class="nav nav-pills">
		<li><a href="/object/detect">物体检测</a></li>
		<li><a href="/object/tags">通用物体场景识别</a></li>
		<li><a href="/face/index">人脸属性检测</a></li>
		<li><a href="/face/compare">人脸对比</a></li>
		<li><a href="/face/status">主播状态检测</a></li>
		<li><a href="/star/detect">明星识别</a></li>
    </ul>
</nav>
<div class="content" ng-app="app" ng-controller="AppCtrl">
    <?php echo $content; ?>
</div>
</body>
</html>
