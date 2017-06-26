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
    min-height: 30px;
}
input,img{vertical-align:middle;}
.ui-error-con{
    width: 2.35rem;
    margin: 0 auto;
}
.ui-error-text {
    width: 2.35rem;
    margin: 0 auto;
    font-size: 0.1rem;
    color: red;
    margin-top: 20px;
}
.outer{
    min-width: 1035px;
    margin: 0 auto;
}
.banner{
    min-width: 800px;
    width:100%;
}
.box{
    position: relative;
    background-color: #ffffff;
    width: 40%;
    margin:0 auto;
    margin-top:-0.5rem;
    border: 1px solid #cccccc;
}
.box .logo{
    width: 0.6rem;
    display: block;
    margin: 10px auto;
}
.box .title{
    font-size: 0.15rem;
    text-align: center;
    color: #666666;
}
.box .line{
    text-align: center;
}
.box .logo_email, .box .logo_password{
    height: 0.3rem;
    width: 0.35rem;
}
.box .email, .box .password{
    height: 0.3rem;
    width: 2rem;
    margin-left: -4px;
    padding-left: 6px;
    display: inline-block;
    border-top: 1px solid #b3b3b3;
    border-bottom: 1px solid #b3b3b3;
    border-right: 1px solid #b3b3b3;
}
.qrcode{
    height: 0.3rem;
    width: 0.7rem;
    border: 1px solid #b3b3b3;
    text-align: center;
    margin-right: 0.05rem;
}
.getVerify{
    display: inline-block;
    width: 0.6rem;
    height: 0.3rem;
    margin-right: 0.05rem;
}
#noclear{
    width: 0.9rem;
    font-size: 0.1rem;
    text-align: center;
    display: inline-block;
    cursor: pointer;
    color: #8C8C8C;
}
#noclear a{
    color: #1295ef;
}
.forgot{
    display: block;
    width: 2.35rem;
    margin: 0 auto;
    text-align: right;
    color: #1295ef;
    font-size: 0.1rem;
}
.submit{ /*提交按钮*/
    width: 2.35rem;
    margin: 0 auto;
    background: #1295ef;
    text-align: center;
    color: white;
    height: 0.3rem;
    line-height: 0.3rem;
    font-size: 0.1rem;
    cursor: pointer;
}
.copyright{
    width: 40%;
    display: block;
    margin: 20px auto;
}
</style>
<!--<link rel="stylesheet" type="text/css" href="http://dressplus.appdevs.cn/css/reset.css">-->
<div class="outer">
    <img src="https://martin-upload.b0.upaiyun.com/web/2017/06/1bf6a913671653e8c035555e2a612129.jpg" alt="" class="banner">
    <div class="box">
        <div style="height:0.2rem;"></div>
        <img class="logo" src="http://dressplus.appdevs.cn/images/dress_logo.png" alt="">
        <div style="height:0.1rem;"></div>
        <div class="title">Yi+人工智能技术演示平台</div>
        <div style="height:0.2rem;"></div>
        <div class="line">
            <img class="logo_email" src="https://martin-upload.b0.upaiyun.com/web/2017/06/889c45804cf02a4482475ea09d92cec0.jpg" alt="">
            <input class="email" name="username" type="text" placeholder="用户名 / 邮箱">
        </div>
        <div style="height:0.1rem;"></div>
        <div class="line">
            <img class="logo_password" src="https://martin-upload.b0.upaiyun.com/web/2017/06/6710625740f5cab9a459b835632234b4.jpg" alt="">
            <input class="password" placeholder="密码" name="password" type="password">
        </div>
        <div style="height:0.1rem;"></div>
        <div class="line">
            <input class="qrcode" placeholder="验证码" name="yzm" type="text">
            <img class="getVerify" id="verfiy-img">
            <div id="noclear">看不清? <a>换一张</a></div>
        </div>
        <div style="height:0.1rem;"></div>
        <a href="#" id="resetpassword" class="forgot">忘记密码?</a>
        <div class="ui-error-con" id="login_error_msg" style="display:none;">
            <span class="ui-error-icon"></span>
            <span class="ui-error-text">请输入正确的用户名或密码或验证码</span>
        </div>
        <div style="height:0.1rem;"></div>
        <div id="login" class="submit">登录</div>
        <div style="height:0.1rem;"></div>
        <a href="/login/register">
            <div class="forgot" style="text-align:center;">立即注册</div>
        </a>
        <div style="height:0.2rem;"></div>
    </div>
    <div style="height:0.2rem;"></div>    
    <img class="copyright"
    src="https://martin-upload.b0.upaiyun.com/web/2017/06/4cfe13e676570c5e4e9e82c1ed548997.jpg" alt="">
</div>

<div style="position: absolute; left: 0px; top: 0px; z-index: 99999;display: none;" id="loading">﻿
    <div class="sk-mask" data-level="">
        <div class="sk-mask-bg" style="opacity: 0;background-color: #fff; "></div>
        <div class="sk-mask-text" style="background-image: url(http://dressplus.appdevs.cn/node_modules/seekjs/ui/mask/loading.gif);background-repeat: no-repeat;background-position: center center;"></div>
    </div>
</div>
<script type="text/javascript" src="http://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
<script src="/js/login.js"></script>

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
</style>