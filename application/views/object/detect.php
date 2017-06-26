<div class="top_row clearfix">
<div class='right_top'>
    <div class='topDiv_right'>
        <div class='topDiv_right_content'>
            <label class="preview" ngf-select="objectDetect($file)">
                <img id="preview" src="/img/uploading_logo.png" alt="" class="img1" ng-src="{{image}}" style="min-height: 200px;">
                <div ng-repeat="object in objects" class="bound" style="background: #{{object.rectangle.color}}; opacity: 0.2; border: 1px solid #fefefe; position: absolute; left: {{object.rectangle.x}}px; top: {{object.rectangle.y}}px; width: {{object.rectangle.width}}px; height: {{object.rectangle.height}}px;" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-html="true" data-content="名称：{{object.type}}<br>Confidence：{{object.confidence}}<br>"></div>
            </label>

            <div class='uplading_remind' ng-hide="image">
                <img class='uploading_remind_img' src='/img/uploading_remind.png'>
                <p class='remind_p'>
                    <img src='/img/remind_icon.png'>
								<span>
									推荐使用小于1MB的图片
								</span>
                </p>
            </div>
        </div>
        <div class='shadow_div'></div>
    </div>

</div>


<div class='range_div'>
    <img src='/img/range_bg.png' class='range_bg'>
    <div class='range_p'>
        <p class='range_p_title1'>功能介绍</p>
        <img src='/img/range_line.png' class='range_line'>
        <p class='range_p1'>基于海量数据的深度学习，检测视频或图像中的物体，并通过物体特征分析，准确判断物体类目。支持服饰、3C、商超、家居、日用品、食品、动物、交通工具等超过100类物体的检测和识别。</p>
        <p class='range_p_title1'>支持物体类别</p>
        <img src='/img/range_line.png' class='range_line'>
        <p class='range_p1'> 斑马  棒球棒  棒球手套  杯子  笔记本电脑  冰箱  餐叉  餐桌  冲浪板  床  吹风机  大象  蛋糕  刀  电视  飞机 飞盘 风筝 公共汽车 狗 盥洗盆 胡萝卜…… </p>
        <div class="load_more" onClick="buttonMore()">
            <p class='range_more_p'>查看更多</p>
            <div class='more_img'  id='more_img'>
                <img src='/img/range_more.png'>
            </div>
        </div>

        <div class='more_div' id='more_div'>
            <p>斑马  棒球棒  棒球 手套  杯子  笔记本电脑  冰箱 餐叉  餐桌  冲浪板  床  吹风机  大象  蛋糕  刀   电视  飞机  飞盘  风筝  公共汽车  狗  盥洗盆     胡萝卜  花瓶  滑雪板  火车  剪刀  键盘  交通灯  酒杯  橘子  卡车  烤面包机  烤箱  裤子  领带 溜冰板  马  马桶  猫  绵羊  摩托车  奶牛  鸟  盆栽植物 披萨  苹果  瓶子  球  裙装  热狗  人  三明治  上衣 勺子  手机  手提包  手提箱  书  鼠标  双肩背包  泰迪熊  停车标志  停车记时器  碗  网球拍  微波炉  西兰花  香蕉  消防栓  小船  小汽车  鞋  熊   雪橇  牙刷  遥控器  椅子  雨伞  炸面圈  长凳  长颈鹿  长沙发  钟表  自行车</p>
        </div>
    </div>
</div>
</div>
<!-- 检测结果 -->
<div class='result_div' id='result_div' ng-show="data" ng-cloak>
    <img class='result_bg' src='/img/result_bg.png'>
    <div class='result_p'>
        <p class='result_p1'>检测结果</p>
        <img src='/img/range_line.png' class='result_line'>

        <div class="result-area" style="margin-left: 20px;">
            <div ng-repeat="object in objects | orderBy: 'confidence':true" style="margin-bottom: 20px;"><span style="display: inline-block; width: 100px;">{{object.type}}</span>  <span>置信度: {{object.confidence.toFixed(2)}}</span></div>
        </div>
        <div class='result_botton' onClick=bottonClose()>关闭</div>
        <div class="result_botton2"  ngf-select="objectDetect($file)">上传图片</div>
    </div>
</div>
<div class='data_div' ng-show="data" ng-cloak>
    <div class='data_p'>
        <p class='data_p_title1'>原始数据</p>
        <img src='/img/data_line.png' class='data_line'>

        <div style="padding: 25px; max-height: 255px; overflow: auto;">
            <json-formatter open="3" json="objects"></json-formatter>
        </div>

    </div>
</div>

<?php require(VIEW_PATH . 'includes/wait_modal.php') ?>

<script src="//cdn.bootcss.com/danialfarid-angular-file-upload/12.0.1/ng-file-upload.min.js"></script>
<script src="//cdn.bootcss.com/json-formatter/0.6.0/json-formatter.js"></script>
<script src="/js/objectDetect.js"></script>
