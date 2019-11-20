<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>活动</h3>

        <div class="m-panel ">
            <div class="panel-body">
            
        <form action="<?php echo U();?>" method="post" id="form" class="m-form m-form-horizontal">
        <fieldset>
          
        <div class="formitm">
            <label class="lab">名称</label>
            <div class="ipt">
                <input name="name" type="text"  class="form-element u-width-large  " id="name" value="<?php echo ($info["name"]); ?>" maxlength="100"   >
                <p class="help-block">活动的名称</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">权重</label>
            <div class="ipt">
                <input name="order_id" type="text"  class="form-element u-width-large  " id="order_id" value="<?php echo ($info["order_id"]); ?>" maxlength="100"   >
                <p class="help-block">越大越靠前</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">活动封面</label>
            <div class="ipt">
                <input name="cover_url" type="text"  class="form-element u-width-medium  " id="cover_url" value="<?php echo ($info["cover_url"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary" data="cover_url" href="javascript:;" id="upload_cover">上传</a>
                <p class="help-block">活动的封面图</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">封面预览</label>
            <div class="ipt">
                <img src='<?php echo ($info["cover_url"]); ?>'  width='400px' id='img_cover'>
                <p class="help-block"></p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">活动地点</label>
            <div class="ipt">
                <input name="position" type="text"  class="form-element u-width-large  " id="position" value="<?php echo ($info["position"]); ?>" maxlength="100"   >
                <p class="help-block">活动举报的地点</p>
            </div>
        </div>   
    
        <div class="formitm">
            <label class="lab">活动时间</label>
            <div class="ipt">
                <input name="duration" type="text"  class="form-element u-width-large  " id="duration" value="<?php echo ($info["duration"]); ?>" maxlength="100"   >
                <p class="help-block">活动的时间</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">活动内容</label>
            <div class="ipt">
                <textarea name="content" type="text"  class="form-element u-width-full u-editor" id="content" value="" rows="10"   ><?php echo ($info["content"]); ?></textarea>
                <p class="help-block"></p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">主办方1名称</label>
            <div class="ipt">
                <input name="master_name_1" type="text"  class="form-element u-width-large  " id="master_name_1" value="<?php echo ($info["master_name_1"]); ?>" maxlength="100"   >
                <p class="help-block"></p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">主办方1简介</label>
            <div class="ipt">
                <input name="master_descrip_1" type="text"  class="form-element u-width-large  " id="master_descrip_1" value="<?php echo ($info["master_descrip_1"]); ?>" maxlength="100"   >
                <p class="help-block"></p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">主办方1链接</label>
            <div class="ipt">
                <input name="master_target_1" type="text"  class="form-element u-width-large  " id="master_target_1" value="<?php echo ($info["master_target_1"]); ?>" maxlength="100"   >
                <p class="help-block"></p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">主办方1图标</label>
            <div class="ipt">
                <input name="master_icon_1" type="text"  class="form-element u-width-medium  " id="master_icon_1" value="<?php echo ($info["master_icon_1"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary" data="master_icon_1" href="javascript:;" id="icon_1">上传</a>
                <p class="help-block"></p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">主办方2名称</label>
            <div class="ipt">
                <input name="master_name_2" type="text"  class="form-element u-width-large  " id="master_name_2" value="<?php echo ($info["master_name_2"]); ?>" maxlength="100"   >
                <p class="help-block"></p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">主办方2简介</label>
            <div class="ipt">
                <input name="master_descrip_2" type="text"  class="form-element u-width-large  " id="master_descrip_2" value="<?php echo ($info["master_descrip_2"]); ?>" maxlength="100"   >
                <p class="help-block"></p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">主办方2链接</label>
            <div class="ipt">
                <input name="master_target_2" type="text"  class="form-element u-width-large  " id="master_target_2" value="<?php echo ($info["master_target_2"]); ?>" maxlength="100"   >
                <p class="help-block"></p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">主办方2图标</label>
            <div class="ipt">
                <input name="master_icon_2" type="text"  class="form-element u-width-medium  " id="master_icon_2" value="<?php echo ($info["master_icon_2"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary" data="master_icon_2" href="javascript:;" id="icon_2">上传</a>
                <p class="help-block"></p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">报名二维码</label>
            <div class="ipt">
                <input name="qrcode" type="text"  class="form-element u-width-medium  " id="qrcode" value="<?php echo ($info["qrcode"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary" data="qrcode" href="javascript:;" id="qrcode_up">上传</a>
                <p class="help-block"></p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">浏览量</label>
            <div class="ipt">
                <input name="views" type="text"  class="form-element u-width-large  " id="views" value="<?php echo ($info["views"]); ?>" maxlength="100"   >
                <p class="help-block"></p>
            </div>
        </div>
	  
        <div class="formitm">
            <label class="lab">状态</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="state" id="state0" value="1"   <?php if(!isset($info['state'])){ $info['state']= "1"; } if(1 == $info['state']){ ?> checked="checked" <?php } ?> > <span>报名中</span>
                    </label> <label>
                      <input type="radio" name="state" id="state1" value="2"   <?php if(!isset($info['state'])){ $info['state']= "1"; } if(2 == $info['state']){ ?> checked="checked" <?php } ?> > <span>已结束</span>
                    </label> 
                <p class="help-block"></p>
            </div>
        </div>     

    
        <div class="formitm form-submit">
        <div class="ipt">
            <div class="tip" id="tips"></div>
            <button class="u-btn u-btn-success u-btn-large" type="submit" id="btn-submit">保存</button>
            <button class="u-btn u-btn-large" type="reset">重置</button>
        </div>
        </div>
    <input name="id" type="hidden"  class="form-element u-width-large  " id="id" value="<?php echo ($info["id"]); ?>"    >
        </fieldset>
        </form>
            </div> </div>
<script>
Do.ready('base',function(){

  var option={};
  option.returnUrl="<?php echo U('Admin/Activity/activityList');?>";
  $('#form').duxFormPage(option);

  $('#upload_cover').duxFileUpload({
      
      complete: function (data) {
          $('#img_cover').attr('src', data.url);
      }
  });
  $('#icon_1').duxFileUpload({
      
  });
  $('#icon_2').duxFileUpload({
      
  });
  $('#qrcode_up').duxFileUpload({
      
  });

  

});

</script>