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

<script>
    $(function (){

        //商品名称处理
        (function (){
            var goods_name = $('.goods_list .thumbnail .caption .goods-name') ;

            for(var i=0 ; i <goods_name.length ; i++){

                if($(goods_name[i]).text().length > 9 ){
                    $(goods_name[i]).text($(goods_name[i]).text().substr(0,9) + "...") ;
                }
            }
        })() ;

        //模态框取消恢复原来的url
        (function(){
            $('.btn-cancel').click( function (){
                var url = $('.modal-footer .btn-ok')[0].href ;
                url = url.substr(0 , url.lastIndexOf('/')+1) ;
                $('.modal-footer .btn-ok')[0].href = url ;
                $('.modal').modal('hide');
            });
        })();


    })

    function start_modal(param){
        var goods_name = param.substr(0,param.indexOf('-')) ;
        var goods_id = param.substr(param.indexOf('-')+1) ;
        var url = $('.modal-footer .btn-ok')[0].href ;
        url += goods_id ;
        $('.modal-footer .btn-ok')[0].href = url ;
        $('.modal-body').text("你确定要删除"+goods_name+" ?");
        $('.modal-btn').click();

    }



</script>
<body>

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
<div style="height:50px;">

</div>
<!--子导航-->
<div class="container sub-nav" style="padding: 0;">
    <div class="row" style="position: relative;padding: 0;margin: 0;">
        <div class="col-xs-2">
            <!--添加-->
           <a href="/web/shop/index.php/Admin/Goods/upload_goods"><i class="fa fa-plus-square-o pull-right"   aria-hidden="true"></i></a>
        </div>
        <div class="col-xs-4 nav-menu">
            <p class="lead my-goods active"><a href="/web/shop/index.php/Admin/Index/my" class="active">我的商品</a><span class="badge"><?php echo ($mygoodscount); ?></span><span style="font-size: 20px;position: absolute;top: -4px;right: 5%;">|</span></p>
        </div>
        <!--<div class="" style="padding-top: 0;position: relative;">-->
            <!--<span style="font-size: 20px;position: absolute;top: -4px;">|</span>-->
        <!--</div>-->
        <div class="col-xs-4 nav-menu">
            <p class="lead my-goods"><a href="/web/shop/index.php/Admin/Index/collection">我的收藏</a><span class="badge"><?php echo ($col_count); ?></span></p>
        </div>
        <div class="col-xs-1">
            <!--个人-->
            <a href="/web/shop/index.php/Admin/Manager/manager">
                <i class="fa fa-user" aria-hidden="true"></i>
            </a>
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
        <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><div class="col-xs-6 goods_list" >
                <div class="thumbnail">
                    <a href="/web/shop/index.php/Home/Goods/goods_detail/goods_id/<?php echo ($v["goods_id"]); ?>/url/Admin.Index.my" target="_top">
                        <img src="/web/shop/Public/<?php echo ($v["thumb_image"]); ?>" alt="...">
                    </a>   
                    <div class="caption">
                        <a style="color: #555;" href="/web/shop/index.php/Home/Goods/goods_detail/goods_id/<?php echo ($v["goods_id"]); ?>/url/Home.Goods.showlist" target="_top">
                            <span class="goods-name"><?php echo ($v["goods_name"]); ?></span><br>
                        </a>   
                        <span class="price" style="color: red">￥<?php echo ($v["shop_price"]); ?></span>&nbsp;&nbsp;<span class="text" style="text-decoration: line-through;font-size: 10px;color: #cccccc;">￥<?php echo ($v["old_price"]); ?></span>
                        <!--<a href="/web/shop/index.php/Admin/Goods/delete_goods/goods_id/<?php echo ($v["goods_id"]); ?>" onclick="return confirm('确定要删除<?php echo ($v["goods_name"]); ?>?')">-->
                        <span  onclick="start_modal('<?php echo ($v["goods_name"]); ?>'+'-'+'<?php echo ($v["goods_id"]); ?>')">
                            <span ><i class="fa fa-trash-o" aria-hidden="true" style="margin-left: 3px;font-size: 16px !important;"></i></span>
                        </span>
                    </div>
                </div>
            </div><?php endforeach; endif; ?>
        <?php if(count($goods) < 1): ?><h1 style="margin-left: 20px;font-size: 50px">:(</h1>
            <span style="margin-left: 20px;">你还没有任何商品哦！</span><br><br>
            <h3><a href="/web/shop/index.php/Admin/Goods/upload_goods" style="color: deepskyblue;margin-left: 20px;text-decoration: underline">马上上传</a></h3><?php endif; ?>
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

<!-- Button trigger modal -->
<a  class="modal-btn" data-toggle="modal" data-target="#myModal">

</a>

<!-- Modal --><!--模态框-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="margin-top: 30%;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">温馨提示</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <a href="/web/shop/index.php/Admin/Goods/delete_goods/goods_id/" type="button" class="btn-ok btn btn-primary btn-lg">确定</a>
                <button type="button" class="btn btn-cancel btn-default btn-lg">再想想</button>

            </div>
        </div>
    </div>
</div>

</body>
</html>