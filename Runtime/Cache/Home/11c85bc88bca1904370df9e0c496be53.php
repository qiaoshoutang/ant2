<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>蚂蚁节点联盟</title>
    <link rel="stylesheet" href="css/common.css">

    <link rel="stylesheet" href="css/index.css">
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <div class="box">
        <!--#include file="header.html"-->

        <!--轮播-->

        <div class="banner-picture">
            <div class="wrap" id="wrap">
                <div class=wrapper>
                    <div class=page_wp id=page_wp>
                        <div class="page page_1"><span class="page_bg scale_box"></span>
                            <div class=img_box><img src="images/bannerImg01.png" alt=""></div>
                            <div class="txt_box scale_box">
                                <!--<h2>12</h2>-->
                                <!--<p class=txt_brief>123</p>-->
                                <img src="images/bannerImg01.png" alt="" style="top: -80px">
                            </div>

                        </div>
                        <div class="page page_2">
                            <span class="page_bg scale_box"></span>
                            <div class=img_box></div>
                            <div class="txt_box scale_box">
                                <!--<h2></h2>-->
                                <!--<p class=txt_brief></div>-->
                            <img src="images/bannerImg02.png" alt="">
                            </div>
                        </div>
                        <!--<div class="page page_3">-->
                            <!--<span class="page_bg scale_box"></span>-->
                            <!--<div class=img_box><img src="" alt=""></div>-->
                            <!--<div class="txt_box scale_box">-->
                                <!--&lt;!&ndash;<h2></h2>&ndash;&gt;-->
                                <!--&lt;!&ndash;<p class=txt_brief>&ndash;&gt;-->
                                <!--<img src="images/bannerImg01.png" alt="">-->
                            <!--</div>-->
                        <!--</div>-->
                        <!--<div class="page page_4"><span class="page_bg scale_box"></span>-->
                            <!--<div class=img_box><img src="" alt=""></div>-->
                            <!--<div class="light_wp scale_box"><span class=light_box><i class=light_1></i> <i class=light_2></i> <i class=light_3></i> <i class=light_4></i> <i class=light_5></i></span></div><span class="meteor_box scale_box"></span>-->
                            <!--<div class="txt_box scale_box">-->
                                <!--&lt;!&ndash;<h2></h2>&ndash;&gt;-->
                                <!--&lt;!&ndash;<p class=txt_brief></div>&ndash;&gt;-->
                                <!--<img src="images/bannerImg02.png" alt="">-->
                        <!--</div>-->
                    <!--</div>-->
                    </div>
                    <div class="star_wp scale_box" id=star_wp>
                        <span class=star_bg></span>
                        <span class=star_box></span>
                    </div>
                        <canvas id=canvas></canvas>
                    <div class="btns_wp scale_box">
                        <!--<a class="btn_download JS-btn-download" href='javascript:;'>立即下载</a>-->
                    </div>
                    <div class=btn_control id=btn_control>
                        <a href=javascript:; class=cur></a>
                        <a href=javascript:;></a>
                        <!--<a href=javascript:;></a>-->
                        <!--<a href=javascript:;></a>-->
                    </div>

            </div>

            <!--<img src="images/banner.png" alt="" width="100%">-->
        </div>
        </div>


        <!--服务类型-->
        <div class="service-types">
            <div style="width: 1200px;margin: 0 auto;height: 100%;position: relative">
                <!--标题-->
                <div class="Tiele-service">
                    <img src="images/serviceTypes.png" alt="" class="Tiele-service-img">
                </div>
                <!--波动波-->
                <div class="Expand-dottedLine">
                    <!--咨询管理-->
                    <div class="Consultation-management serviceType">
                        <div class="management-text">
                            <div class="management-Title">项目咨询管理</div>
                            <div class="font-Mana font-margin">制定中短期及长期运营解决</div>
                            <div class="font-Mana">方案，服务期间对项目进行</div>
                            <div class="font-Mana">
                                市场监控与管理
                            </div>
                        </div>
                        <div class="management-img">
                            <img src="images/Consultation.png" alt="" width="70%">
                            
                        </div>

                    </div>
                    <!--行业会议-->
                    <div class="Industry-meeting serviceType">
                        <div class="management-text">
                            <div class="management-Title">行业会议</div>
                            <div class="font-Mana font-margin">专业承办行业千人峰会</div>
                            <div class="font-Mana">提供策划-推广-会务</div>
                            <div class="font-Mana">
                                等一条龙服务
                            </div>
                        </div>
                        <div class="management-img">
                            <img src="images/33.png" alt="" width="55%">

                        </div>

                    </div>
                    <!--教育培训-->
                    <div class="Education-training serviceType">
                        <div class="management-text">
                            <div class="management-Title">教育培训</div>
                            <div class="font-Mana font-margin">依托国家级教育培训资源</div>
                            <div class="font-Mana">提供专业教育咨询服务</div>
                        </div>
                        <div class="management-img">
                            <img src="images/55.png" alt="" width="73%">

                        </div>

                    </div>
                    <!--社群运营-->
                    <div class="Community-operation serviceType">
                        <div class="Community-img">
                            <img src="images/22.png" alt="" width="65%">

                        </div>
                        <div class="Community-text">
                            <div class="management-Title">社群运营</div>
                            <div class="font-Mana font-margin">线上专业的微信社群</div>
                            <div class="font-Mana">管理团队</div>
                        </div>
                    </div>
                    <!--媒体公关-->
                    <div class="Media-relations serviceType">
                        <div class="Community-img">
                            <img src="images/66.png" alt="" width="55%">

                        </div>
                        <div class="Community-text">
                            <div class="management-Title">媒体公关</div>
                            <div class="font-Mana font-margin">覆盖40+行业主流媒体</div>
                            <div class="font-Mana">提供全方位媒体宣传服务</div>
                        </div>
                    </div>
                    <!--投行上所-->
                    <div class="Investment-bank serviceType">
                        <div class="Community-img">
                            <img src="images/44.png" alt="" width="55%">

                        </div>
                        <div class="Community-text">
                            <div class="management-Title">投行上所</div>
                            <div class="font-Mana font-margin">全球Top30</div>
                            <div class="font-Mana">主流交易所资源对接</div>
                        </div>
                    </div>

                    <img src="images/MayiCenter.png" alt="" class="MayiCenter">
                    <div class="Expand-dottedLine-s">

                    </div>
                    <div class="Expand-dottedLine-x">

                    </div>
                    <div class="Expand-dottedLine-f">

                    </div>
                    <div class="Expand-dottedLine-a">

                    </div>
                </div>
            </div>



        </div>
        <!--合作伙伴-->
        <div class="Cooperative-partner">

                <div class="Cooperative-partner-box">
                    <!--标题-->
                    <div class="Tiele-service">
                        <img src="images/partnerC.png" alt="" class="Tiele-service-img">
                    </div>
                    <div class="partner-img">
                        <img src="images/partner/Metaverse.png" alt="" class="Metaverse">
                        <img src="images/partner/DNA.png" alt="" class="DNA">
                        <img src="images/partner/rightbtc.png" alt="" class="RightBtc">
                        <img src="images/partner/gate.png" alt="" class="Gate">
                        <img src="images/partner/Okex.png" alt="" class="Okex">
                        <img src="images/partner/ZB.png" alt="" class="ZB">
                        <img src="images/partner/Draper.png" alt="" class="Draper">
                        <img src="images/partner/Binance.png" alt="" class="Binance">
                        <img src="images/partner/Bitfinex.png" alt="" class="Bitfinex">
                        <img src="images/partner/Golofo.png" alt="" class="Golofo">
                        <img src="images/partner/MXC.png" alt="" class="MXC">
                        <img src="images/partner/ZG.png" alt="" class="ZG">
                        <img src="images/partner/Huobi.png" alt="" class="Huobi">
                    </div>
                </div>





        </div>
        <!--旗下产品-->
        <div class="Its-products">
            <div class="Tiele-service jz-tit-img">
                <img src="images/serviceTypes.png" alt="" class="Tiele-service-img">
            </div>
            <ul class="ourBrands-ul">
                <li>
                    <div class="Generalization-content">
                        <div class="ourBrandsList-img">
                            <img src="images/Qklt.png" alt=""  width="85%" class="ourBrands-products">
                        </div>
                        <div class="ourBrands-text">
                            蚂蚁节点联盟旗下优质区块链自媒体平 台，致力打造最具行业影响力的财经媒
                            体品牌，粉丝数5w+
                        </div>
                        <!--了解更多-->
                        <div class="Learn-More">
                            了解更多
                        </div>
                    </div>
                    <div class="QR-Code">
                        <img src="images/QRCode.png" alt="">
                        <p>扫码查看</p>
                        <div class="crossCode">
                             ×
                        </div>
                    </div>

                </li>
                <li>
                    <div class="Generalization-content">
                        <div class="ourBrandsList-img">
                            <img src="images/bizhong.png" width="50%" alt=""  class="ourBrands-products">
                        </div>
                        <div class="ourBrands-text">
                            币众是基于LPChain理念开发的应用，利用LPChain的通证机制解决网络用户之间的信任和激励问题，实现用户各类行为价值化。旨在构建价值化自治社区，成为区块链领域流量入口，打造区块链领域项目孵化平台，为各类细分领域区块链项目提供流量资源与各种服务。
                        </div>
                        <!--了解更多-->
                        <div class="Learn-More">
                            了解更多
                        </div>
                    </div>
                    <div class="QR-Code">
                        <img src="images/QRCode.png" alt="">
                        <p>扫码查看</p>
                        <div class="crossCode">
                            ×
                        </div>
                    </div>

                </li>
                <li>
                    <div class="Generalization-content">
                        <div class="ourBrandsList-img">
                            <img src="images/finwise.png" width="85%" alt=""  class="ourBrands-products" >
                        </div>
                        <div class="ourBrands-text">
                            FINWISE纷智峰会是全球最貝影响力的金融科技峰会之一，团队由经验丰富的金融市场专家和区块链行业精英组成，旨在加强行业从业者们的交流，推动全球金融科技的发展。
                        </div>
                        <!--了解更多-->
                        <div class="Learn-More">
                            了解更多
                        </div>
                    </div>
                    <div class="QR-Code">
                        <img src="images/QRCode.png" alt="">
                         <p>扫码查看</p>
                        <div class="crossCode">
                            ×
                        </div>
                    </div>

                </li>
            </ul>
        </div>
        <!--底部-->
        <!--#include file="footer.html"-->

    </div>
</body>

</html>

<script src="js/commom.js"></script>

<script>
    $(".Learn-More").click(function () {
        $(this).parent().next().show();
        $(this).parent().hide();
    })
    $(".crossCode").click(function () {
        $(this).parent().hide();
        $(this).parent().prev().show()
    })
</script>
<script src="js/vendors.js"></script>
<script src="js/banner.js"></script>