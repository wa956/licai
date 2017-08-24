<?php 
namespace App\Http\Controllers\Admin\Rbac;

use Illuminate\Foundation\Bus\DispatchesJobs;
// use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

use DB;
use Mail;	// 加载Email
use App\Http\Model\Admin\Rbac\Note;	// 加载Model
use Illuminate\Http\Request;	// csrf验证
use Illuminate\Support\Facades\Input;	// csrf验证

class NoteController extends My_Controller
{
	/**
	 * [note_list description]
	 * @return [type] [description:权限管理]
	 */
	public function note_list(){
		$page=isset($_GET['page']) ? $_GET['page'] :1 ;
		$pagesize=5;
		$limit=($page-1)*$pagesize;
		$count=DB::table('note')->count();
		$pages=ceil($count/$pagesize);
		$first=1;
		$prev=$page-1 <1 ? 1 :$page-1;
		$next=$page+1 > $pages ? $pages :$page+1;
		$last=$pages;		
		$model = new Note();
		$res = $model -> note_list($limit,$pagesize);
		return view('Admin/rbac/note_list',['res'=>$res,'first'=>$first,'prev'=>$prev,'next'=>$next,'last'=>$last]);
	}


	/**
	 * [note_add_list description]
	 * @return [type] [description:添加权限页面]
	 */
	public function note_add_list(){
		return view('Admin/rbac/note_add_list');
	}


	/**
	 * [note_add_do description]
	 * @return [type] [description:添加权限]
	 */
	public function note_add_do(){
		$name = input::get('name');
		$zh_name = input::get('zh_name');
		$model  = new Note();
        $re = $model -> note_add_do($name, $zh_name);
        return redirect('note/note_list');
	}
	public function note_del(){
		$id=input::get('id');
		$model=new Note();
		$res=$model->note_del($id);
		if($res){
			echo 1; 
		}
	}
	public function name_up(){
		$post=input::get();
		$model = new Note();
		$res=$model->name_up($post);
		if($res){
			echo 1; 
		}		
	}
}