<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Login;
use Illuminate\Support\Facades\Input;


//登录
class LoginController extends Rbac\My_Controller{
    public function index()
    {
        return view('Admin/login/index');
    }
    // 执行登录
    public function login_do(){
        $username = input::get('username');
        $password = input::get('password');
        // $res = $this->login_ze($username, $password);
        $model  = new Login();
        $re = $model->login_do($username, $password);
        //print_r($re);die;
        $res = $this->createLoginStatus($re);
        return redirect('admin/index');
    }  
    // 退出
    public function login_out(){ 
        $this->createLoginOut();
        return view('layouts.login');
    }   
}