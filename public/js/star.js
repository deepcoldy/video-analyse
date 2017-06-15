/**
 * Created by piggy on 15-5-23.
 */

var app = angular.module('app', ['ngFileUpload', 'jsonFormatter']);

app.controller('AppCtrl', ['$scope', '$http', 'Upload', function($scope, $http, Upload) {
    $scope.server = '0';

    $scope.starPK = function (file) {
        if (!file) {
            return;
        }
        wait(true);
        $scope.data = null;


        Upload.upload({
            url: '/image/starPK',
            data: {files: file, server: $scope.server}
        }).then(function (resp) {
            wait(false);

            var data = resp.data;
            if (!data.status) {
                console.log(data.msg);
            } else {
                $('#preview').one('load', function(){
                    $scope.data = data.data;
                    $scope.region = data.region;
                    $scope.$digest();
                });
                $scope.image = data.image;
                $scope.starImage = data.starImage;
                $scope.starName = data.starName;
            }
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.files.name);
        });
    };
    $scope.starDetect = function (file) {
        if (!file) {
            return;
        }
        wait(true);
        $scope.data = null;


        Upload.upload({
            url: '/star/postDetect',
            data: {files: file, server: $scope.server}
        }).then(function (resp) {
            wait(false);

            var data = resp.data;
            if (!data.status) {
                console.log(data.msg);
            } else {
                $('#preview').one('load', function(){
                    if (data.data) {
                        var objects = data.data;
                        var width = $('#preview').width();
                        var height = $('#preview').height();
                        for (var i = 0; i < objects.length; i++) {
                            var box = objects[i].rectangle;
                            box.x *= width;
                            box.y *= height;
                            box.width *= width;
                            box.height *= height;
                        }

                        $scope.data = data.data;
                        $scope.$digest();
                        $('.result_div').show();
                    } else {
                        $scope.data = null;
                        $scope.$digest();
                    }
                    $('[data-toggle="popover"]').popover()

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
    $scope.uploadAndCrop = function(file){
        if (!file) {
            return;
        }
        
        wait(true);
        $scope.data = null;

        Upload.upload({
            url: '/image/upload',
            data: {files: file}
        }).then(function (resp) {
            wait(false);

            var data = resp.data;
            if (!data.region) {
                console.log(data.msg);
            } else {
                $('#preview').one('load', function(){
                    if (data.region) {
                        $scope.data = data.region;
                        $scope.region = data.region;
                        $scope.$digest();
                    } else {
                        $scope.data = data.data;
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

    $('#resizer').resizable().draggable();

    function wait(b) {
        $('#wait').modal(b ? 'show' : 'hide');
    }

    $('#wait').on('click', function(){
        wait(false);
    });
}]);
