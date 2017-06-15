/**
 * Created by piggy on 15-5-23.
 */
var app = angular.module('app', ['ngFileUpload', 'jsonFormatter']);
var $scope_g;

app.controller('AppCtrl', ['$scope', '$http', 'Upload', function($scope, $http, Upload) {
    $scope_g = $scope;

    $scope.upload = function (file) {
        if (!file) {
            return;
        }
        Upload.upload({
            url: '/magic/upload',
            data: {files: file, style: $('#choose_on').parent('li').data('style')}
        }).then(function (resp) {
            $scope.waiting = false;

            var data = resp.data;
            if (!data.status) {
                console.log(data.msg);
            } else {
                $scope.image = data.url;
                $scope.image2 = data.url2;
            }
        }, function (resp) {
            console.log('Error status: ' + resp.status);
        }, function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.data.files.name);
        });
    };

    $scope.convert = function () {
        if (!$scope.image) {
            return;
        }
        $.post('/magic/convert', {
            image: $scope.image,
            style: $scope.style
        }, function (data) {
            if (data && data.status) {
                $scope.image2 = data.url;
                $scope.$digest();
            } else {
                alert(data.msg);
            }
        }, 'json')
    }
}]);

$('.style_table').on('click', 'li', function () {
    $('#choose_on').remove().prependTo($(this));
    $scope_g.style = $(this).data('style');
    $scope_g.convert();
});
