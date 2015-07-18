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
                    <a href="<?php echo U('User/index');?>">添加新闻</a>
                </li>
                <li>
                    <a href="<?php echo U('News/newsTypeList');?>">栏目管理</a>
                </li>
                <li>
                    <a href="<?php echo U('User/index');?>">评论管理</a>
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



<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo U('Index/index');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a href="" class="current">修改密码</a>
        </div>
    </div>
    <div class="container-fluid"><hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                        <h5>修改密码</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form action="<?php echo U('Index/editpwd');?>" id="form-wizard" class="form-horizontal" method="post">

                            <div id="form-wizard-1" class="step">

                                <div class="control-group">
                                    <label class="control-label">用户名:</label>
                                    <div class="controls">
                                        <input id="username"  readonly="readonly" value="<?php echo ($_SESSION['managerInfo']['name']); ?>" type="text" name="username" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">旧密码:</label>
                                    <div class="controls">
                                        <input id="password" type="password" name="oldPw" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">新密码:</label>
                                    <div class="controls">
                                        <input id="password2" type="password" name="newPw1" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">确认密码:</label>
                                    <div class="controls">
                                        <input id="password3" type="password" name="newPw2" />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"></label>
                                    <div class="controls">
                                        <input id="next" class="btn btn-danger" type="submit" value="修改" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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


<!--<script type="text/javascript" src="/wpadmin/Public/Admin/js/jquery-1.8.3.min.js" charset="UTF-8"></script>-->

<script type="text/javascript" src="/wpadmin/Public/Admin/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/wpadmin/Public/Admin/js/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>




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