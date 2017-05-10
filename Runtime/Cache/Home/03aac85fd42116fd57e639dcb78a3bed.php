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
    <link rel="stylesheet" href="/web/shop/Public/css/goods.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
</head>
<body>

<script>


    $(function (){
        //奇数 即左边的一列
        $('.goods .col-xs-6:even').css("margin-left" , "10px") ;

        //点击心 添加删除类
        $('.fa-heart').click(function () {

            var goods_id = $(this).data('id') ;
            var is_login = $('.goods-item').data('islogin');

            if(is_login){
                $.ajax({
                    type:"post",
                    url:"/web/shop/index.php/Admin/User/add_collect",
                    data:{
                        "goods_id":goods_id
                    },
                    success:function (msg){
                        alert(msg);
                    }
                })
            }

            //获得类名
            var  classNames = $(this)[0].className ;
            //判断有没有 col-active类
            if(classNames.indexOf("col-active")>0){
                //有的话点击一次测取消收藏 数量减1
                $(this).next().text(Number($(this).next().text())-1);
            }else{
                $(this).next().text(Number($(this).next().text())+1);
            }

            $(this).toggleClass('col-active') ;
        });
        // /web/shop/index.php/Admin/User/add_collect/goods_id/<?php echo ($v["goods_id"]); ?>


        //商品名称处理
        (function (){
            var goods_name = $('.goods-item .thumbnail .caption .goods-name') ;

            for(var i=0 ; i <goods_name.length ; i++){

                if($(goods_name[i]).text().length > 7 ){
                    $(goods_name[i]).text($(goods_name[i]).text().substr(0,7) + "...") ;
                }
            }
        })() ;

    })
</script>

<?php $i = 0 ?>
<!--具体商品-->
<div class="container goods goods-item" data-islogin="<?php echo ($is_login); ?>">


<!--加载商品-->
    <div class="row">
        <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><div class="col-xs-6">
                <div class="thumbnail">
                    <a href="/web/shop/index.php/Home/Goods/goods_detail/goods_id/<?php echo ($v["goods_id"]); ?>/url/Home.Goods.showlist" target="_top">
                        <img src="/web/shop/Public/<?php echo ($v["thumb_image"]); ?>" alt="...">
                    </a>

                    <div class="caption">
                        <a style="color: #555" href="/web/shop/index.php/Home/Goods/goods_detail/goods_id/<?php echo ($v["goods_id"]); ?>/url/Home.Goods.showlist" target="_top"><span class="goods-name"><?php echo ($v["goods_name"]); ?></span></a><br>
                        <span class="price" style="color:#f00">￥<?php echo ($v["shop_price"]); ?></span></span>
                        <!--<span class="love"><i class="fa fa-heart text" aria-hidden="true"></i>(<span class="col-num"><?php echo ($v["collect_num"]); ?></span>)</span>-->
                        <?php if(in_array($goods[$i++]['goods_id'] , $arr_id)):?>
                        <span class="love" >
                                <i class="fa fa-heart text col-active" data-colacrive="1" data-id="<?php echo ($v["goods_id"]); ?>"  aria-hidden="true"></i>
                                (<span class="col-num"><?php echo ($v["collect_num"]); ?></span>)</span>
                        <?php else:?>
                        <span class="love" ><i class="fa fa-heart text" data-id="<?php echo ($v["goods_id"]); ?>"  aria-hidden="true"></i>(<span class="col-num"><?php echo ($v["collect_num"]); ?></span>)</span>
                        <?php endif;?>
                    </div>
                </div>
            </div><?php endforeach; endif; ?>
<!--没有数据时候显示-->
        <?php if(count($goods) < 1 ): ?><h1 style="margin-left: 40px;font-size: 50px;">:(</h1>
            <span style="margin-left: 40px;"><?php echo ($msg); ?></span><?php endif; ?>



    </div>

</div>



</body>
</html>