<div class="top_row clearfix">

<div class='right_top'>
    <div class='topDiv_right'>
        <div class='topDiv_right_content row'>
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label class="middle preview" style="position: relative; " ngf-select="upload1($file)">
                    <img src="/img/uploading_logo.png" alt="" class="img1" ng-src="{{img1}}">
                </label>
            </div>
            <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                <label class="middle preview" style="position: relative; " ngf-select="upload2($file)">
                    <img src="/img/uploading_logo.png" alt="" class="img2" ng-src="{{img2}}">
                </label>

            </div>
            <div class="oo_line"></div>
            <div class='uplading_remind' ng-hide="result">
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
        <p class='range_p1'>通过基于深度学习的人脸比对技术，实现人脸相似度检测，可以广泛应用在人脸识别验证，人脸聚类、敏感人物监控、判断视频中主播和头像是否是同一个人等多种场景。</p>
    </div>
</div>

</div>

<!-- 检测结果 -->
<div class='result_div' id='result_div' ng-show="result">
    <img class='result_bg' src='/img/result_bg.png'>
    <div class='result_p'>
        <p class='result_p1'>检测结果</p>
        <img src='/img/range_line.png' class='result_line'>

        <div class="result-area" style="margin-left: 20px;">
            <div style="margin-bottom: 15px;">{{result.value}}</span></div>
            <div>
                相似度: {{result.similarity}}
            </div>
        </div>
        <div class='result_botton' onClick=bottonClose()>关闭</div>
    </div>
</div>
<div class='data_div' ng-show="result">
    <div class='data_p'>
        <p class='data_p_title1'>原始数据</p>
        <img src='/img/data_line.png' class='data_line'>

        <div style="padding: 25px; max-height: 255px; overflow: auto;">
            <json-formatter open="3" json="result"></json-formatter>
        </div>

    </div>
</div>


<script src="//cdn.bootcss.com/danialfarid-angular-file-upload/12.0.1/ng-file-upload.min.js"></script>
<script src="//cdn.bootcss.com/json-formatter/0.6.0/json-formatter.js"></script>
<script>
    var app = angular.module('app', ['ngFileUpload', 'jsonFormatter']);

    app.controller('AppCtrl', ['$scope', '$http', 'Upload', function($scope, $http, Upload) {
        $scope.img1 = '';
        $scope.img2 = '';
        $scope.result = '';

        $scope.upload1 = function (file) {
            if (!file) {
                return;
            }
            Upload.upload({
                url: '/image/upload',
                data: {files: file}
            }).then(function (resp) {
                $scope.waiting = false;

                var data = resp.data;
                if (!data.status) {
                    console.log(data.msg);
                } else {
                    $scope.img1 = data.url;
                    $scope.doSubmit();
                }
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.files.name);
            });

        };
        $scope.upload2 = function (file) {
            if (!file) {
                return;
            }
            Upload.upload({
                url: '/image/upload',
                data: {files: file}
            }).then(function (resp) {
                $scope.waiting = false;

                var data = resp.data;
                if (!data.status) {
                    console.log(data.msg);
                } else {
                    $scope.img2 = data.url;
                    $scope.doSubmit();
                }
            }, function (resp) {
                console.log('Error status: ' + resp.status);
            }, function (evt) {
                var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
                console.log('progress: ' + progressPercentage + '% ' + evt.config.data.files.name);
            });

        };


        $scope.doSubmit = function(){
            if ($scope.img1 && $scope.img2) {
                $http.get('/face/postCompare', {
                    params: {
                        img1: $scope.img1,
                        img2: $scope.img2

                    }
                }).success(function(data){
                    if (!data.status) {
                        return alert(data.msg);
                    }
                    $scope.result = data.data;
                    $('.result_div').show();
                }).error(function(err) {
                    console.log(err);
                })

            }
        };
    }]);

</script>