/**
 * Created by Administrator on 2017/5/6/006.
 */



$.ajax({
    type:"get",
    url:"__APP__/Home/Goods/loadComment",
    success:function (msg){
        alert(1);
        var json = JSON.parse(msg) ;
        alert(json[0].comment_content) ;
    }
})
function check (){

    var uname = $('.user_name').val();
    if(uname==null || uname == undefined || uname==''){
        $('.user_name ~ p').text("用户名不能为空");
    }else{
        $.ajax({
            url:"__APP__/Admin/User/check_uname",
            type:"post",
            data:{
                "uname":uname
            },
            success:function (msg){
                //验证码正确返回真 正常提交表单 否则不提交
                if(msg == 1) {
                    $('.user_name ~ p').text("");
                }else{
                    $('.user_name ~ p').text("用户不存在");
                }
            }
        })
    }


}

$(function (){

    check () ;
//        点击登录按钮
    $('.btn-login').click(function (){
        //获取用户输入的验证码
        var vcode = $('.vcode').val() ;
//            var flag = false ;
        if(vcode==null || vcode == undefined || vcode==''){
            alert('验证码不能为空');
            return false ;
        }else{
//                异步请求检查验证码是否正确
            $.ajax({
                url:"__APP__/Admin/User/check",
                type:"post",
                data:{
                    "vcode":vcode
                },
                success:function (msg){
                    //验证码正确返回真 正常提交表单 否则不提交
                    if(msg == 1) {
                        $("form").submit();
                    }else{
                        alert("验证码错误");
                        //刷新验证码
                        $('.vcode-img').click();
                        return false ;
                    }
                }
            })
        }

    });  //end btn click


    //异步检查用户
    $('.user_name').keyup(function (){
        var uname = $('.user_name').val();
        if(uname==null || uname == undefined || uname==''){
            $('.user_name ~ p').text("用户名不能为空");
        }else{
            $.ajax({
                url:"__APP__/Admin/User/check_uname",
                type:"post",
                data:{
                    "uname":uname
                },
                success:function (msg){
                    //验证码正确返回真 正常提交表单 否则不提交
                    if(msg == 1) {
                        $('.user_name ~ p').text("");
                    }else{
                        $('.user_name ~ p').text("用户不存在");
                    }
                }
            })
        }

    });

    //异步检查密码
    $('.password').keyup(function (){
        var pwd = $('.password').val();
        var uname = $('.user_name').val();
        if(pwd==null || pwd == undefined || pwd==''){
            $('.password ~ p').text("密码不能为空");
        }else{
            $.ajax({
                url:"__APP__/Admin/User/check_pwd",
                type:"post",
                data:{
                    "pwd":pwd,
                    "uname":uname
                },
                success:function (msg){
                    //验证码正确返回真 正常提交表单 否则不提交
                    if(msg == 1) {
                        $('.password ~ p').text("");
                    }else{
                        $('.password ~ p').text("密码错误");
                    }
                }
            })
        }

    });


})
