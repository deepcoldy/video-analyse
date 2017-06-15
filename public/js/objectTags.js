/**
 * Created by piggy on 15-5-23.
 */

var app = angular.module('app', ['ngFileUpload', 'jsonFormatter']);
var $scope_g;

app.controller('AppCtrl', ['$scope', '$http', 'Upload', function($scope, $http, Upload) {
    $scope_g = $scope;
    $scope.waiting = false;

    $scope.objectDetect = function (file) {
        if (!file) {
            return;
        }
        $scope.waiting = true;
        $scope.data = null;

        Upload.upload({
            url: '/object/postTags',
            data: {files: file}
        }).then(function (resp) {
            $scope.waiting = false;
            
            var data = resp.data;
            if (!data.status) {
                console.log(data.msg);
            } else {
                $('#preview').one('load', function(){
                    if (data.data) {
                        $scope.data = data.data;
                        $scope.$digest();

                        $('[data-toggle="popover"]').popover()
                        $('.result_div').show();
                    }

                });
                $scope.image = data.image;
            }
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.files.name);
        });
    };

}]);
