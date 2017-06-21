<style>
.ui-reset-con {
    width: 100%;
    height: 100%;
    background: url(/images/login_bg.png) no-repeat center;
    background-size: 61.11111rem;
}
.ui-resetpassword-con {
    width: 470px;
    margin: 10% auto;
    font-family:"PingFang SC",Georgia,Serif;
    color: #878787;
}
.ui-resetpassword-con .h3 {
    font-size: 42px;
    text-align: center;
    margin-bottom: 37px;
    color: #4d4d4d;
    font-weight: medium;
}
.ui-resetpassword-con .step-con {
    display: inline-block;
    font-size: 20px;
    margin-bottom: 12px;
}
.ui-resetpassword-con .step-con .number{
    display: inline-block;
    width: 20px;
    height: 20px;
    text-align: center;
    line-height: 18px;
    border-radius: 50%;
    border: 1px solid #878787;
    color: #878787;
    font-family: Serif;
}
.ui-resetpassword-con .isactive {color: #1874CD;}
.ui-resetpassword-con .isactive .number{border-color:#1874CD;color: #1874CD;}
.ui-resetpassword-con input {
    width: 100%;
    border:1px solid #878787;
    border-radius: 4px;
    height: 40px;
    text-indent: 1em;
    margin: 10px 0;
    color: #878787;
}
.ui-resetpassword-con button{
    color: white;
    height: 40px;
    border-radius: 4px;
    background-color: #c1c1c1;
    cursor: pointer;
    width: 100%;
    border: 0px solid #fff;
}
.ui-resetpassword-con .secondstep {
    display: none;
    line-height: 30px;
    text-align: center;
    margin-top: 30px;
    font-size: 18px;
}
.ui-resetpassword-con .resetaccount{
    font-size: 32px;
    color: #0080fc;
    margin: 10px 0 16px;
}
.passworderror {
    color: red;
    height: 20px;
    visibility: hidden;
}
.ui-resetpassword-con button.active-btn {
    background-color: rgb(0, 153, 255);
}
.sk-mask {
    display: -webkit-box;
    -webkit-box-pack: center;
    -webkit-box-align: center;
    z-index: 999999999;
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0px;
    top: 0px;
}
.sk-mask>div {
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
}
</style>
<div class="ui-reset-con">
    <div class="ui-resetpassword-con">
    <div class="h3">重置密码</div>
    <div class="step-con isactive">
            <div class="number">1</div>
            <span>填写账号></span>
    </div>
    <div class="step-con">
            <div class="number">2</div>
            <span>获取密码重置链接></span>
    </div>
    <div class="step-con">
            <div class="number">3</div>
            <span>设置新密码</span>
    </div>
    <input name="email" type="text" placeholder="用户名/邮箱"  class="firststep">
    <div class="thridstep">
        <input name="newpw" type="password" placeholder="新密码" />
        <input name="confirmpw" type="password" placeholder="确认密码"/>
    </div>
    <div class="passworderror"></div>
    <button id="confirmclick" disabled="disabled">确定</button>
    <div class="secondstep">
            <p>密码重置链接已发送</p>
            <p class="resetaccount"></p>
            <p>请进入邮箱点击链接</p>
    </div>
    </div>
</div>
<div style="position: absolute; left: 0px; top: 0px; z-index: 99999;display: none;" id="loading">﻿
    <div class="sk-mask" data-level="">
        <div class="sk-mask-bg" style="opacity: 0;background-color: #fff; "></div>
        <div class="sk-mask-text" style="background-image: url(http://dressplus.appdevs.cn/node_modules/seekjs/ui/mask/loading.gif);background-repeat: no-repeat;background-position: center center;"></div>
    </div>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript">
    var page = '<?php echo $page; ?>';
    var email = '<?php echo $email; ?>';
    var user_id = '<?php echo $user_id; ?>';
</script>
<script src="/js/reset.js"></script>
