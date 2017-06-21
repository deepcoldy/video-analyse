<style>
* { box-sizing: border-box; -webkit-tap-highlight-color: rgba(0,0,0,0);}
html, body, div, ul, ol, li, dl, dd, dt, p, span, strong, table, tr, td, th, form, input, textarea, select, h1, h2, h3, h4, h5 { padding: 0; margin: 0; box-sizing: border-box; }
html {width: 100%; height: 100%;}
html,body {width: 100%; height: 100%; line-height: 1; margin: 0 auto!important;}
img{width: 100%}
ul { list-style: none; }
table { border-collapse: separate; border-spacing: 0px; border-collapse: collapse; }
a { color: #55cbff; text-decoration: none }
figure{-webkit-margin-before: 0;  -webkit-margin-after:0;  -webkit-margin-start:0;  -webkit-margin-end: 0;}
/*img{width: 100%}*/
input[type="text"],input[type="number"],input[type="email"],input[type="tel"],input[type="password"],select{ box-sizing: border-box;  background-color: #fff;}
input, textarea, select ,fieldset ,button { outline: none; resize: none; border: 0;}
input, button, select, textarea { -webkit-appearance: none;-moz-appearance: none; appearance: none; border-radius: 0; background-color: #fff; }
html,body{color:#333;font-size:1rem;font-family: Arial, Helvetica, Tahoma, STXihei, "华文细黑", "Microsoft YaHei", "微软雅黑", SimSun, "宋体", Heiti, "黑体", sans-serif;}
input[type=number] {  -moz-appearance:textfield;  }
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {  -webkit-appearance: none;  margin: 0;  }
:-moz-placeholder { color: #C1C1C1; font-size: 1rem; }
::-moz-placeholder { color: #C1C1C1; font-size: 1rem;  }
input:-ms-input-placeholder,
textarea:-ms-input-placeholder { color: #C1C1C1; font-size: 1rem; }
input::-webkit-input-placeholder,
textarea::-webkit-input-placeholder { color: #C1C1C1; font-size: 1rem; }
input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
    -webkit-box-shadow: 0 0 0px 1000px white inset !important;
    background-color: rgb(0, 0, 0) !important;
    background-image: none !important;
    color: rgb(0, 0, 0) !important;
    -webkit-tap-highlight-color:rgba(0,0,0,0) !important;
}
embed{
    display: none;
}
@media only screen and (max-width: 1200px){
    .ui-list-fromTable label{
        white-space: normal!important;
    }
    .ui-list-fromMax .ui-list-inputOne{
        width: 27%!important;
    }
    .ui-list-fromCenter .ui-list-fromMax select{
        width: 58%;
    }
    .ui-list-fromMax .ui-list-orderNum{
        width: 58%;
    }
}

/*clear float*/
.ui-com-clearFix::after {
    content: "";
    display: block;
    width: 100%;
    clear: both;
}
.ui-com-clearFix {
    zoom: 1;
}

/*float*/
.ui-floatL{float:left;}
.ui-floatR{float:right;}
/*text align*/
.ui-text-left{text-align: left!important;}
.ui-text-right{text-align: right!important;}
.ui-text-center{text-align: center!important;}

.ui-com-relative{
    position: relative;
}
/*omit*/
.ui-com-omit{white-space:nowrap; text-align: left!important; overflow:hidden; text-overflow:ellipsis;}


.ui-list-cont{
    display: inline-block;
    width: calc(100% - 4.57143rem);
    /*
    width: 100%;
    */

    background-color: #fff;
    min-height: 100%;
}
.ui-billDetail-body {

    /*width: 100%;width: calc(100% - 64px);
    overflow: auto;
    */
    min-height: 100%;

    background-color: #3bc1c4;
}
.ui-con-fw{
    float: left;
    width: 100%;
}
.ui-web-logo{
    width: 100%;
    height: 8.57143rem;
    background: url("../images/dress_logo.png") no-repeat center;
    margin-bottom: 1.11111rem;
    background-size: 40%;
}
.ui-web-btn,.ui-web-btn-mid,.ui-web-del-btn,.ui-web-pad-btn{
    line-height:2.44444rem;
    -webkit-border-radius:0.35714rem 0.35714rem 0.35714rem;
    -moz-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -o-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -mso-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    background-color: #0099ff;
    text-align: center;
    color: #fff;
    cursor: pointer;
}
.ui-web-btn{
    width: 100%;
}
.ui-web-pad-btn{
    width: 8.57143rem;
    margin:2.14286rem auto
}
.ui-web-del-btn{
    width: 6.55556rem;
    line-height: 2.44444rem;
    height: 2.44444rem;
    text-align: center;
    font-size: 1.28571rem;
    margin-top: 1rem;
}
.ui-web-btn-mid{
    width: 7.22222rem;
    display: inline-block;
    margin-right: 2.14286rem;
}

.ui-web-input{
    border:1px solid #666;
    border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -webkit-border-radius:0.35714rem 0.35714rem 0.35714rem;
    -moz-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -o-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    -mso-border-radius: 0.35714rem 0.35714rem 0.35714rem;
    line-height: 3.22222rem;
    height: 2.44444rem;
    width: 15.55556rem;
    padding: 0.38889rem;
    margin-bottom: 1.07143rem;
    padding-left: 0;
    font-size: 0;
}
.ui-web-input .ui-user-icon{
    background: url("../images/user_icon.png") no-repeat center;
    border-right: 1px solid #666;
    display: inline-block;
    width: 1.42857rem;
    height: 1.78571rem;
    padding-right: 3.57143rem;
    background-size: contain;
    float: left;
}

.ui-web-input .ui-lock-icon{
    background: url("../images/lock_icon.png") no-repeat center;
    border-right: 1px solid #666;
    display: inline-block;
    width: 1.42857rem;
    height: 1.92857rem;
    padding-right: 3.57143rem;
    background-size: contain;
    float: left;
}

.ui-web-input .ui-search-icon{
    background: url("../images/search_icon.png") no-repeat center 0.12857rem;
    display: inline-block;
    width: 1.28571rem;
    height: 100%;
    background-size: 100%;
    float: left;
}
.ui-relative-right{
    float: right;
}

.ui-web-input input{
    line-height: 1.78571rem;
    text-indent: .5em;
    height: 1.78571rem;
    width: 12rem;
    /* margin-top: -2.3rem; */
    display: block;
    float: left;
}
.ui-error-con{
    color: #ffcc00;
    display: none;
    margin-bottom: 0.71429rem;
    font-size: 1.22222rem;
    line-height: 2.22222rem;
}
.ui-error-con span{
    display: inline-block;
    height: 1.42857rem;
}
.ui-error-con .ui-error-icon{
    background: url("../images/error_icon.png") no-repeat center;
    width: 1.42857rem;
    height: 1.42857rem;
    vertical-align: middle;
    background-size:100%;
}
.ui-orange-txt{
    color: #ffcc00;
}
.ui-blue-txt{
    color: #0080fc;
}
.ui-txt-big{
    font-size: 2.57143rem;
}
.ui-content-con{
    width: 80%;
    float: left;
    margin-left: 18.57143rem;
    padding-top: 10.71429rem;
}
.ui-content-header,.ui-detail-header{
    border-bottom: 1px solid #0066cc;
    font-size: 1.42857rem;
    padding-bottom: 2.14286rem;
}
.ui-content-header-txt{
    line-height: 2.85714rem;
}
.ui-detail-header span{
    display: inline-block;
}
.ui-detail-all-export{
    font-size: 2.57143rem;
    color: #0080fc;
    float: right;
    cursor: pointer;
}

.ui-video-on-icon,.ui-video-off-icon,.ui-count-off-icon,.ui-count-on-icon{
    vertical-align: middle;
    background-size: 100%!important;
}
.ui-video-on-icon{
    background: url("../images/voide_on_icon.png") no-repeat center;
    width: 2.92857rem;
    height: 2.92857rem;
}
.ui-video-off-icon{
    background: url("../images/voide_off_icon.png") no-repeat center;
    width: 2.92857rem;
    height: 2.92857rem;
}
.ui-count-off-icon{
    background: url("../images/count_off_icon.png") no-repeat center;
    height: 2.78571rem;
    width: 3.07143rem;
}
.ui-count-on-icon{
    background: url("../images/count_on_icon.png") no-repeat center;
    height: 2.78571rem;
    width: 3.07143rem;
}
.ui-web-back-icon{
    background: url("../images/back_icon.png") no-repeat top;
    width: 1rem;
    height: 1.71429rem;
    vertical-align: middle;
    background-size: .8rem;
}
.ui-detail-con{
    width: 85%;
    float: left;
    margin-left: 13.33333rem;
    padding-top: 10.71429rem;
}
.ui-web-label-icon{
    background: url("../images/label_icon.png") no-repeat center;
    width: 4.35714rem;
    height: 38px;
    vertical-align: middle;
    background-size: 100%;
}
.ui-web-people-icon{
    background: url("../images/people_icon.png") no-repeat center;
    width: 5.21429rem;
    height: 4.14286rem;
    vertical-align: middle;
    background-size: 100%;
}
.ui-web-place-icon{
    background: url("../images/place_icon.png") no-repeat center;
    width: 5.35714rem;
    height: 4.14286rem;
    vertical-align: middle;
    background-size: 100%;
}
.ui-web-tings-icon {
    background: url("../images/things_icon.png") no-repeat center;
    height: 4.21429rem;
    width: 4.07143rem;
    vertical-align: middle;
    background-size: 100%;
}
.ui-web-count{
    color: #999;
}
.ui-range-con{
    display: inline-block;
    position: relative;
    margin-left: 1.42857rem;
    margin-right: 1.42857rem;
    width: 14.28571rem;
}
input[type="range"] {
    background-color: #e6e6e6;
    border-radius: .2rem;
    display: table-cell;
    width: 14.28571rem;
    height: .3rem;
    -webkit-appearance: none;
    position: absolute;
    z-index: 1;
    cursor: pointer;
}
.ui-statics-form{
    padding: 1.42857rem 0;
    border-bottom: 0.21429rem solid #f1f5f8;
    margin-top: 1.42857rem;
}
.ui-statics-form-con>div{
    margin-left:2.14286rem;
    padding: 0.35714rem 0.71429rem;
    position: relative;
}
.ui-statics-form-con span.ui-time-tip,.ui-range-con,.ui-clearBtn{
    font-size: 1.14286rem;
}

.ui-statics-form input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none;
    cursor: default;
    height: 1.2rem;
    width: 1.2rem;
    background: none repeat scroll 0 0 #fff;
    border-radius: 50%;
    z-index: 1;
    -webkit-box-shadow: 0 0 0.14286rem #3e3e3e;
}
.ui-statics-controlRange{
    z-index: 2;
    position: absolute;
    background-color: #0080fc;
    border-radius: .5rem;
    display: table-cell;
    height: .3rem;
    -webkit-appearance: none;
    top: 0;
}
.ui-statics-form-con div{
    display: inline-block;
}
.ui-range-tip span{
    position:absolute;
    top:1.42857rem;
}
.ui-range-tip span:first-child{
    left:0;
}
.ui-range-tip span:last-child{
    right:0;
}
.ui-range-tip span:nth-child(2){
    z-index: 1;
    background: #fff;
}
.ui-statics-list-con{
    padding: 1.42857rem 0;
}
.ui-statics-list-header{
    font-size: 1.42857rem;
    font-weight: 600;
    border-bottom: 1px solid #808080;
    height: 3.57143rem;
    line-height: 3.57143rem;
    width: 100%;
}
.ui-statics-list-header-txt{
    width: 24%;
    text-align: center;
    float: left;
}
.ui-statics-list li:first-child{
    font-size: 1.14286rem;
    font-weight: 600;
    background-color: #ecf1f5;
    color: #333;
}
.ui-statics-list li{
    border-bottom: 1px solid #ccc;
    min-height: 3.57143rem;
    line-height: 3.57143rem;
    font-size: 0;
    color: #666;
}
.ui-statics-list li span{
    display: inline-block;
}
.ui-statics-list li:first-child>span{
    font-size: 1.1rem;
}

.ui-statics-list li>span {
    width: 24%;
    font-size: 1rem;
    text-align: center;
}
.ui-list-item-detail{
    color:#999;
    overflow-y: auto;
    padding:0 1.07143rem;
    display: none;
    margin-bottom: 1.5rem;
}
.ui-list-item-detail>div {
    float: left;
    width: 25%;
}
.ui-list-item-detail>div:not(:last-child){
    padding-right: 0.71429rem;
    padding-bottom: 0.71429rem;
}
.ui-list-item-detail>div>img{
    display: inline-block;
    width: 100%;
    height: 12.85714rem;
}
.ui-detail-export-icon{
    background: url("../images/export_icon.png") no-repeat center;
    width: 1.28571rem;
    height: 0.71429rem;
    vertical-align: middle;
    margin-left: 0.35714rem;
    cursor: pointer;
    background-size: 100%;

}
.ui-detail-unexport-icon{
    background: url("../images/unexport_icon.png") no-repeat center;
    width: 1.28571rem;
    height: 0.64286rem;
    vertical-align: middle;
    margin-left: 0.35714rem;
    cursor: pointer;
    background-size: 100%;
}
.ui-list-item-detail>div p{
    line-height: 1.67143rem;
    font-size: 1rem;
}

.ui-web-back-con{
    width: 130px;
    cursor: pointer;
}

.ui-clearBtn{
    display: none;
    cursor: pointer;
    float: right;
    margin-right: .5rem;
    height: 1.8rem;
    line-height: 1.8rem;
}
.ui-statics-form{
    height: 7.11111rem;
    padding: 1.11111rem 0;
}
.ui-statics-form-con .ui-web-input{
    position: relative;
    top: 1.11111rem;
}
.ui-statics-form-con .ui-time-tip{
    display: inline-block;
    position: relative;
    top: 10px;
}




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
<?php if(!$registerSuccess) { ?>
<div class="ui-register-con ui-default-con" style="display: none">    
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
<?php } else if($registerSuccess) { ?>

<!-- 激活的页面 -->
<div class="ui-register-con ui-registerResult-con" style="display: none">    
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
<?php } ?>

<!-- 注册成功的提示 -->
<div class="ui-register-con registerSuccess" style="display: none">
    <div id="activationsuccess"></div>
    <div class="action">激活中</div>
    <div class="content" style="display:none;">
        <div><span id="endtime">5</span>秒后跳转到登录页</div>
        <button data-event="login">立即登录</button>
    </div>    
</div>
</div>