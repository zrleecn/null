<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/web/shop/Public/bootstrap/css/bootstrap.min.css">
    <script src="/web/shop/Public/js/jquery.js"></script>
    <script src="/web/shop/Public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/web/shop/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/web/shop/Public/css/index.css">
    <link rel="stylesheet" href="/web/shop/Admin/Public/css/modify.css">
    <link rel="stylesheet" href="https://daneden.github.io/animate.css/animate.min.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
    <title>我的信息</title>
</head>
<style>
    body{
        background-color: #FAFAFA;

    }
    a:hover{
        text-decoration: none;
    }

</style>



<body>

<!--变量-->
<?php $user_info = $user_info; ?>

<!--导航-->
<div class="container header">
    <div class="row">
        <div class="header-nav">
            <ul class="nav nav-pills  center-block">
                <li ><a href="/web/shop/index.php/Home/Index/index">首页</a></li>
                <li ><a href="/web/shop/index.php/Home/Goods/showlist">商品</a></li>
                <li class="active"><a href="/web/shop/index.php/Admin/Index/my">个人中心</a></li>
                <li><a href="/web/shop/index.php/Home/Index/contact">联系客服</a></li>
            </ul>
        </div>
    </div>
</div>
<!--插空填补-->
<div style="height:60px;">

</div>

<session >
    <!--页头-->
    <div class="container header-bar">
        <div class="row ">


            <a class="btn btn-default pull-left col-xs-2 go-back" href="/web/shop/index.php/Admin/Manager/manager">&nbsp;&nbsp;<i class="fa fa-chevron-left " aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</a>
            <div class="pull-left col-xs-8 h-title">

                <h4 class="text-center">修改信息</h4>

            </div>
            <a class="btn btn-default pull-left col-xs-2 go-back" href="/web/shop/index.php/Admin/Manager/myinfo">&nbsp;&nbsp;<i class="fa fa-user " aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</a>

        </div>
    </div>
</session>

<!--头像-->
<session class="container my-info">

    <div class="row">
        <div class="col-xs-1">

        </div>
        <div class="col-xs-11">
            <img src="/web/shop/Public/<?php echo ((isset($user_info["head_portrait"]) && ($user_info["head_portrait"] !== ""))?($user_info["head_portrait"]):'images/default_head.png'); ?>" class="head-portrait animated bounceInRight" width="80" height="80" alt="">
            <span style="margin-left: 10px;font-size: 20px;"><?php echo ((isset($user_info["user_name"]) && ($user_info["user_name"] !== ""))?($user_info["user_name"]):'游客'); ?></span>

        </div>

    </div>

</session>

<session class="container modify-form">
    <form class="form-horizontal" method="post" action="/web/shop/index.php/Admin/Manager/modify_update">
        <div class="form-group">
            <label for="inputEmail3" class="col-xs-3 control-label">用户名</label>
            <div class="col-xs-9">
                <input type="text" name="user_name" value="<?php echo ($user_info["user_name"]); ?>" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword8" class="col-xs-3 control-label">手机号码</label>
            <div class="col-xs-9">
                <input type="text"name="tel_phone"value="<?php echo ($user_info["tel_phone"]); ?>" class="form-control" id="inputPassword8" placeholder="phone number">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword7" class="col-xs-3 control-label">邮箱</label>
            <div class="col-xs-9">
                <input type="text"name="email" value="<?php echo ($user_info["email"]); ?>"class="form-control"  id="inputPassword7"  placeholder="email">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword6" class="col-xs-3 control-label">微信</label>
            <div class="col-xs-9">
                <input type="text"name="wechat" value="<?php echo ($user_info["wechat"]); ?>" class="form-control" id="inputPassword6" placeholder="wechat">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword5" class="col-xs-3 control-label">qq号码</label>
            <div class="col-xs-9">
                <input type="text"name="qq_number" value="<?php echo ($user_info["qq_number"]); ?>" class="form-control"id="inputPassword5" placeholder="qq number">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword4" class="col-xs-3 control-label">学校</label>
            <div class="col-xs-9">
                <input type="text"name="school_name" value="<?php echo ($user_info["school_name"]); ?>" class="form-control" id="inputPassword4" placeholder="school">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-xs-3 control-label">地址</label>
            <div class="col-xs-9">
                <input type="text"name="address" value="<?php echo ($user_info["address"]); ?>" class="form-control" id="inputPassword3" placeholder="address">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-offset-3">
                <button type="submit" class="btn btn-success btn-lg ok">确定</button>
                <a href="/web/shop/index.php/Admin/Manager/manager" class="btn btn-danger btn-lg cancel">取消</a>
            </div>
            <div class="col-xs-offset-3 c">

            </div>
        </div>
    </form>
</session>

<!--页脚-->
<footer>
    <div class="container">
        <div class='row'>
            <div>
					<span class="text text-center">Copyright ©2017 sweetencounter.cn 版权所有
                        <br>
                        <a href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action" class="text" target="_blank">粤ICP备17043092号</a>
                    </span>
            </div>
        </div>
    </div>
</footer>


</body>
</html>