<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\index;
use Illuminate\Support\Facades\Input;


//首页
class IndexController extends Rbac\My_Controller{
    public function index()
    {
    	$data = $this->createLoginList();
        return view('Admin/index/index',['name'=>$data['name']]);
    }
    public function welcome()
    {
        return view('Admin/index/welcome');
    }
}