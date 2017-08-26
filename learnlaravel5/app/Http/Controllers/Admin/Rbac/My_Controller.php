<?php 
namespace App\Http\Controllers\Admin\Rbac;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use DB;
use Mail;	// 加载Email
use App\Http\Model\Admin\Rbac\User_role;	// 加载Model
use App\Http\Model\Admin\Rbac\Role_note;	// 加载Model
use Illuminate\Http\Request;	// csrf验证
use Illuminate\Support\Facades\Input;	// csrf验证
use Illuminate\Support\Facades\Cookie;	//使用cookie
// 是以后所有控制器的基类，并且集成常用公用方法。
class My_Controller extends BaseController
{
	/**
	 * [__construct description]
	 * @param Request $Request [description:查询用户的权限]
	 */
	public function __construct(Request $Request){
		$uri = $Request->path();
		$user_cookie = Cookie::get('user');
		$user_id = substr($user_cookie['value'], -1);
		// 排除uri以及超级管理员身份
		if($uri == 'admin/welcome' || $uri == 'admin/login' || $uri == 'admin/index' || $uri == 'admin/login_out' || $uri == 'admin/login_do' || $uri == 'admin/password_list' || $uri == 'admin/username_find' || $user_id == '1'){
			return true;
		}
		$user_role = new User_role();
		$user_rolelist = $user_role -> user_rolelist($user_id);		// 已拥有用户
		if(empty($user_rolelist)){
			echo "<script>alert('没有此权限，请联系管理员');location.href='../welcome'</script>";exit();
		}
		$user_rolelist = json_encode($user_rolelist);
		$user_rolelist = json_decode($user_rolelist, true);
		$user_roleid = array_column($user_rolelist,'role_id');
		$user_roleid = implode(',', $user_roleid);	// 获取用户的所有角色
		$role_note = new Role_note();
		$role_notelist = $role_note -> role_notelist($user_roleid);	// 根绝角色查询所有权限
		$role_notelist = json_encode($role_notelist);
		$role_notelist = json_decode($role_notelist, true);
		foreach ($role_notelist as $key => $value) {
			$re_note[] = $value['name'];	// 取出角色所拥有的权限路径
		}
		if(!in_array($uri,$re_note)){
			echo "<script>alert('没有此权限，请联系管理员');location.href='../admin/welcome'</script>";die;
		}
	}
	/**
	 * [createLoginStatus description]
	 * @param  [type] $re [description:用户信息存入到Cookie]
	 */
	public function createLoginStatus($re){
		$re = json_encode($re);
		$re = json_decode($re, true);
		// print_r($re);exit;
		// Cookie保存用户状态，因Cookie容易被串改，所以Cookie需要加密，定义规则：user_auth_token(用户相关信息生成)+"#"(分隔符)+uid(用户id)
		$user_auth_token = md5($re['id'].$re['username'].$re['email'].$_SERVER['HTTP_USER_AGENT']);
		$user = array('name'=>$re['username'], 'value'=>$user_auth_token."#".$re['id']);
		$cookie = Cookie::queue('user', $user, 120);
	}


	/**
	 * [createLoginList description]
	 * @return [type] [description:取出用户登陆状态]
	 */
	public function createLoginList(){
		$user_cookie = Cookie::get('user');
		if(!$user_cookie){
		    echo "<script>alert('请先登陆');location.href='login'</script>";
		}
		return $user_cookie;
	}


	/**
	 * [createLoginOut description]
	 * @return [type] [description:用户退出]
	 */
	public function createLoginOut(){
		$user_cookie = Cookie::queue('user', null , -1);
		echo "<script>alert('退出成功');location.href='login'</script>";
	}


	/**
	 * [login_ze description]
	 * @param  [type] $username [description:用户名]
	 * @param  [type] $password [description:密码]
	 * @return [type]           [description:验证是否合法]
	 */
	public function login_ze($username, $password){
	    $preg1 = '/^[\x{4e00}-\x{9fa5}]+$/u';
	    $preg3 = '/^\w{2,8}+$/u';
	    if(preg_match($preg1, $username) || preg_match($preg3, $password)){
	        echo "<script>alert('非法操作');history.back()</script>"; 
	    }
	}


	/**
	 * [registered_ze description]
	 * @param  [type] $username [description:用户名]
	 * @param  [type] $email    [description:邮箱]
	 * @param  [type] $password [description:密码]
	 * @return [type]           [description:验证是否合法]
	 */
	public function registered_ze($username, $email, $password){
	    $preg1 = '/^[\x{4e00}-\x{9fa5}]+$/u';
	    $preg2 = '/^\w+[@]{1}\w+[.]\w+$/u';
	    $preg3 = '/^\w{2,8}+$/u';
	    if(preg_match($preg1, $username) || preg_match($preg2, $email) || preg_match($preg3, $password)){
	        echo "<script>alert('非法操作');history.back()</script>"; 
	    }
	}


	/**
	 * [success description]
	 * @param  [type] $re [description:查询用户]
	 * @return [type]     [description:返回查询状态]
	 */
	public function success($re){
	    $re = json_encode($re);
	    $re = json_decode($re, true);
	    if($re['username']){
	        echo json_encode(['success' => 1]);
	    }else{
	        echo json_encode(['success' => 0]);
	    }   
	}
	
}