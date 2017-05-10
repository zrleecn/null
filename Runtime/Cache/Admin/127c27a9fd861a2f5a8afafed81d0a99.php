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
    <link rel="stylesheet" href="/web/shop/Admin/Public/css/my.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
    <title>个人中心</title>
</head>
<body>

<!--导航-->
<div class="container">
    <div class="row">
        <div class="header-nav">
            <ul class="nav nav-pills  center-block">
                <li ><a href="/web/shop/index.php/Home/Index/index">首页</a></li>
                <li ><a href="/web/shop/index.php/Home/Index/goods_list">商品</a></li>
                <li class="active"><a href="/web/shop/index.php/Admin/Index/my">个人中心</a></li>
                <li><a href="/web/shop/index.php/Home/Index/contact">联系我们</a></li>
            </ul>
        </div>
    </div>
</div>
<!--插空填补-->
<div style="height:50px;">

</div>
<!--子导航-->
<div class="container sub-nav">
    <div class="row" style="position: relative;">
        <div class="col-xs-2">
            <!--添加-->
            <i class="fa fa-plus-square-o pull-right"   aria-hidden="true"></i>
        </div>
        <div class="col-xs-3 nav-menu">
            <p class="lead my-goods active">我的商品<span class="badge">89</span>  </p>
        </div>
        <div class="col-xs-1" style="padding-top: 0;position: relative;">
            <span style="font-size: 20px;position: absolute;top: -4px;">|</span>
        </div>
        <div class="col-xs-3 nav-menu">
            <p class="lead my-goods">我的收藏<span class="badge">10</span></p>
        </div>
        <div class="col-xs-1">
            <!--垃圾桶-->
            <i class="fa fa-trash-o" aria-hidden="true"></i>
        </div>
        <div class="line">

        </div>

    </div>
</div>

<!--我的商品-->
<!--<div class="container">-->
    <!--<div class="row">-->
        <!--<table class="table table-striped table-bordered table-hover">-->
            <!--<tr>-->
                <!--<td>商品图片</td>-->
                <!--<td>名称</td>-->
                <!--<td>价格</td>-->
                <!--<td>描述</td>-->

            <!--</tr>-->
            <!--<tr>-->
                <!--<td><img src="holder.js/100x100" alt=""></td>-->
                <!--<td>iPhone 7 八成新 64G</td>-->
                <!--<td>1990.00</td>-->
                <!--<td>descript descript</td>-->

            <!--</tr>-->
        <!--</table>-->
    <!--</div>-->
<!--</div>-->

<!--商品列表-->
<div class="container " >
    <div class="row">
        <div class="col-xs-6 goods_list" >
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>

        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>

        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list" >
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>
        <div class="col-xs-6 goods_list">
            <div class="thumbnail">
                <img src="holder.js/200x100" alt="...">
                <div class="caption">
                    <span>Thumbnail label</span><br>
                    <span class="price">￥99.9 <span class="text" style="text-decoration: line-through;">￥299</span></span>
                </div>
            </div>
        </div>

    </div>



</div>


<!--页脚-->
<footer >
    <div class="container">
        <div class='row'>
            <div>
                <span class="text text-center" >Copyright © 2016 The zrlee Foundation. All Rights Reserved.粤ICP备xxxx号</span>
            </div>
        </div>
    </div>
</footer>

</body>
</html>