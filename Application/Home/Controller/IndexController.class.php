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
        
        $cateList = M('navi_category')->where(['state'=>1])->select();
        $this->assign('cateList',$cateList);
        
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
        $limit = $this->getPageLimit($messageCount,10);
        $messageList = $messageMod->loadList($where,$limit);
        
        //热门新闻
        $newsList = M('content')->where(['status'=>2])->field('content_id,title,image,time')->limit('0,5')->order('sequence desc,content_id desc')->select();
        
        if($newsList){
            $newsList = $this->newsAllRoute($newsList);
            $newsFirst = array_shift($newsList);
            $this->assign('newsFirst',$newsFirst);
        }

        //推荐导航
        $naviList = D('Admin/Navi')->loadList(['recom'=>1],'0,5');
        if($naviList){
            $naviList = $this->naviAllRoute($naviList);
        }

        
        
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
        $newsList = M('content')->where($where)->field('content_id,title,description,image,time,views,author')->limit(10)
                                ->order('time desc,sequence desc')->select();


        if($newsList){
            foreach($newsList as $key=>$val){
                $newsList[$key]['description'] = html_out($val['description']);
                
            }
            $newsList = $this->newsAllRoute($newsList);
        }
        
        //快讯
        $map['state'] = 2;
        $messageMod = D('Article/Message');
        
        $messageList = $messageMod->loadList($map,'0,3');
        
        //推荐导航
        $naviList = D('Admin/Navi')->loadList(['recom'=>1],'0,5');
        if($naviList){
            $naviList = $this->naviAllRoute($naviList);
        }
        
        $this->assign('class_id',$class_id);
        $this->assign('newsCate',M('category')->where(['show'=>1])->order('sequence asc')->select());
        $this->assign('newsList',$newsList);
        $this->assign('messageList',$messageList);
        $this->assign('naviList',$naviList);
        $this -> siteDisplay('news');
    }
    
    //新闻详情
    public function newsContent(){
        
        $content_id = I('request.content_id',0);
        
        $contentMod = D('Article/ContentArticle');
        
        M('content')->where(['content_id'=>$content_id])->setInc('views'); //浏览自增1
        
        $contentInfo = $contentMod->getInfo($content_id);

        if($_SERVER['HTTP_HOST'] != 'mayi.org'){ //大陆服务器连接香港服务器数据库  需要补全资源路径
            $contentInfo['content'] = str_replace('/Uploads/','http://mayi.org/Uploads/',$contentInfo['content']);
        }
        $contentInfo['content'] = html_out($contentInfo['content']);

        //热门新闻
        $newsList = M('content')->where(['status'=>2])->field('content_id,title,description,image,time,views')->limit(6)
                    ->order('sequence desc,content_id desc')->select();
        if($newsList){
            $newsList = $this->newsAllRoute($newsList);
            $newsFirst = array_shift($newsList);
            $this->assign('newsFirst',$newsFirst);
        }
                    
        
        //快讯
        $map['state'] = 2;
        $messageMod = D('Article/Message');
        
        $messageList = $messageMod->loadList($map,3);
        
        
        //推荐导航
        $naviList = D('Admin/Navi')->loadList(['recom'=>1],'0,5');
        if($naviList){
            $naviList = $this->naviAllRoute($naviList);
        }

        $this->assign('newsList',$newsList);
        $this->assign('messageList',$messageList);
        $this->assign('naviList',$naviList);
        
        $this->assign('contentInfo',$contentInfo);
        $this -> siteDisplay('newsContent');
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
            if($naviList1){
                $naviList2 = $this->naviAllRoute($naviList2);
            }
            
            $where['class_id'] = 2;
            $naviList2 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            if($naviList2){
                $naviList2 = $this->naviAllRoute($naviList2);
            }
            
            $where['class_id'] = 3;
            $naviList3 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            if($naviList3){
                $naviList3 = $this->naviAllRoute($naviList3);
            }
            
            $where['class_id'] = 4;
            $naviList4 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            if($naviList4){
                $naviList4 = $this->naviAllRoute($naviList4);
            }
            
            $where['class_id'] = 5;
            $naviList5 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            if($naviList5){
                $naviList5 = $this->naviAllRoute($naviList5);
            }
            
            $where['class_id'] = 6;
            $naviList6 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            if($naviList6){
                $naviList6 = $this->naviAllRoute($naviList6);
            }
            
            $where['class_id'] = 7;
            $naviList7 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            if($naviList7){
                $naviList7 = $this->naviAllRoute($naviList7);
            }
            
            $where['class_id'] = 8;
            $naviList8 = $naviMod->where($where)->limit(0,20)->order('order_id desc,id desc')->select();
            if($naviList8){
                $naviList8 = $this->naviAllRoute($naviList8);
            }
            
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
            if($naviList){
                $naviList = $this->naviAllRoute($naviList);
            }
            $this->assign('naviList',$naviList);
        }
        
        $this->assign('class_id',$class_id);
        $this -> siteDisplay('antmap');
    }
    
    //导航列表 图片路径替换
    private function naviAllRoute($naviList){  //大陆服务器连接香港服务器数据库  需要补全导航中的资源路径
        if($_SERVER['HTTP_HOST'] != 'mayi.org'){ //大陆服务器连接香港服务器数据库  需要补全资源路径
            foreach($naviList as $key=>$info){
                if($info['icon']){
                    $naviList[$key]['icon'] = 'http://mayi.org'.$info['icon'];
                }
            }
        }
        return $naviList;
    }
    
    //新闻列表 图片路径替换
    private function newsAllRoute($newsList){  //大陆服务器连接香港服务器数据库  需要补全导航中的资源路径
        
        if($_SERVER['HTTP_HOST'] != 'mayi.org'){ //大陆服务器连接香港服务器数据库  需要补全资源路径
            foreach($newsList as $key=>$newsInfo){
                if($newsInfo['image']){
                    $newsList[$key]['image'] = 'http://mayi.org'.$newsInfo['image'];
                }
            }
        }
        return $newsList;
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
        if($acitvityList){
            $acitvityList = $this->actiAllRoute($acitvityList);
        }

        $this->assign('state',$state);
        $this->assign('time',$time);
        $this->assign('acitvityList',$acitvityList);
        $this -> siteDisplay('activity');
    }
    //活动列表 图片路径替换
    private function actiAllRoute($actiList){  //大陆服务器连接香港服务器数据库  需要补全导航中的资源路径
        
        if($_SERVER['HTTP_HOST'] != 'mayi.org'){ //大陆服务器连接香港服务器数据库  需要补全资源路径
            foreach($actiList as $key=>$info){
                if($info['cover_url']){
                    $actiList[$key]['cover_url'] = 'http://mayi.org'.$info['cover_url'];
                }
            }
        }
        return $actiList;
    }
    
    //活动详情
    public function activityContent(){
        $content_id = I('request.content_id',0);
        
        $activityMod = M('activity');
        
        $activityMod->where(['id'=>$content_id])->setInc('views'); //浏览自增1
        
        $activityInfo = $activityMod->where(['id'=>$content_id])->find();
        if($activityInfo){
            if($_SERVER['HTTP_HOST'] != 'mayi.org'){ //大陆服务器连接香港服务器数据库  需要补全资源路径
   
                if($activityInfo['cover_url']){
                    $activityInfo['cover_url'] = 'http://mayi.org'.$activityInfo['cover_url'];
                }
                if($activityInfo['master_icon_1']){
                    $activityInfo['master_icon_1'] = 'http://mayi.org'.$activityInfo['master_icon_1'];
                }
                if($activityInfo['master_icon_2']){
                    $activityInfo['master_icon_2'] = 'http://mayi.org'.$activityInfo['master_icon_2'];
                }
                if($activityInfo['qrcode']){
                    $activityInfo['qrcode'] = 'http://mayi.org'.$activityInfo['qrcode'];
                }
                if($activityInfo['content']){
                     $activityInfo['content'] = str_replace('/Uploads/','http://mayi.org/Uploads/',$activityInfo['content']);
                }

            }
        }
        $activityInfo['content'] = html_out($activityInfo['content']);
        
        
        //推荐导航
        $naviList = D('Admin/Navi')->loadList(['recom'=>1],'0,5');
        if($naviList){
            $naviList = $this->naviAllRoute($naviList);
        }
        
        $this->assign('contentInfo',$activityInfo);
        $this->assign('naviList',$naviList);
        $this ->siteDisplay('activityContent');
    }

    //搜索
    public function searchPage(){
        $keyword =  I('request.keyword','');

        $contentMod = M('content');
        $messageMod = M('message');
        
        //搜索内容
        $newsList = $contentMod->where(['status'=>2,'title'=>['like','%'.$keyword.'%']])->order('sequence desc,content_id desc')->select();
        $messageList = $messageMod->where(['state'=>2,'title'=>['like','%'.$keyword.'%']])->order('id desc')->select();
        $activityList = M('activity')->where(['name'=>['like','%'.$keyword.'%']])->order('id desc')->select();

        //推荐导航
        $naviList = D('Admin/Navi')->loadList(['recom'=>1],'0,5');
        
        //最新快讯
        $messageList2 = $messageMod->where(['state'=>2])->limit(0,3)->order('id desc')->select();
        
        //热门新闻
        $newsList2 = $contentMod->where(['status'=>2])->limit(0,5)->order('sequence desc,content_id desc')->select();
        if($newsList2){
            $newsFirst = array_shift($newsList2);
            $this->assign('newsFirst',$newsFirst);
        }
        
        $this->assign('keyword',$keyword);
        $this->assign('newsList',$newsList);
        $this->assign('newsList2',$newsList2);
        $this->assign('messageList',$messageList);
        $this->assign('messageList2',$messageList2);
        $this->assign('activityList',$activityList);
        $this->assign('naviList',$naviList);
        $this ->siteDisplay('searchPage');
        
    }
    
    //申请收录
    public function apply(){
        $list = M('navi_category')->where(['state'=>1])->select();
        $classList = [];
        foreach($list as $val){
            $classList[$val['id']] = $val['name'];
        }

        $this->assign('classList',$classList);
        $this ->siteDisplay('apply');
    }
    /**********************************************************************/
    
    //采集
    public function collection(){
        $this->article_collection();
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