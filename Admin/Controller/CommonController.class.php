<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/29/029
 * Time: 10:03
 */
namespace Admin\Controller ;
use Think\Controller;
class CommonController extends Controller{
    public function _initialize(){
       $uname =  session('user_name');
       $is_login =  session('is_login') ;

        if($is_login!='1' || !$uname){

            $this->error('您还没有登录！请登录',U('Home/Index/myaccount'),2);

        }
        $m = M('user') ;
        $row = $m->where("user_name='$uname'")->find() ;
        if($row['is_active'] !='1'){
           $this->error('您还没有激活邮箱!请登录邮箱激活！',"http://w.mail.qq.com") ;
        }
    }
}
