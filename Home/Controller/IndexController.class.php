<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;

class IndexController extends Controller {

//    显示首页 并且加载火热商品
    public function index(){
        $m = M('goods') ;
        $data = $m ->where("is_hot='1'")->order("goods_id desc")->select() ;
        $this->goods = $data ;

        //如果已经登录 查询收藏的商品
        if(session('user_name')){
            $this->is_login = 1 ;
            $uname =session('user_name') ;
            $user = M('user') ;
            $data = $user->where("user_name='$uname'")->field('collection_goods_id')->find() ;
            //组织成数组
            $this->arr_id =  explode(',' , $data['collection_goods_id']) ;
        }
       $this->display () ;
    }
    public function category(){
        $this->display () ;
    }
    public function contact(){
        $this->display () ;
    }
    public function goods_list(){
        $this->display () ;
    }
    public function goods_list_main(){
        $this->display () ;
    }
    public function header(){
        $this->display () ;
    }
    public function login(){
        $this->display () ;
    }
    public function myaccount(){
        //注册跳回到登录页面显示注册名
        if(isset($_GET['user_name'])){

            $this->user_name = $_GET['user_name'] ;
        }
        $this->display () ;
    }
    public function upload_goods(){
        $this->display () ;
    }

    /**
     * 输出验证码
     */
    public function verify (){
        $conf = array (
            'imageW'=>150,
            'imageH'=>70,
            'fontSize'=>20,
            'length' =>4 ,
            'fontttf'=>'4.ttf'


        );
        $verify = new Verify($conf) ;
        $verify->useNoise = false;
        $verify->entry() ;
    }

    public function test (){

    }

}