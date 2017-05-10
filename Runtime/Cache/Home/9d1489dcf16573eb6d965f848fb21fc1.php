<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>商品列表</title>
    <link rel="stylesheet" href="/web/shop/Public/bootstrap/css/bootstrap.min.css">
    <script src="/web/shop/Public/js/jquery.js"></script>
    <script src="/web/shop/Public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/web/shop/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/web/shop/Public/css/index.css">

    <link rel="stylesheet" href="/web/shop/Public/css/goods_list.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
</head>

<style>
    .cat-list .active{
        background: #337AB7;
    }
</style>

<script type="text/javascript">
    $(function(){
        $(".list-group-item").click(
            function(){
                $('a:not(this)').removeClass("active");
                $(this).addClass("active");

            });
    });

</script>

<body>


<!--导航-->
<div class="container">
    <div class="row">
        <div class="header-nav">
            <ul class="nav nav-pills  center-block">
                <li ><a href="/web/shop/index.php/Home/Index/index">首页</a></li>
                <li class="active" ><a href="/web/shop/index.php/Home/Index/goods_list">商品</a></li>
                <li ><a href="/web/shop/index.php/Home/Index/myaccount">个人中心</a></li>
                <li><a href="/web/shop/index.php/Home/Index/contact">联系我们</a></li>
            </ul>
        </div>
    </div>
</div>

<!--搜索-->
<div class="container">
    <div class="row search-form">
        <form action="#" method="post" class="form">
            <div class="form-group has-feedback">
                <button class="btn btn-default pull-left go-back">&nbsp;&nbsp;<i class="fa fa-chevron-left " aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</button>
                <div class="input-group pull-left col-xs-8">

                    <input type="" class="form-control cat_search" name="" placeholder="搜索"  value="" />
                    <!--嵌入图标-->
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>

                </div>
                <input  type="submit" class="btn btn-default pull-right search-submit" value="search">




            </div>
        </form>
    </div>
</div>

<!--左侧分类-->
<div class="container">
    <div class="row">
        <div class="col-xs-3 left-cat">
            <div class="list-group cat-list">
                <a href="#" class="list-group-item active" >手机数码</a>
                <a href="#" class="list-group-item">电脑数码 </a>
                <a href="#" class="list-group-item">乐器</a>
                <a href="#" class="list-group-item">自行车</a>
                <a href="#" class="list-group-item">体育用品</a>
                <a href="#" class="list-group-item">宿舍用品</a>
                <a href="#" class="list-group-item">书籍</a>
                <a href="#" class="list-group-item">其他</a>

            </div>
        </div>
        <!--右侧详细分类-->
        <iframe class="col-xs-9 main-cat" src="./category.html" frameborder="0" name="right">

        </iframe>

    </div>
</div>



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