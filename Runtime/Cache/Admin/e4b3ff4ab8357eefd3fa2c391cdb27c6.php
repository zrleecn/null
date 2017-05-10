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
    <link rel="stylesheet" href="/web/shop/Admin/Public/css/myinfo.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
    <title>我的二手市场</title>
</head>
<style>
body{
    background-color: #FAFAFA;
}
</style>



<body>

<!--导航-->
<div class="container header">
    <div class="row">
        <div class="header-nav">
            <ul class="nav nav-pills  center-block">
                <li ><a href="/web/shop/index.php/Home/Index/index">首页</a></li>
                <li ><a href="/web/shop/index.php/Home/Goods/showlist">商品</a></li>
                <li class="active"><a href="/web/shop/index.php/Admin/Index/my">个人中心</a></li>
                <li><a href="/web/shop/index.php/Home/Index/contact">联系我们</a></li>
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


            <a class="btn btn-default pull-left col-xs-2 go-back" href="/web/shop/index.php/Home/Goods/showlist">&nbsp;&nbsp;<i class="fa fa-chevron-left " aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</a>
            <div class="pull-left col-xs-8 h-title">

                <h4 class="text-center">我的二手市场</h4>

            </div>
            <a class="btn btn-default pull-left col-xs-2 go-back" href="/web/shop/index.php/Home/Goods/showlist">&nbsp;&nbsp;<i class="fa fa-shopping-cart " aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</a>

        </div>
    </div>
</session>
<session class="container ad-pic">
    <img src="holder.js/386x200">
</session>
<session class="container menu-list">
    <ul class="list-group">
        <li class="list-group-item">
            <span>我的消息<span class="badge">14</span></span>
            <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span>
        </li>
        <li class="list-group-item">
            <span>我的商品<span class="badge">14</span></span>
            <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span>
        </li>
        <li class="list-group-item">
            <span>我的收藏<span class="badge">14</span></span>
            <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span>
        </li>

        <li class="list-group-item">
            <span>修改信息</span>
            <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span>
        </li>
        <li class="list-group-item">
            <span>查看信息</span>
            <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span>

        </li>


    </ul>

    <ul class="list-group">
        <li class="list-group-item">
            <span>帮助中心</span>
            <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span>
        </li>
        <li class="list-group-item">
            <span>咨询记录<span class="badge">14</span></span>
            <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span>

        </li>
        <li class="list-group-item">
            <span>联系客服</span>
            <span><i class="fa fa-angle-right pull-right" aria-hidden="true"></i></span>
        </li>



    </ul>
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