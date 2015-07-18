<?php
namespace Admin\Controller;
use Think\Controller;
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
header("Cache-Control: no-cache, must-revalidate" );
class LoginController extends Controller {

    public function index(){

        $this->display();
    }

    //登陆检测
    public function checklogin()
    {
        if(!IS_POST)_404('页面不存在');

        $verify = I('Verify');

        if(!check_verify($verify)){
            $this->error('验证码输入有误！');
        }

        $manager = M('manager');
        $manager = $manager->where(array('username' => I('username')))->find();

        if (!$manager || $manager['password'] != md5(I('password'))) {
            $this->error('账号或者密码有误');
        }

        if($manager['dataState']==0){
            $this->error('登陆失败，你的账号已经被禁用，请联系管理员');
        }

        $role=M('role')->where("roleId=".$manager['roleId'])->getField('roleArr');
        $role_arr=explode(',',$role);
        $role_arr=array_filter($role_arr);

        $managerInfo=array('id'=>$manager['id'],'name'=>$manager['name'],'roleId'=>$manager['roleId'],'roleArr'=>$role_arr);

        session('managerInfo',$managerInfo);

        $this->success('登陆成功',U('Index/index'));
    }

    //验证码
    public function verify()
    {
        $verify = new \Think\Verify();
        $verify->fontSize = 18;
        $verify->imageL = "160";
        $verify->imageH = "45";
        $verify->entry(1);
    }
}