<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/29/029
 * Time: 10:00
 */

namespace Admin\Controller ;
use Admin\Controller;

class GoodsController extends CommonController {

    /**
     * 上传商品
     */
    public function upload_goods(){
        $goods = M('category') ;
        $data = $goods->select() ;
        $this->category = $data ;

        $this->display ();
    }

    /**
     * 删除发布的商品
     */

    public function delete_goods(){
        $m = M('goods') ;
        $id = $_GET['goods_id'] ;
       if($m->where("goods_id='$id'")->delete()){

           //删除用户表对应的发布商品id
           $user = M('user') ;
           $uname = session('user_name') ;

           $public_id = $user->where("user_name='$uname'")->field('public_goods_id')->find() ;
           //组织成数组
           $arr_id = explode(',',$public_id['public_goods_id']) ;
           $index = array_search($id , $arr_id) ;
           if($index !== false) {
               unset($arr_id[$index]);
           }
           $str_id = implode(',' , $arr_id) ;
           $user = M('user');
           $update['public_goods_id'] = $str_id ;
           if($user->where("user_name='$uname'")->save($update) ){
               $this->success('移除商品成功',U('Admin/Index/my'),1);
           }else{
               $this->error('移除失败！',U('Admin/Index/my') ,1);

           }

       }else{
           $this->error('移除商品失败',U('Admin/Index/my'),1);
       }



    }

    /**
     * 删除收藏的商品
     */

    public function delete_collection(){
        $m = M('user') ;
        $user_name = session('user_name') ;  //当前操作的用户
        if(!$user_name){
            $this->error("您还没有登录" , U('Home/Index/myaccount'),2) ;
        }
        $goods_id = $_GET['goods_id'] ;   //获得要删除的收藏商品的id
        //查询该用户的收藏商品id
        $data = $m->where("user_name='$user_name'")->field('collection_goods_id')->find();
        $arr_id = explode(',' , $data['collection_goods_id']) ;
        $index = array_search($goods_id , $arr_id);
        //移除商品id
        unset($arr_id[$index]) ;
        //组织成字符串
        $str_id = implode(',' , $arr_id) ;
        $update['collection_goods_id'] =$str_id ;
        if($m->where("user_name='$user_name'")->save($update) ){
            $this->success('移除成功！',U('Admin/Index/collection'));
        }else{
            $this->error('移除失败！',U('Admin/Index/collection'));
        }


    }

}