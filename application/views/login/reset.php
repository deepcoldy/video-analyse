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
    color: #333333;
}
.passworderror {
    width: 35%;
    margin: 0px auto;
    margin-bottom: 20px;
    font-size: 0.1rem;
    color: red;
    visibility: hidden;
}

.firststep{
    display: block;
    width: 35%;
    border:1px solid #b3b3b3;
    border-radius: 3px;
    margin: 0px auto;
    height: 0.35rem;
    margin-top: 0.5rem;
    padding-left: 0.1rem;
}
#confirmclick,#submit{
    width: 35%;
    margin: 0 auto;
    background: #1295ef;
    text-align: center;
    color: white;
    height: 0.3rem;
    line-height: 0.3rem;
    font-size: 0.1rem;
    cursor: pointer;
}
.secondstep {
    width: 40%;
    margin: 20px auto;
    text-align: center;
    margin-top: 80px;
    font-size: 0.2rem;
    border: 1px solid #b2b2b2;
    padding: 0.15rem;
    text-align: left;
}
.secondstep .resetaccount{
    font-size: 0.25rem;
}
.secondstep .special{
    color: #1295ef;
    text-decoration: underline;
}

.thridstep{
    width: 35%;
    margin: 0 auto;
}
.thridstep input{
    width: 100%;
    display: block;
    border:1px solid #b3b3b3;
    border-radius: 3px;
    margin: 0px auto;
    height: 0.35rem;
    padding-left: 0.1rem;
}
.firstpage, .secondpage, .thirdpage{
    display: none;
}
.first, .second, .third{
    display: block;
    /*display: none;*/
    margin: 0 auto;
    width: 40%;
}
.first img, .second img, .third img{
    width: 100%;
}
</style>
<div class="outer">
    <div style="height:0.4rem;"></div>
    <div class="title">重置密码</div>
    <div style="height:0.4rem;"></div>
    <div class="firstpage">
        <div class="first">
            <img src="https://martin-upload.b0.upaiyun.com/web/2017/06/868bef264a388eb313b251ae7fd63b08.png" alt="">
        </div>
        <input name="email" type="text" placeholder="用户名/邮箱"  class="firststep">
        <div style="height:0.2rem;"></div>
        <div class="passworderror"></div>
        <div id="confirmclick">下一步</div>
    </div>
    <div class="secondpage">
        <div class="second">
            <img src="https://martin-upload.b0.upaiyun.com/web/2017/06/6071e04e7720ea9453a238d11317f36e.png" alt="">
        </div>
        <div class="secondstep">
            <div style="height:0.2rem;"></div>            
            <p>密码重置链接已发送至:</p>
            <div style="height:0.3rem;"></div>            
            <p class="resetaccount"></p>
            <div style="height:0.3rem;"></div>            
            <p class="special">请进入邮箱点击链接重置密码</p>
            <div style="height:0.2rem;"></div>            
        </div>
    </div>
    <div class="thirdpage">
        <div class="third">
            <img src="https://martin-upload.b0.upaiyun.com/web/2017/06/d1de78a70f914dba270c9b48548935f2.png" alt="">
        </div>
        <div style="height:0.15rem;"></div>            
        <div class="thridstep">
            <div style="height:0.3rem;"></div>            
            <input name="newpw" type="password" placeholder="新密码" />
            <div style="height:0.1rem;"></div>            
            <input name="confirmpw" type="password" placeholder="确认密码"/>
        </div>
        <div style="height:0.15rem;"></div>            
        <div class="passworderror"></div>
        <div id="submit">确定</div>
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
    var error = '<?php echo $error; ?>';
</script>
<script src="/js/reset.js"></script>

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


<script type="text/javascript">
    !function(a,b){function c(){var b=f.getBoundingClientRect().width;if(b<1035){b=1035;}var c=b/10;f.style.fontSize=c+"px",k.rem=a.rem=c}var d,e=a.document,f=e.documentElement,g=e.querySelector('meta[name="viewport"]'),h=e.querySelector('meta[name="flexible"]'),i=0,j=0,k=b.flexible||(b.flexible={});if(g){console.warn("将根据已有的meta标签来设置缩放比例");var l=g.getAttribute("content").match(/initial\-scale=([\d\.]+)/);l&&(j=parseFloat(l[1]),i=parseInt(1/j))}else if(h){var m=h.getAttribute("content");if(m){var n=m.match(/initial\-dpr=([\d\.]+)/),o=m.match(/maximum\-dpr=([\d\.]+)/);n&&(i=parseFloat(n[1]),j=parseFloat((1/i).toFixed(2))),o&&(i=parseFloat(o[1]),j=parseFloat((1/i).toFixed(2)))}}if(!i&&!j){var p=a.navigator.userAgent,q=(!!p.match(/android/gi),!!p.match(/iphone/gi)),r=q&&!!p.match(/OS 9_3/),s=a.devicePixelRatio;i=q&&!r?s>=3&&(!i||i>=3)?3:s>=2&&(!i||i>=2)?2:1:1,j=1/i}if(f.setAttribute("data-dpr",i),!g)if(g=e.createElement("meta"),g.setAttribute("name","viewport"),g.setAttribute("content","initial-scale="+j+", maximum-scale="+j+", minimum-scale="+j+", user-scalable=no"),f.firstElementChild)f.firstElementChild.appendChild(g);else{var t=e.createElement("div");t.appendChild(g),e.write(t.innerHTML)}a.addEventListener("resize",function(){clearTimeout(d),d=setTimeout(c,300)},!1),a.addEventListener("pageshow",function(a){a.persisted&&(clearTimeout(d),d=setTimeout(c,300))},!1),"complete"===e.readyState?e.body.style.fontSize=12*i+"px":e.addEventListener("DOMContentLoaded",function(){e.body.style.fontSize=12*i+"px"},!1),c(),k.dpr=a.dpr=i,k.refreshRem=c,k.rem2px=function(a){var b=parseFloat(a)*this.rem;return"string"==typeof a&&a.match(/rem$/)&&(b+="px"),b},k.px2rem=function(a){var b=parseFloat(a)/this.rem;return"string"==typeof a&&a.match(/px$/)&&(b+="rem"),b}}(window,window.lib||(window.lib={}));
</script>