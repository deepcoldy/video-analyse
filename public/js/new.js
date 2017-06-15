/**
 * Created by piggy on 15-5-23.
 */
$(function() {
    var jcrop_api;
    $('#fileupload').fileupload({
        dataType: 'json',
        processQueue: [
            {
                action: 'resizeImage',
                maxWidth: 600,
                maxHeight: 600
            }
        ],
        // Enable image resizing, except for Android and Opera,
        // which actually support image resizing, but fail to
        // send Blob objects via XHR requests:
        disableImageResize: /Android(?!.*Chrome)|Opera/
            .test(window.navigator && navigator.userAgent),
        imageMaxWidth: 500,
        imageMaxHeight: 500,
        imageCrop: true, // Force cropped images

        add: function(e, data){
            wait(true);
            $('#btn_ok').hide();
            data.submit();
        },
        done: function (e, data) {
            wait(false);
            // 进入预览
            if (jcrop_api) {
                jcrop_api.destroy();
                jcrop_api = null;
            }
            $('#preview').remove();
            $('.preview').before('<img src="'+data.result.url+'" alt="" id="preview"/>');
            //$('#preview').attr('src', data.result.url);
            $('#upload_image').val(data.result.path);

            if (data.result.region) {
                showCoords({
                    w: data.result.region.width,
                    h: data.result.region.height,
                    x: data.result.region.x,
                    y: data.result.region.y
                });

            }
            //
            //if (data.result.algoVer == 'algo-1.0') {
            //    $('#algo').attr('checked', true);
            //} else {
            //    $('#algo').removeAttr('checked');
            //}

            $('#preview').Jcrop({
                onChange: showCoords,
                onSelect: showCoords,
                minSize: [1, 1],
            }, function(){
                jcrop_api = this;
                jcrop_api.setImage(data.result.url);
                //$('#btn_crop').show();

                $('.jcrop-holder').off('click').on('click', function(){
                    if ($('.jcrop-tracker').width() == 1) {
                        $('#btn_crop').click();
                        //$('#btn_crop').hide();
                    } else {
                        $('#btn_crop').show();
                    }
                });
            });
        }
    });
    $('#btn_ok').click(function(){
        $('.nav-tabs a:eq(1)').tab('show');
    });

    $('#btn_crop').click(function(){
        wait(true);
        var formData = {
            x: $('#x').val(),
            y: $('#y').val(),
            w: $('#w').val(),
            h: $('#h').val(),
            width: $('#preview').width(),
            height: $('#preview').height(),
            category_id: $('#category_id').val(),
            qtype: $('#qtype').val(),
            upload_image: $('#upload_image').val()
        };

        if ($('#original_data').length > 0) {
            $.post('/product/cropNew', formData, function(data){
                wait(false);
                if (data && data.region) {
                    jcrop_api.animateTo([data.region.x, data.region.y, data.region.x + data.region.width, data.region.y + data.region.height]);
                    $('.fields').show();
                    $('#btn_ok').show();
                    $('#btn_crop').show();
                    jcrop_api.setOptions({
                        minSize: [0, 0],
                        maxSize: [0, 0]
                    })
                }
                if (data && data.original_data) {
                    $('#original_data').text(JSON.stringify(data.original_data));
                }
            }, 'json');

        } else {
            $.post('/product/crop', formData, function(data){
                wait(false);
                if (data && data.region) {
                    jcrop_api.animateTo([data.region.x, data.region.y, data.region.x + data.region.width, data.region.y + data.region.height]);
                    $('.fields').show();
                    $('#btn_ok').show();
                    $('#btn_crop').show();
                    jcrop_api.setOptions({
                        minSize: [0, 0],
                        maxSize: [0, 0]
                    })
                }
            }, 'json');

        }
    });

    $('.category').click(function(){

        var $this = $(this),
            cid = $this.data('cid');
        $('#category_id').val(cid);

        doSearch();

        return false;
    });

    $('#retry_new').click(function(){
        doSearch(false);
    });
    $('#retry_old').click(function(){
        doSearch(true);
    });
    $('#retry_online').click(function(){
        doSearch(true, true);
    });

    function showCoords(c)
    {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    }

    function doSearch(isOld, isOnline) {
        wait(true);
        var formData = {
            crop_x: $('#x').val(),
            crop_y: $('#y').val(),
            crop_width: $('#w').val(),
            crop_height: $('#h').val(),
            width: $('#preview').width(),
            height: $('#preview').height(),
            category_id: $('#category_id').val(),
            upload_image: $('#upload_image').val(),
            server: $('#server_list').val()
        };

        $.post('/product/searchNew', formData, function(data){
            wait(false);

            $scope_g.products = data;
            $scope_g.$digest();

            $('.nav-tabs a:eq(2)').tab('show');

            $window.scroll();

        }, 'json');
    }

    function wait(b) {
        $('#wait').modal(b ? 'show' : 'hide');
    }

    $('#wait').on('click', function(){
        wait(false);
    });

    var scrollDelta = 100;
    var scrollLastTime = 0;
    var $window = $(window);
    $window.scroll(function(){
        var now = Date.now();
        if (now - scrollLastTime < scrollDelta) {
            return;
        }
        scrollLastTime = now;

        $('.lazyLoad').not('.lazyLoaded').each(function(){
            var $this = $(this);
            if ($this.offset().top > $window.scrollTop() - 100 &&  $this.offset().top < ($window.scrollTop() + $window.height() + 100)) {
                $this.attr('src', $this.data('src'));
                $this.addClass('lazyLoaded');
            }
        });
    });

    $('body').on('click', '.searchFast', function(){
        wait(true);
        $.getJSON($(this).attr('href'), function(data){
            wait(false);
            $scope_g.products = data;
            $scope_g.$digest();
            $window.scroll();

        });
    });
});

var app = angular.module('app', []);

app.controller('AppCtrl', function($scope) {
    $scope_g = $scope;
});
