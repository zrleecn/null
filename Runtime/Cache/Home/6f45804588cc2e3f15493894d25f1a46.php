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
    <link rel="stylesheet" href="/web/shop/Public/css/goods_list_main.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
</head>

<style>
    .cat-list .active{
        background: #337AB7;
    }
</style>
<body>


<div class="container header">
    <div class="row">
        <div class="header-nav">
            <ul class="nav nav-pills  center-block">
                <li><a href="/web/shop/index.php/Home/Index/index">首页</a></li>
                <li class="active"><a href="/web/shop/index.php/Home/Goods/showlist">商品</a></li>
                <li ><a href="/web/shop/index.php/Admin/Index/my">个人中心</a></li>
                <li><a href="/web/shop/index.php/Home/Index/contact">联系客服</a></li>
            </ul>
        </div>
    </div>
</div>
<!--插空填补-->
<div style="height:50px;">

</div>
<!--搜索-->
<div class="container">
    <div class="row search-form">
        <form action="/web/shop/index.php/Home/Goods/search" method="post" class="form">
            <div class="form-group has-feedback">
                <a class="btn btn-default col-xs-2 pull-left go-back" href="/web/shop/index.php/Home/Goods/showlist">&nbsp;&nbsp;<i class="fa fa-angle-left " aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</a>
                <div class="input-group pull-left col-xs-8">

                    <input type="" class="form-control cat_search" name="search_content" placeholder="搜索"  value="<?php echo ($keyword); ?>" />
                    <!--嵌入图标-->
                    <span class="glyphicon glyphicon-search form-control-feedback "></span>

                </div>
                <input  type="submit" class="btn btn-default pull-right search-submit col-xs-2" value="搜索">




            </div>
        </form>
    </div>
</div>

<!--排序-->
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">

           <a href="/web/shop/index.php/Home/Goods/order_by_price/keyword/<?php echo ($keyword); ?>" class="pull-left"><p class="navbar-text">价格升序<i class="fa fa-angle-double-up" aria-hidden="true"></i></p></a>

            <a href="/web/shop/index.php/Home/Goods/search/search_content/<?php echo ($keyword); ?>"  style="margin-left: 10px;" class="pull-left"><p class="navbar-text">价格降序<i class="fa fa-angle-double-down" aria-hidden="true"></i></p></a>
        </div>
    </div>
</nav>
<!--商品列表-->

<ul class="media-list">
    <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><li class="media">
            <div class="media-left media-middle">
                <a href="/web/shop/index.php/Home/Goods/goods_detail/goods_id/<?php echo ($v["goods_id"]); ?>/url/Home.Goods.goods_list_main">
                    <img class="media-object" width="100" height="100" src="/web/shop/Public/<?php echo ($v["thumb_image"]); ?>" alt="...">
                </a>
            </div>
            <div class="media-body">
                <a href="/web/shop/index.php/Home/Goods/goods_detail/goods_id/<?php echo ($v["goods_id"]); ?>/url/Home.Goods.goods_list_main">
                    <br>
                    <h4 class="media-heading goods-title"><?php echo ($v["goods_name"]); ?></h4>
                    <span class="price">￥<?php echo ($v["shop_price"]); ?></span>&nbsp;&nbsp;<span class="text" style="text-decoration: line-through;font-size: 10px;color: #cccccc;">￥<?php echo ($v["old_price"]); ?></span>
                    <!--<span class="love"><i class="fa fa-heart text" aria-hidden="true"></i>(<span class="col-num"><?php echo ($v["collect_num"]); ?></span>)</span>-->
                </a>
            </div>
        </li><?php endforeach; endif; ?>

    <?php if(count($goods) < 1): ?><h1 style="margin-left: 200px">:(</h1>
        <p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;没有找到相关商品！</p><?php endif; ?>



</ul>






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