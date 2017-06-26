<!DOCTYPE>
<html ng-app="app">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="衣+,衣加,衣＋,以图搜衣,北京陌上花科技有限公司,Dress+,以图搜衣 通过识别图片中服饰的色彩,花纹以及样式对衣物进行搜索 帮用户找到喜欢的服饰">
	<meta name="author" content="Dress+">
	<meta name="keywords" content="衣+,衣加,衣＋,以图搜衣,北京陌上花科技有限公司,Dress+,dress-plus.com,www.dress-plus.com,时尚,衣服,美女,模特">
	<title><?php echo CHtml::encode($this->pageTitle); ?> | 衣+技术演示平台</title>
	<link rel="icon" href="http://bu.dressplus.cn/web/img/ico_logo.png">
	<link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<link href="//cdn.bootcss.com/json-formatter/0.6.0/json-formatter.css" rel="stylesheet">
	<link href="/css/common.css" rel="stylesheet">


	<script src="//cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
	<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="//cdn.bootcss.com/angular.js/1.4.8/angular.min.js"></script>
</head>
<body>
<div class="left_div" id='left_div'>
	<div class='logo_img'>
		<img class='class_img' src='/img/dress_logo.png'>
	</div>
	<div class='line_oo'></div>
	<div class='page_content <?php echo $this->isMenuOn("/object/tags") ? "page_on" : ""; ?>' >
		<div class='page_img'>
			<a href='/object/tags'>
				<img class='class_img' src='/img/page1_title.png'>
			</a>
		</div>
	</div>
	<div class='page_content <?php echo $this->isMenuOn("/object/detect") ? "page_on" : ""; ?>' >
		<div class='page_img'>
			<a href='/object/detect'>
				<img class='class_img' src='/img/page2_title.png'>
			</a>
		</div>
	</div>
	<div class='page_content <?php echo $this->isMenuOn("/star/detect") ? "page_on" : ""; ?>' >
		<div class='page_img'>
			<a href='/star/detect'>
				<img class='class_img' src='/img/page3_title.png'>
			</a>
		</div>
	</div>
	<div class='page_content <?php echo $this->isMenuOn("/face/index") ? "page_on" : ""; ?>' >
		<div class='page_img'>
			<a href='/face/index'>
				<img class='class_img' src='/img/page4_title.png'>
			</a>
		</div>
	</div>
	<div class='page_content <?php echo $this->isMenuOn("/face/compare") ? "page_on" : ""; ?>' >
		<div class='page_img'>
			<a href='/face/compare'>
				<img class='class_img' src='/img/page5_title.png'>
			</a>
		</div>
	</div>
	<div class='page_content <?php echo $this->isMenuOn("/dress/index") ? "page_on" : ""; ?>' >
		<div class='page_img'>
			<a href='/dress/index'>
				<img class='class_img' src='/img/page8_title.png'>
			</a>
		</div>
	</div>
	<div class='page_content <?php echo $this->isMenuOn("/car/index") ? "page_on" : ""; ?>' >
		<div class='page_img'>
			<a href='/car/index'>
				<img class='class_img' src='/img/page7_title.png'>
			</a>
		</div>
	</div>
	<div class='page_content <?php echo $this->isMenuOn("/magic/index") ? "page_on" : ""; ?>' >
		<div class='page_img'>
			<a href='/magic/index'>
				<img class='class_img' src='/img/page9_title.png'>
			</a>
		</div>
	</div>
</div>
<div class="right_div" id='right_div'>
	<style>
		.right_header .email{
			position: absolute;
			top:40%;
			right: 330px;
			color: #666;
		}
		.right_header .logout{
			position: absolute;
			font-size: 16px;
			width: 40px;
			top:40%;
			right: 280px;
			text-decoration: underline;
			color: #1295ef;
			cursor: pointer;
			z-index: 999;
		}
	</style>
	<div class='right_header'>
		<div class="email"><?php echo Yii::app()->session->get('user_login'); ?></div>
		<a href="/index/logout" class="logout">退出</a>
		<img src='/img/bg_header.png'>
	</div>
	<div class='right_content' ng-controller="AppCtrl">
		<?php echo $content; ?>
	</div>

</div>
<script src='/js/onmouse.js'></script>

</body>
</html>
