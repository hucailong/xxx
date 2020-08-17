<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Index\UserModel;
use Illuminate\Support\Facades\Mail;

class FindPassController extends Controller
{
    /**
     * 修改密码
     */
    public function findpass()
    {
        return view('findpass/findpass');
    }
     /**
     * 执行修改密码
     */
    public function findpassdo()
    {
        $post = request()->except('_token'); 

        $user = session('user');

        // 获取用户信息
        $u = UserModel::where('user_id','=',$user['user_id'])->first();
        // 判断密码
        $result = password_verify($post['user_pwd'],$u['user_pwd']);
        if($result != $u['user_pwd']){
			echo "旧密码不正确";die;
        }
         //加密新密码
         $post['user_pwd'] = password_hash($post['user_pwd'],PASSWORD_BCRYPT);
         // 修改  加密
        $res = UserModel::where('user_id','=',$user['user_id'])->update(['user_pwd'=>$post['user_pwd']]);
        
         //新密码修改成功 给用户发送邮件
         if($res){
            echo "修改密码成功 请重新登陆";
            $data=[
				'user_name' => $u['user_name']
			];

            Mail::send('email.passemail',$data,function($message){
                $to = [
                    '1807578838@qq.com',
                ];
                $message->to($to)->subject('修改密码成功');
            });
            header("refresh:2;url=login");
		}
        
    }
}
