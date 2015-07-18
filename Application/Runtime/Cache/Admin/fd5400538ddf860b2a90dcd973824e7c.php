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
<!--onkeydown="if(event.keyCode==13)return false;"-->

<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo U('Index/index');?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
            <a>新闻管理</a>
            <a href="" class="current">添加新闻</a>
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
                            <li class=" icon-plus" style="margin-right: 10px;"></li>
                            <span >添加新闻</span>
                        </h5>
                    </div>

                    <div  class="widget-content nopadding in collapse" id="collapseG1" style="height: auto;">

                        <form action="<?php echo U('News/addNews');?>"  method="post"  >

                            <div class="control-group" >
                                <div style="text-align: center;margin-left: 10px;margin-right: 10px;">
                                    <img id="smallpicImg" style="margin-top: 10px;margin-bottom: 10px;" alt="新闻缩略图" src="<?php echo ($newsInfo['smallpic']); ?>" >
                                    <hr>
                                </div>
                            </div>

                            <div class="control-group" style="margin-left: 10px;margin-right: 10px;">
                                <label >
                                    <span style="color: #27A9E3;margin-right: 10px;">
                                        <strong><li class=" icon-picture" style="margin-right: 10px;"></li>缩略图地址:</strong>
                                    </span>
                                    <input id="smallpic" onkeyup="smallpicChange()" style="width: 80%;" value="<?php echo ($newsInfo['smallpic']); ?>" type="text" name="smallpic" />
                                </label>
                                <hr>
                            </div>

                            <div class="control-group" style="margin-left: 10px;margin-right: 10px;">
                                <label >
                                    <span style="color: #27A9E3;margin-right: 10px;">
                                        <strong><li class="icon-tags" style="margin-right: 10px;"></li>标题:</strong>
                                    </span>
                                    <input id="title"  style="width: 80%;" value="<?php echo ($newsInfo['title']); ?>" type="text" name="title" />
                                </label>
                                <hr>
                            </div>

                            <div class="control-group" style="margin-left: 10px;margin-right: 10px;">
                                <label >
                                    <span style="color: #27A9E3;margin-right: 10px;">
                                        <strong><li class=" icon-time" style="margin-right: 10px;"></li>时间:</strong>
                                    </span>
                                    <div class="input-append date form_datetime">
                                        <input id="time" class="inputTime" name="time" title="时间"  size="16" type="text" value="<?php echo ($newsInfo['time']); ?>">
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-th"></i></span>
                                    </div>
                                </label>
                                <hr>
                            </div>

                            <div class="control-group" style="margin-left: 10px;margin-right: 10px;">
                                <label >
                                    <span style="color: #27A9E3;margin-right: 10px;">
                                        <strong><li class="icon-linkedin-sign" style="margin-right: 10px;"></li>来源:</strong>
                                    </span>
                                    <input id="source"  style="width: 20%;" value="<?php echo ($newsInfo['source']); ?>" type="text" name="source" />
                                </label>
                                <hr>
                            </div>

                            <div  class="controls" style="margin-left: 10px;margin-right: 10px;">
                                <label >
                                     <span style="color: #27A9E3;margin-right: 10px;">
                                        <strong><li class=" icon-list" style="margin-right: 10px;"></li>类型:</strong>
                                    </span>
                                    <select id="selectedItem" name="newsType" style="width:150px;margin-right: 10px;"  >
                                        <?php if(is_array($selectList)): $k = 0; $__LIST__ = $selectList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option <?php if($k == 1): ?>selected<?php endif; ?>  value="<?php echo ($vo["value"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </label>
                                <hr>
                            </div>


                            <div class="widget-box" style="margin-left: 10px;margin-right: 10px;">
                                <div class="widget-title">
                                    <ul class="nav nav-tabs">
                                        <li class="active" onclick="showUi()"><a data-toggle="tab" href="#tab3">页面</a></li>
                                        <li><a data-toggle="tab" onclick="showCode()" href="#tab4">代码</a></li>
                                    </ul>
                                </div>
                                <div class="widget-content tab-content">
                                    <div id="tab3" class="tab-pane ">

                                    </div>

                                    <div id="tab4" class="tab-pane active" >
                                        <div class="control-group">
                                            <textarea  name="content" id="newsCon" class="span12" rows="20" placeholder="Enter text ..."><?php echo ($newsInfo['content']); ?></textarea>
                                        </div>
                                        <div class="control-group">
                                            <button class="btn btn-success"  value="" onclick="return insertTag('<p> </p>')" >插入P标签</button>
                                            <button class="btn btn-success"  value="" onclick="return insertTag('<img> </img>')" >插入Img标签</button>
                                            <button class="btn btn-success"  value="" onclick="return emptyCon()" >清空</button>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="control-group" style="margin-left: 10px;margin-right: 10px;">
                                <label class="control-label"></label>
                                <div class="controls">
                                    <input id="next" class="btn btn-primary" type="submit" value="添加" />
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
    function load()
    {
        //设置 标段名称 提示文字
        $( ".tooltip" ).tooltip();
    }

    //插入P、Img标签
    function insertTag(pre) {
        var content=$("#newsCon").val();
        content+="\r\n"+pre+"\r\n";
        $("#newsCon").val(content);
        return false;
    }


        //情况内容
    function emptyCon(){

        $("#newsCon").val("");
        return false;
    }


    //显示新闻 图形化页面
    function showUi()
    {
        $("#tab3").empty();

        var alertInfo='<span class="badge badge-important">新闻内容格式有误！</span>';
        $("#tab3").append(alertInfo);

        var content="<content>"+$("#newsCon").val()+"</content>";

        var xmlDoc = $.parseXML( content );

        $("#tab3").empty();

        var x=xmlDoc.documentElement.childNodes;

        for (var i=0;i<x.length;i++)
        {
            if (x[i].nodeType==1)
            {
                var type=x[i].nodeName;
                var value=x[i].childNodes[0].nodeValue;
                if(type=='p')
                {
                    var con='<p>'+value+'</p>';

                }else
                {
                    var con='<img  style="margin-top: 10px;margin-bottom: 10px;" alt="新闻内容图片" src="'+value+'" >';

                }
                $("#tab3").append(con);
            }
        }
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
    );

    //新闻缩略图地址改变时更新图片显示
    function smallpicChange(){

        var url=$('#smallpic').val();
        $('#smallpicImg').attr("src",url);
    }

</script>