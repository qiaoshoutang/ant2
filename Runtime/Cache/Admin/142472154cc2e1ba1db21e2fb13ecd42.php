<?php if (!defined('THINK_PATH')) exit();?><h3><?php echo ($name); ?>导航</h3>

        <div class="m-panel ">
            <div class="panel-body">
            
        <form action="<?php echo U();?>" method="post" id="form" class="m-form m-form-horizontal">
        <fieldset>
          
        <div class="formitm">
            <label class="lab">类别</label>
            <div class="ipt">
                <select name="class_id" class="form-element" id="class_id">
        <option value="0">==请选择分类==</option>
        <?php if(is_array($classArr)): foreach($classArr as $key=>$vo): ?><option value="<?php echo ($key); ?>" 
            <?php if($info['class_id'] == $key): ?>selected="selected"<?php endif; ?>
          >
          <?php echo ($vo); ?>
          </option><?php endforeach; endif; ?>
      </select>
                <p class="help-block">导航所属的分类</p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">权重</label>
            <div class="ipt">
                <input name="order_id" type="text"  class="form-element u-width-large  " id="order_id" value="<?php echo ($info["order_id"]); ?>" maxlength="100"   >
                <p class="help-block">数值越大越靠前</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">名称</label>
            <div class="ipt">
                <input name="name" type="text"  class="form-element u-width-large  " id="name" value="<?php echo ($info["name"]); ?>" maxlength="100"   >
                <p class="help-block">导航的名称</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">简介</label>
            <div class="ipt">
                <textarea name="descrip" type="text"  class="form-element u-width-large " id="descrip" value="" rows="10"   ><?php echo ($info["descrip"]); ?></textarea>
                <p class="help-block">导航的简介</p>
            </div>
        </div>
    
        <div class="formitm">
            <label class="lab">图标</label>
            <div class="ipt">
                <input name="icon" type="text"  class="form-element u-width-medium  " id="icon" value="<?php echo ($info["icon"]); ?>" maxlength="250"   >
      <a class="u-btn u-btn-primary u-img-upload" data="icon" preview="image-preview" href="javascript:;" >上传</a> 
      <a class="u-btn u-btn-primary" href="javascript:;" id="image-preview">预览</a>
                <p class="help-block"></p>
            </div>
        </div>

    
        <div class="formitm">
            <label class="lab">推荐</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="recom" id="recom0" value="1"   <?php if(!isset($info['recom'])){ $info['recom']= "2"; } if(1 == $info['recom']){ ?> checked="checked" <?php } ?> > <span>是</span>
                    </label> <label>
                      <input type="radio" name="recom" id="recom1" value="2"   <?php if(!isset($info['recom'])){ $info['recom']= "2"; } if(2 == $info['recom']){ ?> checked="checked" <?php } ?> > <span>否</span>
                    </label> 
                <p class="help-block"></p>
            </div>
        </div>   

	  
        <div class="formitm">
            <label class="lab">状态</label>
            <div class="ipt">
                <label>
                      <input type="radio" name="state" id="state0" value="1"   <?php if(!isset($info['state'])){ $info['state']= "1"; } if(1 == $info['state']){ ?> checked="checked" <?php } ?> > <span>展示</span>
                    </label> <label>
                      <input type="radio" name="state" id="state1" value="2"   <?php if(!isset($info['state'])){ $info['state']= "1"; } if(2 == $info['state']){ ?> checked="checked" <?php } ?> > <span>隐藏</span>
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
  option.returnUrl="<?php echo U('Admin/Navi/index');?>";
  $('#form').duxFormPage(option);

  $('#upload').duxFileUpload({
      type: 'jpg,png,gif,bmp',
      complete: function (data) {
          $('#content_image').attr('src', data.url);
      }
  });

});

</script>