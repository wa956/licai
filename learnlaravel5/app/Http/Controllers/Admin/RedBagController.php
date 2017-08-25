<?php
namespace App\Http\Controllers\Admin;
// use App\Http\Controllers\Controller;
use App\Http\Model\Admin\index;
use App\Http\Model\Admin\RedBag;
use Illuminate\Support\Facades\Input;


//首页
class RedBagController extends Rbac\My_Controller{
    //红包分类添加
    public function index()
    {
        return view('admin/redbag/add');
    }
    public function doAdd()
    {
        $name = Input::all();
        RedBag::setData($name);
        return redirect('admin/redbag/show');
    }
    //红包分类展示
    public function welcome()
    {
        $data = RedBag::getRedType();
        return view('admin/redbag/show',['data'=>$data]);
    }
    //红包添加
    public function redIndex()
    {
        $data = RedBag::getRedType();
        return view('admin/redbag/add_red',['data'=>$data]);
    }
    public function addData(){
        $post                = Input::all();
        $post['add_time']   = time();
        $post['end_time']   = (time()+3600*24*30);
        if($post['purpose'] == 0){
            $post['red_code'] = 'HB_158'.rand(10000000000,99999999999);
        }elseif($post['purpose'] == 1){
            $post['red_code'] = 'Red_168'.rand(10000000000,99999999999);
        }elseif($post['purpose'] == 2){
            $post['red_code'] = '188'.rand(1000000000000,9999999999999);
        }elseif($post['purpose'] == 3){
            $post['red_code'] = '198'.rand(1000000000000,9999999999999);
        }else{
            $post['red_code']='128'.rand(1000000000000,9999999999999);
        }
        RedBag::setAdd($post);
        return redirect('admin/redbag/lists');
    }
    //红包展示
    public function lists()
    {
        $data = RedBag::showData();
        return view('admin/redbag/lisits',['data'=>$data]);
    }
    //红包删除
    public function delData()
    {
        $id  = Input::get('id');
        RedBag::del($id);
        return redirect('admin/redbag/lists');

    }
}