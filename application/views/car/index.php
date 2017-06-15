<div class="top_row clearfix">

<div class='right_top'>
    <div class='topDiv_right'>
        <div class='topDiv_right_content'>
            <label class='preview'>
                <img id="preview" src="/img/uploading_logo.png" alt="" ng-src="{{image}}"  ngf-select="faceDetect($file)">
                <div ng-repeat="face in faces" class="bound" style="background: #333; opacity: 0.2; border: 1px solid #fefefe; position: absolute; left: {{face.rectangle.x}}px; top: {{face.rectangle.y}}px; width: {{face.rectangle.width}}px; height: {{face.rectangle.height}}px;" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-html="true" data-content="{{face.car_name}}<br>"></div>
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
<!-- 功能介绍div -->
<div class='range_div'>
    <img src='/img/range_bg.png' class='range_bg'>
    <div class='range_p'>
        <p class='range_p_title1'>功能介绍</p>
        <img src='/img/range_line.png' class='range_line'>
        <p class='range_p1'>利用先进的图像识别技术，支持超过1000种车辆型号的识别，可用于图像和视频中的车辆型号检测，在广告投放、交通安全等领域有很大价值。</p>
    </div>
</div>
</div>


<!-- 检测结果 -->
<div class='result_div' id='result_div' style="display: none;">
    <img class='result_bg' src='/img/result_bg.png'>
    <div class='result_p'>
        <p class='result_p1'>检测结果</p>
        <img src='/img/range_line.png' class='result_line'>

        <div class="result-area" style="margin-left: 20px;">
            <div ng-if="faces">
                <div ng-repeat="face in faces" style="margin-bottom: 20px;"> {{face.car_name}}</div>
            </div>
            <div ng-if="error">
                没有检测到汽车
            </div>
        </div>
        <div class='result_botton' onClick=bottonClose()>关闭</div>
        <div class="result_botton2"  ngf-select="faceDetect($file)">上传图片</div>
    </div>
</div>
<div class='data_div' ng-show="faces">
    <div class='data_p'>
        <p class='data_p_title1'>原始数据</p>
        <img src='/img/data_line.png' class='data_line'>

        <div style="padding: 25px; max-height: 255px; overflow: auto;">
            <json-formatter open="3" json="faces"></json-formatter>
        </div>

    </div>
</div>

<script src="//cdn.bootcss.com/danialfarid-angular-file-upload/12.0.1/ng-file-upload.min.js"></script>
<script src="//cdn.bootcss.com/json-formatter/0.6.0/json-formatter.js"></script>
<script src="/js/car.js"></script>
