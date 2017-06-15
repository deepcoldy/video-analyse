<link rel="stylesheet" href="/css/page9.css">
    <div class="">
        <div class="uploading">
            <div ng-hide="image" style="height: 291px;">
                <p class="uploading_p">通过神经网络技术和人工智能算法，按照选定的风格，将照片智能风格化，模拟出相应的风格的作品。目前支持41种风格。</p>
                <p class="button_p" ngf-select="upload($file)">上传图片</p>
                <div class="uploading_img"></div>
            </div>
            <div ng-show="image">
                <img id="" src="/img/uploading_logo.png" alt="" ng-src="{{image}}"  ngf-select="upload($file)" width="450" style="position: relative; z-index: 100;">
            </div>

        </div>
        <div class="result">
            <div ng-hide="image2" style="height: 291px;">
                <p class="button_p">生成结果</p>
                <div class="result_img"></div>
                <div class="result2" id="result2">
                    <div class="page9_result_img">
                        <img src="/img/page9_result_img.png" ng-src="{{image2}}">
                    </div>
                    <p class="button_p2" onclick="refresh_n()">刷新</p>
                </div>
            </div>
            <div ng-show="image2">
                <img src="/img/uploading_logo.png" alt="" ng-src="{{image2}}"  width="450">
            </div>
        </div>
    </div>
    <div class="line">
        <img src="/img/choose.png">
    </div>
    <div class="style_div1">
        <div class="style_div">
            <!-- 选中状态的div蒙版 -->
            <ul class="style_table">
                <li data-style="candy_tree">
                    <div class="choose_on" id="choose_on">
                        <img id="choose_on_img" src="/img/select_img.png">
                    </div>
                    <img src="/img/candy_tree.png">
                    <!-- 选中状态时添加id='choose_shadow'属性 -->
                    <div class="shadow" id="choose_shadow0">
                        <p>Candy Tree</p>
                    </div>
                </li>
                <li data-style="candy" class="left_margin">
                    <img src="/img/candy.png">
                    <div class="shadow" id="choose_shadow1">
                        <p>Candy</p>
                    </div>
                </li>
                <li data-style="castle" class="left_margin img_td">
                    <img src="/img/castle.png">
                    <div class="shadow" id="choose_shadow2">
                        <p>Castle</p>
                    </div>
                </li>
                <li data-style="circles" class="left_margin img_td">
                    <img src="/img/circles.png">
                    <div class="shadow" id="choose_shadow3">
                        <p>Circles</p>
                    </div>
                </li>
                <li data-style="composition_vii" class="left_margin img_td">
                    <img src="/img/vii.png">
                    <div class="shadow" id="choose_shadow4">
                        <p>Composition Vii</p>
                    </div>
                </li>
                <li data-style="cn_horse" class="left_margin img_td">
                    <img src="/img/horse.png">
                    <div class="shadow" id="choose_shadow5">
                        <p>Horse</p>
                    </div>
                </li>
                <li data-style="curly_hair">
                    <img src="/img/hair.png">
                    <div class="shadow" id="choose_shadow6">
                        <p>Curly-Hair</p>
                    </div>
                </li>
                <li data-style="jp_wave" class="left_margin">
                    <img src="/img/wave.png">
                    <div class="shadow" id="choose_shadow7">
                        <p>Wave</p>
                    </div>
                </li>
                <li data-style="la_muse" class="left_margin">
                    <img src="/img/muse.png">
                    <div class="shadow" id="choose_shadow8">
                        <p>La-Muse</p>
                    </div>
                </li>
                <li data-style="mosaic" class="left_margin">
                    <img src="/img/mosaic.png">
                    <div class="shadow" id="choose_shadow9">
                        <p>Mosaic</p>
                    </div>
                </li>
                <li data-style="picasso_women" class="left_margin">
                    <img src="/img/women.png">
                    <div class="shadow" id="choose_shadow10">
                        <p>Picasso-Women</p>
                    </div>
                </li>
                <li data-style="purity_girl" class="left_margin">
                    <img src="/img/girl.png">
                    <div class="shadow" id="choose_shadow11">
                        <p>Purity-Girl</p>
                    </div>
                </li>
                <li data-style="the_scream">
                    <img src="/img/scream.png">
                    <div class="shadow" id="choose_shadow12">
                        <p>The Scream</p>
                    </div>
                </li>
                <li data-style="udnie" class="left_margin">
                    <img src="/img/udnie.png">
                    <div class="shadow" id="choose_shadow13">
                        <p>Udnie</p>
                    </div>
                </li>
                <li data-style="wolf" class="left_margin">
                    <img src="/img/wolf.png">
                    <div class="shadow" id="choose_shadow14">
                        <p>Wolf</p>
                    </div>
                </li>
                <li data-style="wuguanzhong1" class="left_margin">
                    <img src="/img/wgz_1.png">
                    <div class="shadow" id="choose_shadow15">
                        <p>wuguanzhong1</p>
                    </div>
                </li>
                <li data-style="wuguanzhong2" class="left_margin">
                    <img src="/img/wgz_2.png">
                    <div class="shadow" id="choose_shadow16">
                        <p>wuguanzhong2</p>
                    </div>
                </li>
                <li data-style="transverse_line" class="left_margin">
                    <img src="/img/line.png">
                    <div class="shadow" id="choose_shadow17">
                        <p>Transverse Line</p>
                    </div>
                </li>
                <li data-style="feathers">
                    <img src="/img/feathers.png">
                    <div class="shadow" id="choose_shadow18">
                        <p>Feathers</p>
                    </div>
                </li>
                <li data-style="red_flower" class="left_margin">
                    <img src="/img/flower.png">
                    <div class="shadow" id="choose_shadow19">
                        <p>Red-Flower</p>
                    </div>
                </li>
                <li data-style="acaleph" class="left_margin">
                    <img src="/img/styles/acaleph.jpg">
                    <div class="shadow" id="">
                        <p>Acaleph</p>
                    </div>
                </li>
<!--                <li data-style="achilles" class="left_margin">-->
<!--                    <img src="/img/styles/Achilles.jpg">-->
<!--                    <div class="shadow" id="">-->
<!--                        <p>Achilles</p>-->
<!--                    </div>-->
<!--                </li>-->
                <li data-style="begonia" class="left_margin">
                    <img src="/img/styles/begonia.jpg">
                    <div class="shadow" id="">
                        <p>Begonia</p>
                    </div>
                </li>
                <li data-style="charm_eye" class="left_margin">
                    <img src="/img/styles/charm_eye.jpg">
                    <div class="shadow" id="">
                        <p>Charm Eye</p>
                    </div>
                </li>
                <li data-style="colorcat" class="left_margin">
                    <img src="/img/styles/colorcat.jpg">
                    <div class="shadow" id="">
                        <p>Color Cat</p>
                    </div>
                </li>
                <li data-style="colordigital" class="left_margin">
                    <img src="/img/styles/colordigital.jpg">
                    <div class="shadow" id="">
                        <p>Color Digital</p>
                    </div>
                </li>
                <li data-style="colordoodle" class="left_margin">
                    <img src="/img/styles/colordoodle.jpg">
                    <div class="shadow" id="">
                        <p>Color Doodle</p>
                    </div>
                </li>
                <li data-style="colorwave" class="left_margin">
                    <img src="/img/styles/colorwave.jpg">
                    <div class="shadow" id="">
                        <p>Color Wave</p>
                    </div>
                </li>
                <li data-style="cypress" class="left_margin">
                    <img src="/img/styles/cypress.jpg">
                    <div class="shadow" id="">
                        <p>Cypress</p>
                    </div>
                </li>
                <li data-style="dark_castle" class="left_margin">
                    <img src="/img/styles/dark_castle.jpg">
                    <div class="shadow" id="">
                        <p>Dark Castle</p>
                    </div>
                </li>
                <li data-style="deerlet" class="left_margin">
                    <img src="/img/styles/deerlet.jpg">
                    <div class="shadow" id="">
                        <p>Deerlet</p>
                    </div>
                </li>
                <li data-style="dryland" class="left_margin">
                    <img src="/img/styles/dryland.jpg">
                    <div class="shadow" id="">
                        <p>Dryland</p>
                    </div>
                </li>
<!--                <li data-style="emerald" class="left_margin">-->
<!--                    <img src="/img/styles/Emerald.jpg">-->
<!--                    <div class="shadow" id="">-->
<!--                        <p>Emerald</p>-->
<!--                    </div>-->
<!--                </li>-->
                <li data-style="faceline" class="left_margin">
                    <img src="/img/styles/faceline.jpg">
                    <div class="shadow" id="">
                        <p>Faceine</p>
                    </div>
                </li>
                <li data-style="garden" class="left_margin">
                    <img src="/img/styles/garden.jpg">
                    <div class="shadow" id="">
                        <p>Garden</p>
                    </div>
                </li>
                <li data-style="golden_liberty" class="left_margin">
                    <img src="/img/styles/golden_liberty.jpg">
                    <div class="shadow" id="">
                        <p>Golden Liberty</p>
                    </div>
                </li>
                <li data-style="naruto" class="left_margin">
                    <img src="/img/styles/naruto.jpg">
                    <div class="shadow" id="">
                        <p>Naruto</p>
                    </div>
                </li>
                <li data-style="splashman" class="left_margin">
                    <img src="/img/styles/splashman.jpg">
                    <div class="shadow" id="">
                        <p>Splash Man</p>
                    </div>
                </li>
                <li data-style="stargirl" class="left_margin">
                    <img src="/img/styles/stargirl.jpg">
                    <div class="shadow" id="">
                        <p>Star Girl</p>
                    </div>
                </li>
                <li data-style="starry_night" class="left_margin">
                    <img src="/img/styles/starry_night.jpg">
                    <div class="shadow" id="">
                        <p>Starry Night</p>
                    </div>
                </li>
                <li data-style="street" class="left_margin">
                    <img src="/img/styles/street.jpg">
                    <div class="shadow" id="">
                        <p>Street</p>
                    </div>
                </li>
                <li data-style="wave_and_sun" class="left_margin">
                    <img src="/img/styles/wave_and_sun.jpg">
                    <div class="shadow" id="">
                        <p>Wave And Sun</p>
                    </div>
                </li>
<!--                <li data-style="Y2" class="left_margin">-->
<!--                    <img src="/img/styles/Y2.jpg">-->
<!--                    <div class="shadow" id="">-->
<!--                        <p>Y2</p>-->
<!--                    </div>-->
<!--                </li>-->
                <li data-style="zombie" class="left_margin">
                    <img src="/img/styles/zombie.jpg">
                    <div class="shadow" id="">
                        <p>Zombie</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

<script src="//cdn.bootcss.com/danialfarid-angular-file-upload/12.0.1/ng-file-upload.min.js"></script>
<script src="//cdn.bootcss.com/json-formatter/0.6.0/json-formatter.js"></script>
<script src="/js/magic.js"></script>
