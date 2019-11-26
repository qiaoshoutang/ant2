<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻动态</title>
    <link rel="stylesheet" href="css/NewsInformation.css">
    <link rel="stylesheet" href="css/common.css">

</head>
<style>
    .Hot-News{
        margin-bottom: 30px;
    }
</style>
<body>
<div class="box">
    <!--导航栏-->
    <!--#include file="header.html"-->

    <!--合作伙伴链接窗-->
    <div class="Partner-Links">
        <ul>
            <?php if(is_array($naviList)): foreach($naviList as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
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
    <!--各类文章-->
    <div class="NewType">
        <div class="NewType-nav">
            <ul>
                <li class='<?php if($class_id == all): ?>active<?php endif; ?>'>
                    <a href = '/news/all'>
                        全部
                    </a>
                </li>
                <li class='<?php if($class_id == 1): ?>active<?php endif; ?>'>
                    <a href = '/news/1'>
                        行情
                    </a>
                </li>
                <li class='<?php if($class_id == 2): ?>active<?php endif; ?>'>
                    <a href = '/news/2'>
                        政策
                    </a>
                </li>
                <li class='<?php if($class_id == 3): ?>active<?php endif; ?>'>
                    <a href = '/news/3'>
                        产业
                    </a>
                </li>
                <li class='<?php if($class_id == 4): ?>active<?php endif; ?>'>
                    <a href = '/news/4'>
                        声音
                    </a>
                </li>
            </ul>
        </div>
        <!--全部-->
        <div class="NewType-Content">
            <ul>
            <?php if(is_array($newsList)): foreach($newsList as $key=>$vo): ?><li onclick='window.location.href="/newsContent/<?php echo ($vo["content_id"]); ?>"'>
                    <div class="NewType-Detail">
                        <div class="NewTypeImg">
                            <div class="NewTypeImgBox">
                                <img src="<?php echo ($vo["image"]); ?>" alt="">
                            </div>

                        </div>
                        <div class="NewTypeText">
                            <div class="TextTitle">
                                <?php echo ($vo["title"]); ?>
                            </div>
                            <div class="TextContent">
                                <?php echo ($vo["description"]); ?>
                            </div>
                            <div class="TextSource">
                                <span><?php echo ($vo["author"]); ?></span>
                                <span><?php echo (format_time($vo["time"],'Y-m-d H:i:s')); ?></span>
                                <span><?php echo ($vo["view"]); ?></span>
                            </div>
                        </div>
                    </div>
                </li><?php endforeach; endif; ?>
            </ul>

            <div class="LookMore">
                <span id='news_more'>查看更多</span>
            </div>

        </div>
        <!--热门快讯-->
        <div class="Hot-News">

            <div class="Hot-News-content">
                <!--标题-->
                <div class="HotNewsTitle">
                    <span>热门快讯</span>
                    <span class="HotMore">
                        <a href='/message'>
                            更多 <img src="images/MoreMoreM.png" alt="" width="5%">
                        </a>
                    </span>
                </div>

                <!--内容-->
                <div class="HotNewsText">
                    <?php if(is_array($messageList)): foreach($messageList as $key=>$vo): ?><div class="HotNewsText-box">
                        <div class="TuoY">
                            <img src="images/TuoY.png" alt="" width="100%">
                        </div>
                        <div class="HotNewsText-Article">
                            <div class="HotNewsTime">
                                <?php echo (format_time($vo["time"],'H:i')); ?>
                            </div>
                            <div class="HotNewsA-T">
                                <?php echo ($vo["title"]); ?>
                            </div>
                            <div class="HotNewsTTT">
                                <?php echo ($vo["content"]); ?>
                            </div>
                            <div class="Favorable-BadProfit">
                                <span ><img src="images/up.png" alt=""> 利好<span class="count-f"><?php echo ($vo["up"]); ?></span></span>
                                <span class="Fb-span"><img src="images/down.png" alt=""> 利空<span class="count-f"><?php echo ($vo["down"]); ?></span></span>
                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>

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
<script>
var page_num = 2;
var class_id = '<?php echo ($class_id); ?>'

    $(".NewType-Content ul li").hover(function () {
        $(this).addClass("bg-color")
        $(this).find($(".NewType-Detail")).css({
            "border-bottom":"none"
        })
    }, function () {
        $(this).removeClass("bg-color");
        $(this).find($(".NewType-Detail")).css({
            "border-bottom":"1px silver solid"
        })
    });
    
    $('#news_more').click(function(){
        
        $.ajax({
          type:"post",
          url:"/Home/Ajax/get_news",
          data:{class_id:class_id,page_num:page_num},
          dataType:'json',
          success:function(rdata){

            if(rdata.code==1){
                $('.NewType-Content ul').append(rdata.data);
                page_num++;
            }else{
                $('#news_more').html(rdata.info);
            }
          }
        });
    })
</script>