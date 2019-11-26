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
<style>
    .navList ul{
        /*border-bottom: 3px solid #2e84fb;*/
    }
    .line_Ac{
        height: 4px;
        border-radius: 12px;
        background: #2e84fb;
        position: relative;
        transition:1s all cubic-bezier(.23, 1, .23, 1);;
        bottom: 20px;
        width: 0%;
        /*display: inline-block;*/

    }
    .AcLine{
        width: 100%;
        text-align: center;
    }
    .navList ul li{
        font-size: 22px;

    }
    .navList ul li a{
        display: inline-block;
        vertical-align:top;
    }
    .active a{
        font-size: 25px;
        color: black;
    }
    .LookMore img{
        position: relative;
        top: 2px;
    }
</style>
<body>
<div class="box">
    <!--导航栏-->
    <!--#include file="header.html"-->
    
    <!--轮播-->
    <div class="banner-nav">
        <div class="in exhibition_hall">
            <div id="" class="roundabout_box">
                <ul>

                    <li><a href="#"><img src="images/Antamp.jpg" alt=""><span class="text"></span></a></li>
                    <li><a href="#"><img src="images/Antamp02.jpg" alt=""><span class="text"></span></a></li>
                    <li><a href="#"><img src="images/Antamp03.jpg" alt=""><span class="text"></span></a></li>
                    <!--<li><a href="#"><img src="images/zt4.png" alt=""><span class="text"></span></a></li>-->
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
                <div class="line_Ac"></div>
            </li>
            <li class='<?php if($class_id == 1): ?>active<?php endif; ?>'>
                <a href='/antmap/1'>行情</a>
                <div class="line_Ac"></div>
            </li>
            <li class='<?php if($class_id == 2): ?>active<?php endif; ?>'>
                <a href='/antmap/2'>资产管理</a>

                <div class="line_Ac"></div>
            </li>
            <li class='<?php if($class_id == 3): ?>active<?php endif; ?>'>
                <a href='/antmap/3'>TOP200</a>
                <div class="line_Ac"></div>
            </li>
            <li class='<?php if($class_id == 4): ?>active<?php endif; ?>'>
                <a href='/antmap/4'>钱包</a>
                <div class="line_Ac"></div>
            </li>
            <li class='<?php if($class_id == 5): ?>active<?php endif; ?>'>
                <a href='/antmap/5'>矿池</a>
                <div class="line_Ac"></div>
            </li>
            <li class='<?php if($class_id == 6): ?>active<?php endif; ?>'>
                <a href='/antmap/6'>媒体</a>
                <div class="line_Ac"></div>
            </li>
            <li class='<?php if($class_id == 7): ?>active<?php endif; ?>'>
                <a href='/antmap/7'>技术服务</a>
                <div class="line_Ac"></div>
            </li>
            <li class='<?php if($class_id == 8): ?>active<?php endif; ?>'>
                <a href='/antmap/8'>其他</a>
                <div class="line_Ac"></div>
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
                        <a href='/antmap/1'>
                            查看更多 <img src="images/MoreMoreM.png" alt="" width="5%">
                        </a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList1)): foreach($naviList1 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"' target="_blank">
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
                        <a href='/antmap/2'>查看更多 <img src="images/MoreMoreM.png" alt="" width="5%"></a>
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
                        <a href='/antmap/3'>查看更多 <img src="images/MoreMoreM.png" alt="" width="5%"></a>
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
                        <a href='/antmap/4'>查看更多 <img src="images/MoreMoreM.png" alt="" width="5%"></a>
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
                        <a href='/antmap/5'>查看更多 <img src="images/MoreMoreM.png" alt="" width="5%"></a>
                    </div>
                </div>
                <ul class="type_NavList">
                    <?php if(is_array($naviList5)): foreach($naviList5 as $key=>$vo): ?><li onclick='window.location.href="<?php echo ($vo["target"]); ?>"' >
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
                        <a href='/antmap/6'>查看更多 <img src="images/MoreMoreM.png" alt="" width="5%"></a>
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
                        <a href='/antmap/7'>查看更多 <img src="images/MoreMoreM.png" alt="" width="5%"></a>
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
                        <a href='/antmap/8'>查看更多 <img src="images/MoreMoreM.png" alt="" width="5%"></a>
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
            minScale: 0.8,
            autoplay: true,
            autoplayDuration: 5000,
            minOpacity:.5,
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
                $('.type_NavList').append(rdata.data);
                page_num++;
            }else{
                $('#navi_more').html(rdata.info);
            }
          }
        });
    })
</script>

<script>
    window.onload=function (ev) {
        if($(".navList ul li").hasClass("active")=="true"){
             console.log($(this))
        }
    };

  // $(".line_Ac").eq(0).addClass("AcLine");

  $(".navList ul li").hover(function () {
      $(this).find(".line_Ac").addClass("AcLine");
      $(this).siblings("li").find(".line_Ac").removeClass("AcLine");
  },function () {
      setTimeout(function () {
          $(this).find(".line_Ac").removeClass("AcLine");
      },1000)

  })

</script>