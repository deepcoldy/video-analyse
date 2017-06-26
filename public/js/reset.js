$(function () {
    var reset = {
        formData: {
            email: '',
            newpw: '',
            confirmpw: '',
            hash: {
                'qq.com': 'http://mail.qq.com',
                'gmail.com': 'http://mail.google.com',
                'sina.com': 'http://mail.sina.com.cn',
                '163.com': 'http://mail.163.com',
                '126.com': 'http://mail.126.com',
                'yeah.net': 'http://www.yeah.net/',
                'sohu.com': 'http://mail.sohu.com/',
                'tom.com': 'http://mail.tom.com/',
                'sogou.com': 'http://mail.sogou.com/',
                '139.com': 'http://mail.10086.cn/',
                'hotmail.com': 'http://www.hotmail.com',
                'live.com': 'http://login.live.com/',
                'live.cn': 'http://login.live.cn/',
                'live.com.cn': 'http://login.live.com.cn',
                '189.com': 'http://webmail16.189.cn/webmail/',
                'yahoo.com.cn': 'http://mail.cn.yahoo.com/',
                'yahoo.cn': 'http://mail.cn.yahoo.com/',
                'eyou.com': 'http://www.eyou.com/',
                '21cn.com': 'http://mail.21cn.com/',
                '188.com': 'http://www.188.com/',
                'foxmail.com': 'http://www.foxmail.com',
                'outlook.com': 'http://www.outlook.com'
            }
        },
        switchPage: function (page) {
            if (page == 'first') {
                $('.firstpage').show();
                $('.secondpage').hide();
                $('.thirdpage').hide();
            } else if (page == 'second') {
                $('.firstpage').hide();
                $('.secondpage').show();
                $('.thirdpage').hide();
            } else if (page == 'thrid') {
                $('.firstpage').hide();
                $('.secondpage').hide();
                $('.thirdpage').show();
            }
        },
        getFormData: function () {
            this.formData.email = $('input[name=email]').val();
            this.formData.newpw = $('input[name=newpw]').val();
            this.formData.confirmpw = $('input[name=confirmpw]').val();
        },
        notice: function (error) {
            if (error) {
                $('.passworderror').text(error).css('visibility', 'visible');
                return false;
            } else {
                $('.passworderror').text('').css('visibility', 'hidden');
                return true;
            }
        },
        checkPassword: function () {
            if (this.formData.newpw == '' || this.formData.confirmpw == '') {
                this.notice('请完整填写密码信息');
                return false;
            }
            if (!/^[\w]{6,20}$/.test(this.formData.newpw)) {
                this.notice('密码格式不正确');
                return false;
            }
            if (this.formData.newpw != this.formData.confirmpw) {
                this.notice('两次密码输入不一致');
                return false;
            }
            this.notice('');
            return true;

        },
        doConfirm: function () {
            this.getFormData()
            if (page == 'first') {
                var emailReg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
                if (reset.formData.email == '') {
                    this.notice('邮箱不能为空');
                    return false;
                }
                if (!emailReg.test(reset.formData.email)) {
                    this.notice('邮箱格式不正确');
                    return false;
                }
                $('#loading').css('display', 'block');
                $.ajax({
                    url: '/login/resendpass',
                    type: 'POST',
                    dataType: 'json',
                    data: {username: reset.formData.email},
                })
                .done(function(res) {
                    if (res.status == 'ok') {
                        reset.switchPage('second');
                        $('.resetaccount').text(reset.formData.email)
                        page = 'second';
                    } else {
                        alert('网络错误，请稍后再试');
                    }
                })
                .fail(function() {
                    alert('网络错误，请稍后再试');
                })
                .always(function() {
                    $('#loading').css('display', 'none');
                });
            } else if (page == 'thrid'){
                if (this.checkPassword() && email && user_id) {
                    $('#loading').css('display', 'block');
                    $.ajax({
                        url: '/login/resetpass',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            username: email,
                            password: reset.formData.newpw,
                            userId: user_id
                        },
                    })
                    .done(function(res) {
                        if (res.status == 'ok') {
                            var i = 3;
                            setInterval(function () {
                                if(i == 0){
                                    location.href = '/login/index'
                                }
                                reset.notice('密码重置成功，'+i+'秒后自动跳回登录页');
                                i--;
                            }, 1000);
                        } else {
                            reset.notice('密码重置失败，请稍后再试');
                        }
                    })
                    .fail(function(res) {
                        reset.notice('网络错误，请稍后再试')
                    })
                    .always(function() {
                        $('#loading').css('display', 'none');
                    });

                }
            }
        },
        bindEvents () {
            function t () {
                var emailReg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
                if(emailReg.test($(this).val())) {
                    reset.formData.email = $(this).val()
                    $('#confirmclick').addClass('active-btn').attr('disabled', false)
                } else {
                    $('#confirmclick').removeClass('active-btn').attr('disabled', true)
                }
            }
            $('input[name=email]').on('keyup', t);
            $('input[name=email]').on('input', t);

            $('#confirmclick, #submit').on('click', function () {
                reset.doConfirm();
            })

            $('.secondstep .special').on('click', function (self) {
                var _mail = $(".resetaccount").text().split('@')[1];    //获取邮箱域
                var _got = false;
                for (var j in reset.formData.hash){
                    if(j == _mail){
                        location.href = reset.formData.hash[_mail];
                        _got = true;
                    }
                }
                if(!_got){
                    location.href = _mail;
                }
            })
        },
        init: function () {
            // page = 'thrid'
            // email = 'yangqinchuan_kis@163.com'
            // user_id = '10066'
            this.switchPage(page)
            this.bindEvents()
            if(error){
                alert(JSON.parse(error).msg);
                location.href = '/login/resetpassword'
            }
        }
    }
    reset.init();
});
