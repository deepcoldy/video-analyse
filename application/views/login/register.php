<style>
* { box-sizing: border-box; -webkit-tap-highlight-color: rgba(0,0,0,0);}
html, body, div, ul, ol, li, dl, dd, dt, p, span, strong, table, tr, td, th, form, input, textarea, select, h1, h2, h3, h4, h5 { padding: 0; margin: 0; box-sizing: border-box; }
html {width: 100%; height: 100%;}
html,body {width: 100%; height: 100%; line-height: 1; margin: 0 auto!important;}
img{width: 100%}
a { color: #55cbff; text-decoration: none }
ul { list-style: none; }
input{
    background:none;
    outline:none;
    border:0px;
    font-size: 0.1rem;
    border-radius: 2px;
    min-height: 40px;
}
input,img{vertical-align:middle;}
.outer{
    min-width: 1035px;
    margin: 0 auto;
}
.title{
    font-size: 0.2rem;
    text-align: center;
    font-weight: 900;
}
.line{
    text-align: left;
}
.line .name{
    font-size: 0.12rem;
    display: inline-block;
    font-weight: 700;
    width: 3.38rem;
    text-align: right;
    margin-right: 15px;
    vertical-align:middle;
}
.line .input{
    width: 3rem;
    height: 0.3rem;
    border: 1px solid #b3b3b3;
    padding-left: 0.1rem;
}
.line .qrcode{
    width: 1rem;
    height: 0.3rem;
    border: 1px solid #b3b3b3;
    padding-left: 0.1rem;
    margin-right: 0.1rem;
    display: inline-block;
}
.line .registerVerify{
    display: inline-block;
    width: 1rem;
    border: 1px solid #1295ef;
    border-radius: 3px;
    margin-right: 0.1rem;
}
#verfiy-img{
    width: 0.8rem;
    display: inline-block;
    font-size: 0.1rem;
    text-align: center;
    vertical-align: middle;
    color: #8C8C8C;
}
#changecode{
    color: #1295ef;
    cursor: pointer;
}
.submit{
    width: 3rem;
    margin: 0 auto;
    background: #1295ef;
    text-align: center;
    color: white;
    height: 0.3rem;
    line-height: 0.3rem;
    font-size: 0.1rem;
    cursor: pointer;
}
.have_account{
    font-size: 0.1rem;
    text-align: center;
    color: #8C8C8C;
}
.have_account .at_once{
    color: #1295ef;
    cursor: pointer;
}
.copyright{
    width: 40%;
    display: block;
    margin: 20px auto;
    margin-top: 40px;
}

.ui-error-text {
    width: 3rem;
    margin: 0 auto;
    font-size: 0.1rem;
    color: red;
    margin-top: 20px;
}
.ui-registerResult-con {
    text-align: center;
    width: 100%;
    margin-top: 7%;
    line-height: 24px;
    font-family:"PingFang SC",Georgia,Serif;
    color: #333333;
    font-size: 0.2rem;
}
.ui-registerResult-con .state {
    font-size: 0.3rem;
    margin-bottom: 70px;
    font-weight: 900;
    color: #333333;
}
.ui-registerResult-con .text {
    font-size: 0.15rem;
    width: 40%;
    margin: 0 auto;
    text-align: left;
}
.ui-registerResult-con .email {
    font-size: 0.25rem;
    color: #1295ef;
    margin:0.3rem auto;
}
.ui-registerResult-con h5 {
    margin-top: 80px;
    font-size: 0.25rem;
    font-weight: medium;
    color: #477899;
}
.ui-registerResult-con .problem {
    text-align: left;
    margin-top: 40px;
    display: inline-block;
    font-size: 0.15rem;
    line-height: 0.3rem;
    color: #808080;
}
.ui-registerResult-con .problem span {color: #1295ef;cursor: pointer;padding-left: 2px;}

.success_logo{
    width: 0.6rem;
    margin-bottom: 0.2rem;
}

.login_now{
    width: 1.5rem;
    margin: 0 auto;
    background: #1295ef;
    text-align: center;
    color: white;
    height: 0.3rem;
    line-height: 0.3rem;
    font-size: 0.1rem;
    cursor: pointer;
}
</style>
<div class="outer">
    <!--注册页面-->
    <div class="ui-default-con" style="display:none;">
        <div style="height:0.8rem;"></div>
        <div class="title">注册</div>
        <div style="height:0.3rem;"></div>
        <div class="line">
            <div class="name">邮箱</div>
            <input name="email" class="input" type="text" placeholder="输入邮箱作为注册账号的账户名称">
        </div>
        <div style="height:0.1rem;"></div>
        <div class="line">
            <div class="name">电话号码</div>
            <input name="phone" maxlength="11" class="input" type="text" placeholder="请输入手机号码">
        </div>
        <div style="height:0.1rem;"></div>
        <div class="line">
            <div class="name">公司名称</div>
            <input name="company" class="input" type="text" maxlength="20" placeholder="英文或数字（3～20个字符，不区分大小写）">
        </div>
        <div style="height:0.1rem;"></div>
        <div class="line">
            <div class="name">密码</div>
            <input name="password" type="password" class="input" maxlength="20" placeholder="英文、数字或符号（6～20位，区分大小写）">
        </div>
        <div style="height:0.1rem;"></div>
        <div class="line">
            <div class="name">验证码</div>
            <input name="verifyCode" id="registerVerifyCode" class="qrcode" placeholder="输入验证码">
            <img id="verfiy-img" class="registerVerify">
            <div id="verfiy-img">看不清? <span id="changecode">换一张</span></div>
        </div>
        <div class="ui-error-text"></div>
        <div style="height:0.2rem;"></div>
        <div id="register" class="submit">确定</div>
        <div style="height:0.1rem;"></div>
        <div class="have_account">已经有账号了？<span id="login" class="at_once">立即登录</span></div>
        <div style="height:0.5rem;"></div>
        <img class="copyright"
        src="https://martin-upload.b0.upaiyun.com/web/2017/06/4cfe13e676570c5e4e9e82c1ed548997.jpg" alt="">
    </div>
    <!--激活页面-->
    <div class="ui-registerResult-con">
        <div class="state">激活</div>
        <div class="text">确认邮件已发送至：</div>
        <div class="text email"></div>
        <div class="text">请登录您的邮箱激活账号，完成注册</div>
        <div style="border-top:1px dashed #999999;width:50%;margin:0 auto;margin-top:80px;"></div>
        <h5>没有收到邮件？</h5>
        <div class="problem">
            <div>① 请检查邮箱地址是否正确<span id="rewrite">重新填写</span></div>
            <div>② 检查您的邮箱里的“垃圾邮件”分类</div>
            <div>③ 若仍未收到确认邮件，请尝试<span id="resend">重新发送</span></div>
        </div>
        <img class="copyright" style="margin-top:80px;"
        src="https://martin-upload.b0.upaiyun.com/web/2017/06/4cfe13e676570c5e4e9e82c1ed548997.jpg" alt="">
    </div>
    <!--注册成功-->
    <div class="registerSuccess">
        <img class="success_logo" src="https://martin-upload.b0.upaiyun.com/web/2017/06/926d9e7994fcb738e39bf20758cd5999.png" alt="">
        <div class="action">激活中</div>
        <div class="content">
            <div><span id="endtime">5</span>秒后跳转到登录页</div>
            <div style="height:0.5rem;"></div>
            <a href="/login/index">
                <div class="login_now">立即登录</div>
            </a>
        </div>
    </div>
</div>
<!--<div class="register-background">
<div class="ui-register-con ui-default-con" >
    <div class="ui-login-form" style="margin-top:50px !important;">
        <div class="ui-web-logo"> </div>
        <div class="ui-register-input">
            <div class="label">邮箱<span class="explain">邮箱作为注册账号的账户名称</span></div>
            <input name="email" type="text"/>
            <div class="label">电话号码</div>
            <input name="phone" type="number"/>
            <div class="label">公司名称<span class="explain">英文数字或汉字[3-20字符，不分大小写]</span></div>
            <input name="company" type="text"/>
            <div class="label">密码<span class="explain">英文、数字下划线[6-20位区分大小写]</span></div>
            <input name="password" type="password"/>
            <div class="label">验证码</div>
            <input type="text" name="verifyCode" id="registerVerifyCode" placeholder="验证码"/>
            <img id="verfiy-img" class="registerVerify"><div id="registernoclear">看不清？<span id="changecode">换一张</span></div>
        </div>
        <div class="ui-error-text"></div>
        <div id="register" class="ui-web-btn">同意协议并注册</div>
    </div>
    <div style="text-align:center;color: #808080;">已经有账号了？<span id="login" class="at_once">立即登录</span></div>
    <div class="ui-procol-des">
        <p class="ui-order-h-des">
            <span>用户协议</span>
            <span>内容版权</span>
        </p>
        <p class="ui-order-l-des">Copyright @ 2017 Ltd.All rights reserved</p>
    </div>
</div>-->

<!-- 激活的页面 -->
<!--<div class="ui-register-con ui-registerResult-con" style="display: none">
    <h4>激活</h4>
    <div>确认邮件已发送</div>
    <div class="email"></div>
    <div>请登录您的邮箱激活账号，完成注册</div>
    <h5>没有收到邮件？</h5>
    <div class="problem">
        <div>1.请检查邮箱地址是否正确<span id="rewrite">重新填写</span></div>
        <div>2.检查您的邮箱里的“垃圾邮件”分类</div>
        <div>3.若仍未收到确认邮件，请尝试<span id="resend">重新发送</span></div>
    </div>
</div>-->

<!-- 注册成功的提示 -->
<!--<div class="ui-register-con registerSuccess">
    <div id="activationsuccess"></div>
    <div class="action">激活中</div>
    <div class="content" style="display:none;">
        <div><span id="endtime">5</span>秒后跳转到登录页</div>
        <button data-event="login">立即登录</button>
    </div>
</div>-->
<div style="position: absolute; left: 0px; top: 0px; z-index: 99999;display: none;" id="loading">﻿
    <div class="sk-mask" data-level="">
        <div class="sk-mask-bg" style="opacity: 0;background-color: #fff; "></div>
        <div class="sk-mask-text" style="background-image: url(http://dressplus.appdevs.cn/node_modules/seekjs/ui/mask/loading.gif);background-repeat: no-repeat;background-position: center center;"></div>
    </div>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript">
    var page = '<?php echo $page; ?>';
    var error = '<?php echo $error; ?>';
</script>
<script src="/js/register.js"></script>
</div>


<script type="text/javascript">
    !function(a,b){function c(){var b=f.getBoundingClientRect().width;if(b<1035){b=1035;}var c=b/10;f.style.fontSize=c+"px",k.rem=a.rem=c}var d,e=a.document,f=e.documentElement,g=e.querySelector('meta[name="viewport"]'),h=e.querySelector('meta[name="flexible"]'),i=0,j=0,k=b.flexible||(b.flexible={});if(g){console.warn("将根据已有的meta标签来设置缩放比例");var l=g.getAttribute("content").match(/initial\-scale=([\d\.]+)/);l&&(j=parseFloat(l[1]),i=parseInt(1/j))}else if(h){var m=h.getAttribute("content");if(m){var n=m.match(/initial\-dpr=([\d\.]+)/),o=m.match(/maximum\-dpr=([\d\.]+)/);n&&(i=parseFloat(n[1]),j=parseFloat((1/i).toFixed(2))),o&&(i=parseFloat(o[1]),j=parseFloat((1/i).toFixed(2)))}}if(!i&&!j){var p=a.navigator.userAgent,q=(!!p.match(/android/gi),!!p.match(/iphone/gi)),r=q&&!!p.match(/OS 9_3/),s=a.devicePixelRatio;i=q&&!r?s>=3&&(!i||i>=3)?3:s>=2&&(!i||i>=2)?2:1:1,j=1/i}if(f.setAttribute("data-dpr",i),!g)if(g=e.createElement("meta"),g.setAttribute("name","viewport"),g.setAttribute("content","initial-scale="+j+", maximum-scale="+j+", minimum-scale="+j+", user-scalable=no"),f.firstElementChild)f.firstElementChild.appendChild(g);else{var t=e.createElement("div");t.appendChild(g),e.write(t.innerHTML)}a.addEventListener("resize",function(){clearTimeout(d),d=setTimeout(c,300)},!1),a.addEventListener("pageshow",function(a){a.persisted&&(clearTimeout(d),d=setTimeout(c,300))},!1),"complete"===e.readyState?e.body.style.fontSize=12*i+"px":e.addEventListener("DOMContentLoaded",function(){e.body.style.fontSize=12*i+"px"},!1),c(),k.dpr=a.dpr=i,k.refreshRem=c,k.rem2px=function(a){var b=parseFloat(a)*this.rem;return"string"==typeof a&&a.match(/rem$/)&&(b+="px"),b},k.px2rem=function(a){var b=parseFloat(a)/this.rem;return"string"==typeof a&&a.match(/px$/)&&(b+="rem"),b}}(window,window.lib||(window.lib={}));
</script>
<style>
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


.registerSuccess {
    text-align: center;
    color: #4d4d4d;
    font-size: 22px;
    margin-top: 1rem;
}
.registerSuccess .action {
    font-size: 44px;
    margin-bottom: 26px;
}
</style>