<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Index\GoodsModel;
class CartController extends Controller
{
        public function addcart($good_id){
            $user_id = session('user')['user_id'];
            if ($user_id){
                //TODO 登录mysql
               $goodsInfo = $this->goodsInfo($good_id);

            }else{

                //TODO 未登录cookie
            }
            var_dump($user_id);
            var_dump($good_id);
        }
    public function cart(){
        return view('Index.cart');
    }

        public function goodsInfo($good_id){
           return  GoodsModel::find($good_id)->toArray();
        }
}
