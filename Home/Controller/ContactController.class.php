<?php
namespace Home\Controller;
use Tools\Common;
use Think\Controller;


class ContactController extends Controller {

    public function send(){
        $content = $_POST['content'] ;
        $mail = $_POST['email'] ;
        $tool = new Common() ;
        //邮箱接收者
        //array("1316356119@qq.com","1059434737@qq.com","1872091459@qq.com" ,"2996453960@qq.com" ,"1799328692@qq.com","763984017@qq.com")
        $to = array(
            "13005564315@163.com",
//            "1059434737@qq.com",
//            "1872091459@qq.com" ,
//            "2996453960@qq.com" ,
//            "1799328692@qq.com",
//            "763984017@qq.com"
        ) ;
        $msg = array(
            "title" => "用户发出联系请求通知！",
            "content"=> "用户请求内容：".$content."\n"."用户邮箱：".$mail
        );
        $state = $tool->send($to,$msg,"TXT");
        if($state){
            $this->success('发出请求成功！请等待管理员处理！',U("Home/Index/contact") ,2);
        }
    }

    public function test (){
        $this->success('操作成功' , U('Home/index/index'),3);
    }

}