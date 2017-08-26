<?php 
namespace App\Http\Controllers\Admin\Rbac;

use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use DB;
use Mail;	// 加载Email
use App\Http\Model\Admin\Rbac\Role;	// 加载Model
use Illuminate\Http\Request;	// csrf验证
use Illuminate\Support\Facades\Input;	// csrf验证

class RoleController extends My_Controller
{
	/**
	 * [role_list description]
	 * @return [type] [description:角色管理]
	 */
	public function role_list(){
		$model = new Role();
		$res = $model -> role_list();
		// $data = $this->createLoginList();, ['name'=>$data['name'], 'res'=>$res]
		return view('Admin/rbac/role_list',['res'=>$res]);
	}


	/**
	 * [role_add_list description]
	 * @return [type] [description:添加角色页面]
	 */
	public function role_add_list(){
		// $data = $this->createLoginList();, ['name'=>$data['name']]
		return view('Admin/rbac/role_add_list');
	}


	/**
	 * [role_add_do description]
	 * @return [type] [description:添加角色]
	 */
	public function role_add_do(){
		// $data = $this->createLoginList();
		// $user_id = substr($data['value'], -1);	// 用户id
		$name = input::get('name');
		$model  = new Role();
        $re = $model -> role_add_do($name);
        return redirect('admin/role/role_list');
	}
}