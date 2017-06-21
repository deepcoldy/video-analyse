$(function () {
    var reset = {
        formData: {
            email: '',
            newpw: '',
            confirmpw: ''
        },
        switchPage: function (page) {
            if (page == 'first') {
                $('.firststep').show();
                $('.thridstep').hide();
                $('.secondstep').hide();
                $('.step-con').removeClass('isactive')
                $('.step-con').eq(0).addClass('isactive')
            } else if (page == 'second') {
                $('.secondstep').show();
                $('.firststep').hide();
                $('#confirmclick').hide();
                $('.thridstep').hide();
                $('.step-con').removeClass('isactive')
                $('.step-con').eq(1).addClass('isactive')
            } else if (page == 'thrid') {
                $('.thridstep').show();
                $('.firststep').hide();
                $('.secondstep').hide()
                $('.step-con').removeClass('isactive')
                $('.step-con').eq(2).addClass('isactive')
                $('#confirmclick').addClass('active-btn').attr('disabled', false);
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
                            reset.notice('密码重置成功，3秒后自动跳回登录页');
                            setTimeout(function () {
                                location.href = '/login/index'
                            }, 3000);
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

            $('#confirmclick').on('click', function () {
                reset.doConfirm();
            })
        },
        init: function () {
            // page = 'thrid'
            // email = 'yangqinchuan_kis@163.com'
            // user_id = '10066'
            this.switchPage(page)
            this.bindEvents()
        }
    }
    reset.init();
});
