<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人中心</title>
    <link rel="stylesheet" href="/web/shop/Public/bootstrap/css/bootstrap.min.css">
    <script src="/web/shop/Public/js/jquery.js"></script>
    <script src="/web/shop/Public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/web/shop/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/web/shop/Public/css/index.css">
    <link rel="stylesheet" href="/web/shop/Public/css/login.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
</head>
<style>
    footer{
        position: absolute;
        bottom:0;
    }
    /*验证码*/
    .vcode{
        width:40% !important;
        -webkit-border-radius:6px 6px !important;
        -moz-border-radius:6px 6px !important;
        border-radius:6px 6px !important;
        padding-left:10px !important;
        margin-bottom: 20px !important;
        height:50px !important;
    }
</style>

<script>

    /*
     *验证邮箱格式是否正确
     *参数strEmail，需要验证的邮箱
     */
    function chkEmail(strEmail) {
        if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(strEmail)) {
            return false;
        }
        else {
            return true;
        }
    }
    var user_is_exist = false ;
    var pwd_is_null = true ;
    var uname_id_null = true ;
    var email_is_error = true ;
    $(function (){

        //检查用户存在或否
        $('.user_name').keyup(function (){
            var uname = $('.user_name').val();
            if(uname==null || uname == undefined || uname==''){
                uname_id_null = true;
                $('.user_name ~ p').text("用户名不能为空");
            }else{
                uname_id_null = false ;
                $.ajax({
                    url:"/web/shop/index.php/Admin/User/check_uname",
                    type:"post",
                    data:{
                        "uname":uname
                    },
                    success:function (msg){

                        if(msg == 1) {
                            user_is_exist = true ;
                            $('.user_name ~ p').text("用户已经存在");
                        }else{
                            user_is_exist = false ;
                            $('.user_name ~ p').text("");
                        }
                    }
                })
            }

        });

        //检测邮箱
        $('.email').keyup(function (){
            var email = $('.email').val() ;
            var content = $('.content').val() ;
            if(email==null || email == '' || email==undefined ){
                $('.email ~ p').text("邮箱格不能为空");
                email_is_error = true ;
            }else if(!chkEmail(email)){
                $('.email ~ p').text("邮箱格式不正确");
                email_is_error = true ;
            }else{
                $('.email ~ p').text("");
                email_is_error = false ;
            }
        })

        $('.password').keyup(function (){
            var pwd = $('.password').val();
            if(pwd==null || pwd == undefined || pwd==''){
                pwd_is_null = true ;
                $('.password ~ p').text("密码不能为空");
            }else{
                pwd_is_null = false ;
                $('.password ~ p').text("");
            }

        });

//        点击注册
        $('.btn-login').click(function (){
            if(user_is_exist){
                alert("用户已经存在");
            }else if(pwd_is_null){
                alert("密码不能为空");
            }else if(uname_id_null){
                alert("用户名不能为空");
            }else if(email_is_error){
                alert("邮箱填写不正确");
            }else{
                $('form').submit();
            }
        })



    })
</script>
<body>
<!--导航-->
<div class="container header">
    <div class="row">
        <div class="header-nav">
            <ul class="nav nav-pills  center-block">
                <li ><a href="/web/shop/index.php/Home/Index/index">首页</a></li>
                <li ><a href="/web/shop/index.php/Home/Goods/goods_list">商品</a></li>
                <li class="active"><a href="/web/shop/index.php/Admin/Index/my">个人中心</a></li>
                <li><a href="/web/shop/index.php/Home/Index/contact">联系客服</a></li>
            </ul>
        </div>
    </div>
</div>
<!--插空填补-->
<div style="height:50px;">

</div>
</div>
    <!--登录面板-->
    <div class="container login-panel">
        <div class="row">
            <div class="col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1>用户注册</h1>
                    </div>
                    <div class="panel-body">
                        <form class="form" method="post" action="/web/shop/index.php/Admin/User/adduser">

                            <div class="form-group">
                                <input type="text" placeholder="username" class="form-control user_name" name="user_name">
                                <i class="fa fa-user"></i>
                                <p class="help-block text-warning">用户名不能为空</p>

                            </div>
                            <div class="form-group">
                                <input type="password" placeholder="password" class="form-control password" name="password">
                                <i class="fa fa-lock"></i>
                                <p class="help-block text-danger">密码不能为空</p>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="email" class="form-control email" name="email">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                <p class="help-block text-danger">邮箱不能为空</p>
                            </div>



                            <div class="form-group">
                                <!--<div class="main-checkbox">-->
                                <!--<input type="checkbox" value="None" id="checkbox1" name="check">-->
                                <!--<label for="checkbox1"></label>-->
                                <!--</div>-->
                                <span class="text">已有账号?<a href="/web/shop/index.php/Home/Index/myaccount" class="register">马上登录</a></span>
                                <button type="button" class="btn btn-primary pull-right btn-login">注册</button>
                            </div>

                        </form>





                    </div>
                </div> <!--panel-->
            </div> <!--col-md-->
        </div><!--row-->

    </div> <!--container-->



<!--页脚-->
	<footer>
		<div class="container">
			<div class='row'>
				<div>
					<span class="text text-center">Copyright © 2016 The zrlee Foundation. All Rights Reserved.粤ICP备xxxx号</span>
				</div>
			</div>
		</div>
	</footer>
	

</body>
</html>