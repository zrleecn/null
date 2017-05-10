<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/29/029
 * Time: 13:31
 */
namespace Tools;
class Common {
    /**
     * @param $to array 接受者的邮箱
     */
    public function send ($to ,$msg,$type='HTML'){
        date_default_timezone_set('PRC');
        $smtpserver = "smtp.163.com";//SMTP服务器
        $smtpserverport = 25;//SMTP服务器端口
        $smtpusermail = "13005564315@163.com";//SMTP服务器的用户邮箱
//        $smtpemailto = '45418406@qq.com';//发送给谁
        $smtpuser = "13005564315";//SMTP服务器的用户帐号(或填写new2008oh@126.com，这项有些邮箱需要完整的)
        $smtppass = "13324441777a";//客户端授权码
        $mailtitle =$msg['title'];//邮件主题
        $mailcontent = $msg['content'];
        $mailtype = $type;//邮件格式（HTML/TXT）,TXT为文本邮件
        //************************ 配置信息 ****************************
//        include './Tools/smtp.class.php';
//        $smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $smtp = new smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
        for($i = 0 ;$i < count($to) ; $i++){
           $state =  $smtp->sendmail($to[$i], $smtpusermail, $mailtitle, $mailcontent, $mailtype);
        }

        if ($state == "") {
           return false ;
        }else{
            return true ;
        }





    }
}