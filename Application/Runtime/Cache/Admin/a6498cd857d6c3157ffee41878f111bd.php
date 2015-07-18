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
				<i class="icon icon-th-large"></i>
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
				<i class="icon icon-flag"></i>
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
				<i class="icon icon-user"></i>
				<span>新闻管理</span>
				<span class="label label-important">4</span>
			</a>
			<ul>
				<li>
					<a href="<?php echo U('User/index');?>">新闻列表</a>
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


<link rel="stylesheet" href="/wpadmin/Public/Admin/css/apprise-v2.css" type="text/css">

<link rel="stylesheet" href="/wpadmin/Public/Admin/css/showDialog.css" />
<script src="/wpadmin/Public/Admin/js/showDialog.js"></script>
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
            <a href="" class="current">栏目管理</a>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row-fluid">

            <div class="span8">

                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5><i class="icon-th" style="margin-right: 10px;"></i>新闻栏目列表</h5>
                    </div>

                    <div class="widget-content nopadding in collapse" id="collapseG2" style="height: auto;width: 100%;">
                        <table class="table table-bordered data-table" >
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>栏目名称</th>
                                <th>操作</th>
                            </tr>
                            </thead>

                            <tbody>
                            <?php if(is_array($newstypeList)): $k = 0; $__LIST__ = $newstypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr  >
                                    <td style="text-align: center;width: 10%;"><span class="badge"><?php echo ($k); ?></span></td>
                                    <td style="text-align: center;width: 20%;"><?php echo ($vo["name"]); ?></td>
                                    <td  style="text-align: center;width: 50%;">
                                        <?php if($vo["isVisible"] == 1): ?><a   href="#" ><span class="badge badge-info"><li style="margin-right: 5px;" class="icon-lock" title="查看用户详情"></li>隐藏该栏目</span></a>

                                            <?php else: ?>
                                            <a  href="#" ><span class="badge badge-info"><li style="margin-right: 5px;" class="icon-unlock" title="查看用户详情"></li>显示该栏目</span></a><?php endif; ?>
                                        <a  href="#" onclick="up()"  ><span class="label label-success"><li style="margin-right: 5px;" class="icon-arrow-up" title="查看用户详情"></li>上移</span></a>
                                        <a  href="#" onclick="down()" ><span class="label label-warning"><li style="margin-right: 5px;" class="icon-arrow-down" title="查看用户详情"></li>下移</span></a>
                                    </td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>


            <div class="span4">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG1"><span class="icon"><i class="icon-chevron-down"></i></span>
                        <h5><i class="icon-wrench" style="margin-right: 10px;"></i>操作</h5>
                    </div>

                    <div class="widget-content nopadding in collapse" id="collapseG1" style="height: auto;width: 100%;">
                        <!--<form action="<?php echo U('News/newstypeList');?>"  class="form-horizontal" method="post">-->

                        <!--</form>-->
                    </div>

                    <div class="widget-content nopadding in collapse"  style="height: auto;width: 100%;text-align: center;">
                        <label class="control-label"></label>
                        <div class="controls">
                            <a  href="#"  onclick="saveEdit()" class="btn btn-danger" ><li class="icon-save" style="margin-right: 5px;"></li>保存修改</a>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
    <div style="text-align: center">
        <ul>
            <li><a id="aOpen"  href="#OpenWindow" onclick="fun()" rel="leanModal">打开登陆窗口</a></li>
            <li><a href="#reg" rel="leanModal">打开描述窗口</a></li>
        </ul>
    </div>
    <div id="OpenWindow">
        <div id="signup-ct">
            <div id="OpenWindow-header">
                <h2>
                    Create a new account</h2>
                <p>
                    It's simple, and free.</p>
                <a href="#" class="modal_close"></a>
            </div>
            <form action="">
                <div class="txt-fld">
                    <label for="">
                        Username</label>
                    <input type="text" name="" class="good_input" id="" />
                </div>
                <div class="txt-fld">
                    <label for="">
                        Email address</label>
                    <input type="text" name="" id="" />
                </div>
                <div class="txt-fld">
                    <label for="">
                        Password</label>
                    <input type="text" name="" id="" />
                </div>
                <div class="btn-fld">
                    <button type="submit">
                        Sign Up »</button>
                </div>
            </form>
        </div>
    </div>

</div>


<script type="text/javascript" src="/wpadmin/Public/Admin/js/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="/wpadmin/Public/Admin/js/jquery.leanModal.min.js"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $("#trigger_id").leanModal();
        //$('#aOpen').leanModal({ top: 100, closeButton: ".modal_close" });
        $('a[rel*=leanModal]').leanModal({ top: 100, closeButton: ".modal_close" });
    });
</script>
<style type="text/css">
    #lean_overlay { position: fixed; z-index: 100; top: 0px; left: 0px; height: 100%; width: 100%; background: #000; display: none; }
    #OpenWindow { background: none repeat scroll 0 0 #FFFFFF; border-radius: 5px 5px 5px 5px; box-shadow: 0 0 4px rgba(0, 0, 0, 0.7); display: none; padding-bottom: 2px; width: 404px; z-index: 11000; left: 50%; margin-left: -202px; opacity: 1; position: fixed; top: 200px; }
    #OpenWindow-header { background: url("/wpadmin/Public/Admin/images/Image/hd-bg.png") repeat scroll 0 0 transparent; border-bottom: 1px solid #CCCCCC; border-top-left-radius: 5px; border-top-right-radius: 5px; padding: 18px 18px 14px; }
    .modal_close { background: url("/wpadmin/Public/Admin/images/Image/modal_close.png") repeat scroll 0 0 transparent; display: block; height: 14px; position: absolute; right: 12px; top: 12px; width: 14px; z-index: 2; }
    body { font-size: 13px; }
    #OpenWindow .txt-fld { border-bottom: 1px solid #EEEEEE; padding: 14px 20px; position: relative; text-align: right; width: 364px; }
    #OpenWindow .txt-fld input { background: none repeat scroll 0 0 #F7F7F7; border-color: #CCCCCC #E7E6E6 #E7E6E6 #CCCCCC; border-radius: 4px 4px 4px 4px; border-style: solid; border-width: 1px; color: #222222; font-family: "Helvetica Neue"; font-size: 1.2em; outline: medium none; padding: 8px; width: 244px; }
    #OpenWindow .txt-fld input.good_input { background: url("/wpadmin/Public/Admin/images/Image/good.png") no-repeat scroll 236px center #DEF5E1; }
    #OpenWindow .btn-fld { overflow: hidden; padding: 12px 20px 12px 130px; width: 254px; }
    button { background: none repeat scroll 0 0 #3F9D4A; border: medium none; border-radius: 4px 4px 4px 4px; color: #FFFFFF; float: right; font-family: Verdana; font-size: 13px; font-weight: bold; overflow: visible; padding: 7px 10px; text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4); width: auto; }
</style>

<script>

    function   fun()
    {

    }

    function saveEdit()
    {
        alert("we");
        var temp = document.createElement("form");
        temp.action = "newstypeList";
        temp.method = "post";
        temp.style.display = "none";
       var  PARAMS= Array();
        PARAMS[0]="we";
        PARAMS[1]="w23";
        for (var x in PARAMS) {
            var opt = document.createElement("textarea");
            opt.name = x;
            opt.value = PARAMS[x];
            // alert(opt.name)
            temp.appendChild(opt);
        }
        document.body.appendChild(temp);
        temp.submit();
        return temp;
//        $("#uploadForm").submit();
    }
function load()
{
    //设置 标段名称 提示文字
    $( ".section" ).tooltip();
}



</script>