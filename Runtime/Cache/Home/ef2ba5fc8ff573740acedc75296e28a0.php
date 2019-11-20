<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>蚂蚁活动</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/AntNavigation.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
    <link rel="stylesheet" href="css/allianceActivities.css">
</head>
<body>
<div class="box">
    <!--导航栏-->
    <!--#include file="header.html"-->
    
    <!--轮播-->
    <div class="banner-nav">
        <div class="in exhibition_hall">
            <div id="" class="roundabout_box">
                <ul>
                    <li><a href="#"><img src="images/zt1.png" alt=""><span class="text">Picture information 1</span></a></li>
                    <li><a href="#"><img src="images/zt2.png" alt=""><span class="text">Picture information 2</span></a></li>
                    <li><a href="#"><img src="images/zt3.png" alt=""><span class="text">Picture information 3</span></a></li>
                    <li><a href="#"><img src="images/zt4.png" alt=""><span class="text">Picture information 4</span></a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <!--主要内容导航-->
    <div class="RecentnavList">
        <ul class="RecentnavList_ul">
            <li class='<?php if($state == all): ?>active<?php endif; ?>'>
                <a href='/activit/all/all'>全部</a>
            </li>
            <li class='<?php if($state == 1): ?>active<?php endif; ?>'>
                <a href='/activit/1/all'>报名中</a>
            </li>
            <li class='<?php if($state == 2): ?>active<?php endif; ?>'>
                <a href='/activit/2/all'>已结束</a>
            </li>
        </ul>
        <!--近期-->
        <div class="Recent-time">
            <ul>
                <li class='<?php if($time == all): ?>active<?php endif; ?>'>
                    <a href='/activit/all/all'>全部</a>
                </li>
                <li class='<?php if($time == 1): ?>active<?php endif; ?>'>
                    <a href='/activit/all/1'>近一周</a>
                </li>
                <li class='<?php if($time == 2): ?>active<?php endif; ?>'>
                    <a href='/activit/all/2'>近一月</a>
                </li>
                <li class='<?php if($time == 3): ?>active<?php endif; ?>'>
                    <a href='/activit/all/3'>近半年</a>
                </li>
                <li class='<?php if($time == 4): ?>active<?php endif; ?>'>
                    <a href='/activit/all/4'>更早</a>
                </li>
            </ul>
        </div>
        <!--活动详情-->
        <div class="Activity-Details">
            <ul>
                <?php if(is_array($acitvityList)): foreach($acitvityList as $key=>$vo): ?><li>
                    <div class="Img_Ac">
                        <img src="images/Ac01.png" alt="">
                    </div>
                    <div class="Title_Ac">
                        <p class="Title_Ac_P">
                            <span><?php echo ($vo["name"]); ?></span>
                            <span><?php echo ($vo["views"]); ?>人浏览</span>
                        </p>
                    </div>
                    <div class="LocationTime">
                        <div class="Location">
                            <p><img src="images/location.png" alt=""><span><?php echo ($vo["position"]); ?></span></p>
                            <p><img src="images/shijian.png" alt=""><span><?php echo ($vo["duration"]); ?></span></p>
                        </div>

                        <div class="Time">
                            <?php if($vo["state"] == 1): ?><div class="Time_Bm">
                                报名中
                            </div><?php endif; ?>
                            <?php if($vo["state"] == 2): ?><div class="Time_Finish">
                                已结束
                            </div><?php endif; ?>
                        </div>

                    </div>
                </li><?php endforeach; endif; ?>


            </ul>
            <div class="LOOKMMM">
                查看更多
            </div>
        </div>

    </div>

    <!--底部-->
    <!--#include file="footer.html"-->
</div>
</body>
</html>

<script src="js/jquery.roundabout.min.js"></script>
<script src="js/commom.js"></script>
<script>
    $(document).ready(function(){
        $('.roundabout_box ul').roundabout({
            duration: 1000,
            minScale: 0.6,
            autoplay: true,
            autoplayDuration: 5000,
            minOpacity: 0,
            maxOpacity: 1,
            reflect: true,
            startingChild: 3,
            autoplayInitialDelay: 5000,
            autoplayPauseOnHover: true,
            enableDrag: true
        });
    });
    $(".RecentnavList_ul li").click(function () {
        $(this).addClass("font-cx");
        $(this).siblings().removeClass("font-cx")
    })

    $(".Recent-time ul li").click(function () {
        $(this).addClass("font-cxb");
        $(this).siblings().removeClass("font-cxb")
    })
</script>