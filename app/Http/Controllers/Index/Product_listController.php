<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Index\GoodsModel;
use App\Model\Admin\VideoModel;
use Illuminate\Support\Facades\Redis;

class Product_listController extends Controller
{
    public function index(){

        //文件名
        $fileName = "buffer.html";
        //过期时间
        $cache = 180;
        //判断如果文件存在 或者 当前时间减创建时间小于过期时间则
        if(file_exists($fileName) && time()-filemtime($fileName)<$cache){
//            echo "有缓存";echo "<br>";
            $content = file_get_contents($fileName);
            echo $content;
            die;
        }


        $is_now = GoodsModel::where('is_new',1)->orderBy('goods_id','DESC')->limit(6)->get()->toArray();
        $is_hot = GoodsModel::where('is_hot',1)->orderBy('sale_num','DESC')->limit(4)->get()->toArray();
        $is_slideshow = GoodsModel::where('is_hot',1)->orderBy('sale_num','DESC')->limit(3)->get()->toArray();
        //开启静态缓存
        ob_start();
        //生成页面
        echo view("Index.index",["is_now"=>$is_now,"is_hot"=>$is_hot,"is_slideshow"=>$is_slideshow])->__toString();
        //获取缓存
        $content = ob_get_contents();
        //写入文件
        file_put_contents("buffer.html",$content);
        //清空缓存
        ob_end_clean();
//        echo "无缓冲";echo "<br>";
        echo $content;

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
            $good_video = [
                'm3u8' => 'video_out/218.m3u8',
            ];
        }

        return view('Index.product_details',['good_info'=>$good_info,'good_video'=>$good_video]);
    }

    public function product_enshrine($good_id) {
        $good_info = GoodsModel::find($good_id);
        if ($good_info){
            $good_info = $good_info->toArray();
            // print_r( $good_info) ;
        }else{
            return view('Index/error_404');
        }

        if (!session('user')) {
            echo   $this->location_href('您未登录，正跳转至登录页面....',url('/index/login'));
        }else{

        }
    }
    public function collect_do(Request $request){
        $user_id=session('user.user_id');
        $k='user_id_'.$user_id;
        dd($k);
        Redis::zrevRange();
        $goods_id=request()->post("goods_id");


    }



    // 商品展示
    public function product_list(Request $request){
        $s = $request->get('s');
        $where[] = [
            'goods_name','like',"%{$s}%"
        ];
        $search = GoodsModel::where($where)->orderBy('goods_id','desc')->paginate(6);
        $data = [
            'data'=>$search
        ];


        return view('Index.product_list',$data);
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
