<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Input;
use DB;
use Redis;
use App\Http\Model\Home\Userinfo;
use App\Http\Model\Home\Redpacket;
//注册
class RegisterController extends Controller{
    public function register(){
    	return view('Home.register/register');
    }
    //检测用户名
    public function checkuname()
    {
        $username = Input::get('username');
        $model = new Userinfo();
        $res = $model->checkuhm($username);
        if($res==1){
            echo 1;
        }else{
            echo 2;
        }
    }
    //检测手机号
    public function checkphone()
    {
        $phone = Input::get('tel');
        $model = new Userinfo();
        $res = $model->checksjh($phone);
        if($res==1){
            echo 1;
        }else{
            echo 2;
        }
    }

    //忘记密码
    public function checktel()
    {
        $phone = Input::get('tel');
        $model = new Userinfo();
        $res = $model->dxcode($phone);
       if($res==2){
           echo 2;
       }

    }

    //比对手机验证码
    public function checkcode()
    {
        $model = new Userinfo();
        $res = $model->checkyzm();
       if($res==3){
           echo 3;
       }else if($res==4){
           echo 4;
       }else{
           echo 5;
       }
    }

    //注册入库
    public function regadd()
    {
        $data = Input::All();
        $username = $data['userName'];
        $password = $data['password'];
        $phone = $data['phone'];
        $data = array(
            'username'=>$username,
            'password'=>md5($password),
            'telephone'=>$phone
        );
        $model = new Userinfo();
        $res = $model->regrk($data);
        if($res==1){
            //注册成功生成红包码
            $nowtime = time();
            $hbcode = 'HB_'.$nowtime.rand(10,99);
            $red = new Redpacket();
            $res = $red->hbm($hbcode,$phone);
            if($res==1){

                $hbcode2 = 'HB_'.$nowtime.rand(10,99);
                $res2 = $red->hbm2($hbcode2,$phone);
                if($res2==1){

                    $hbcode3 = 'HB_'.$nowtime.rand(10,99);
                    $res3 = $red->hbm3($hbcode3,$phone);
                    if($res3==1){
                        return redirect('register1');
                    }
                }
            }

        }

    }

    public function register1(){
        return view('Home/register/register1'); 
    }  
}






