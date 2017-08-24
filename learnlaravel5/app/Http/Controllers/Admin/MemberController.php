<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\member;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Admin\Common;

//会员
class MemberController extends Controller{
    //会员列表展示
    public function lists(){
//        $where="";
//        $where.=empty(Input::get("datemin"))?"1=1":"regtime >= ".strtotime(Input::get('datemin'));
//        $where.=empty(Input::get("datemax"))?" and "."1=1":" and "."regtime <= ".strtotime(Input::get("datemin"));
//        $where.=empty(Input::get("content"))?" and "."1=1":" and "."username like "."'%".Input::get("content")."%'";
        $p_info=Common::where("mem_status",0)->paginate(5)->toArray();
//        print_r($p_info);die;
    	return view('Admin/member/lists',["p_info"=>$p_info]);
    }
    //会员添加表单
    public function add(){
    	return view('Admin/member/add');  
    }
    //会员add
    public function add_s(){
        $data=Input::all();
        $data['regtime']=time();
        $res=Common::insert($data);
        if($res){
            return redirect("admin/member/lists");
        }
    }
    //删除的页面
    public function del(){
        $p_info=Common::where("mem_status",1)->get()->toArray();
        $num=count($p_info);
    	return view('Admin/member/del',["p_info"=>$p_info,"num"=>$num]);
    }
    //将删除的放入回收站
    public function member_del(){
        $id=Input::get("id");
        $data["mem_status"]=1;
        $res=Common::where("id",$id)->update($data);
        exit(json_encode($res));

    }
    //编辑的表单
    public function member_save(){
        $id=Input::get("id");
        $data=Common::where("id",$id)->first()->toArray();
        return view("Admin/member/member_save",["data"=>$data]);
    }
    //编辑表单成功
    public function member_save_success(){
        $data=Input::all();
        $id=$data["id"];
        unset($data['id']);
        $res=Common::where("id",$id)->update($data);
        if($res){
            return redirect("admin/member/lists");
        }
    }


    //修改密码的表单
    public function save_password(){
        $id=Input::get("id");
        $data=Common::where("id",$id)->first()->toArray();
        return view("Admin/member/save_password",["data"=>$data]);
    }
    //修改密码成功
    public function save_password_success(){
        $data=Input::all();
        $id=$data["id"];
        unset($data['id']);
        $res=Common::where("id",$id)->update($data);
        if($res){
            return redirect("admin/member/lists");
        }
    }
    //回收站批量删除

    public function true_del_all(){
        $ids=Input::get("ids");
        $ids=trim($ids,",");
        $ids=explode(",",$ids);
        $res=Common::whereIn('id',$ids)->delete();
        exit(json_encode($res));
    }



    //批量放入回收站

    public function mem_del_all(){
        $ids=Input::get("ids");
        $ids=trim($ids,",");
        $ids=explode(",",$ids);
        $data['mem_status']=1;
        $res=Common::whereIn('id',$ids)->update($data);
        exit(json_encode($res));
    }

    //还原
    public function member_huanyuan(){
        $id=Input::get("id");
        $data["mem_status"]=0;
        $res=Common::where("id",$id)->update($data);
        exit(json_encode($res));

    }

    //彻底删除
    public function delete_it(){
        $id=Input::get("id");
        $res=Common::where("id",$id)->delete();
        exit(json_encode($res));

    }

}