<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>二手交易市场--首页</title>
    <link rel="stylesheet" href="/web/shop/Public/bootstrap/css/bootstrap.min.css">
    <script src="/web/shop/Public/js/jquery.js"></script>
    <script src="/web/shop/Public/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/web/shop/Public/css/font-awesome.min.css">
    <link rel="stylesheet" href="/web/shop/Public/css/index.css">
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
    <script src="http://resume.zrlee.cn/js/swipe.js" type="text/javascript" charset="utf-8"></script>

</head>

<style>

</style>
<script>
    $(function (){
        //点击心 添加删除类
        (function (){
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
                            //alert(msg);
                            //设置模态框的值
                            $('.modal-body').text(msg) ;
                            //触发模态框
                            $('.modal-btn').click();
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
        })();
       // /web/shop/index.php/Admin/User/add_collect/goods_id/<?php echo ($v["goods_id"]); ?>


        //商品名称处理
        (function (){
            var goods_name = $('.goods-item .thumbnail .caption .goods-name') ;

            for(var i=0 ; i <goods_name.length ; i++){

                if($(goods_name[i]).text().length > 9 ){
                    $(goods_name[i]).text($(goods_name[i]).text().substr(0,9) + "...") ;
                }
            }
        })() ;


        //滑动轮播
        (function (){
            var slide =  util.toucher(document.getElementById('example-carousel'));
            slide.on('swipeLeft',function(e){

                $('.right').click();
            })
            slide.on('swipeRight',function(e){
                $('.left').click();
            });
        })();




    })
</script>
<body>
<!--导航-->
<div class="container header">
    <div class="row">
        <div class="header-nav">
            <ul class="nav nav-pills  center-block">
                <li class="active"><a href="/web/shop/index.php/Home/Index/index">首页</a></li>
                <li ><a href="/web/shop/index.php/Home/Goods/showlist">商品</a></li>
                <li ><a href="/web/shop/index.php/Admin/Index/my">个人中心</a></li>
                <li><a href="/web/shop/index.php/Home/Index/contact">联系客服</a></li>
            </ul>
        </div>
    </div>
</div>
<!--插空填补-->
<div style="height:50px;">

</div>

    <!--轮播图-->
    <!--外部容器-->

    <div id='example-carousel' class="carousel slide" data-ride='carousel'>
        <!--图片-->
        <div class="carousel-inner">
            <div class="item active" >
                <img src="/web/shop/Public/images/drawing.jpg"/>
                <div class="carousel-caption">
                    <!--<h4>Mobile Phone</h4>-->
                </div>
            </div>

            <div class="item" >
                <img src="/web/shop/Public/images/cactus-.jpg"/>
                <div class="carousel-caption">
                    <!--<h4>HTML5 in BootStrap</h4>-->
                </div>
            </div>
            <div class="item" >
                <img src="/web/shop/Public/images/bicycle.jpg"/>
                <div class="carousel-caption">
                    <!--<h4>PHP+MySQL & ThinkPHP & Yii2</h4>-->
                </div>
            </div>




        </div>

        <!--指示灯-->
        <ol class="carousel-indicators">
            <li data-target="#example-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#example-carousel" data-slide-to="1" class=""></li>
            <li data-target="#example-carousel" data-slide-to="2" class=""></li>

        </ol>

        <!--左右控制-->

        <a href="#example-carousel" class="left carousel-control" data-slide='prev'>
            <span class="fa-angle-left fa glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a href="#example-carousel" class="right carousel-control" data-slide='next'>
            <span class="fa-angle-right fa glyphicon-chevron-right" aria-hidden="true"></span>
        </a>

    </div>

    <!--合作商家-->
    <div class="container ad">
        <div class="ad-header row center-block">

            <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/2/active_index/2"><div class="cycle-radius pull-left"><i class="fa fa-bicycle" aria-hidden="true"></i></div></a>
            <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/1/active_index/1"><div class="cycle-radius pull-left"><i class="fa fa-book" aria-hidden="true"></i></div></a>
            <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/5/active_index/5"> <div class="cycle-radius pull-left"><i class="fa fa-desktop" aria-hidden="true"></i></div></a>
             <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/5/active_index/5"><div class="cycle-radius pull-left"><i class="fa fa-mobile" aria-hidden="true"></i></div></a>
            <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/7/active_index/7"><div class="cycle-radius pull-left"><i class="fa fa-sun-o" aria-hidden="true"></i></div></a>
            <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/5/active_index/5"><div class="cycle-radius pull-left"><i class="fa fa-keyboard-o" aria-hidden="true"></i></div></a>
             <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/3/active_index/3"><div class="cycle-radius pull-left"><i class="fa fa-music" aria-hidden="true"></i></div></a>
             <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/5/active_index/5"> <div class="cycle-radius pull-left"><i class="fa fa-desktop" aria-hidden="true"></i></div></a>
             <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/5/active_index/5"> <div class="cycle-radius pull-left"><i class="fa fa-laptop" aria-hidden="true"></i></div></a>
             <a href="/web/shop/index.php/Home/Goods/showlist/cat_id/5/active_index/5"> <div class="cycle-radius pull-left"><i class="fa fa-video-camera" aria-hidden="true"></i></div></a>


        </div>
        
    </div>

<?php $i = 0 ?>
    <!--商品列表-->
    <div class="container goods-item" data-islogin="<?php echo ($is_login); ?>" >
        <div class="row">
            <?php if(is_array($goods)): foreach($goods as $key=>$v): ?><div class="col-xs-6" style="padding-right: 0px !important;padding-left:0px">
                    <div class="thumbnail">
                        <a href="/web/shop/index.php/Home/Goods/goods_detail/goods_id/<?php echo ($v["goods_id"]); ?>/url/Home.Index.index" target="_top">
                            <img src="/web/shop/Public/<?php echo ($v["thumb_image"]); ?>" alt="...">
                        </a>
                        <div class="caption">
                            <a style="color: #555;" href="/web/shop/index.php/Home/Goods/goods_detail/goods_id/<?php echo ($v["goods_id"]); ?>/url/Home.Index.index" target="_top"> <span class="goods-name"><?php echo ($v["goods_name"]); ?></span></a><br>
                            <span class="price" style="color:#f00">￥<?php echo ($v["shop_price"]); ?>&nbsp;&nbsp;</span><span class="text" style="text-decoration: line-through;font-size: 10px">￥<?php echo ($v["old_price"]); ?></span>
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
                <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">朕知道了</button>

            </div>
        </div>
    </div>
</div>

</body>
</html>