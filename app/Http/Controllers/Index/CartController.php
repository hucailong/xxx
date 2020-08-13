<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Model\Index\GoodsModel;
use App\Model\Index\CartModel;
class CartController extends Controller
{
    /**
     * 加入购物车 -- mysql
     */
    public function addcart(Request $request)
    {
        $user_id = session('user')['user_id'];
        $good_id = $request->input('good_id'); 
        $num = $request->input('num'); 
        $goods_num = GoodsModel::where('goods_id',$good_id)->value('goods_number');
        $data = [
            'goods_id'=>$good_id,
            'uid'=>$user_id,
            'is_del'=>0
        ];
        if(empty($user_id)){
            return $data=['msg'=>'请先登录!','error'=>100001];
        }else{
            $cartInfo = CartModel::where($data)->first();
            if($cartInfo){
                // 检测库存
                $buy_num=$cartInfo['goods_count'] + $num;
                if($buy_num > $goods_num){
                    $buy_num = $goods_num;
                    CartModel::where($data)->update(['goods_count'=>$buy_num]);
                    return $data=['msg'=>'购买数量超过库存!','error'=>100002];
                }else if($buy_num < $goods_num){
                    // 累加
                    CartModel::where($data)->update(['goods_count'=>$buy_num]);
                    return $data=['msg'=>'加入购物车成功!','error'=>0];
                }
            }else{
                // 检测库存
                $buy_num=$cartInfo['goods_count'] + $num;
                if($buy_num > $goods_num){
                    $buy_num = $goods_num;
                    CartModel::where($data)->update(['goods_count'=>$buy_num]);
                    return $data=['msg'=>'购买数量超过库存!','error'=>100002];
                }else if($buy_num < $goods_num){
                    // 添加商品到购物车
                    $goodsInfo = [
                        'uid'   => $user_id,
                        'goods_id'  => $good_id,
                        'goods_count'   => $num        
                    ];
                    $cartData = CartModel::insertGetId($goodsInfo);
                    return $data=['msg'=>'加入购物车成功!','error'=>0];
                }
            }
        }   
    }

    public function cartList()
    {
        return view('Index.cart');
    }
    
    public function goodsInfo($good_id){
        return  GoodsModel::find($good_id)->toArray();
    }
}
