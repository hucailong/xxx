<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\TestModel;
use App\Model\Index\UserModel;
use Illuminate\Support\Str;
class IndexController extends Controller
{
    //注册逻辑
    public function register(Request $request){
        $user_autner = $request->post('user_autner');
        if(empty($user_autner)){
            echo $this->location_href('账号为空...');
            exit;
        }else{
            $res = UserModel::where('user_autner',$user_autner)->first('user_autner');
            if ($res){
                echo $this->location_href('账号已被注册...');
                exit;
            }
        }
        $user_email = $request->post('user_email');
        if (empty($user_email)){
            echo $this->location_href('邮箱为空');
            exit;
        }else{
            $res = UserModel::where('user_email',$user_email)->first('user_email');
            if ($res){
                echo $this->location_href('邮箱已被绑定...');
                exit;
            }
        }
        $user_passwd = $request->post('user_passwd');
        $user_passwd1 = $request->post('user_passwd1');
        if (empty($user_passwd)){
            echo $this->location_href('密码为空...');
            exit;
        }else{
            if (empty($user_passwd1)){
                echo $this->location_href('确认密码为空...');
                exit;
            }else{
                if ($user_passwd==$user_passwd1){
                    $user_pwd = password_hash($user_passwd,PASSWORD_DEFAULT);
                    $data = [
                        'user_autner' => $user_autner,
                        'user_email'=> $user_email,
                        'user_pwd'  => $user_pwd,
                    ];
                    $id = UserModel::insertGetId($data);
                    if ($id){
                        echo $this->location_href('注册成功',url('/login'));
                        exit;
                    }else{
                        echo $this->location_href('网络错误稍后再试...');
                        exit;
                    }
                }else{
                    echo $this->location_href('两次密码不一致...');
                    exit;
                }
            }
        }

    }

    //登录逻辑
    public function login(Request $request){
        $user_autner = $request->post('user_autner');
        $user_pwd = $request->post('user_pwd');
        if (empty($user_autner)){
            echo $this->location_href('账号不能为空...');
            exit;
        }else{
            $res = UserModel::where('user_autner',$user_autner)->first();
            if ($res){

                $session = [
                    'user_id' =>$res->user_id,
                    'user_autner' =>$res->user_autner,
                    'user_name' =>$res->user_name,
                ];
                if (password_verify($user_pwd,$res->user_pwd)){

                    session(['user' =>$session]);
                    echo  $this->location_href('登录成功',url('/'));
                }else{
                    echo  $this->location_href('账号或密码错误...');
                }
            }else{
                echo $this->location_href('账号或密码错误...');
                exit;
            }
        }

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

    //测试session
    public function test(Request $request){
        //$session = $request->session()->get('key');
        $s = session()->all();
        var_dump($s);
    }
}
