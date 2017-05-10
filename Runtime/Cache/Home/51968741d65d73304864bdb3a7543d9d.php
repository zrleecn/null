<?php if (!defined('THINK_PATH')) exit();?><!--
某件商品详细
   -->

<!doctype html>
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
    <script src="/web/shop/Public/js/holder.js"></script>
    <script src="/web/shop/Public/js/device.min.js"></script>
    <script src="/web/shop/Public/js/check_device.js"></script>
    <link rel="stylesheet" href="/web/shop/Public/css/goods_detail.css">
    <link rel="stylesheet" href="/web/shop/Public/css/zyComment.css">
    <link rel="stylesheet" href="/web/shop/Public/css/semantic.css">
    <title>详细信息</title>
</head>

<script>


    //点击心 添加删除类
   $(function (){
       $('.fa-star-o').click(function () {
        var goods_id = $(this).data('id');
        var is_login = $('.detail-header').data('islogin');
        if(is_login){
            $.ajax({
                type:"post",
                url:"/web/shop/index.php/Admin/User/add_collect",
                data:{
                    "goods_id":goods_id
                },
                success: function (msg){
                    //设置模态框的值
                    $('.modal-body').text(msg) ;


                }
            })
        }


           $(this).toggleClass('col-active') ;
       })
   })
</script>

<style>
    .col-active{
        color: #f00;
    }

</style>
<body>

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
                <!--<a href="/web/shop/index.php/Admin/Goods/delete_collection/goods_id/" type="button" class="btn-ok btn btn-primary btn-lg">确定</a>-->
                <button type="button" class="btn btn-cancel btn-default btn-lg" data-dismiss="modal">朕知道了</button>

            </div>
        </div>
    </div>
</div>






<div class="container detail-header" data-islogin="<?php echo ($is_login); ?>">
    <div class="row de-title">
        <!--返回-->
        <a href="/web/shop/index.php/<?php echo ($url); ?>"><div class="col-xs-3 "><i class="fa fa-angle-left" aria-hidden="true"></i></div></a>
        <div class="col-xs-6 goods-nav">
            <h3>商品详情</h3>
        </div>
        <div class="col-xs-3">
            <i class="fa fa-star-o <?php echo ($active); ?>"  data-toggle="modal" data-target="#myModal" aria-hidden="true" data-id="<?php echo ($goods_id); ?>" data-user_name="<?php echo ($user_name); ?>"></i>
        </div>
    </div>
</div>

<div class="container no-pa">

    <!--定义变量-->
    <?php $userInfo = $userInfo; ?>
    <?php $goodsInfo = $goodsInfo; ?>

    <div class="row no-pa">
        <img src="/web/shop/Public/<?php echo ($goodsInfo["thumb_image"]); ?>" width="100%" height="260" alt="">
    </div>
    <div class="goods-title">
        <br>
        <p class="text-left  lead"><?php echo ($goodsInfo["goods_name"]); ?></p>
        <p class="price">￥<?php echo ($goodsInfo["shop_price"]); ?></p>
    </div>
    <div class="goods-detail">

        <h4 style="padding-top: 6px;">商品详情</h4>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <td width="35%">名称</td>
                <td><?php echo ($goodsInfo["goods_name"]); ?></td>
            </tr>
            <tr>
                <td>商品发布时间</td>
                <td><?php echo ($goodsInfo["public_time"]); ?></td>
            </tr>

            <tr>
                <td>商品价格</td>
                <td><?php echo ($goodsInfo["shop_price"]); ?></td>
            </tr>
            <tr>
                <td>商品发布者</td>
                <td><?php echo ($userInfo["user_name"]); ?></td>
            </tr>
            <tr>
                <td>学校名称</td>
                <td><?php echo ($userInfo["school_name"]); ?></td>
            </tr>
            <tr>
                <td>手机号码</td>
                <td><?php echo ($userInfo["tel_phone"]); ?></td>
            </tr>
            <tr>
                <td>qq号码</td>
                <td><?php echo ($userInfo["qq_number"]); ?></td>
            </tr>
            <tr>
                <td>微信号码</td>
                <td><?php echo ($userInfo["wechat"]); ?></td>
            </tr>
        </table>
    </div>
</div>




<div id="articleComment">

</div>






<script type="text/javascript" src="/web/shop/Public/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/web/shop/Public/js/zyComment.js"></script>

<script type="text/javascript">
    var goods_id = $('.fa-star-o').data('id');
    var user_name = $('.fa-star-o').data('user_name') ;
    var content = "" ;
    var time_str ="";
    var the_sort_id ;  //被恢复的id
    function getid(obj){
       the_sort_id = $(obj).data("id") ;
    }
    function reply(){
        var id = the_sort_id ;
        content = $('#commentContent').val();
        var date = new Date() ;
        time_str+= date.getFullYear() +"-"+(date.getMonth()+1)+"-"+date.getDate();
        $.ajax({
            type:"post" ,
            url :"/web/shop/index.php/Home/Goods/addNewComment",
            data:{
                "goods_id":goods_id,
                "user_name":user_name,
                "content": content,
                "sort_id":id
            },
            success:function(msg){
              //  alert(msg);
                location.reload() ;
            }
        })
    }
//    function resetId(){
//       the_sort_id = 0 ;
//    }

    function newReply() {
        content = $('#commentContent').val();
        var date = new Date() ;
        time_str+= date.getFullYear() +"-"+(date.getMonth()+1)+"-"+date.getDate();
        $.ajax({
            type:"post" ,
            url :"/web/shop/index.php/Home/Goods/addNewComment",
            data:{
                "goods_id":goods_id,
                "user_name":user_name,
                "content": content
            },
            success:function(msg){
                //  alert(msg);
                location.reload() ;
            }
        })
    }

    var jsonData ;
    var agoComment  ;
    $.ajax({
        type:"post",
        url:"/web/shop/index.php/Home/Goods/loadComment",
        data:{
            "goods_id":goods_id
        },
        success:function (msg){


                if(msg){

                   agoComment = JSON.parse(msg)
                    $("#articleComment").zyComment({

                        "width":"355",
                        "height":"33",
                        "agoComment":agoComment,
                        "callback":function(comment){
                            console.info("填写内容返回值：");
                            console.info(comment);

                            // 添加新的评论
                            $("#articleComment").zyComment("setCommentAfter",{"id":345, "name":user_name, "content":content, "time":time_str});

                        }
                    });

                }


        }
    })


//    var agoComment = [
//        {"id":1,"userName":"游客1","time":"2014-04-04","sortID":0,"content":"第一条评论"},
//        {"id":3,"userName":"站长","time":"2014-04-04","sortID":1,"content":"www.zrlee.cn"},
//        {"id":2,"userName":"游客2","time":"2014-04-04","sortID":0,"content":"zrlee"},
//        {"id":4,"userName":"站长","time":"2014-04-04","sortID":2,"content":"第二条评论的回复"},
//        {"id":5,"userName":"游客3","time":"2014-04-04","sortID":0,"content":"第三条评论"},
//        {"id":6,"userName":"游客2","time":"2014-04-04","sortID":5,"content":"第二条评论的回复的回复"},
//    ];

//    var agoComment = [
//        {"id":1,"userName":"游客1","time":"2014-04-04","sortID":0,"content":"第一条评论"},
//        {"id":3,"userName":"站长","time":"2014-04-04","sortID":1,"content":"www.zrlee.cn"},
//        {"id":2,"userName":"游客2","time":"2014-04-04","sortID":0,"content":"zrlee"},
//        {"id":4,"userName":"站长","time":"2014-04-04","sortID":2,"content":"第二条评论的回复"},
//        {"id":5,"userName":"游客3","time":"2014-04-04","sortID":0,"content":"第三条评论"},
//        {"id":6,"userName":"游客2","time":"2014-04-04","sortID":5,"content":"第二条评论的回复的回复"},
//    ];




</script>

</body>
</html>