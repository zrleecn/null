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
    <link rel="stylesheet" href="/web/shop/Public/css/login.css">
    <link rel="stylesheet" href="/web/shop/Public/css/upload_goods.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>

</head>

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
<!--商品信息-->
<div class="container">
    <div class="row">
        <p class="text col-xs-10" style="margin-top: 20px;">请填写您的商品信息</p>

    </div>
    <div class="row upload-goods">
        <form class="form" method="post" action="#">

            <div class="form-group .user-input">
                <input name="goods_name" class="col-xs-12 form-control" type="text" placeholder="商品名称">
                <i class="fa fa-fire" aria-hidden="true"></i>
                <P class="help-block text">名称格式不正确</P>
            </div>
            <div class="form-group .user-input">
                <input name="goods_price" class="col-xs-12 form-control" type="text" placeholder="商品价格">
                <i class="fa fa-money" aria-hidden="true"></i>
                <P class="help-block text">请输入正确的价格</P>
            </div>
            <div class="select">
                <div class="col-xs-5">
                    <select class="form-control">
                        <option value="#">父级分类</option>
                        <?php if(is_array($category)): foreach($category as $key=>$v): ?><option value="<?php echo ($v["cat_name"]); ?>"><?php echo ($v["cat_name"]); ?></option><?php endforeach; endif; ?>



                    </select>
                </div>
                <div class="col-xs-5">
                    <select class="form-control">
                        <option value="#">二级分类</option>
                        <option value="#">可以不选</option>



                    </select>
                </div>
            </div>

            <!--商品图片-->
            <!--<input type="file" name="goods_pic" style="display: none;">-->


        </form>


        <div class="row" >
            <div class="goods_pic_box">
                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                <p class="center-block text">点击上传商品图片</p>
            </div>

        </div>

    </div>
    <!--商品图片-->
    <div class="row">
        <div class="row goods_pic_selected" >
            <img src="holder.js/400x300" class="center-block">
        </div>
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