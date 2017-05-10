<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/28/028
 * Time: 17:43
 */
namespace Admin\Controller;

use Think\Controller;
use Think\Verify;
use Tools\Common;

class UserController extends Controller{


    public function login  (){

        $data = $_POST ;
        $m = M('user') ;
        $username = $data['user_name'] ;
        $pwd = $_POST['password'] ;
        $row = $m->where('user_name='."'$username'")->find();
        if($row){
            $check_pwd = $row['password'];
            if(md5($pwd) === $check_pwd){
                session('user_name',$username);
                session('is_login' , '1') ;
                ini_set('session.gc_maxlifetime',21600);

                $this->success("登录成功" ,U("Admin/Index/my") , 1);
            }else{
                $this->error("密码错误" ,U("Home/Index/myaccount") , 1);
            }
        }else{
            $this->error("用户不存在" ,U("Home/Index/myaccount") , 1);
        }

    }

    public function register(){
        $this->display();
    }

    /**
     * 注册用户
     */
    public function adduser(){
        $m = M('user') ;

        $data = $m->create() ;
        $data['password'] = md5($data['password']) ;
        $register_time = time() ;
        $data['register_time'] = $register_time;
        if($data){
            if($m->add($data)){  //注册成功
                //发送邮箱通知
                $send = new Common();
                // array("1316356119@qq.com","1059434737@qq.com","1872091459@qq.com" ,"2996453960@qq.com" ,"1799328692@qq.com","763984017@qq.com"),
                $send->send(
                    array("13005564315@163.com"),
                    array(
                        "title"=>"新用户注册提醒",
                        //激活地址"<a href='http://shop.sweetencounter.cn/index.php/Admin/User/active/uname/{$data['user_name']}'>http://shop.sweetencounter.cn/index.php/Admin/User/active/uname/{$data['user_name']}</a>"
                        "content"=>"用户{$data['user_name']}"."在".date('Y-m-d H:i:s' , time()) ."注册了二手市场用户！"."<br>"
                        ."这是用户激活链接(请不要点击，由用户自己激活)："."\"<a href='http://shop.sweetencounter.cn/index.php/Admin/User/active/uname/{$data['user_name']}'>http://shop.sweetencounter.cn/index.php/Admin/User/active/uname/{$data['user_name']}</a>\""
                    )
                    );
                //发送激活邮箱 暂时不发送
              /*  $send->send(array($data['email']) , array(
                    "title"=>"确认激活账号通知",
                    "content"=>"用户{$data['user_name']}"."您好！为了确认您的注册信息正确性，请点击这里激活您的账号\n<br>".date('Y-m-d H:i:s' , time()).
                        "<br>
                        <a href='http://shop.sweetencounter.cn/index.php/Admin/User/active/uname/{$data['user_name']}'>http://shop.sweetencounter.cn/index.php/Admin/User/active/uname/{$data['user_name']}</a>
                    "
                )) ;
              */

                $this->success('注册成功！请进入邮箱进行激活',U("Home/Index/myaccount/user_name/{$data['user_name']}") , 2);
            }
        }
    }

    /*
     * 激活邮箱
     */
    public function active($uname){
        $m = M('user') ;
        $data['is_active'] = '1' ;
        $m ->where('user_name='."'$uname'")->save($data);

        $this->success('激活成功！' , 'http://shop.sweetencounter.cn/index.php/Admin/Index/my',2);
    }
    public function test (){
        $g = M('goods') ;
         $row = $g->where("goods_id=12")->field('collect_num')->find() ;
         echo  $row['collect_num'] + 1 ;

    }


    /*
     * 检查验证码
     */
    public function check (){
        $verify = new Verify() ;
        $code = $_POST['vcode'] ;

        if( $verify->check($code)){

            echo "1"; // 验证码正确
        }else{
            echo "0";
        }
    }
    /*
     * 检查用户名是否正确
     */
    public function check_uname(){
        $m = M('user');
        $uname = $_POST['uname'] ;
        $row = $m ->where('user_name='."'$uname'")->find() ;
        if($row){
            if($row['user_name'] == $uname){// 用户存在
                echo "1" ;
            }else{
                echo "0" ;
            }
        }else{
            echo "0" ;  // 用户不存在
        }
    }

    /**
     * 检查用户密码
     */
    public function check_pwd(){
        $m = M('user');
        $pwd = md5($_POST['pwd']) ;
        $uname = $_POST['uname'] ;
        $row = $m ->where('password='."'$pwd' and user_name=". "'$uname'" )->find() ;
        if($row){
            if($row['password'] == $pwd || $uname=$row['user_name']){// 密码正确
                echo "1" ;
            }else{
                echo "0" ;
            }
        }else{
            echo "0" ;  // 密码错误
        }
    }

    /**
     * 退出登录
     */
    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect('Home/Index/myaccount','','2');
    }

    public function add_collect(){

        $goods_id = $_POST['goods_id'] ;

        $user = M('user') ;
        $uname = session('user_name') ;
        $row = $user->where("user_name='$uname'")->field('collection_goods_id')->find() ;
      //  echo $row['collection_goods_id'] ;
        //组织成数组
        $arr_id = explode(',' , $row['collection_goods_id']) ;

        if(! in_array($goods_id , $arr_id)){  // 还没有收藏
            array_push($arr_id,$goods_id) ;
            $str_id = implode(',' , $arr_id) ;
            $data['collection_goods_id'] = $str_id ;

            if($user->where("user_name='$uname'")->save($data)){

                //修改商品收藏数量
                $good = M('goods') ;
                $row = $good->where("goods_id=$goods_id")->field('collect_num')->find() ;
                $new_num = $row['collect_num'] +1 ;
                $numdata['collect_num'] = $new_num ;
                $good->where("goods_id=$goods_id")->save($numdata);
                echo "收藏成功！" ;
            }else{
                echo "收藏失败！";
            }
        }else{  // 已经收藏的移除收藏
            $index = array_search($goods_id , $arr_id) ;
            unset($arr_id[$index]) ;
            //id array 转字符串
            $str_id = implode(',' , $arr_id) ;
            $data['collection_goods_id'] = $str_id ;
            if($user->where("user_name='$uname'")->save($data)){
                //修改商品收藏数量
                $good = M('goods') ;
                $row = $good->where("goods_id=$goods_id")->field('collect_num')->find() ;
                $new_num = $row['collect_num'] -1 ;
                $numdata['collect_num'] = $new_num ;
                $good->where("goods_id=$goods_id")->save($numdata);
                echo "取消收藏成功！" ;
            }else{
                echo "取消收藏失败！";
            }
        }
    }


}