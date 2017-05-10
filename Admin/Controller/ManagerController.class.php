<?php
/**
 * Created by PhpStorm.
 * User: 李振如
 * Date: 2017/5/7/007
 * Time: 10:09
 */
namespace Admin\Controller ;
use Think\Controller ;
class ManagerController extends  CommonController {
    /**
     * 个人中心入口
     */
    public function manager () {
        //计算商品数量以及收藏商品数量
        $user_name = $this->count() ;
        $this->assign("user_name" , $user_name);
        $m = M('user') ;
        $user_info = $m->where("user_name='$user_name'")->find();
        $this->assign("user_info" , $user_info);
        $this->display () ;
    }

    /**
     * 用户信息
     */
    public function myinfo () {
        //获得用户信息

        $user_name = session('user_name') ;
        if($user_name){
            $m = M('user') ;
            $data = $m->where ("user_name='$user_name'")->find();
            $this->assign('user_info' , $data) ;


        }
        $this->display () ;
    }


    /**
     * 修改用户信息
     */
    public function modify () {

        $m = M('user') ;
        $uname = session('user_name') ;
        if($uname){
            $row = $m->where("user_name='$uname'")->find() ;
            $this->assign("user_info" , $row);
        }
        $this->display ();
    }

    /**
     * 更新修改的用户信息
     */
    public function modify_update(){
        $uname = session("user_name") ;
        $m = M('user') ;
        $db_data = $m->where("user_name='$uname'")->find() ;

        //如果用户修改用户名
        if($db_data['user_name'] != $_POST['user_name'] || isset($_POST['user_name'])){

            //改变session 保存的 user_name
            session("user_name" , $_POST['user_name']) ;
        }
        if($uname){
            $data = $m->create($_POST) ;
            if($data) {
                if($m->where("user_name='$uname'")->save($data)){

                    $this->success("修改成功" ,U('Admin/Manager/myinfo') ,1) ;
                }else{
                    $this->error("修改失败" ,U('Admin/Manager/modify') ,1) ;
                }
            }else{
                $this->error("修改失败" ,U('Admin/Manager/modify') ,1) ;
            }

        }

    }








    /**
     * 计算商品数量以及收藏商品数量
     */
    public function count(){
        $m = M('user') ;
        $name = session('user_name');
        //查询用户发布的商品id
        if($name){
            $data = $m->where("user_name='$name'")->find() ;

            $goodsModel = M('goods') ;
            if($data['public_goods_id']) {
                $this ->goods = $goodsModel->select($data['public_goods_id']);
            }


            if($data['public_goods_id']){
                $ids = '(' . $data['public_goods_id'] .")" ;

                //计算自己的商品数量
                $mygoodscount =$goodsModel->where("goods_id in $ids")->count();
                $this->mygoodscount = $mygoodscount ;
            }else{
                $this->mygoodscount = 0 ;
            }
            //计算自己的收藏数量
            if($data['collection_goods_id']){
                $ids = '('.$data['collection_goods_id'].")" ;
                $col_count = $goodsModel->where("goods_id in $ids")->count();

                $this->col_count = $col_count;
            }else{
                $this->col_count = 0;
            }

            return $name ;
        }
    }


}

