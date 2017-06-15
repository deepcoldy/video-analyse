<div class="top_row clearfix">
    <div class='right_top'>
        <div class='topDiv_right'>
            <div class='topDiv_right_content'>
                <label class="preview" ngf-select="objectDetect($file)">
                    <img id="preview" src="/img/uploading_logo.png" alt="" class="img1" ng-src="{{image}}" style="min-height: 200px;">
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
            <p class='range_p1'>支持超过400种室内外场景的识别，万类通用物体的识别，可以广泛用于图片检索与分类、基于场景内容或物体的广告推荐、视频定制化打点广告等多种场景。</p>
        </div>
    </div>
</div>

<!-- 检测结果 -->
<div class='result_div' id='result_div' ng-show="data">
    <img class='result_bg' src='/img/result_bg.png'>
    <div class='result_p'>
        <p class='result_p1'>识别结果</p>
        <img src='/img/range_line.png' class='result_line'>

        <div class="result-area" style="margin-left: 20px;">
            <div>识别物体</div>
            <div style="margin-bottom: 20px;">
                <span ng-repeat="object in data.objects"> {{object.object_type}} |</span>
            </div>
            <div>识别场景</div>
            <div>
                <span ng-repeat="scene in data.scenes"> {{scene.scene_name}} |</span>
            </div>
        </div>
        <div class='result_botton' onClick=bottonClose()>关闭</div>
        <div class="result_botton2"  ngf-select="objectDetect($file)">上传图片</div>
    </div>
</div>
<div class='data_div' ng-show="data">
    <div class='data_p'>
        <p class='data_p_title1'>原始数据</p>
        <img src='/img/data_line.png' class='data_line'>

        <div style="padding: 25px; max-height: 255px; overflow: auto;">
            <json-formatter open="3" json="data"></json-formatter>
        </div>

    </div>
</div>

<?php require(VIEW_PATH . 'includes/wait_modal.php') ?>

<script src="//cdn.bootcss.com/danialfarid-angular-file-upload/12.0.1/ng-file-upload.min.js"></script>
<script src="//cdn.bootcss.com/json-formatter/0.6.0/json-formatter.js"></script>
<script src="/js/objectTags.js"></script>