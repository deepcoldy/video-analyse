$(function () {
    var login = {
        formData: {
            verifyCode: '',
            verifyKey: '',
            username: '',
            password: ''
        },
        getVerifyCode: function () {
            $.getJSON('/login/VerifyCode', {}, function (res) {
                if (res.status == 'SUCCESS') {
                    login.formData.verifyKey = res.data.ckey;
                    $('#verfiy-img').attr('src', 'data:image/png;base64,' + res.data.code);
                }
            });
        },
        doLogin: function () {
            this.formData.verifyCode = $('input[name=yzm]').val()
            this.formData.username = $('input[name=username]').val()
            this.formData.password = $('input[name=password]').val()
            if (this.checkFormData()) {
                $('#loading').css('display', 'block');
                $.ajax({
                    url: '/login/login',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        username: this.formData.username,
                        password: this.formData.password,
                        verifyCode: this.formData.verifyCode,
                        verifyKey: this.formData.verifyKey
                    },
                })
                .done(function(res) {
                    if (res.status == 'ok') {
                        location.href = '/object/tags'
                    } else {
                        login.getVerifyCode()
                        login.notice(res.msg)
                    }
                })
                .fail(function() {
                    login.notice('服务器异常请稍后再试')
                })
                .always(function() {
                    $('#loading').css('display', 'none');
                });

            }
        },
        notice: function (error) {
            if (error) {
                $('#login_error_msg>.ui-error-text').text(error);
                $('#login_error_msg').show();
            } else {
                $('#login_error_msg>.ui-error-text').text();
                $('#login_error_msg').hide();
            }
        },
        checkFormData: function () {
            var emailReg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
            if (!emailReg.test(this.formData.username) || this.formData.verifyCode == '' || this.formData.password == '' || this.formData.username == '') {
                this.notice('请输入正确的用户名或密码或验证码')
                return false
            }
            this.notice(false)
            return true
        },
        bindEvent: function () {
            // 换一张
            $('#noclear').on('click', function () {
                login.getVerifyCode();
            });

            // 登录
            $('#login').on('click', function () {
                login.doLogin();
            });

            $('#resetpassword').on('click', function () {
                location.href = '/login/resetpassword';
            })
        },
        init: function () {
            this.getVerifyCode();
            this.bindEvent();
        }
    }
    login.init()
})
