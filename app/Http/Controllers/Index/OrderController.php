<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Model\Index\OrderModel;
use App\Model\Index\OrderGoodsModel;
use App\Model\Index\GoodsModel;




class OrderController extends Controller
{
    public function queren(){
        $goods_ids=request()->get("goods_id");
        return view('order.queren',['goods_ids'=>$goods_ids]);
    }

    public function orderSubmit(){
        $user_id=session('user.user_id');
        $goodslist=$this->cartList();
        $total=0;
        foreach ($goodslist as $key => $value) {
             $total += $value['shop_price'] * $value['num'];
        }

        $pay_type="1";
        $order_on=$user_id.date('YmdHis',time()).rand('000000','999999');

        $data=[
            'order_on'=>$order_on,
            'user_id'=>$user_id,
            'order_morey'=>$total,
            'pay_type'=>$pay_type
        ];
        $AddOrderModel = OrderModel::insert($data);
        if(!$AddOrderModel){
            echo json_encode(['error_no' => '1', 'error_msg' => "添加订单失败"]);die;
        }
        $order_id=orderModel::where(['order_on'=>$data['order_on']])->value('order_id');
        foreach ($goodslist as $k => $v) {
            $goods_id=$v['goods_id'];
            $buy_num=$v['sale_num'];
            $data=[
                'order_id'=>$order_id,
                'goods_id'=>$goods_id,
                'buy_num'=>$buy_num
            ];
            $AddOrderGoodsModel=OrderGoodsModel::insert($data);
        }
        if(!$AddOrderGoodsModel){
            echo json_encode(['error_no' => '1', 'error_msg' => "添加订单详情失败"]);die;
        }
        //减少库存
        foreach ($goodslist as $ks => $vs) {
            $where=[
                'goods_id'=>$vs['goods_id']
            ];

            $goods_num=GoodsModel::where($where)->value('goods_number');
            $last_num=$goods_num - $vs['sale_num'];
            $date=[
                'goods_number' => $last_num
            ];
            $UpdateGoods=GoodsModel::where($where)->update($date);
        }
        if(!$UpdateGoods){
            echo json_encode(['error_no' => '1', 'error_msg' => "减少库存失败"]);die;
        }
        $order_id=OrderModel::where(['order_id'=>$order_id])->value('order_id');
        if($UpdateGoods == "true" || $AddOrderModel == "true" || $AddOrderGoodsModel== "true"){
            echo json_encode(['error_no' => '0', 'error_msg' => "提交订单成功",'order_id'=>$order_id]);die;
        }



    }



}
