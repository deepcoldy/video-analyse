<?php
/**
 * Created by PhpStorm.
 * User: piggy
 * Date: 15-5-7
 * Time: 下午10:09
 */
?>
<h1>商品对比</h1>
<h4>通过基于深度学习的商品比对技术，根据商品的深度特真够，检测两个商品是否为同样的商品。可以广泛应用于电商商品查重过滤，商品校验等多种场景。</h4>
<form action="/face/postCompare" method="post" ng-submit="doSubmit()">
<div role="tabpanel" id="face_compare">
    <label class="preview" style="position: relative; margin-bottom: 100px; border: 1px solid #f0f0f0;" ngf-select="upload1($file)">
        <img src="/images/cloud-up.png" alt="" class="img1" width="260" height="260" ng-src="{{img1}}">
    </label>
    <label class="preview" style="position: relative; margin-bottom: 100px; border: 1px solid #f0f0f0;" ngf-select="upload2($file)">
        <img src="/images/cloud-up.png" alt="" class="img2" width="260" height="260" ng-src="{{img2}}">
    </label>
    <div>{{result}}</div>
</div>
</form>
<?php require(VIEW_PATH . 'includes/wait_modal.php') ?>
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
                $http.get('/object/postCompare', {
                    params: {
                        img1: $scope.img1,
                        img2: $scope.img2

                    }
                }).success(function(data){
                    if (!data.status) {
                        return alert(data.msg);
                    }
                    $scope.result = data.data;
                }).error(function(err) {
                    console.log(err);
                })

            }
        };
    }]);

</script>