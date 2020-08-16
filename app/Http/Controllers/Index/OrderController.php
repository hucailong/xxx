<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Model\Index\OrderModel;


class OrderController extends Controller
{


    public function generate(){
        $goods_ids=request()->get("goods_id");

        $user_id=session("user.user_id");
        if($user_id==""){
            echo "请登录";
            header("refresh:2;url=/login");
        }
        $time=time();

        $goodslist=$this->cartList();
        $total=0;
        foreach ($goodslist as $key => $value) {
            $order_hao=$user_id.date("Ymdhis",$time).rand(00000,99999);
            $goods_id=$value['id'];
            $goods_num=floor($value['num']);
            $total += $value['shop_price'];
            $data=[
                'order_on'=>$order_hao,
                'goods_id'=>$goods_id,
                'goods_num'=>$goods_num
            ];
            $AddOrder=OrderModel::insert($data);

        }

        if($AddOrder){
            header("refresh:2;url=/alipay?total=".$total);
        }
//        dd($goodslist);


    }
}
