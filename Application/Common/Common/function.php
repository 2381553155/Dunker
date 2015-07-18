<?php
use Org\Util\Category;
/*公用函数库*/

/**
 * 检测验证码
 * @param  integer $id 验证码ID
 * @return boolean     检测结果
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
function check_verify($code, $id = 1){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}

/*
*where 语句 字符串拼接 封装
*/
function whereStr( $where=array())
{

    $whereStr='';
    for($i=0;$i<count($where);$i++)
    {
        if($i==0)
        {
            $whereStr.=" ".$where[$i][0]." ";

        }else
        {
            $whereStr.=" ".$where[$i][1]." ";
            $whereStr.=" ".$where[$i][0]." ";
        }
    }
    return $whereStr;
}


/*
*Page分页封装
*/
function page($mode, $order='',$group='', $pagesize = 10, $relation = false, $where=''){
    if (isset($mode)&&!empty($mode)) {
        if ($relation) {
            if (!empty($where)) {
               $count = D($mode)->where($where)->count(); 
            }
            else
            {
                $count = D($mode)->count();
            }
			
            $page = new \Common\Org\Util\Page($count, $pagesize);
            //import('ORG.Util.Page');       //导入分页类
            //$page = new Page($count, $pagesize);
            if (!empty($order)) {
                if (!empty($where)) {
                    $result = D($mode)->relation(true)->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
                }
                else
                {
                    $result = D($mode)->relation(true)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
                }
            }
            else
            {
                if (!empty($where)) {
                    $result = D($mode)->relation(true)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
                }
                else
                {
                    $result = D($mode)->relation(true)->limit($page->firstRow.','.$page->listRows)->select();
                }
            }
        }
        else
        {
            if (!empty($where)) {
                if(!empty($group)){
                    $data = M($mode)->group($group)->where($where)->select();
                    $count=count($data);
                }else{
                    $count = M($mode)->where($where)->count();
                }
            }
            else
            {
                if(!empty($group)){
                    $data = M($mode)->group($group)->select();
                    $count=count($data);
                }else{
                    $count = M($mode)->count();
                }
            }
            
            $page = new \Common\Org\Util\Page($count, $pagesize);
            foreach($_GET as $key=>$val){
                $map[$key]=$val;

            }
            foreach($_POST as $key=>$val){
                $map[$key]=$val;

            }
            foreach($map as $key=>$val) {
                $page->parameter   .=   "$key=".urlencode($val).'&';
            }
            //import('ORG.Util.Page');       //导入分页类
            //$page = new Page($count, $pagesize);
            if (!empty($order)) {
                if (!empty($where)) {
                    if(!empty($group)){
                        $result = M($mode)->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->group($group)->select();
                    }else{
                        $result = M($mode)->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
                    }
                }
                else
                {
                    if(!empty($group)){
                        $result = M($mode)->order($order)->limit($page->firstRow.','.$page->listRows)->group($group)->select();
                    }else{
                        $result = M($mode)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
                    }

                }
            }
            else
            {
                if (!empty($where)) {
                    if(!empty($group)){
                        $result = M($mode)->where($where)->limit($page->firstRow.','.$page->listRows)->group($group)->select();
                    }else{
                        $result = M($mode)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
                    }
                }
                else
                {
                    if(!empty($group)){
                        $result = M($mode)->limit($page->firstRow.','.$page->listRows)->group($group)->select();
                    }else {
                        $result = M($mode)->limit($page->firstRow . ',' . $page->listRows)->select();
                    }
                }     
            }
        }
        $page->rollPage = 5;
        $page->setConfig('theme', '<ul> %upPage%  %first%  %prePage%  %linkPage%  %downPage% %nextPage% %end%<li><span>%totalRow% %header% %nowPage%/%totalPage% 页</span></li></ul>');
        return array('result' =>$result , 'page'=>$page->show(),'sql'=>D($mode)->getlastSql());
    }
    return array('result' =>array(),'page'=>'');
}

function oddOrEven($val)
{
    $result=$val%2;
    return $result;
}

function subtext($text, $length)
 {
    if(mb_strlen($text, 'utf8') > $length) 
    return mb_substr($text, 0, $length, 'utf8').'...';
    return $text;
 }

function _get_client_ip() {
    $ip = $_SERVER['REMOTE_ADDR'];
    if (isset($_SERVER['HTTP_CLIENT_IP']) && preg_match('/^([0-9]{1,3}\.){3}[0-9]{1,3}$/', $_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR']) AND preg_match_all('#\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}#s', $_SERVER['HTTP_X_FORWARDED_FOR'], $matches)) {
        foreach ($matches[0] AS $xip) {
            if (!preg_match('#^(10|172\.16|192\.168)\.#', $xip)) {
                $ip = $xip;
                break;
            }
        }
    }
    return $ip;

}

function getIP()
{
    $realip='';
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
}

    function getjson($arr){

        return urldecode(json_encode($arr));
    }

//table查询分页封装
function page_table($table_arr=array(),$order='',$num,$where){

    if($order!=""){

        $count=M()->table($table_arr)->where($where)->order($order)->count();
        $page = new \Common\Org\Util\Page($count, $num);
        foreach($_GET as $key=>$val){
            $map[$key]=$val;

        }
        foreach($_POST as $key=>$val){
            $map[$key]=$val;

        }
        foreach($map as $key=>$val) {
            $page->parameter   .=   "$key=".urlencode($val).'&';
        }

//        $page->setConfig('theme', '<ul><li><span>%totalRow% %header% %nowPage%/%totalPage% 页</span></li> %upPage%  %first%  %prePage%  %linkPage%  %downPage% %nextPage% %end%</ul>');
        $page->setConfig('theme', '<ul> %upPage%  %first%  %prePage%  %linkPage%  %downPage% %nextPage% %end%<li><span>%totalRow% %header% %nowPage%/%totalPage% 页</span></li></ul>');

        $list=M()->table($table_arr)->where($where)->order($order)->limit($page->firstRow.','.$page->listRows)->select();
        $show=$page->show();
    }else{
        $count=M()->table($table_arr)->where($where)->count();
        $page = new \Common\Org\Util\Page($count, $num);
        foreach($_GET as $key=>$val){
            $map[$key]=$val;

        }
        foreach($_POST as $key=>$val){
            $map[$key]=$val;

        }
        foreach($map as $key=>$val) {
            $page->parameter   .=   "$key=".urlencode($val).'&';
        }
        $page->setConfig('theme', '<ul> %upPage%  %first%  %prePage%  %linkPage%  %downPage% %nextPage% %end%<li><span>%totalRow% %header% %nowPage%/%totalPage% 页</span></li></ul>');

//        $page->setConfig('theme', '<ul><li><span>%totalRow% %header% %nowPage%/%totalPage% 页</span></li> %upPage%  %first%  %prePage%  %linkPage%  %downPage% %nextPage% %end%</ul>');
        $list=M()->table($table_arr)->where($where)->limit($page->firstRow.','.$page->listRows)->select();
        $show=$page->show();
    }
    return array('result'=>$list,'show'=>$show);
}

function getcity($pid){

    return M('region')->where("id=$pid")->getField('name');
}

function getsq($id){

    return M('commerce_circle')->where("cm_id=$id")->getField('cm_name');
}


function getstr($str,$table){

    $item='';
    $arr=explode(',',$str);
    foreach($arr as $val){
        if(!empty($val)){
        $item.=M($table)->where("item_id=$val")->getField('item_name').' ';
        }
    }

    return $item;
}
function put_file_x($path,$byte){

    $byte = str_replace(' ','',$byte);   //处理数据
    $byte = str_ireplace("<",'',$byte);
    $byte = str_ireplace(">",'',$byte);
    $byte=pack("H*",$byte);     	 //16进制转换成二进制
    $file =tempnam_sfx($path, ".png");
    $handle  =  fopen ( $file ,  "w" );
    fwrite ( $handle ,$byte);
    fclose ( $handle );
    return $file;
}

function put_file_x1($path,$byte){

    $byte = str_replace(' ','',$byte);   //处理数据
    $byte = str_ireplace("<",'',$byte);
    $byte = str_ireplace(">",'',$byte);
    $byte=file_get_contents($byte);
    $file =tempnam_sfx($path, ".mp4");
    $handle  =  fopen ( $file ,  "w" );
    fwrite ( $handle ,$byte);
    fclose ( $handle );
    return $file;
}

function tempnam_sfx($path, $suffix){
    do{
        $file = $path."/".mt_rand().$suffix;
        $fp = @fopen($file, 'x');
    }
    while(!$fp);

    fclose($fp);
    return $file;
}

function random($length = 6 , $numeric = 0) {
    PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
    if($numeric) {
        $hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
    } else {
        $hash = '';
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789abcdefghjkmnpqrstuvwxyz';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
    }
    return $hash;
}




function xml_to_array($xml){
    $reg = "/<(\w+)[^>]*>([\\x00-\\xFF]*)<\\/\\1>/";
    if(preg_match_all($reg, $xml, $matches)){
        $count = count($matches[0]);
        for($i = 0; $i < $count; $i++){
            $subxml= $matches[2][$i];
            $key = $matches[1][$i];
            if(preg_match( $reg, $subxml )){
                $arr[$key] = xml_to_array( $subxml );
            }else{
                $arr[$key] = $subxml;
            }
        }
    }
    return $arr;
}


function Post($curlPost,$url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_NOBODY, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
    $return_str = curl_exec($curl);
    curl_close($curl);
    return $return_str;
}

function getCoordinate($content,$ct){

    $address=$content;
    $json=file_get_contents("http://api.map.baidu.com/geocoder?address=".trim($address)."&output=json&key=96980ac7cf166499cbbcc946687fb414");
    $infolist=json_decode($json);
    $array=array('errorno'=>'1');
    if(isset($infolist->result->location) && !empty($infolist->result->location)){
        $array=array(
            'lng'=>$infolist->result->location->lng,
            'lat'=>$infolist->result->location->lat,
            'errorno'=>'0'
        );
    }
    return json_encode($array);
}

function getdistance($lng1,$lat1,$lng2,$lat2){
    //将角度转为狐度
    $radLat1=deg2rad($lat1);//deg2rad()函数将角度转换为弧度
    $radLat2=deg2rad($lat2);
    $radLng1=deg2rad($lng1);
    $radLng2=deg2rad($lng2);
    $a=$radLat1-$radLat2;
    $b=$radLng1-$radLng2;
    $s=2*asin(sqrt(pow(sin($a/2),2)+cos($radLat1)*cos($radLat2)*pow(sin($b/2),2)))*6378.137*1000;
    return $s;
}

function getaddress($arr=array()){

    $data['id']=array('in',$arr);
    return M('region')->where($data)->getField('name',true);

}

function uploadfile($type=array()){

    $upload = new \Think\Upload();// 实例化上传类
    $upload->maxSize   =     31457289999999999 ;// 设置附件上传大小
    $upload->exts      =     $type;// 设置附件上传类型
    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
    $upload->savePath  =     'file/'; // 设置附件上传（子）目录
    $upload->autoSub=false;
    $info   =   $upload->upload();
    if($info){
        return array('info'=>$info,'status'=>1);
    }else{
        return array('info'=>$upload->getError(),'status'=>0);
    }
}

function del_data($table,$id,$val){

    $data[$id]=array('in',$val);
    if(M($table)->where($data)->delete()){
        return true;
    }else{
        return false;
    }
}

function add_history($user_id,$content,$o_type){
    $data['content']=$content;
    $data['user_id']=$user_id;
    $data['oj_add_time']=time();
    $data['o_type']=$o_type;
    if(M('operate_journal')->add($data)){
        return true;
    }else{
        return false;
    }

}

function count_arr($arr=array()){

    return count($arr);
}




