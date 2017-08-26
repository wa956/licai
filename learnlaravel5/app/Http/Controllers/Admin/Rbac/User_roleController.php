<?php 
namespace App\Http\Controllers\Admin\Rbac;

use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use DB;
use Mail;	// 加载Email
use App\Http\Model\Admin\Rbac\User_role;	// 加载Model
use Illuminate\Http\Request;	// csrf验证
use Illuminate\Support\Facades\Input;	// csrf验证

class User_roleController extends My_Controller
{
	/**
	 * [user_role_list description]
	 * @return [type] [description:用户管理]
	 */
	public function user_role_list(){
		$id = input::get('id');	// 角色id
		$data = $this->createLoginList();
		$user_role = new User_role();
		$user_role_list_true = $user_role -> user_role_list_true($id);		// 已拥有用户
		$user_role_list_false = $user_role -> user_role_list_false($id);	// 未拥有用户
		// print_r($user_role_list_true);die;
		return view('Admin/rbac/user_role_list', ['name'=>$data['name'], 'id'=>$id, 'user_role_list_true'=>$user_role_list_true, 'user_role_list_false'=>$user_role_list_false]);
	}


	/**
	 * [user_role_add description]
	 * @return [type] [description:角色用户的添加]
	 */
	public function user_role_add(){
		$post=Input::get();
		$role_id = input::get('id');
		$user_id = input::get('box_id');	
		$model = new User_role();
		$res = $model -> user_role_add($role_id, $user_id);
		return redirect('admin/role/user_role_list?id='.$role_id);
	}
}