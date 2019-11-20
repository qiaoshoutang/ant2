<?php
namespace Home\Controller;
use Home\Controller\SiteController;
/**
 * 站点首页
 */

class AjaxController extends SiteController {
    
    /*
     * 更多新闻
     */
    public function get_news(){
        $page_num = I('post.page_num',0,'intval');
        $class_id = I('post.class_id','all','intval');

        
        $where['status'] = 2;
        if($class_id != 'all'){
            $where['class_id'] = $class_id;
        }
        //热门新闻
        $newsList = M('content')->where($where)->field('content_id,title,description,image,time,views')->page($page_num,10)
                    ->order('content_id desc')->select();
        if(empty($newsList)){
            $rdata['code'] = 0;
            $rdata['info'] = '已经没有更多了';
            $this->ajaxReturn($rdata);
        }
        $this->assign('newsList',$newsList);
        $data = $this->fetch('news_list');
        
        $rdata['code'] = 1;
        $rdata['info'] = '获取信息成功';
        $rdata['data'] = $data;
        $this->ajaxReturn($rdata);
    }
    
    /*
     * 更多快讯
     */
    public function get_message(){
        $page_num = I('post.page_num',0,'intval');
  
        $where['state'] = 2;
        $messageMod = D('Article/Message');
        
        $messageList = $messageMod->where($where)->page($page_num,10)
                                ->order('id desc')->select();
        
        if(empty($messageList)){
            $rdata['code'] = 0;
            $rdata['info'] = '已经没有更多了';
            $this->ajaxReturn($rdata);
        }
        $this->assign('messageList',$messageList);
        $data = $this->fetch('message_list');
        
        $rdata['code'] = 1;
        $rdata['info'] = '获取信息成功';
        $rdata['data'] = $data;
        $this->ajaxReturn($rdata);
    }
    
    /*
     * 更多导航
     */
    public function get_navi(){
        $page_num = I('post.page_num',0,'intval');
        $class_id = I('post.class_id','all','intval');
  
        $where['state'] = 2;

        if($class_id != 'recom'){
            $where['class_id'] = $class_id;
        }
        
        $naviMod = D('Admin/Navi');
        
        $naviList = $naviMod->where($where)->page($page_num,10)
                                ->order('id desc')->select();
        
        if(empty($naviList)){
            $rdata['code'] = 0;
            $rdata['info'] = '已经没有更多了';
            $this->ajaxReturn($rdata);
        }
        $this->assign('naviList',$naviList);
        $data = $this->fetch('navi_list');
        
        $rdata['code'] = 1;
        $rdata['info'] = '获取信息成功';
        $rdata['data'] = $data;
        $this->ajaxReturn($rdata);
    }
    
    /*
     * 更多活动
     */
    public function get_acti(){
        $page_num = I('post.page_num',0,'intval');
        $state  = I('post.state','all','intval');
        $time  = I('post.time','all','intval');

        if($state != 'all'){
            $where['state'] = $state;
        }
        if($time != 'all'){
            switch ($time){
                case 1:{
                    $where['time'] = array('gt',strtotime('-7 days'));
                    break;
                }
                case 2:{
                    $where['time'] = array('gt',strtotime('-30 days'));
                    break;
                }
                case 3:{
                    $where['time'] = array('gt',strtotime('-183 days'));
                    break;
                }
                case 4:{
                    $where['time'] = array('lt',strtotime('-183 days'));
                    break;
                }
            }
        }
        
        $activityMod = D('Admin/Activity');
        
        $actiList = $activityMod->where($where)->page($page_num,10)
                                ->order('id desc')->select();
        
        if(empty($actiList)){
            $rdata['code'] = 0;
            $rdata['info'] = '已经没有更多了';
            $this->ajaxReturn($rdata);
        }
        $this->assign('actiList',$actiList);
        $data = $this->fetch('acti_list');
        
        $rdata['code'] = 1;
        $rdata['info'] = '获取信息成功';
        $rdata['data'] = $data;
        $this->ajaxReturn($rdata);
    }
    //活动详情加载更多图片
    public function get_activity_image(){
        
        $page_num = I('post.pageNum',0,'intval');
        $album_id = I('post.album_id',0,'intval');
        
        
        if(!($album_id&&$page_num)){
            $data['code'] = 0;
            $data['info'] = '参数不能为空';
            $this->ajaxReturn($data);
            exit;
        }
        $imageMod  = D('Admin/Image');
        
        $where['fid'] = $album_id;
        $where['status'] = 1;

        $page_record_num = 6;
        $limit = $page_record_num*$page_num.','.$page_record_num;
        
        $image_list = $imageMod->loadList($where,$limit,'order_id asc');


        $imageArr=array();
        foreach($image_list as $val){
            $imageArr[]['articlePic'] = C('cdnurl').$val['img_url'];
        }

        if($imageArr){
            
            $data['code'] = 1;
            $data['info'] = '获取数据成功';
            $data['list'] = $imageArr;
        }else{
            $data['code'] = 2;
            $data['info'] = '没有数据了';
        }
        $this->ajaxReturn($data);
    }
   
    
}