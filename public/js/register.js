$(function () {
    var register = {
        formData: {
            email: '',
            phone: '',
            company: '',
            password: '',
            verifyCode: '',
            verifyKey: ''
        },
        userId: 0,
        getVerifyCode: function () {
            $.getJSON('/register/VerifyCode', {}, function (res) {
                if (res.status == 'SUCCESS') {
                    register.formData.verifyKey = res.data.ckey;
                    $('#verfiy-img').attr('src', 'data:image/png;base64,' + res.data.code);
                }
            })
        },
        notice: function (error) {
            if (error) {
                $('.ui-error-text').text(error).show();
            } else {
                $('.ui-error-text').text('').hide();
            }
        },
        checkFormData: function () {
            var emailReg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
            if (this.formData.email == '') {
                this.notice('邮箱不能为空');
                return false;
            }
            if (this.formData.phone == '') {
                this.notice('电话号码不能为空');
                return false;
            }
            if (this.formData.company == '') {
                this.notice('公司名称不能为空');
                return false;
            }
            if (this.formData.password == '') {
                this.notice('密码不能为空');
                return false;
            }
            if (this.formData.verifyCode == '') {
                this.notice('验证码不能为空');
                return false;
            }
            if (!emailReg.test(this.formData.email)) {
                this.notice('邮箱格式不正确');
                return false;
            }
            if (this.formData.company.length < 3 || this.formData.company.length > 20) {
                this.notice('请输入正确的公司名称');
                return false;
            }
            if (!/^[\w]{6,20}$/.test(this.formData.password)) {
                this.notice('密码格式不正确');
                return false;
            }
            if (!/^1[\d]{10}$/.test(this.formData.phone)) {
                this.notice('电话号码格式不正确');
                return false;
            }
            return true;
        },
        getFormData: function () {
            this.formData.email = $('input[name=email]').val();
            this.formData.phone = $('input[name=phone]').val();
            this.formData.company = $('input[name=company]').val();
            this.formData.password = $('input[name=password]').val();
            this.formData.verifyCode = $('input[name=verifyCode]').val();
        },
        setFormData: function () {
            $('input[name=email]').val(this.formData.email);
            $('input[name=phone]').val(this.formData.phone);
            $('input[name=company]').val(this.formData.company);
            $('input[name=password]').val(this.formData.password);
            $('input[name=verifyCode]').val(this.formData.verifyCode);
        },
        switchPage: function (page) {
            if (page == 'form') {
                $('.ui-registerResult-con').hide()
                $('.registerSuccess').hide()
                $('.ui-default-con').show()
            } else if (page == 'invation') {
                $('.registerSuccess').hide()
                $('.ui-default-con').hide()
                $('.ui-registerResult-con').show()
            } else {
                $('.ui-registerResult-con').hide()
                $('.ui-default-con').hide()
                $('.registerSuccess').show()
                setTimeout(function () {
                    location.href = '/login/index'
                }, 5000);
            }
        },
        doRegister: function () {
            $('#loading').css('display', 'block');
            var self = this;
            $.ajax({
                url: '/register/register',
                type: 'POST',
                dataType: 'json',
                data: this.formData,
            })
            .done(function(res) {
                if (res.status != 'ok') {
                    register.getVerifyCode()
                    register.notice(res.msg)
                } else {
                    $('.ui-registerResult-con .email').text(self.formData.email);
                    register.notice('')
                    register.userId = res.data.userId
                    register.switchPage('invation')
                }
            })
            .fail(function() {
                register.notice('网络错误，请稍后再试')
            })
            .always(function() {
                $('#loading').css('display', 'none');
            });

        },
        bindEvents: function () {
            // 换一张
            $('#changecode').on('click', function () {
                register.getVerifyCode();
            });

            // 注册
            $('#register').on('click', function () {
                register.getFormData()
                console.log(register.formData)
                if (register.checkFormData()) {
                    register.doRegister();
                }
            })

            $('#rewrite').on('click', function () {
                register.setFormData()
                register.switchPage('form')
            });

            $('#login').on('click', function () {
                location.href = '/login/index'
            })

            $('#resend').on('click', function () {
                $('#loading').css('display', 'block');
                $.ajax({
                    url: '/register/resend',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        email: register.formData.email,
                        user_id: register.userId
                    },
                })
                .done(function(res) {
                    alert(res.msg)
                })
                .fail(function() {
                    alert('网络错误，请稍后试')
                })
                .always(function() {
                    $('#loading').css('display', 'none');
                });
            })
        },
        init: function () {
            this.getVerifyCode();
            this.bindEvents();
            this.switchPage(page);
            if(error){
                alert(JSON.parse(error).msg);
                location.href = '/login/register'
            }
        }
    }
    register.init();
})
