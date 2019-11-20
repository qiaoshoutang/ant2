<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻快讯</title>
    <link rel="stylesheet" href="css/NewsInformation.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/NewsFlash.css">
    <link rel="stylesheet" href="css/NewsDynamicContent.css">
</head>
<body>
<div class="box">
    <!--导航栏-->
    <!--#include file="header.html"-->

    <!--合作伙伴链接窗-->
    <div class="Partner-Links">
        <ul>
            <?php if(is_array($naviList)): foreach($naviList as $key=>$vo): ?><li>
                <div class="Partner-Links-WinD">
                    <div class="Partner-T">
                        <img src="<?php echo ($vo["icon"]); ?>" alt="" width="100%">
                    </div>
                    <div class="Partner-LinksText">
                        <p><?php echo ($vo["name"]); ?></p>
                        <p><?php echo ($vo["descrip"]); ?></p>
                    </div>
                </div>
            </li><?php endforeach; endif; ?>
        </ul>
    </div>
    <!--快讯-->
    <div class="Kx">
        <div class="NewsFlash">
            <div class="NewsFlash_box">
                <div class="NewsFlash_box_Content">
                    <!--标题-->
                    <div class="TItle_Flash">
                        快讯
                    </div>
                    <!--快讯内容-->
                    <div class="KxText">
                        <ul>
                            <?php if(is_array($messageList)): foreach($messageList as $key=>$vo): ?><li>
                                <div class="TuoY">
                                    <img src="images/TuoY.png" alt="" width="100%">
                                </div>
                                <div class="KxTime">
                                    <span><?php echo (format_time($vo["time"],'H:i')); ?></span>
                                </div>
                                <!--内容-->
                                <div class="KxConttt">
                                    <div class="KxConttt_Title"><?php echo ($vo["title"]); ?></div>
                                    <div class="KxConttt_Text">
                                        <?php echo ($vo["content"]); ?>
                                    </div>
                                    <div class="Favorable-BadProfit">
                                        <span ><img src="images/up.png" alt=""> 利好<span class="count-f"><?php echo ($vo["up"]); ?></span></span>
                                        <span class="Fb-span">
                                            <img src="images/down.png" alt=""> 利空<span class="count-f"><?php echo ($vo["down"]); ?></span>
                                        </span>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; ?>
                        </ul>


                    </div>

                </div>
            </div>

        </div>

        <div class="Hot-News Hot-v">
            <div class="Hot-News-content">
                <!--标题-->
                <div class="HotNewsTitle">
                    <span>热门新闻</span>
                    <span class="HotMore">
                        <a href='/news/all'>
                            更多>
                        </a>
                    </span>
                </div>
                <!--内容-->
                <div class="hot_New_Img">
                    <div class="hot_Img_TT">
                        <img src="images/NewTypr-img.png" alt="" width="100%">
                        <div class="hot_Hover_A">
                            国内外大事件
                        </div>
                        <ul class="hot_NewContent_ul">
                            <?php if(is_array($newsList)): foreach($newsList as $key=>$vo): ?><li>
                                <div class="hot_NewContentImg_Left">
                                    <img src="<?php echo ((isset($vo["image"]) && ($vo["image"] !== ""))?($vo["image"]):'images/news_default.png'); ?>" alt="" width="100%">
                                </div>
                                <div class="hot_NewContent_Right">
                                    <div class="">
                                        <?php echo ($vo["title"]); ?>
                                    </div>
                                    <div>
                                        <?php echo (format_time($vo["time"],'Y-m-d')); ?>
                                    </div>

                                </div>
                            </li><?php endforeach; endif; ?>
                        </ul>

                    </div>


                </div>

            </div>
        </div>
    </div>

    <!--底部-->
    <!--#include file="footer.html"-->
</div>
</body>
</html>
<script src="js/jquery.js"></script>
<script src="js/commom.js"></script>