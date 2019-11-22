<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>蚂蚁导航</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/AntNavigation.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.fancybox.pack.js"></script>
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
    <div class="navList">
        <ul>
            <li class='<?php if($class_id == recom): ?>active<?php endif; ?>'>
                <a href='/antmap/recom'>推荐</a>
            </li>
            <li class='<?php if($class_id == 1): ?>active<?php endif; ?>'>
                <a href='/antmap/1'>行情</a>
            </li>
            <li class='<?php if($class_id == 2): ?>active<?php endif; ?>'>
                <a href='/antmap/2'>交易所</a>
            </li>
            <li class='<?php if($class_id == 3): ?>active<?php endif; ?>'>
                <a href='/antmap/3'>TOP200</a>
            </li>
            <li class='<?php if($class_id == 4): ?>active<?php endif; ?>'>
                <a href='/antmap/4'>钱包</a>
            </li>
            <li class='<?php if($class_id == 5): ?>active<?php endif; ?>'>
                <a href='/antmap/5'>矿池</a>
            </li>
            <li class='<?php if($class_id == 6): ?>active<?php endif; ?>'>
                <a href='/antmap/6'>媒体</a>
            </li>
            <li class='<?php if($class_id == 7): ?>active<?php endif; ?>'>
                <a href='/antmap/7'>技术服务</a>
            </li>
            <li class='<?php if($class_id == 8): ?>active<?php endif; ?>'>
                <a href='/antmap/8'>其他</a>
            </li>
        </ul>
        <div class="ApplyIncluded">
            <div class="ApplyIncluded_btn" onclick='window.location.href="/Apply"'>
                申请收录
            </div>
        </div>

    </div>
    <!--行情查看-->
    <div class="Market_view">
        <!--推荐-->
        <?php if($class_id == recom): ?><ul class="Market_view_ul" >
            <li class="Market_view_ul_list">
                <div class="Market_view_order">
                    <div class="Market">
                        行情
                    </div>
                    <div class="LookMore" >
                        <a href='/antmap/1'>查看更多></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList1)): foreach($naviList1 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
            <li class="Market_view_ul_list">
                <div class="Market_view_order">
                    <div class="Market">
                        交易所
                    </div>
                    <div class="LookMore">
                        <a href='/antmap/2'>查看更多></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList2)): foreach($naviList2 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
            <li class="Market_view_ul_list">
                <div class="Market_view_order">
                    <div class="Market">
                        TOP200
                    </div>
                    <div class="LookMore">
                        <a href='/antmap/3'>查看更多></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList3)): foreach($naviList3 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
            <li class="Market_view_ul_list">
                <div class="Market_view_order">
                    <div class="Market">
                        钱包
                    </div>
                    <div class="LookMore">
                        <a href='/antmap/4'>查看更多></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList4)): foreach($naviList4 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
            <li class="Market_view_ul_list">
                <div class="Market_view_order">
                    <div class="Market">
                        矿池
                    </div>
                    <div class="LookMore">
                        <a href='/antmap/5'>查看更多></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList5)): foreach($naviList5 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
            <li class="Market_view_ul_list">
                <div class="Market_view_order">
                    <div class="Market">
                        媒体
                    </div>
                    <div class="LookMore">
                        <a href='/antmap/6'>查看更多></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList6)): foreach($naviList6 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
            <li class="Market_view_ul_list">
                <div class="Market_view_order">
                    <div class="Market">
                        技术服务
                    </div>
                    <div class="LookMore">
                        <a href='/antmap/7'>查看更多></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList7)): foreach($naviList7 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
            <li class="Market_view_ul_list">
                <div class="Market_view_order">
                    <div class="Market">
                        其他
                    </div>
                    <div class="LookMore">
                        <a href='/antmap/8'>查看更多></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList8)): foreach($naviList8 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
        </ul><?php endif; ?>
        <?php if($class_id != recom): ?><ul class="Market_view_ul" >
            <li class="Market_view_ul_list">
                <ul class="type_NavList">
                    <?php if(is_array($naviList)): foreach($naviList as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"'>
                         <div class="type_NavList_box">
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
            </li>
            <div class="btnMORE" id='navi_more'>查看更多</div>
        </ul><?php endif; ?>
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

    $(".navList ul li").click(function () {
       var $this=$(this);
       var index=$this.index()
       var Market_view_ul=$(".Market_view_ul");
        Market_view_ul.hide().eq(index).show();
        $this.addClass("font-cx");
        $this.siblings().removeClass("font-cx")
    })


    var page_num = 2;
    var class_id = '<?php echo ($class_id); ?>'
    $('#navi_more').click(function(){
        
        $.ajax({
          type:"post",
          url:"/Home/Ajax/get_navi",
          data:{class_id:class_id,page_num:page_num},
          dataType:'json',
          success:function(rdata){

            if(rdata.code==1){
                $('.type_NavList ul').append(rdata.data);
                page_num++;
            }else{
                $('#navi_more').html(rdata.info);
            }
          }
        });
    })
</script>

<script>

</script>