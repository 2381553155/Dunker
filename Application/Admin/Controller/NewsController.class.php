<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;
class NewsController extends AdminController {


    public function _initialize(){
        parent::_initialize();
        $this->assign('module_name', 'news');

        $keyValue=M('key_value');
        $where['key_value.key']='serverUrl';
        $serverUrlInfo=$keyValue->where($where)->find();
        $serverUrl=$serverUrlInfo['value'];
        $this->assign('serverUrl', $serverUrl);
    }

//    //分页每页显示的条数
//    private $pageCount=6;



    //新闻列表
    public function newsList(){

        if(IS_POST)
        {
            //开始时间
            $startTime=I('startTime');
            $this->startTime=$startTime;

            //截止时间
            $endTime=I('endTime');
            $this->endTime=$endTime;

            //查询关键字
            $serachKey=I('post.serachKey');

            $news=M('news');

            $where['time']=array('elt',$endTime);
            $where['time']=array('egt',$startTime);
            $where['title'] =array('like',"%$serachKey%");

            //新闻总条数
            $count=$news->where($where)->count();
            $this->count=$count;

            //新闻总页数
            $pageNum=(int)($count/($this->pageCount))+1;
            $this->pageNum=$pageNum;

            $newsList=$news->where($where)
                ->page(1,$this->pageCount)
                ->field('content',true)
                ->order('time desc')
                ->select();

            $this->newsList=$newsList;
            $this->serachKey=$serachKey;

        }
        else
        {
            $news=M('news');
            $newsTime=$news->field('max(time) as lastTime,min(time) as earlyTime')->find();

            $this->endTime=$newsTime['lastTime'];
            $this->startTime=$newsTime['earlyTime'];

            $news=M('news');
            //新闻总条数
            $count=$news->count();
            $this->count=$count;

            //新闻总页数
            $pageNum=(int)($count/($this->pageCount))+1;
            $this->pageNum=$pageNum;


            $newsList=$news->page(1,$this->pageCount)
                ->field('content',true)
                ->order('time desc')
                ->select();

            $this->newsList=$newsList;

        }
        //第几页
        $this->page=1;

        $this->display();
    }


    //更多新闻
    public  function  moreNewsList()
    {
        //开始时间

        $startTime=I('startTime');

        //截止时间
        $endTime=I('endTime');

        //查询关键字
        $serachKey=I('post.serachKey');

        //页号
        $page=I('post.page');

        $news=M('news');

        $where['time']=array('elt',$endTime);
        $where['time']=array('egt',$startTime);
        $where['title'] =array('like',"%$serachKey%");

        $newsList=$news->where($where)
            ->page($page,$this->pageCount)
            ->field('content',true)
            ->order('time desc')
            ->select();

        $result=array();
        $result['page']=$page;
        $result['newsList']=$newsList;

        echo json_encode($result);
    }


    function getArray($node) {
        $array = false;

        if ($node->hasAttributes()) {
            foreach ($node->attributes as $attr) {
                $array[$attr->nodeName] = $attr->nodeValue;
            }
        }

        if ($node->hasChildNodes()) {
            if ($node->childNodes->length == 1) {
                $array[$node->firstChild->nodeName] = getArray($node->firstChild);
            } else {
                foreach ($node->childNodes as $childNode) {
                    if ($childNode->nodeType != XML_TEXT_NODE) {
                        $array[$childNode->nodeName][] = getArray($childNode);
                    }
                }
            }
        } else {
            return $node->nodeValue;
        }
        return $array;
    }

    //新闻详情
    public  function  newsDetailInfo()
    {
        $id=I("get.id");

        if(!empty($id))
        {
            $news=M('news');
            $newsInfo=$news->where('news.id='.$id)->find();
            $this->newsInfo=$newsInfo;

           $xmlstring='<?xml version="1.0" encoding="UTF-8"?><content>'.$newsInfo['content'].'</content>';
            $xml = simplexml_load_string($xmlstring);
            $content=array();
            if($xml)
            {
                foreach($xml->children() as $key=>$child)
                {
                    $value=$child.'';
                    $content[]=array("name"=>$child->getName(),"value"=>$value);
                }
            }
            else
            {
                $content=null;
            }

//            $this->newsContent=$content;
//            var_dump($content);
//            die();


            $news_comment=M('news_comment');
            $comList=$news_comment->where('newsId='.$id)->select();
            $this->comList=$comList;


            //新闻类型列表
            $newstype=M('newstype');
            $newstypeList=$newstype->query("select * from newstype where newstype.id!=0 order by newstype.index");

            $selectItems=array();
            foreach($newstypeList as $key=>$type ){

                $selectItems[$key]['name']=$type['name'];
                $selectItems[$key]['value']=$type['id'];
            }
            $this->selectList=$selectItems;

            $this->newsContent=json_encode($content);
//            var_dump($newsInfo);
//            var_dump($selectItems);
//            die();
            $this->display();
        }
    }

    //删除空格 转义字符替换
    function trimall($str)
    {
        $qian=array(" ","　","\t","\n","\r","&lt;","&gt;");$hou=array("","","","","","<",">");
        return str_replace($qian,$hou,$str);
    }

    //保存修改的新闻详情
    public  function  saveNewsEdit()
    {
        $news=M('news');
        $news->create();
        $id=$news->id;
        $newsCon=$news->content;
//        $newsCon=str_replace("&lt;","<",$newsCon);
//        $newsCon=str_replace("&gt;",">",$newsCon);
        $newsCon=$this->trimall($newsCon);
        $news->content=$newsCon;

        if($news->save()){
            $this->success('新闻详情修改成功!',U('News/newsDetailInfo',array('id'=>$id)));
        }else{
            $this->error('新闻详情情修改失败!');
        }
    }

    //添加新闻
    public function addNews()
    {
        if(IS_POST)
        {
            $news=M('news');
            $news->create();

            $newsCon=$news->content;
            $newsCon=$this->trimall($newsCon);
            $news->content=$newsCon;

            $result=$news->add();
            if($result){
                $this->success('新闻添加成功!',U('News/newsDetailInfo',array('id'=>$result)));
            }else{
                $this->error('新闻添加失败!');
            }
        }
        else
        {
            //新闻类型列表
            $newstype=M('newstype');
            $newstypeList=$newstype->query("select * from newstype where newstype.id!=0 order by newstype.index");

            $selectItems=array();
            foreach($newstypeList as $key=>$type ){

                $selectItems[$key]['name']=$type['name'];
                $selectItems[$key]['value']=$type['id'];
            }
            $this->selectList=$selectItems;

            $this->display();
        }
    }

    //新闻类型列表
    public function newsTypeList(){

        if(IS_POST)
        {

            var_dump($_POST);
            die();

        }
        else
        {
            $newstype=M('newstype');
            $newstypeList=$newstype->query("select * from newstype where newstype.id!=0 order by newstype.index ");
            $this->newstypeList=$newstypeList;
        }
        $this->display();
    }


    //新闻评论列表
    public function newsComList()
    {
//        news_commentnews_comment
        $this->display();
    }


}