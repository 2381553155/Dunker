<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;
class UserController extends AdminController {



    public function _initialize(){
        parent::_initialize();
        $this->assign('module_name', 'user');

        $keyValue=M('key_value');
        $where['key_value.key']='headIcoUrl';
        $headIcoUrlInfo=$keyValue->where($where)->find();
        $headIcoUrl=$headIcoUrlInfo['value'];


//        var_dump($headIcoUrl);
//        die();
        $this->assign('headIcoUrl', $headIcoUrl);

    }

    //用户头像存储地址
    private $headIcoUrl;

    //查询选项
    private $selectItems=array(
        array('name'=>'显示所有用户','value'=>1),
        array('name'=>'显示解锁用户','value'=>2),
        array('name'=>'显示禁用账号','value'=>3)
    );


//    //分页每页显示的条数
//    private $pageCount=6;


    //用户列表
    public function userList(){

        if(IS_POST)
        {
            //查询关键字
            $serachKey=I('post.serachKey');

            //查询选项 显示所有用户 显示解锁用户 显示禁用账号
            $select=I('post.select');
            $this->selectedItem=(int)$select;


            $user=M('user');

            $where['name'] = $serachKey;
            $where['nickname'] =array('like',"%$serachKey%");
            $where['_logic'] = 'or';

            if($select==2)
            {
                $map['_complex']=$where;
                $map['dataState'] = 1;

            }else if($select==3) {
                $map['_complex']=$where;
                $map['dataState'] = 0;
            }else
            {
                $map['_complex']=$where;
            }

            $userList=$user->where($map)->page(1,$this->pageCount)->select();
            $this->userList=$userList;
            $this->serachKey=$serachKey;

        }
        else
        {
            $user=M('user');
            $userList=$user->page(1,$this->pageCount)->select();
            $this->userList=$userList;
            $this->selectedItem=0;
        }

        //操作选项列表 显示所有用户 显示解锁用户 显示禁用账号
        $this->selectList=$this->selectItems;

        //第几页
        $this->page=1;

        $this->display();
    }

    public  function  moreUserList()
    {
        //查询关键字
        $serachKey=I('post.serachKey');

        //查询选项 显示所有用户 显示解锁用户 显示禁用账号
        $select=I('post.select');

        //页号
        $page=I('post.page');

        $user=M('user');

        $where['name'] = $serachKey;
        $where['nickname'] =array('like',"%$serachKey%");
        $where['_logic'] = 'or';

        if($select==2)
        {
            $map['_complex']=$where;
            $map['dataState'] = 1;

        }else if($select==3) {
            $map['_complex']=$where;
            $map['dataState'] = 0;
        }else
        {
            $map['_complex']=$where;
        }
        $userList=$user->where($map)->page($page,$this->pageCount)->select();
        echo json_encode($userList);
    }

    //禁止用户
    public function lockUser()
    {
        $id=I('post.id');
        if(!empty($id))
        {
            $user=M('user');
            $user->id=$id;
            $user->dataState=0;

            if($user->save())
            {
                ECHO 1;
            }
            else
            {
                ECHO 0;
            }
        }
        else
        {
            ECHO 0;
        }
    }


    //解锁用户
    public function unlockUser()
    {
        $id=I('post.id');
        if(!empty($id))
        {
            $user=M('user');
            $user->id=$id;
            $user->dataState=1;

            if($user->save())
            {
                ECHO 1;
            }
            else
            {
                ECHO 0;
            }
        }
        else
        {
            ECHO 0;
        }
    }


    //用户详细信息
    public  function  detailUserInfo()
    {
        $id=I('get.id');
        if(!empty($id))
        {
            $user=M('user');
            $where['id']=$id;

            $userInfo=$user->where($where)->find();
            $this->userInfo=$userInfo;

            $loginLog=M('user_login_log');
            $loginLogTime=$loginLog->field('max(time) as lastTime,min(time) as earlyTime')->find();

            $this->endTime=$loginLogTime['lastTime'];
            $this->startTime=$loginLogTime['earlyTime'];

            $this->display();
        }
    }

    //登陆记录
    public  function userLoginLog($p=1)
    {
        //查询关键字
        $serachKey=I('serachKey');
        $this->serachKey=$serachKey;

        //开始时间
        $startTime=I('startTime');
        $this->startTime=$startTime;

        //截止时间
        $endTime=I('endTime');
        $this->endTime=$endTime;

        $p=I('p');

        if(empty($p))
        {
            $p=1;
        }

        $this->pIndex=($p-1);

        if(IS_POST||(count($_GET)>1))
        {
            $wherePre[]=array("user_login_log.userId=user.id");
            $wherePre[]=array(" (user.nickname LIKE '%".$serachKey."%' OR user.name='".$serachKey."' ) ","AND");
            $wherePre[]=array("user_login_log.time>='".$startTime."'","AND");
            $wherePre[]=array("user_login_log.time<='".$endTime."' ","AND");
            $where=whereStr($wherePre);

            $userLoginLog=page_table('user_login_log,user','user_login_log.time desc',$this->pageCount,$where);

        }
        else
        {

            $loginLog=M('user_login_log');
            $loginLogTime=$loginLog->field('max(time) as lastTime,min(time) as earlyTime')->find();

            $this->endTime=$loginLogTime['lastTime'];
            $this->startTime=$loginLogTime['earlyTime'];

            $userLoginLog=page_table('user_login_log,user','user_login_log.time desc',$this->pageCount,'user_login_log.userId=user.id');
        }


        $loginLogList=$userLoginLog['result'];
        $this->loginLogList=$loginLogList;
        $this->page=$userLoginLog['show'];


        $this->pCount=$this->pageCount;
        $this->amap=$this->amapKey;

        $this->display();
    }

    //得分记录
    public  function pointLog($p=1)
    {
        //查询关键字
        $serachKey=I('serachKey');
        $this->serachKey=$serachKey;

        //开始时间
        $startTime=I('startTime');
        $this->startTime=$startTime;

        //截止时间
        $endTime=I('endTime');
        $this->endTime=$endTime;

        $p=I('p');

        if(empty($p))
        {
            $p=1;
        }

        $this->pIndex=($p-1);

        if(IS_POST||(count($_GET)>1))
        {
            $wherePre[]=array("points_log.userId=user.id");
            $wherePre[]=array(" (user.nickname LIKE '%".$serachKey."%' OR user.name='".$serachKey."' ) ","AND");
            $wherePre[]=array("points_log.time>='".$startTime."'","AND");
            $wherePre[]=array("points_log.time<='".$endTime."' ","AND");
            $where=whereStr($wherePre);

            $pointLog=page_table('points_log,user','points_log.time desc',$this->pageCount,$where);

        }
        else
        {

            $Log=M('points_log');
            $pointLogTime=$Log->field('max(time) as lastTime,min(time) as earlyTime')->find();

            $this->endTime=$pointLogTime['lastTime'];
            $this->startTime=$pointLogTime['earlyTime'];

            $pointLog=page_table('points_log,user','points_log.time desc',$this->pageCount,'points_log.userId=user.id');
        }


        $pointLogList=$pointLog['result'];
        $this->pointLogList=$pointLogList;
        $this->page=$pointLog['show'];

        $this->pCount=$this->pageCount;
        $this->amap=$this->amapKey;

        $this->display();
    }
}