<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/28/028
 * Time: 21:44
 */
namespace Home\Controller;
use Think\Controller;
class GoodsController extends Controller{


    /**
     * 显示商品列表
     */
    public function showlist(){
        $m = M('category');

        if(isset($_GET['cat_id'])){
            $this->cid = $_GET['cat_id'] ;

        }else{
            $this->cid = 1 ;
        }
        if(isset($_GET['active_index'])){
            $this->active_index = $_GET['active_index'];
        }else{
            $this->active_index = 1 ;
        }


        if(!S('paraent_cat')){
            $data = $m->where('paraent_id=0')->select() ;
            // 缓存数据300秒
            S('paraent_cat',$data,120);
            $this->category = $data ;
        }else{
            $this->category = S('paraent_cat') ;
        }

       $this->display ('goods_list');
    }
    public function test (){
        $m = M('category');
        $data = $m->select() ;
        dump($data) ;
    }

    public function category(){
        //接收get参数 (父级分类id)
        $cat_id = $_GET['cat_id'] ;
        $m = M('category') ;

        //查询子分类
        $data = $m->where('paraent_id='.$cat_id)->select();
        if($data == null){
            $this->msg = '没有找到相关的数据！';
        }
        $this->sub_cat = $data ;

        $this->display ();
    }

    //某个分类下的显示商品
    public function goods(){
        $m = M('goods') ;
        $cat_id = $_GET['cat_id'] ;
        //查询该分类下的所有商品
        $data = $m->where("cat_id='$cat_id'")->select() ;
        $this->goods = $data ;
        if($data == null){
            $this->msg = '没有找到相关的数据！';
        }
        if(session('user_name')){
            $this->is_login = 1 ;

            $uname =session('user_name') ;
            $user = M('user') ;
            $data = $user->where("user_name='$uname'")->field('collection_goods_id')->find() ;
            //组织成数组
            $this->arr_id =  explode(',' , $data['collection_goods_id']) ;
        }
        $this->display();



    }

    /**
     * 搜索
     */
    public function search (){
        $m = M('goods') ;
        $name = $_REQUEST['search_content'] ;
        $data = $m ->where("goods_name like '%{$name}%' or goods_name like '{$name}%' or goods_name like '%{$name}'")->select() ;
        $this->goods = $data ;
        $this->keyword = $name ;
        $this->display('goods_list_main');

    }
    /*
     * 价格排序
     */

    public function order_by_price (){
        $name = $_GET['keyword'] ;
        $m = M('goods') ;
        $data = $m ->where("goods_name like '%{$name}%' or goods_name like '{$name}%' or goods_name like '%{$name}'")->order("shop_price")->select() ;
        $this->goods = $data ;
        $this->keyword = $name ;
        $this->display('goods_list_main');
    }

    /**
     * 商品详情
     */
    public function goods_detail(){
        $url =  I("get.url") ;
        $url = str_replace('.' , '/' , $url) ;
        $this->assign("url", $url) ;
        //得到商品的goods_id
        $goods_id = $_GET['goods_id'] ;
        $this->goods_id = $goods_id;
        $goodModel = M('goods') ;//商品模型对象
        //得到商品信息
        $goodInfo = $goodModel->where("goods_id=$goods_id")->find() ;
        //分配到模板中
        $this->assign("goodsInfo" , $goodInfo) ;
        //实例化用户模型
        $userModel = M('user') ;
        //找到所有用户的用户 id和发布商品id
        $users = $userModel->field(array("user_id" , "public_goods_id"))->select() ;
        $length = count($users) ;          //用户数量
        for ($i=0 ;$i<$length ; $i++) {
            $arr = explode(",", $users[$i]['public_goods_id']);
            foreach ($arr as $v) {
                //如果商品是该用户发布的 就获取该用户的id
                if ($v == $goods_id) {
                    $uid = $users[$i]['user_id'];
                    break;
                }
            }
        }
        if($uid){  //如果有这个用户 获取该用户的信息
            $userInfo = $userModel->where("user_id=$uid")->find() ;
            //分配变量到模板
            $this->assign("userInfo" , $userInfo);
        }
        //如果已经登录
        if(session('user_name')){
            $this->user_name = session("user_name") ;
            $this->is_login = 1 ;
            $uname =session('user_name') ;

            $user = M('user') ;


                //查询收藏商品id
            $data = $user->where("user_name='$uname'")->field('collection_goods_id')->find() ;
            $arr_id =  explode(',' , $data['collection_goods_id']) ;     //组织成数组
            foreach ($arr_id as $v){
                if($v == $goods_id){    //如果用户有收藏这个商品
                    //收藏星星 添加一个col-active类
                    $this->active = 'col-active' ;
                }
            }
        }

//        $this->loadComment();


       $this->display();
    }

    /**
     *
     * 加载评论
     */
    public function loadComment(){
        $goods_id = $_REQUEST['goods_id'];

        $m = M('comment') ;
        //查询所有的评论
        $data = $m->where("goods_id=$goods_id")->select() ;
        $json = array();
        $i = 0 ;


        //组织json 字符串
        foreach ($data as $item) {

            $json[$i]['id'] = $item['comment_id'] ;
            $json[$i]['userName'] = $item['user_name'];
            $json[$i]['time'] = $item['public_time'];
            $json[$i]['sortID'] = $item['sort_id'];
            $json[$i]['content'] = $item['comment_content'];
            $i++ ;

        }
        $comment =  json_encode($json) ;
        $this->ajaxReturn($comment);
    }

    /**
     * 新增评论
     */
    public function addNewComment(){
        $goods_id =  $_POST['goods_id'] ;
        $user_name = $_POST['user_name'] ;
        $content = $_POST['content'] ;
        $sort_id = isset($_POST['sort_id'])?$_POST['sort_id']:0 ;
        $user = M('user') ;
        //如果登录了
        if($user_name){
            $uid_arr = $user->where("user_name='$user_name'")->field("user_id")->find();
            $uid = $uid_arr['user_id'] ;
            $data['comment_content'] = $content ;
            $data['sort_id'] = $sort_id ;
            $data['user_id'] = $uid ;
            $data['user_name'] = $user_name ;
            $data['goods_id'] = $goods_id ;
        }else{
            $data['comment_content'] = $content ;
            $data['sort_id'] = $sort_id ;
            $data['goods_id'] = $goods_id ;
        }
        $com = M('comment') ;
        if($com->add($data) ){
            echo "评论成功";
        }
//        $this->ajaxReturn($content) ;
    }



}