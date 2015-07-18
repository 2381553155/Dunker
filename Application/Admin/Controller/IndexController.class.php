<?php
namespace Admin\Controller;
use Common\Controller\AdminController;
use Think\Controller;
class IndexController extends AdminController {

    public function _initialize(){
        parent::_initialize();
        $this->assign('module_name', 'index');

    }

    public function index(){

        $system_info = array(
            'dn_version' => DN_VERSION . ' RELEASE '. DN_RELEASE,
            'server_domain' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]',
            'server_os' => PHP_OS,
            'web_server' => $_SERVER["SERVER_SOFTWARE"],
            'php_version' => PHP_VERSION,
            'mysql_version' => mysql_get_server_info(),
            'upload_max_filesize' => ini_get('upload_max_filesize'),
            'max_execution_time' => ini_get('max_execution_time') . '秒',
            'safe_mode' => (boolean) ini_get('safe_mode') ?  '是' : '否',
            'zlib' => function_exists('gzclose') ?  '是' : '否',
            'curl' => function_exists("curl_getinfo") ? '是' : '否',
            'timezone' => function_exists("date_default_timezone_get") ? date_default_timezone_get() : L('no')
        );
        $this->displayinfo();
        $this->display();
    }

    //退出
    public function logout()
    {
        session('managerInfo',null);
        $this->redirect('Login/index');
    }

    //修改密码
    public function editpwd(){
        if(IS_POST){

            $oldPw=I('post.oldPw');
            $newPw1=I('post.newPw1');
            $newPw2=I('post.newPw2');
//            var_dump($oldPw);
            if($newPw1!=$newPw2)
            {
                $this->error('两次密码不一致!');
            }
            else
            {
                $id=$_SESSION['managerInfo']['id'];
                $where['id']=$id;
                $where['password']=md5($oldPw);
                $manger=M('manager');
                $manger->id=$id;
                $mangerInfo=$manger->where($where)->select();
//                var_dump($mangerInfo);
//                die();
                if(count($mangerInfo)==0)
                {
                    $this->error('旧密码有误!');

                }else
                {
                    $manger->password=md5($newPw2);
                    if($manger->save())
                    {
                        $this->success('修改成功!',U('Login/index'));
                    }
                    else
                    {
                        $this->error('修改失败!');
                    }
                }
            }
        }
        else
        {
            $this->menu_arr[]=array('menu_name'=>'修改密码','menu_url'=>'Index/editpwd');
            $this->displayinfo();
            $this->display();
        }
    }


}