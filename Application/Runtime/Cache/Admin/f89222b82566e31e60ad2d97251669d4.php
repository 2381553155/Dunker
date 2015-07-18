<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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




<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo U('Index/index');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a>用户管理</a>
            <a href="" class="current">积分记录</a>
        </div>
    </div>

    <div class="container-fluid" style="background: salmon;">
        <div class="row-fluid" style="margin-top: 0px;">
            <div style="float: right;">
                <form action="<?php echo U('User/pointLog');?>" id="uploadForm"  class="form-horizontal" method="post">

                    <div  class="controls" style=" margin-left: 0px;">

                        <div class="input-append date form_datetime">
                            <span class="add-on" style="width: 80px;"><i class="icon-hand-right">开始时间</i></span>
                            <input id="starTime"  class="inputTime" name="startTime" title="开始时间"  size="16" type="text" value="<?php echo ($startTime); ?>">
                            <span class="add-on"><i class="icon-remove"></i></span>
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>
                        <div class="input-append date form_datetime">
                            <span class="add-on" style="width: 80px;"><i class="icon-hand-right">截止时间</i></span>
                            <input id="endTime" class="inputTime" name="endTime" title="截止时间"  size="16" type="text" value="<?php echo ($endTime); ?>">
                            <span class="add-on"><i class="icon-remove"></i></span>
                            <span class="add-on"><i class="icon-th"></i></span>
                        </div>

                        <input placeholder="请输入用户昵称或账号"  id="serachKey" value="<?php echo ($serachKey); ?>" type="text" name="serachKey" />

                        <!--<button  onclick="return checkInput()" style="border-radius: 15px;" class="btn btn-danger">查询</button>-->
                        <button class="btn btn-primary"  value="" onclick="return checkInput()" >查询</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5><i class="icon-th" style="margin-right: 10px;"></i>用户积分记录列表</h5>
                    </div>
                    <div class="widget-content nopadding in collapse" id="collapseG2" style="height: auto;width: 100%;">
                        <table class="table table-bordered data-table" >
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>用户账号</th>
                                <th>用户昵称</th>
                                <th>时间</th>
                                <th>动作</th>
                                <th>分值</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if(is_array($pointLogList)): $k = 0; $__LIST__ = $pointLogList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr class="gradeX" >
                                    <td style="text-align: center;width: 10%;"><span class="badge"><?php echo ($pIndex*$pCount+$k); ?></span></td>
                                    <td style="text-align: center;width: 20%;"><?php echo ($vo["name"]); ?></td>
                                    <td style="text-align: center;width: 20%;"><?php echo ($vo["nickname"]); ?></td>
                                    <td style="text-align: center;width: 15%;"><?php echo ($vo["time"]); ?></td>
                                    <td style="text-align: center;width: 10%;"><?php echo ($vo["about"]); ?></td>
                                    <td style="text-align: center;width: 5%;"><?php echo ($vo["point"]); ?></td>
                                    <td  style="text-align: center;width: 20%;">

                                        <a style="float: left;margin-right: 5px;" target="detailUserInfo<?php echo ($vo["id"]); ?>"  href="<?php echo U('User/detailUserInfo',array('id'=>$vo['id']));?>" ><span class="badge badge-info"><li style="margin-right: 5px;" class="icon-user" title="查看用户详情"></li>用户详情</span></a>

                                        <?php switch($vo["actionId"]): case "1": ?><a style="float: left;" target="loaction<?php echo ($vo["id"]); ?>"  href="http://m.amap.com/navi/?dest=<?php echo ($vo["longitude"]); ?>,<?php echo ($vo["latitude"]); ?>&destName=<?php echo ($vo["nickname"]); ?> 在 <?php echo ($vo["time"]); ?> 的登陆地点&hideRouteIcon=1&key=<?php echo ($amap); ?>" ><span class="badge badge-warning"><li style="margin-right: 5px;" class="icon-map-marker" title="公厕详情"></li>公厕详情</span></a><?php break;?>

                                            <?php case "2": ?><a  style="float: left;" target="loaction<?php echo ($vo["id"]); ?>"  href="http://m.amap.com/navi/?dest=<?php echo ($vo["longitude"]); ?>,<?php echo ($vo["latitude"]); ?>&destName=<?php echo ($vo["nickname"]); ?> 在 <?php echo ($vo["time"]); ?> 的登陆地点&hideRouteIcon=1&key=<?php echo ($amap); ?>" ><span class="badge badge-warning"><li style="margin-right: 5px;" class="icon-map-marker" title="公厕详情"></li>公厕详情</span></a><?php break;?>

                                            <?php case "3": ?><a style="float: left;" target="loaction<?php echo ($vo["id"]); ?>"  href="http://m.amap.com/navi/?dest=<?php echo ($vo["longitude"]); ?>,<?php echo ($vo["latitude"]); ?>&destName=<?php echo ($vo["nickname"]); ?> 在 <?php echo ($vo["time"]); ?> 的登陆地点&hideRouteIcon=1&key=<?php echo ($amap); ?>" ><span class="badge badge-success"><li style="margin-right: 5px;" class=" icon-bullhorn" title="新闻详情"></li>新闻详情</span></a><?php break;?>

                                            <?php case "4": ?><form style="float: left;" target="userLoginLog<?php echo ($vo["id"]); ?>" name='form1' action="<?php echo U('User/userLoginLog');?>" method='post'>

                                                <input type='hidden' name="serachKey" value="<?php echo ($vo["nickname"]); ?>"/>
                                                    <input type='hidden' name="startTime" value="<?php echo ($startTime); ?>"/>
                                                    <input type='hidden' name="endTime" value="<?php echo ($endTime); ?>"/>
                                                    <a  href="javascript:document.form1.submit();" ><span class="badge badge-success"><li style="margin-right: 5px;" class=" icon-list-alt" title="查看登录记录"></li>查看登录</span></a>

                                                </form><?php break;?>

                                            <?php default: endswitch;?>

                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>

                            <tfoot>
                            <tr>
                                <td colspan="7" style="  text-align: right;">
                                    <div class="pagination"><ul><?php echo ($page); ?></ul></div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

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

    //对话框 点击 确认 后的操作
    function dialogEnsure()
    {
        $('.modal').modal('hide')
    }

    //对话框 点击 取消 后的操作
    function dialogCancle()
    {
        return false;
    }

    function checkInput(){

        startTime=$("#starTime").val();
        endTime=$("#endTime").val();

        if(startTime==''||endTime=='')
        {
            showDialog(1,'时间不能为空！');
            return false;
        }else
        {
            startTime=new Date(Date.parse(startTime));
            endTime=new Date(Date.parse(endTime));

            if(startTime.getTime()>endTime.getTime())
            {
                showDialog(1,'开始时间早于了截止时间！');
                return false;
            }
        }
    }

    function load()
    {
        //设置 标段名称 提示文字
        $( ".tooltip" ).tooltip();

        $('.textarea_editor').wysihtml5();
    }

    //设置时间选择器的属性
    $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
        language:"zh-CN",
        todayBtn:"linked"
    });

    //格式化时间
    $('.inputTime').onpropertychange(
            str=$('#starTime').val(),
            str=str.replace('+',' '),
            $('#starTime').val(str),
            str=$('#endTime').val(),
            str=str.replace('+',' '),
            $('#endTime').val(str)
    )



</script>