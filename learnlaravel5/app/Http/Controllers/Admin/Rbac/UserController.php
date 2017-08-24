<?php 
namespace App\Http\Controllers\Admin\Rbac;

use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BasesController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;


use DB;
use Mail;	// 加载Email
use App\Http\Model\Admin\Rbac\User;	// 加载Model
use App\Http\Model\Admin\Rbac\Test;	// 加载Model
use Illuminate\Http\Request;	// csrf验证
use Illuminate\Support\Facades\Input;	// csrf验证
use Illuminate\Support\Facades\Cookie;	//使用cookie
class UserController extends My_Controller
{	
	/**
	 * [user_list description]
	 * @return [type] [description:用户管理]
	 */
	public function user_list(){
		$model = new User();
		$res = $model -> user_list();
		$data = $this->createLoginList();
		return view('Admin/rbac/user_list',['res'=>$res]);
	}


	/**
	 * [user_add_list description]
	 * @return [type] [description:添加用户页面]
	 */
	public function user_add_list(){
		return view('admin/rbac/user_add_list');
	}


	/**
	 * [user_add_do description]
	 * @return [type] [description:添加用户]
	 */
	public function user_add_do(){
		$username = input::get('username');
		$email = input::get('email');
		$password = input::get('password');
		$this->registered_ze($username, $email, $password);
		$model  = new Test();
        $re = $model -> registered_do($username, $email, $password);
        if($re){
        	return redirect('/user/user_list');
        }
	}
	public function user_del(){
		$id=input::get('id');
		$model=new User();
		$res=$model->user_del($id);
		if($res){
			echo 1; 
		}
	}	
}