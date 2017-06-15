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
            url: '/object/postDetect',
            data: {files: file}
        }).then(function (resp) {
            $scope.waiting = false;
            
            var data = resp.data;
            if (!data.status) {
                console.log(data.msg);
            } else {
                $('#preview').one('load', function(){
                    if (data.data && data.data.length > 0) {
                        var objects = data.data;
                        var width = $('#preview').width();
                        var height = $('#preview').height();
                        for (var i = 0; i < objects.length; i++) {
                            var box = objects[i].rectangle;
                            box.x *= width;
                            box.y *= height;
                            box.width *= width;
                            box.height *= height;
                            box.color = $scope.getColor();
                        }
                        $scope.objects = data.data;
                        $scope.data = data;
                        $scope.$digest();

                        $('[data-toggle="popover"]').popover();
                        $('.result_div').show();
                    } else {
                        $scope.objects = data.data;
                        $scope.$digest();
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
        
        var colorIndex = 0;
        $scope.getColor = function() {
            var arr = ['334CFF', 'FF334F', 'FF33F9', '8B33FF', '33C7FF', '33FFC7', '36FF33', 'FFCA33', 'FF6B33'];
            var color = arr[colorIndex++];
            colorIndex %= arr.length;
            return color;
        }
    };

}]);
