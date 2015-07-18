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
            <a>新闻管理</a>
            <a href="" class="current">评论列表</a>
        </div>
    </div>

    <div class="container-fluid" style="background: salmon;">
        <div class="row-fluid" style="margin-top: 0px;">
            <div style="float: right;">
                <form action="<?php echo U('News/newsList');?>" id="uploadForm"  class="form-horizontal" method="post">

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

                        <input placeholder="请输入新闻标题"  id="serachKey" value="<?php echo ($serachKey); ?>" type="text" name="serachKey" />

                        <button class="btn btn-primary"  value="" onclick="return checkInput()" >查询</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row-fluid">
            <div id="divSpan4-1" class="span3">
                <?php if(is_array($newsList)): $k = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 4 );++$k; if(($mod) == "0"): ?><div class="thumbnail" style="background: #ffffff;margin-bottom: 20px;">
                            <img alt="300x200" src="<?php echo ($vo["smallpic"]); ?>" />
                            <div class="caption">
                                <h5><?php echo ($vo["title"]); ?> </h5>
                                <p><span class="badge"><?php echo ($vo["time"]); ?></span></p>
                                <span class="badge badge-warning"><li class=" icon-comments" style="margin-right: 5px;">&nbsp;&nbsp;<?php echo ($vo["readedCount"]); ?></li></span>
                                <p></p>
                                <p>
                                    <a class="btn btn-primary" target="newsDetailInfo<?php echo ($vo["id"]); ?>" href="<?php echo U('News/newsDetailInfo',array('id'=>$vo['id']));?>">详情</a>

                                    <a class="btn" target="API<?php echo ($vo["id"]); ?>" href="<?php echo ($serverUrl); ?>news/GetDetailNewsInfoById?id=<?php echo ($vo["id"]); ?>">查看接口</a>
                                </p>
                            </div>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>

            <div id="divSpan4-2" class="span3">
                <?php if(is_array($newsList)): $k = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 4 );++$k; if(($mod) == "1"): ?><div class="thumbnail" style="background: #ffffff;margin-bottom: 20px;">
                            <img alt="300x200" src="<?php echo ($vo["smallpic"]); ?>" />
                            <div class="caption">
                                <h5><?php echo ($vo["title"]); ?> </h5>
                                <p><span class="badge"><?php echo ($vo["time"]); ?></span></p>
                                <span class="badge badge-warning"><li class=" icon-comments" style="margin-right: 5px;">&nbsp;&nbsp;<?php echo ($vo["readedCount"]); ?></li></span>
                                <p></p>
                                <p>
                                    <a class="btn btn-primary" target="newsDetailInfo<?php echo ($vo["id"]); ?>" href="<?php echo U('News/newsDetailInfo',array('id'=>$vo['id']));?>">详情</a>

                                    <a class="btn" target="API<?php echo ($vo["id"]); ?>" href="<?php echo ($serverUrl); ?>news/GetDetailNewsInfoById?id=<?php echo ($vo["id"]); ?>">查看接口</a>

                                </p>
                            </div>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>

            <div id="divSpan4-3" class="span3">
                <?php if(is_array($newsList)): $k = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 4 );++$k; if(($mod) == "2"): ?><div class="thumbnail" style="background: #ffffff;margin-bottom: 20px;">
                            <img alt="300x200" src="<?php echo ($vo["smallpic"]); ?>" />
                            <div class="caption">
                                <h5><?php echo ($vo["title"]); ?> </h5>
                                <p><span class="badge"><?php echo ($vo["time"]); ?></span></p>
                                <span class="badge badge-warning"><li class=" icon-comments" style="margin-right: 5px;">&nbsp;&nbsp;<?php echo ($vo["readedCount"]); ?></li></span>
                                <p></p>
                                <p>
                                    <a class="btn btn-primary" target="newsDetailInfo<?php echo ($vo["id"]); ?>" href="<?php echo U('News/newsDetailInfo',array('id'=>$vo['id']));?>">详情</a>

                                    <a class="btn" target="API<?php echo ($vo["id"]); ?>" href="<?php echo ($serverUrl); ?>news/GetDetailNewsInfoById?id=<?php echo ($vo["id"]); ?>">查看接口</a>
                                </p>
                            </div>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>

            <div id="divSpan4-4" class="span3">
                <?php if(is_array($newsList)): $k = 0; $__LIST__ = $newsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 4 );++$k; if(($mod) == "3"): ?><div class="thumbnail" style="background: #ffffff;margin-bottom: 20px;">
                            <img alt="300x200" src="<?php echo ($vo["smallpic"]); ?>" />
                            <div class="caption">
                                <h5><?php echo ($vo["title"]); ?> </h5>
                                <p><span class="badge"><?php echo ($vo["time"]); ?></span></p>
                                <span class="badge badge-warning"><li class=" icon-comments" style="margin-right: 5px;">&nbsp;&nbsp;<?php echo ($vo["readedCount"]); ?></li></span>
                                <p></p>
                                <p>
                                    <a class="btn btn-primary" target="newsDetailInfo<?php echo ($vo["id"]); ?>" href="<?php echo U('News/newsDetailInfo',array('id'=>$vo['id']));?>">详情</a>
                                    <a class="btn" target="API<?php echo ($vo["id"]); ?>" href="<?php echo ($serverUrl); ?>news/GetDetailNewsInfoById?id=<?php echo ($vo["id"]); ?>">查看接口</a>
                                </p>
                            </div>
                        </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>

    </div>



    <div class="container-fluid">
        <div class="row-fluid">
            <div style="  text-align: center;" class="span12">
                <span style="margin-right: 5px;"><?php echo ($count); ?>条记录</span><span id="pageState"><?php echo ($page); ?></span>/<?php echo ($pageNum); ?>页
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row-fluid">
            <div style="  text-align: center;" class="span12">
                <input id="moreUserList"  style=" width: 15%;background: rgb(46, 54, 63);" onclick="moreNewsList()" class="btn btn-primary" type="button" value="显示更多" />
            </div>
        </div>
    </div>



    <input id="page" style="visibility: hidden;" value="<?php echo ($page); ?>" />
    <input id="serverUrl" style="visibility: hidden;" value="<?php echo ($serverUrl); ?>" />

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


    //更多新闻
    function moreNewsList()
    {
        var page=$('#page').val();
        page++;
        var serachKey=$('#serachKey').val();
        var startTime=$('#starTime').val();
        var endTime =$('#endTime').val();
        var serverUrl=$('#serverUrl').val();

        $.ajax({
            url:'<?php echo U("moreNewsList");?>',
            type:'post',
            data:{page:page,serachKey:serachKey,startTime:startTime,endTime:endTime},
            success:function(e){

                var resulyArr=eval('('+e+')');

                if(resulyArr['newsList']==null)
                {
                    showDialog(1,'没有更多啦！');
                    $('#moreUserList').fadeOut();
                    return false;
                }
                else
                {
                    $('#page').val(resulyArr['page']);

                    $('#pageState').html(page);
                    for(i=0;i<resulyArr['newsList'].length;i++)
                    {

                        var newsInfo= '<div class="thumbnail" style="background: #ffffff;margin-bottom: 20px;">'
                                        +'<img alt="300x200" src="'+resulyArr['newsList'][i]['smallpic']+'" />'
                                        +'<div class="caption">'
                                            +'<h5>'+resulyArr['newsList'][i]["title"]+'</h5>'
                                            +'<p><span class="badge">'+resulyArr['newsList'][i]['time']+'</span></p>'
                                            +'<span class="badge badge-warning"><li class=" icon-comments" style="margin-right: 5px;">&nbsp;&nbsp;'+resulyArr['newsList'][i]["readedCount"]+'</li></span>'
                                            +'<p></p>'
                                            +'<p>'
                                                +'<a class="btn btn-primary" target="newsDetailInfo'+resulyArr['newsList'][i]['id']+'" href="newsDetailInfo?id='+resulyArr['newsList'][i]['id']+'">详情</a>'

                                                +'<a class="btn" target="API'+resulyArr['newsList'][i]['id']+'" href="'+serverUrl+'news/GetDetailNewsInfoById?id='+resulyArr['newsList'][i]['id']+'">查看接口</a>'

                                            +'</p>'
                                        +'</div>'
                                    +'</div>';

                        switch(i%4)
                        {
                            case 0:
                                $('#divSpan4-1').append(newsInfo);
                                break;
                            case 1:
                                $('#divSpan4-2').append(newsInfo);
                                break;
                            case 2:
                                $('#divSpan4-3').append(newsInfo);
                                break;
                            case 3:
                                $('#divSpan4-4').append(newsInfo);
                                break;
                            default:
                                break;
                        }
                    }
                }
            }
        });

    }

</script>