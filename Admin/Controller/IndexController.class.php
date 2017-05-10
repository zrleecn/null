<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/29/029
 * Time: 10:00
 */

namespace Admin\Controller ;
use Admin\Controller;

class IndexController extends CommonController {

    /**
     * 我的商品列表
     */
    public function my (){
        $m = M('user') ;

        $name = session('user_name');
        //查询用户发布的商品id
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
         $this->display();
    }

    /**
     * 我的收藏商品列表
     */
    public function collection(){
        $m = M('user') ;
        $name = session('user_name');
        //查询用户收藏的商品id
        $data = $m->where("user_name='$name'")->find() ;
        $goodsModel = M('goods') ;
        if($data['collection_goods_id']){
            $this ->goods = $goodsModel->select($data['collection_goods_id']);
        }

        //
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

        //
        $this->display();

    }
}