<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <title>蹲客后台管理系统</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/bootstrap.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/fullcalendar.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/matrix-style.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/matrix-media.css" />
    <link href="/wpadmin/Public/Admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/jquery.gritter.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/datepicker.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/colorpicker.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/uniform.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/select2.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/bootstrap-wysihtml5.css" />

    <link href="/wpadmin/Public/Admin/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">


    <link type="text/css" href="/wpadmin/Public/Admin/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
    <!--<link type="text/css" href="/wpadmin/Public/Admin/css/font-awesome.min.css" rel="stylesheet" />-->
    <!--<link href="/wpadmin/Public/Admin/css/docs.css" rel="stylesheet">-->
    <link href="/wpadmin/Public/Admin/css/prettify.css" rel="stylesheet">

</head>
<body onload="load()">

<!--Header-part-->
<div id="header">
    <h1><a href="">蹲客后台管理系统</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">你好 <?php echo ($_SESSION['managerInfo']['name']); ?></span><b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo U('Index/editpwd');?>"><i class="icon-edit"></i>修改密码</a></li>
            </ul>
        </li>
        <li class=""><a title="" href="<?php echo U('Index/logout');?>"><i class="icon icon-share-alt"></i> <span class="text">退出登录</span></a></li>
    </ul>
</div>

<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar">
	<a href="<?php echo U('Index/index');?>" class="visible-phone"><i class="icon icon-home"></i>首頁</a>
	<ul>
		<li <?php if(($module_name) == "index"): ?>class="active"<?php endif; ?>>
			<a href="<?php echo U('Index/index');?>"><i class="icon icon-home"></i><span>首頁</span></a>
		</li>

		<li class='submenu optn <?php if(($module_name) == "user"): ?>active open<?php endif; ?>'>
			<a href="javascript:;">
				<i class="icon icon-user"></i>
				<span>用户管理</span>
				<span class="label label-important">3</span>
			</a>
			<ul>
				<li>
					<a href="<?php echo U('User/userList');?>">用户列表</a>
				</li>
				<li>
					<a href="<?php echo U('User/userLoginLog');?>">登陆记录</a>
				</li>
				<li>
					<a href="<?php echo U('User/pointLog');?>">积分记录</a>
				</li>
			</ul>
		</li>

		<li class='submenu optn <?php if(($module_name) == "forecast"): ?>active open<?php endif; ?>'>
			<a href="javascript:;">
				<i class="icon icon-map-marker"></i>
				<span>公厕管理</span>
				<span class="label label-important">2</span>
			</a>
			<ul>
				<li>
					<a href="<?php echo U('Forecast/index');?>">公厕列表</a>
				</li>
                <li>
                    <a href="<?php echo U('Forecast/index');?>">公厕评论</a>
                </li>
			</ul>
		</li>

		<li class='submenu optn <?php if(($module_name) == "news"): ?>active open<?php endif; ?>'>
			<a href="javascript:;">
				<i class="icon icon-th-list"></i>
				<span>新闻管理</span>
				<span class="label label-important">4</span>
			</a>
			<ul>
				<li>
					<a href="<?php echo U('News/newsList');?>">新闻列表</a>
				</li>
                <li>
                    <a href="<?php echo U('News/addNews');?>">添加新闻</a>
                </li>
                <li>
                    <a href="<?php echo U('News/newsTypeList');?>">栏目管理</a>
                </li>
                <li>
                    <a href="<?php echo U('News/newsComList');?>">评论列表</a>
                </li>
			</ul>
		</li>

		<li class='submenu optn <?php if(($module_name) == "build"): ?>active open<?php endif; ?>'>
			<a href="javascript:;">
				<i class="icon icon-road"></i>
				<span>反馈管理</span>
				<span class="label label-important">1</span>
			</a>
			<ul>
				<li>
					<a href="<?php echo U('Build/index');?>">反馈列表</a>
				</li>
			</ul>
		</li>

		<li class='submenu optn <?php if(($module_name) == "power"): ?>active open<?php endif; ?>'>
			<a href="javascript:;">
				<i class="icon icon-wrench"></i>
				<span>权限管理</span>
				<span class="label label-important">1</span>
			</a>
			<ul>
				<li>
					<a href="<?php echo U('Power/index');?>">角色管理</a>
				</li>
			</ul>
		</li>


  </ul>

  <!--<ul>-->
		<!--<li <?php if(($module_name) == "index"): ?>class="active"<?php endif; ?>>-->
			<!--<a href="<?php echo U('Index/index');?>"><i class="icon icon-home"></i><span>首頁</span></a>-->
		<!--</li>-->
		<!--<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?>-->
			<!--<?php if($vl['pid'] == 0): ?>-->
			<!--<li class='submenu optn <?php if(($module_name) == $vl["active"]): ?>active open<?php endif; ?>'>-->
			<!--<?php endif; ?>-->
				<!--<a href="javascript:;">-->
				<!--<?php if($vl['pid'] == 0): ?>-->
					<!--<i class="icon <?php echo ($vl['class']); ?>"></i>-->
					<!--<span><?php echo ($vl['name']); ?></span>-->
					<!--<span class="label label-important"><?php echo ($vl['count']); ?></span>-->
					<!--<?php endif; ?>-->
				<!--</a>-->
				<!--<ul>-->
					<!--<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
					<!--<?php if($vl['id'] == $vo['pid']): ?>-->
						<!--<li>-->
							<!--<a href="<?php echo U($vo['model'].'/'.$vo['action']);?>"><?php echo ($vo['name']); ?></a>-->
						<!--</li>-->
					<!--<?php endif; ?>-->
					<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
				<!--</ul>	-->
			<!--</li>-->
		<!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
<!--</ul> -->
</div>

<!--close sidebar-menu-->



<!--弹窗提示框 开始-->
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">提示信息</h3>
    </div>
    <div class="modal-body">
        <p class="error-text" id="dialogMessage">确认禁用该账户？</p>
    </div>
    <div class="modal-footer">
        <button class="btn" id="dialogCancelButton" onclick="dialogCancle()" data-dismiss="modal" aria-hidden="true">取消</button>
        <button  id="dialogEnsureButton" onclick="dialogEnsure()" class="btn btn-danger">确认</button>
    </div>
</div>
<!--弹窗提示框 结束-->

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo U('Index/index');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a>用户管理</a>
            <a href="<?php echo U('User/userlist');?>" title="用户列表" class="tip-bottom"><i class="icon-group"></i>用户列表</a>
            <a href="" class="current">用户详情</a>
        </div>
    </div>



    <div class="container-fluid" >
        <div class="row-fluid" style="margin-top: 0px;">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG1">
                        <span class="icon"><i class="icon-chevron-down"></i></span>
                        <!--<button class="btn btn-success">返回用户列表</button>-->
                        <h5   >
                            <li class="icon-user" style="margin-right: 10px;"></li>
                            <span ><?php echo ($userInfo['nickname']); ?></span>
                        </h5>
                    </div>

                    <div class="control-group" >
                        <label >
                            <a href="<?php echo U("User/userList");?>" class="btn btn-success">
                                <li  class="icon icon-chevron-left" style="margin-right: 10px;"></li>返回用户列表
                            </a>
                        </label>
                    </div>

                    <div  class="widget-content nopadding in collapse" id="collapseG1" style="height: auto;">
                        <div class="span4 offset4">
                                <div class="widget-content nopadding">
                                    <div style="text-align: center;">
                                        <img  style="width: 150px;height: 150px;margin-top: 10px;margin-bottom: 10px;" src="<?php echo ($headIcoUrl); echo ($userInfo['headIco']); ?>" >
                                        <hr>
                                    </div>


                                    <div class="control-group">
                                        <label >
                                            <span style="color: #27A9E3;margin-right: 10px;">
                                                <strong><li class="icon-bookmark" style="margin-right: 10px;"></li>ID号:</strong>
                                            </span>
                                            <span><?php echo ($userInfo['id']); ?> </span>
                                        </label>
                                        <hr>
                                    </div>


                                    <div class="control-group">
                                        <label >
                                                <span style="color: #27A9E3;margin-right: 10px;">
                                                    <strong><li class="icon-key" style="margin-right: 10px;"></li>账号:</strong>
                                                </span>
                                            <span><?php echo ($userInfo['name']); ?> </span>
                                        </label>
                                        <label style="text-align: center;">
                                            <?php if($userInfo['isVerify'] == 0): ?><span class="badge badge-important">邮箱还未验证!</span>
                                                <?php else: ?>
                                                <span class="badge  label-info">邮箱已验证!</span><?php endif; ?>
                                        </label>
                                        <hr>
                                    </div>

                                    <div class="control-group">
                                        <label >
                                                    <span style="color: #27A9E3;margin-right: 10px;">
                                                        <strong><li class="icon-tags" style="margin-right: 10px;"></li>昵称:</strong>
                                                    </span>
                                            <span><?php echo ($userInfo['nickname']); ?> </span>
                                            <?php if($userInfo['countChangeName'] == 0): ?><span class="badge  label-info">已锁定</span>
                                                <?php else: ?>
                                                <span class="badge badge-important" title="用户还可修改昵称">未锁定</span><?php endif; ?>

                                        </label>
                                        <hr>
                                    </div>

                                    <div class="control-group">
                                        <label >
                                            <span style="color: #27A9E3;margin-right: 10px;">
                                                <strong><li class=" icon-time" style="margin-right: 10px;"></li>注册时间:</strong>
                                            </span>
                                            <span><?php echo ($userInfo['regdate']); ?> </span>
                                        </label>
                                        <hr>
                                    </div>

                                    <div class="control-group">
                                        <label >
                                            <span style="color: #27A9E3;margin-right: 10px;">
                                                <strong><li class=" icon-cloud" style="margin-right: 10px;"></li>积分:</strong>
                                            </span>
                                            <span class="badge badge-warning"><?php echo ($userInfo['points']); ?> 坨粑粑</span>
                                            <a href="" style="border-radius: 15px;" class="btn btn-primary"><li class="icon icon-calendar" style="margin-right: 10px;"></li>查看积分记录</a>

                                        </label>
                                        <hr>
                                    </div>

                                    <div class="control-group">
                                        <label >
                                            <span style="color: #27A9E3;margin-right: 10px;">
                                                <strong><li class=" icon-dashboard" style="margin-right: 10px;"></li>等级:</strong>
                                            </span>
                                            <span class="badge badge-inverse">一级 粑粑</span>
                                        </label>
                                        <hr>
                                    </div>

                                    <div class="control-group">
                                        <label >
                                            <span style="color: #27A9E3;margin-right: 10px;">
                                                <strong><li class="  icon-pencil" style="margin-right: 10px;"></li>签名:</strong>
                                            </span>
                                        </label>
                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo ($userInfo['personalNote']); ?> </span>
                                        <hr>
                                    </div>

                                    <div class="control-group">
                                        <label >
                                            <span style="color: #27A9E3;margin-right: 10px;">
                                                <strong><li class="  icon-hand-up" style="margin-right: 10px;"></li>状态:</strong>
                                            </span>
                                            <span>
                                                <?php if($userInfo['dataState'] == 0): ?><span id="stateSpan" class="badge badge-important">禁用中!</span>
                                                    <button id="stateBtn" onclick="unlockUser(<?php echo ($userInfo['id']); ?>)" style="border-radius: 15px;" class="btn btn-primary"><li id="stateLi" class="icon icon-unlock" style="margin-right: 10px;"></li>解除禁用</button>
                                                    <?php else: ?>
                                                    <span id="stateSpan" class="badge badge-info">使用中!</span>
                                                    <button id="stateBtn" onclick="lockUser(<?php echo ($userInfo['id']); ?>)" style="border-radius: 15px;" class="btn btn-danger"><li id="stateLi" class="icon icon-lock" style="margin-right: 10px;"></li>禁用账号</button><?php endif; ?>
                                            </span>
                                        </label>
                                        <hr>
                                    </div>

                                    <div class="control-group" style="text-align: center;">
                                        <label >
                                            <form target="userLoginLog<?php echo ($userInfo['id']); ?>" name='form1' action="<?php echo U('User/userLoginLog');?>" method='post'>

                                                <input type='hidden' name="serachKey" value="<?php echo ($userInfo['nickname']); ?>"/>
                                                <input type='hidden' name="startTime" value="<?php echo ($startTime); ?>"/>
                                                <input type='hidden' name="endTime" value="<?php echo ($endTime); ?>"/>

                                                <a  href="javascript:document.form1.submit();" style="border-radius: 15px;" class="btn btn-success">
                                                    <li  class="icon icon-reorder" style="margin-right: 10px;"></li>查看登陆记录
                                                </a>
                                            </form>
                                        </label>
                                        <hr>
                                    </div>

                                </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!--<div class="container-fluid">-->
        <!--<div class="row-fluid">-->
            <!--<div style="  text-align: center;" class="span12">-->
                <!--<input id="moreUserList"  style=" width: 15%;background: rgb(46, 54, 63);" onclick="moreUserList()" class="btn btn-primary" type="button" value="显示更多" />-->
            <!--</div>-->
        <!--</div>-->
    <!--</div>-->

</div>

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> <a>2015-05-03 &copy; WP "而有一条路一定是对的，那就是努力变好，好好工作，好好生活，好好做自己"</a></div>
</div>

<!--end-Footer-part-->
<script src="/wpadmin/Public/Admin/js/excanvas.min.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.min.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.ui.custom.js"></script>
<script src="/wpadmin/Public/Admin/js/bootstrap.min.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.flot.min.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.flot.resize.min.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.peity.min.js"></script>
<script src="/wpadmin/Public/Admin/js/fullcalendar.min.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.dashboard.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.gritter.min.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.interface.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.chat.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.validate.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.form_validation.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.wizard.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.uniform.js"></script>
<script src="/wpadmin/Public/Admin/js/select2.min.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.popover.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.dataTables.min.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.tables.js"></script>


<script src="/wpadmin/Public/Admin/js/bootstrap-colorpicker.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.toggle.buttons.html"></script>
<script src="/wpadmin/Public/Admin/js/masked.js"></script>
<script src="/wpadmin/Public/Admin/js/jquery.uniform.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.form_common.js"></script>
<script src="/wpadmin/Public/Admin/js/wysihtml5-0.3.0.js"></script>
<script src="/wpadmin/Public/Admin/js/bootstrap-wysihtml5.js"></script>

<!--<script src="/wpadmin/Public/Admin/js/jquery.min.js"></script>-->
<script src="/wpadmin/Public/Admin/js/jquery-2.0.3.min.js"></script>

<!--<script type="text/javascript" src="/wpadmin/Public/Admin/js/jquery-1.8.3.min.js" charset="UTF-8"></script>-->

<script type="text/javascript" src="/wpadmin/Public/Admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/wpadmin/Public/Admin/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>


<script src="/wpadmin/Public/Admin/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
<script src="/wpadmin/Public/Admin/js/prettify.js" type="text/javascript"></script>
<script src="/wpadmin/Public/Admin/js/docs.js" type="text/javascript"></script>
<script src="/wpadmin/Public/Admin/js/demo.js" type="text/javascript"></script>



<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage (newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-" ) {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>
</body>
</html>


<script>



function showDialog(model,message){

    if(model==1)//对话框模式1 只有确认按钮
    {
        $('#dialogCancelButton').css('display','none');
        $('#dialogEnsureButton').css('background','blue');
        $('#dialogMessage').html(message);

        $('.modal').modal('show').on('shown',function(){
        })
    }
    else if(model==2) //对话框模式2 带有 确认 和 取消 按钮
    {
        $('#myModal').modal('show')
        $('#dialogCancelButton').show();
        $('#dialogEnsureButton').css('background','blue');
        $('#dialogMessage').html(message);

        $('.modal').modal('show').on('shown',function(){
        })
    }
}

//禁止或解锁用户的flag
//0 为禁止 1为解锁
isLockOrUnLock=1;

//用户id号
userId=0;

//对话框 点击 确认 后的操作
function dialogEnsure()
{
    $('.modal').modal('hide');
    if(isLockOrUnLock==0)
    {
        $.ajax({
            url:'<?php echo U("lockUser");?>',
            type:'post',
            data:'id='+userId,
            success:function(e){

                if(e==1){

                    location.reload();

                }else{
                    return false;
                }
            }
        });
    }else
    {
        $.ajax({
            url:'<?php echo U("unlockUser");?>',
            type:'post',
            data:'id='+userId,
            success:function(e){

                if(e==1){

                    location.reload();

                }else{
                    return false;
                }
            }
        });
    }
}

//对话框 点击 取消 后的操作
function dialogCancle()
{

}

//禁止用户
function lockUser(id)
{
    showDialog(2,'确认禁止该账户?');
    isLockOrUnLock=0;
    userId=id;
}

//解锁用户
function unlockUser(id)
{
    showDialog(2,'确认解锁该账户?');
    isLockOrUnLock=1;
    userId=id;
}

</script>