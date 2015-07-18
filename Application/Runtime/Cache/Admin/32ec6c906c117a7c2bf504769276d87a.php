<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <title>蹲客后台管理系统</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/wpadmin/Public/Admin/css/matrix-login.css" />
    <link href="/wpadmin/Public/Admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
<div id="loginbox">
    <form id="loginform" class="form-vertical" method="post" action="<?php echo U('Login/checklogin');?>">
        <div class="control-group normal_text"> <h3><img src="/wpadmin/Public/Admin/img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="username" placeholder="Username" />
                </div>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input name="password" type="password" placeholder="Password" />
                </div>
            </div>
        </div>


        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lb"><i class="icon-legal"></i></span><input type="text" placeholder="verifyCode" name="Verify"/>
                </div>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <img src="<?php echo U('Login/verify');?>" style="width: 90%;height: 38px;" onclick="this.src=this.src+'?'+Math.random()" />
                </div>
            </div>
        </div>

        <div class="form-actions" align="center">
            <input type="submit" class="btn btn-success" value="Login" style="height: 38px;width:90%;background:#3399cc;font-size:18px;font-weight:bold;"/>
        </div>
    </form>
</div>

<script src="/wpadmin/Public/Admin/js/jquery.min.js"></script>
<script src="/wpadmin/Public/Admin/js/matrix.login.js"></script>
</body>

</html>