<?php
namespace Home\Controller;
use Home\Controller\SiteController;
/**
 * 站点首页
 */

class IndexController extends SiteController {
    
    
    public function __construct() {

        parent::__construct ();
        header("Content-Type:text/html; charset=utf-8");
        $detect = new \Common\Util\Mobile_Detect();
        $ishttps = 0;

        if($_SERVER['REQUEST_SCHEME']=='https'){
            $ishttps=1;
        }
            
        if ($detect->isMobile()){           
            if($ishttps){
                redirect('https://'.$_SERVER['HTTP_HOST'].'/home_m');
            }else{
                redirect('http://'.$_SERVER['HTTP_HOST'].'/home_m');
            }
        } 
    }

    //首页
    public function index(){
        
        $this -> siteDisplay('index');
    }
    
    //关于我们  简介
    public function description(){
        $this -> siteDisplay('description');
    }
    
    //关于我们  团队
    public function aboutUs(){
        
        $this -> siteDisplay('aboutus');
    }
    
    //关于我们  联系我们
    public function contactUs(){
        
        $this -> siteDisplay('contactus');
    }
    
    //快讯
    public function shortMessage(){
        
        //快讯
        $where['state'] = 2;
        $messageMod = D('Article/Message');
       
        $messageCount = $messageMod->countList($where);
        $limit = $this->getPageLimit($messageCount,20);
        $messageList = $messageMod->loadList($where,$limit);
        
        //热门新闻
        $newsList = M('content')->where(['status'=>2])->field('content_id,title,image,time')->limit('0,5')->order('content_id desc')->select();
        
        //推荐导航
        $naviList = D('Admin/Navi')->loadList(['recom'=>1],'0,5');
        
        $this->assign('newsList',$newsList);
        $this->assign('messageList',$messageList);
        $this->assign('naviList',$naviList);
        $this -> siteDisplay('shortmessage');
    }
    //新闻动态
    public function news(){
        
        $class_id = I('request.class_id','all');

        $where['status'] = 2;
        if($class_id != 'all'){
            $where['class_id'] = $class_id;
        }
        //热门新闻
        $newsList = M('content')->where($where)->field('content_id,title,description,image,time,views')->limit('0,5')
                                ->order('content_id desc')->select();
        
        
        //快讯
        $map['state'] = 2;
        $messageMod = D('Article/Message');
        
        $messageList = $messageMod->loadList($map,'0,3');
        

        //推荐导航
        $naviList = D('Admin/Navi')->loadList(['recom'=>1],'0,5');
        
        $this->assign('class_id',$class_id);
        $this->assign('newsList',$newsList);
        $this->assign('messageList',$messageList);
        $this->assign('naviList',$naviList);
        $this -> siteDisplay('news');
    }
    

    //蚂蚁导航
    public function antMap(){

        $class_id = I('request.class_id','recom');
        
        $naviMod = D('Admin/Navi');
        
        $where['state'] = 1;
        if($class_id == 'recom'){

            $where['recom'] = 1;
            
            $where['class_id'] = 1;
            $naviList1 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            
            $where['class_id'] = 2;
            $naviList2 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            
            $where['class_id'] = 3;
            $naviList3 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            
            $where['class_id'] = 4;
            $naviList4 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            
            $where['class_id'] = 5;
            $naviList5 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            
            $where['class_id'] = 6;
            $naviList6 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            
            $where['class_id'] = 7;
            $naviList7 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            
            $where['class_id'] = 8;
            $naviList8 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            
            $this->assign('naviList1',$naviList1);
            $this->assign('naviList2',$naviList2);
            $this->assign('naviList3',$naviList3);
            $this->assign('naviList4',$naviList4);
            $this->assign('naviList5',$naviList5);
            $this->assign('naviList6',$naviList6);
            $this->assign('naviList7',$naviList7);
            $this->assign('naviList8',$naviList8);
        }else{
            $where['class_id'] = $class_id;
            
            $naviList = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            $this->assign('naviList',$naviList);
        }
        
        
        
        
        $this->assign('class_id',$class_id);
        
        $this -> siteDisplay('antmap');
    }
    
    //活动
    public function activity(){
        $state = I('request.state','all');
        $time = I('request.time','all');

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
        
        $acitvityList = $activityMod->loadList($where,9,'order_id desc,id desc');
        $this->assign('state',$state);
        $this->assign('time',$time);
        $this->assign('acitvityList',$acitvityList);
        $this -> siteDisplay('activity');
    }
    
    //理事单位
    public function council(){
        
        $where['status']=2;
        $councilMod=D('Admin/Council');
        $cw_list = $councilMod->loadList($where,$limit,'id desc');
        
        $where['status']=3;
        $councilMod=D('Admin/Council');
        $pt_list = $councilMod->loadList($where,$limit,'id desc');
        
        
        $this->assign('cw_list',$cw_list);
        $this->assign('pt_list',$pt_list);
        $this->assign('navi_num',6);
        $this -> siteDisplay('council');
    }
    
    //理事提交
    public function council_submit(){
        
        $contactname=I('post.contactname','','trim');
        $name=I('post.name','','trim');
        
        $councilMod=D('Admin/Council');
        
        $where['contactname']=$contactname;
        $where['name']=$name;
        
        $councilInfo=$councilMod->getWhereInfo($where);
        
        if($councilInfo){
            $data['code']=0;
            $data['msg']='该理事单位申请已经提交，请勿重复提交';
            
            $this->ajaxReturn($data);
        }
        
        
        $councilMod=D('Admin/Council');
        $re=$councilMod->saveData();
        if($re){
            $data['code']=1;
            $data['msg']='申请提交成功';
        }else{
            $data['code']=0;
            $data['msg']='申请提交失败，请重新提交';
        }
        
        $this->ajaxReturn($data);
    }
    
    //人才招聘
    public function recruit(){
        $this->assign('navi_num',6);
        $this -> siteDisplay('recruit');
    }
    
    /**********************************************************************/
    
    //采集
    public function collection(){
        $this->article_collection();
        $this->twitter_collection();
        $this->weibo_collection();
    }
    
    //快讯
    public function message(){
        header("Content-Type:text/html; charset=utf-8");
        
        $gzh_num=I('request.gzh_num',1,'intval');
        $info=array();
        
        switch ($gzh_num){  //海报默认二维码
            
            case 1 : {
                $info['gzh_code']=C('qr_code_a');
                break;
            }
            case 2 : {
                $info['gzh_code']=C('qr_code_b');
                break;
            }
            case 3 : {
                $info['gzh_code']=C('qr_code_c');
                break;
            }
        }
        
        
        //快讯列表
        $where_a['A.status']=1;
        $where_a['A.class_id']=5;
        $contentMod=D('Article/ContentArticle');
        $count = $contentMod->countList($where_a);
        $limit = $this->getPageLimit($count,20);
        
        $article_list = $contentMod->loadList($where_a,$limit);
        $weekname=array('星期天','星期一','星期二','星期三','星期四','星期五','星期六');
        
        foreach($article_list as $key=>$val){
            $article_list[$key]['content']=html_out($val['content']);
            $article_list[$key]['time_top']=date('m.d',$val['time']).' '.$weekname[date('w',$val['time'])];
        }
        
        //动态列表
        $where_t['status']=1;
        $twitterMod=D('Admin/Twitter');
        $count = $twitterMod->countList($where_t);
        $limit = $this->getPageLimit($count,20);
        
        $twitter_list = $twitterMod->loadList($where_t,$limit);
        
        foreach($twitter_list as $key=>$val){
            $twitter_list[$key]['content']=html_out($val['content']);
        }
        
        //微博列表
        $where_w['status']=1;
        $weiboMod=D('Admin/Weibo');
        $count = $weiboMod->countList($where_w);
        $limit = $this->getPageLimit($count,20);
        
        $weibo_list = $weiboMod->loadList($where_w,$limit);
        foreach($weibo_list as $key=>$val){
            $weibo_list[$key]['content']=html_out($val['content']);
        }
        
        
        $this->assign('page_num','1');
        
        $this->assign('article_list',$article_list);
        $this->assign('twitter_list',$twitter_list);
        $this->assign('weibo_list',$weibo_list);
        
        $this->assign('info',$info);
        $this -> siteDisplay('message');
    }
    
    /**
     *
     *
     * @return string|boolean|array
     */
    public function ajax_add(){
        
        
        $type=I('request.type',0,'intval');
        $gzh_code=I('request.gzh_code',0,'trim');
        $page_num=I('request.p',0,'intval');
        
        $info['gzh_code']=$gzh_code;
        
        $_GET['p']=$page_num+1;
        
        switch ($type) {
            case 1:{ //快讯
                
                $where['A.status']=1;
                $contentMod=D('Article/ContentArticle');
                $count = $contentMod->countList($where);
                $limit = $this->getPageLimit($count,20);
                
                $article_list = $contentMod->loadList($where,$limit);
                $weekname=array('星期天','星期一','星期二','星期三','星期四','星期五','星期六');
                foreach($article_list as $key=>$val){
                    $article_list[$key]['content']==html_out($val['content']);
                    $article_list[$key]['time_top']=date('m.d',$val['time']).' '.$weekname[date('w',$val['time'])];
                }
                $this->assign('info',$info);
                $this->assign('article_list',$article_list);
                $article=$this->fetch('article_model');
                
                if($article_list){
                    $data['code']=1;
                    $data['msg']='加载成功';
                    $data['page_p']= $_GET['p'];
                    $data['article']=$article;
                }else{
                    $data['code']=0;
                    $data['msg']='加载失败';
                }
                
                $this->ajaxReturn($data);
                
                break;
            }
            case 2:{//动态
                
                $where['status']=1;
                $twitterMod=D('Admin/Twitter');
                $count = $twitterMod->countList($where);
                $limit = $this->getPageLimit($count,20);
                
                $twitter_list = $twitterMod->loadList($where,$limit);
                
                foreach($twitter_list as $key=>$val){
                    $twitter_list[$key]['content']==html_out($val['content']);
                }
                
                $this->assign('twitter_list',$twitter_list);
                $twitter=$this->fetch('twitter_model');
                
                if($twitter_list){
                    $data['code']=1;
                    $data['msg']='加载成功';
                    $data['page_p']= $_GET['p'];
                    $data['article']=$twitter;
                }else{
                    $data['code']=0;
                    $data['msg']='加载失败';
                }
                
                $this->ajaxReturn($data);
                
                break;
            }
            case 3:{//微博
                
                $where['status']=1;
                $weiboMod=D('Admin/Weibo');
                $count = $weiboMod->countList($where);
                $limit = $this->getPageLimit($count,20);
                
                $weibo_list = $weiboMod->loadList($where,$limit);
                foreach($weibo_list as $key=>$val){
                    $weibo_list[$key]['content']==html_out($val['content']);
                }
                
                $this->assign('weibo_list',$weibo_list);
                $weibo=$this->fetch('weibo_model');
                
                if($weibo_list){
                    $data['code']=1;
                    $data['msg']='加载成功';
                    $data['page_p']= $_GET['p'];
                    $data['article']=$weibo;
                }else{
                    $data['code']=0;
                    $data['msg']='加载失败';
                }
                
                $this->ajaxReturn($data);
                
                break;
            }
        }
    }
    
    /**
     *动态采集
     */
    public function twitter_collection(){
        header("Content-Type:text/html; charset=utf-8");
        
        $url="https://www.jinse.com/ajax/twitters/getList?flag=down&id=0";
        $allInfo=$this->curl_get_contents($url);
        
        $allInfo=json_decode($allInfo,true);
        
        $list=array_reverse($allInfo['data']);
        
        $twitterMod=D('Admin/Twitter');
        
        foreach($list as $val){
            
            $re=$twitterMod->getUniqueNum(array('unique_num'=>$val['id']));
            if($re){//已存在该记录  跳过
                continue;
            }
            
            $_POST['auth_avatar']=$val['user']['avatar'];
            $_POST['auth_name']=$val['user']['name'];
            $_POST['unique_num']=$val['id'];
            $_POST['time']=strtotime($val['published_at']);
            $_POST['content']=preg_replace("/<(\/?a.*?)>/si","",$val['content']);//过滤所有a标签
            $_POST['content_zh']=preg_replace("/<(\/?a.*?)>/si","",$val['chinese']);//过滤所有a标签
            $_POST['country']=$val['user']['country_name'];
            $_POST['type']=$val['user']['type_name'];
            $_POST['status']=1;
            $_POST['remark']=json_encode($val);
            
            $re=$twitterMod->saveData('add');
            if($re){
                echo $val['id'].'动态采集成功<br>';
                $status=1;
            }
            
        }
        if(!$status){
            echo '无新动态';
        }
    }
    
    /**
     *微博采集
     */
    public function weibo_collection(){
        header("Content-Type:text/html; charset=utf-8");
        
        $url="https://www.jinse.com/ajax/weibo/getList?flag=down&id=0";
        $allInfo=$this->curl_get_contents($url);
        
        $allInfo=json_decode($allInfo,true);
        
        $list=array_reverse($allInfo['data']);
        
        $weiboMod=D('Admin/Weibo');
        
        foreach($list as $val){
            
            $re=$weiboMod->getUniqueNum(array('unique_num'=>$val['id']));
            
            if($re){//已存在该记录  跳过
                continue;
            }
            
            $_POST['unique_num']=$val['id'];
            $_POST['auth_name']=$val['user']['name'];
            $_POST['auth_avatar']=$val['user']['avatar'];
            
            $_POST['content']=$val['content'];
            $_POST['time']=strtotime($val['published_at']);
            $_POST['status']=1;
            
            $re=$weiboMod->saveData('add');
            
            if($re){
                echo $val['id'].'微博采集成功<br>';
                $status=1;
            }
        }
        if(!$status){
            echo '无新微博';
        }
        
    }
    
    
    //采集快讯
    public function article_collection(){
        header("Content-Type:text/html; charset=utf-8");
        
        $url='https://api.jinse.com/v3/live/list?limit=2&flag=down&id=0';
        
        $allInfo=$this->curl_get_contents($url);
        
        $allInfo=json_decode($allInfo,true);
        
        $allList=array_reverse($allInfo['list']);
        
        $contentMod=D('Article/ContentArticle');
        
        $content2Mod=D('DuxCms/Content');
        
        foreach($allList as $val){
            $date=$val['date'];
            $list=array_reverse($val['lives']);
            
            foreach($list as $valb){
                $re=$content2Mod->getUniqueNum(array('unique_num'=>$valb['id']));
                if($re){//已存在该记录  跳过
                    continue;
                }
                
                $isjscj=stripos($valb['content'],'金色财经');
                
                $_POST['unique_num']=$valb['id'];
                $_POST['class_id']=5;
                $_POST['title']=$this->getNeedBetween($valb['content'],'【','】');
                $_POST['time']=date('Y/m/d H:i:s',$valb['created_at']);
                
                if($isjscj){//如果包含‘金色财经’,则需要后台审核
                    $_POST['status']=0;
                }else{
                    $_POST['status']=1;
                }
                
                $_POST['content']=$this->getNeedAfter($valb['content'],'】');
                
                $re=$contentMod->saveData('add');
                if($re){
                    echo $valb['id'].'快讯采集成功<br>';
                    $status=1;
                }
            }
        }
        if(!$status){
            echo '无新快讯';
        }
        
        
    }
    
    //获取两个字符间的 字符
    public function getNeedBetween($kw,$mark1,$mark2){
        
        $st =stripos($kw,$mark1);
        $ed =stripos($kw,$mark2);
        
        if(($ed==false)||$st>=$ed)
            return 0;
            $kw_re=substr($kw,($st),($ed-$st+3));
            return $kw_re;
    }
    
    //获取两个字符间的 字符
    public function getNeedAfter($kw,$mark){
        
        
        $kw_r=strstr($kw,$mark);
        $kw_re=substr($kw_r,'3');
        return $kw_re;
    }
    
}