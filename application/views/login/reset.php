<style>
.register-background{
    width: 100%;
    height: 100%;
    background: url(../images/login_bg.png) no-repeat center;
    background-size: 61.11111rem;
}
.ui-register-con {
    width: 350px;
    margin: 0 auto;
    position: relative;
}
.ui-register-con .ui-web-logo {
    width: 85%;
    min-height: 9rem;
    margin: 10px auto;
}
.ui-register-con .ui-login-form {
    width: auto;
}
.ui-register-con .ui-error-text {
    color: red;
    position: absolute;
}
.ui-register-con .ui-web-btn {
    background-color: #007cff;
    height: 36px;
    line-height: 36px;
}
.ui-register-input{
    position: relative;
}
.ui-register-input input {
    text-indent: 1em;
    border: 1px solid #666;
    margin: 12px 0;
    height: 40px;
    width: 100%;
    -webkit-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -moz-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -o-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -mso-border-radius: 0.35714rem 0.35714rem 0.35714rem;
} 
.ui-register-con .ui-web-btn {
    width: 80%;
    margin: 16px auto;
}
.ui-register-con .label {
    font-size: 24px;
    color: #333;
}
.ui-register-con .explain {
    font-size: 14px;
    color: #808080;
    margin-left: 4px;
}
#registerVerifyCode {
    width: 126px;
    position: absolute;
    left: 0;
}
#registernoclear {
    position: absolute;
    right: 0;
    top: 403px;
    color: #808080;
}
#registernoclear span {
     color: #1874CD;
     cursor: pointer;
}
.at_once {
    color: #1874CD;
    padding-left: 4px;
    cursor: pointer;
}
.ui-register-con .ui-procol-des {
    text-align: center;
    line-height: 20px;
    margin-top: 20px;
}


.ui-registerResult-con {
    text-align: center;
    width: 100%;
    margin-top: 7%;
    line-height: 24px;
    font-family:"PingFang SC",Georgia,Serif;
    color: #4d4d4d;
    font-size: 30px;
}
.ui-registerResult-con h4 {
    font-size: 44px;
    margin-bottom: 80px;
    font-weight: medium;
}
.ui-registerResult-con .email {
    font-size: 42px;
    color: #0080fc;
    margin:35px;
}
.ui-registerResult-con h5 {
    margin-top: 143px;
    font-size: 30px;
    font-weight: medium;
    color: #4d4d4d;
}
.ui-registerResult-con .problem {
    text-align: left;
    margin-top: 40px;
    display: inline-block;
    font-size: 22px;
    line-height: 44px;
}
.ui-registerResult-con .problem span {color: #1874CD;cursor: pointer;padding-left: 2px;}


.registerSuccess {
    margin-top: 17%;
    text-align: center;
    color: #4d4d4d;
    font-size: 22px;
}
.registerSuccess .action {
    font-size: 44px;
    margin-bottom: 26px;
}
.registerSuccess .success_icon {
    background: url(../images/success_icon.png) no-repeat top center;
    background-size: 50px;
    height: 74px;
}
.registerSuccess button {
    line-height:50px;
    height: 50px;
    font-size: 22px;
    -webkit-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -moz-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -o-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -mso-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    background-color: #007cff;
    color: #fff;
    cursor: pointer;
    width: 200px;
    margin-top: 58px;
}
.registerVerify{
    display: inline;
    max-height: 3rem;
    width: 26%;
    margin: 15px 0px 15px 156px;
}

.ui-procol-des{
    color: #b2b3b3;
    font-size: 1rem;
    width: 100%;
    text-align: center;
}
</style>
<div class="register-background">
{if !this.registerSuccess}
<div class="ui-register-con ui-default-con" {if this.registerResult}style="display: none"{/if}>    
    <!--<div class="ui-login-form">-->
    <div class="ui-login-form" style="margin-top:50px !important;">
        <div class="ui-web-logo"> </div>
        <div class="ui-register-input">
            <div class="label">邮箱<span class="explain">邮箱作为注册账号的账户名称</span></div>
            <input data-event="blur>hideError" data-bind="args.email" type="text"/>
            <div class="label">电话号码</div>
            <input data-event="blur>hideError" data-bind="args.tel" type="number"/>
            <div class="label">公司名称<span class="explain">英文数字或汉字[3-20字符，不分大小写]</span></div>
            <input data-event="blur>hideError" data-bind="args.companyName" type="text"/>
            <div class="label">密码<span class="explain">英文、数字下划线[6-20位区分大小写]</span></div>
            <input data-event="blur>hideError" data-bind="args.password" type="password"/>
            <div class="label">验证码</div>
            <input type="text" data-event="blur>hideError" data-bind="registerVerifyCode" id="registerVerifyCode" placeholder="验证码"/>
            <img class="registerVerify"><div id="registernoclear">看不清？<span data-event="changecode">换一张</span></div>
        </div>
        <div class="ui-error-text"></div>
        <div data-event="register" class="ui-web-btn">同意协议并注册</div>
    </div>
    <div style="text-align:center;color: #808080;">已经有账号了？<span data-event="login" class="at_once">立即登录</span></div>
    <div class="ui-procol-des">
        <p class="ui-order-h-des">
            <span>用户协议</span>
            <span>内容版权</span>
        </p>
        <p class="ui-order-l-des">Copyright @ 2017 Ltd.All rights reserved</p>
    </div>
</div>

<!-- 激活的页面 -->
<div class="ui-register-con ui-registerResult-con" {if !this.registerResult}style="display: none"{/if}>    
    <h4>激活</h4>
    <div>确认邮件已发送</div>
    <div class="email"></div>
    <div>请登录您的邮箱激活账号，完成注册</div>
    <h5>没有收到邮件？</h5>
    <div class="problem">
        <div>1.请检查邮箱地址是否正确<span data-event="rewrite">重新填写</span></div>
        <div>2.检查您的邮箱里的“垃圾邮件”分类</div>
        <div>3.若仍未收到确认邮件，请尝试<span data-event="resend">重新发送</span></div>
    </div>
</div>
{/if}

<!-- 注册成功的提示 -->
<div class="ui-register-con registerSuccess" {if !this.registerSuccess}style="display: none"{/if}>
    <div id="activationsuccess"></div>
    <div class="action">激活中</div>
    <div class="content" style="display:none;">
        <div><span id="endtime">5</span>秒后跳转到登录页</div>
        <button data-event="login">立即登录</button>
    </div>    
</div>
</div>