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
            url: '/dress/postDetects',
            data: {files: file}
        }).then(function (resp) {
            $scope.waiting = false;

            var data = resp.data;
            if (!data.status) {
                console.log(data.msg);
            } else {
                $('#preview').one('load', function(){
                    if (data.data && data.data.attribute_info && data.data.attribute_info.length > 0) {
                        $scope.faces = data.data.attribute_info;
                        $scope.$digest();
                        $('.result_div').show();

                    } else {
                        $scope.faces = null;
                        $scope.error = '未检测到人脸!';
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
