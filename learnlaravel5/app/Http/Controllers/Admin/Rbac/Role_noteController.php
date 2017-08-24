<?php 
namespace App\Http\Controllers\Admin\Rbac;

use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use DB;
use Mail;	// 加载Email
use App\Http\Model\Admin\Rbac\Role_note;	// 加载Model
use Illuminate\Http\Request;	// csrf验证
use Illuminate\Support\Facades\Input;	// csrf验证

class Role_noteController extends My_Controller
{
	/**
	 * [role_note_list description]
	 * @return [type] [description:权限管理]
	 */
	public function role_note_list(){
		$id = input::get('id');	// 角色id
		$data = $this->createLoginList();
		$role_note = new Role_note();
		$role_note_list_true = $role_note -> role_note_list_true($id);		// 已拥有权限
		$role_note_list_false = $role_note -> role_note_list_false($id);	// 未拥有权限
		// print_r($role_note_list_true);die;
		return view('Admin/rbac/role_note_list', ['name'=>$data['name'], 'id'=>$id, 'role_note_list_true'=>$role_note_list_true, 'role_note_list_false'=>$role_note_list_false]);
	}


	/**
	 * [role_note_add description]
	 * @return [type] [description:角色权限的添加]
	 */
	public function role_note_add(){
		$role_id = input::get('id');
		$note_id = input::get('box_id');	
		$model = new Role_note();
		$res = $model -> role_note_add($role_id, $note_id);
		return redirect('role/role_note_list?id='.$role_id);
	}
}