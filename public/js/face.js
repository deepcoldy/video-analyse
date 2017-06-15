/**
 * Created by piggy on 15-5-23.
 */
var app = angular.module('app', ['ngFileUpload', 'jsonFormatter']);
var $scope_g;

app.controller('AppCtrl', ['$scope', '$http', 'Upload', function($scope, $http, Upload) {
    $scope_g = $scope;

    $scope.faceDetect = function (file) {
        if (!file) {
            return;
        }
        Upload.upload({
            url: '/face/postDetects',
            data: {files: file}
        }).then(function (resp) {
            $scope.waiting = false;

            var data = resp.data;
            if (!data.status) {
                console.log(data.msg);
            } else {
                $('#preview').one('load', function(){
                    if (data.data && data.data.length > 0) {
                        var width = $('#preview').width();
                        var height = $('#preview').height();
                        for (var i = 0; i < data.data.length; i++) {
                            var region = data.data[i].rectangle;
                            region.x *= width;
                            region.y *= height;
                            region.w *= width;
                            region.h *= height;
                        }
                        
                        $scope.faces = data.data;
                        $scope.$digest();
                        $('.result_div').show();

                        $('[data-toggle="popover"]').popover()
                    } else {
                        $scope.faces = null;
                        $scope.error = '未检测到服饰!';
                        $scope.$digest();
                    }

                });
                $scope.image = data.url;
            }
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.files.name);
        });

    };
}]);
