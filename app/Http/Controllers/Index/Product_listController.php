<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Index\GoodsModel;
use App\Model\Admin\VideoModel;
class Product_listController extends Controller
{
    //
    public function index(){
//        $this->product_info();
        $is_now = GoodsModel::where('is_new',1)->orderBy('goods_id','DESC')->limit(6)->get()->toArray();

        $is_hot = GoodsModel::where('is_hot',1)->orderBy('sale_num','DESC')->limit(6)->get()->toArray();
        return view('Index.index',['is_now'=>$is_now,'is_hot'=>$is_hot]);
    }

    public function product_info(){
        var_dump(GoodsModel::where('is_new',1)->orderBy('goods_id','DESC')->limit(4)->get());
    }

    public function product_details($good_id){
        $good_info = GoodsModel::find($good_id);
        if ($good_info){
            $good_info = $good_info->toArray();
        }else{
            return view('Index/error_404');
        }
        $good_video = VideoModel::where('goods_id',$good_id)->first('m3u8');
        if ($good_video){
            $good_video = $good_video->toArray();
        }else{
            return view('Index/error_404');
        }

        return view('Index.product_details',['good_info'=>$good_info,'good_video'=>$good_video]);
    }


    /**
     * 跳转提示
     * @param $alert
     * @param string $path
     * @return string
     */
    public function location_href($alert,$path=''){
        if ($path == ''){
            $path = url()->previous();
        }
        return  "<script>"."alert('".$alert."')".",location.href='".$path."'</script>";
    }

}
