<?php 
namespace Common\Controller;
use Org\Util\Rbac;
use Org\Util\Category;
use Think\Controller;
use Common\Org\Util\Page;
header("Content-Type:text/html;Charset=utf-8");
/**
* 管理后台控制器
*/
class AdminController extends Controller
{

    //分页每页显示的条数
    public  $pageCount=8;

    //高的地图的 Key 值
    public $amapKey="cd4c264e912f4603741a58cda6f98e90";

    public $menu_arr=array(
        array('menu_name'=>'首页','menu_url'=>'Index/index')
    );

	public function _initialize()
	{
        if(!isset($_SESSION['managerInfo'])||empty($_SESSION['managerInfo'])){
            $this->error('请先登录',U('Login/index'));
        }

        $role_arr=$_SESSION['managerInfo']['roleArr'];
        $data['id']=array('in',$role_arr);
        $menu=M('menu')->where($data)->select();
        foreach($menu as $key=>$val){
            $count=0;
            foreach($menu as $vl){
                if($val['pid']==0){
                    if($val['id']==$vl['pid']){
                        $menu[$key]['count']=M('menu')->where("pid=".$val['id'])->count();
                        $count++;
                        $menu[$key]['count']=$count;
                    }
                }
            }
        }
//        var_dump($menu);
//        die();
        $this->menu=$menu;
        $this->menu1=$menu;

	}

    public function displayinfo(){

        $menu_arr=$this->menu_arr;
        $this->menu_arr1=$menu_arr;
    }
}
