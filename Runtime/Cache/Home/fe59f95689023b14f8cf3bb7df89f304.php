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

        (function (){
            //获取选中菜单索引active_index
            var active_index = $('.cat-container').data('active') ;

            $('.list-group-item:nth-child('+active_index+')').addClass('active') ;
//        点击左侧分类变颜色
            $(".list-group-item").click(
                function(){
                    $('a:not(this)').removeClass("active");
                    $(this).addClass("active");
                    scrollTo(0,0);

                });

//        获取左侧菜单栏的高度
            var cat_height = $('.cat-container').height();
            //设置右边商品的容器高度
            $('.main-cat').css('height' ,cat_height-20) ;

            /**
             * iphone 手机把右边商品宽度改变
             */
            var iphone = device.iphone() ;
            if(iphone){
                $('.left-cat').css("width","24%") ;
            }else{
                $('.left-cat').css("width","28%");
            }
        })();


    });

</script>

<body>


<!--导航-->
<!--data-active传入选中菜单的索引-->
<div class="container header" >
    <div class="row">
        <div class="header-nav">
            <ul class="nav nav-pills  center-block">
                <li ><a href="/web/shop/index.php/Home/Index/index">首页</a></li>
                <li class="active" ><a href="/web/shop/index.php/Home/Goods/showlist">商品</a></li>
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
                <a class="btn btn-default pull-left col-xs-2 go-back" href="/web/shop/index.php/Home/Goods/showlist">&nbsp;&nbsp;<i class="fa fa-angle-left " aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;</a>
                <div class="input-group pull-left col-xs-8">

                    <input type="" class="form-control cat_search" name="search_content" placeholder="搜索"  value="" />
                    <!--嵌入图标-->
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>

                </div>
                <input  type="submit" class="btn btn-default pull-right search-submit col-xs-2" value="搜索">




            </div>
        </form>

    </div>
</div>

<!--左侧分类-->
<div class="container cat-container" data-active="<?php echo ($active_index); ?>">
    <div class="row">
        <div class="col-xs-3 left-cat pull-left">
            <div class="list-group cat-list">
                <?php if(is_array($category)): foreach($category as $key=>$v): ?><a href="/web/shop/index.php/Home/Goods/goods/cat_id/<?php echo ($v["cat_id"]); ?>" target="right" class="list-group-item" ><?php echo ($v["cat_name"]); ?></a><?php endforeach; endif; ?>

                <!--<a href="#" class="list-group-item active">电脑数码 </a>-->
                <!--<a href="#" class="list-group-item">乐器</a>-->
                <!--<a href="#" class="list-group-item">自行车</a>-->
                <!--<a href="#" class="list-group-item">体育用品</a>-->
                <!--<a href="#" class="list-group-item">宿舍用品</a>-->
                <!--<a href="#" class="list-group-item">书籍</a>-->
                <!--<a href="#" class="list-group-item">其他</a>-->

            </div>
        </div>
        <!--右侧商品详细-->
        <iframe class="col-xs-9 main-cat pull-right" src="/web/shop/index.php/Home/Goods/goods/cat_id/<?php echo ($cid); ?>" frameborder="0" name="right">

        </iframe>

    </div>
</div>



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