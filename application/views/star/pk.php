<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 15-5-7
 * Time: 下午10:09
 */
?>
<link href="//cdn.bootcss.com/jqueryui/1.12.0-rc.2/jquery-ui.min.css" rel="stylesheet">
<link href="//cdn.bootcss.com/json-formatter/0.6.0/json-formatter.css" rel="stylesheet">
<h1>PK明星衣品qtype=13</h1>

<label for="">服务器: </label>
<select name="" id="server_list" ng-model="server">
    <?php foreach ($servers as $k=>$server) : ?>
        <option value="<?php echo $k; ?>"><?php echo $server['host']; ?></option>
    <?php endforeach; ?>
</select>

<div role="tabpanel" id="face_detect">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#select_image" aria-controls="select_image" role="tab" data-toggle="tab">选择图片</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane panel panel-body active" id="select_image">
            <label class="btn btn-primary btn-sm" ngf-select="starPK($file)">上传图片</label>

            <div class="preview" style="position: relative; margin-bottom: 10px;" ng-show="image">
                <img src="" alt="" id="preview" ng-src="{{image}}" width="260"/>
                VS
                <img src="" alt="" id="starImage" ng-src="{{starImage}}" width="260"/>
            </div>

            <div class="result-area" ng-if="starName">
                <div>穿衣品味很像: {{starName}}</div>
            </div>
        </div>

        <div class="panel panel-default" ng-show="image" ng-cloak>
            <div class="panel-heading">原始数据：</div>
            <div class="panel-body">
                <json-formatter open="3" json="data"></json-formatter>
            </div>
        </div>
    </div>

</div>
<?php require(VIEW_PATH . 'includes/wait_modal.php') ?>

<script src="//cdn.bootcss.com/danialfarid-angular-file-upload/12.0.1/ng-file-upload.min.js"></script>
<script src="//cdn.bootcss.com/jqueryui/1.12.0-rc.1/jquery-ui.min.js"></script>
<script src="//cdn.bootcss.com/json-formatter/0.6.0/json-formatter.js"></script>
<script src="/js/star.js"></script>
