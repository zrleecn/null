<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="/web/shop/Public/bootstrap/css/bootstrap.min.css">
    <script src="/web/shop/Public/js/jquery.js"></script>
    <script src="/web/shop/Public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/web/shop/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/web/shop/Public/css/index.css">
    <link rel="stylesheet" href="/web/shop/Public/css/category.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
</head>
<body>


<div class="container cat-ad" >
    <div class="row">
        <img  src="holder.js/250x110">
    </div>
</div>

<!--具体分类-->
<div class="container">


<!--加载分类-->
    <div class="row">
        <?php if(is_array($sub_cat)): foreach($sub_cat as $key=>$v): ?><div class="col-xs-6">
                <div class="thumbnail">
                    <img src="holder.js/100x100" alt="...">
                    <div class="caption">
                        <p class="price" style="text-align: center;"><?php echo ($v["cat_name"]); ?></p>
                    </div>
                </div>
            </div><?php endforeach; endif; ?>
<!--没有数据时候显示-->
        <?php if(count($sub_cat) < 1 ): ?><h1>:(</h1>
            <?php echo ($msg); endif; ?>



    </div>

</div>



</body>
</html>