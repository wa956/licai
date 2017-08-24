<?php

namespace App\Http\Model\Admin\Rbac;

use Illuminate\Database\Eloquent\Model;

use DB;

class Role_note extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * [role_notelist description]
     * @param  [type] $user_roleid [description:用户的所有角色]
     * @return [type]              [description:返回根据角色查询所有权限]
     */
    public function role_notelist($user_roleid){
        $res = DB::select("select * from role_note inner join note on note.id=role_note.note_id where role_id in($user_roleid) ");
        return $res;
    }


    /**
     * [role_note_list_true description]
     * @param  [type] $id [description:查询拥有权限]
     * @return [type]     [description:返回查询结果]
     */
    public function role_note_list_true($id){
        $res = DB::select("select * from role_note inner join note on note.id=role_note.note_id where role_id = '$id'");
        // $res = DB::table('role_note') -> join('note', 'note.id', '=', 'role_note.note_id') -> where('role_id', $id) -> get();
        return $res;
    }


    /**
     * [role_note_list_false description]
     * @param  [type] $id [description:查询未有权限]
     * @return [type]     [description:返回查询结果]
     */  
    public function role_note_list_false($id){
        $res = DB::select("select * from note where id NOT in(select note_id from role_note where role_id = '$id')");
        // select * from note where id NOT in(select note_id from role_note where role_id = 4);
        return $res;
    }

    
    /**
     * [user_role_add description]
     * @param  [type] $role_id [description:角色id]
     * @param  [type] $note_id [description:权限id]
     * @return [type]          [description:根据权限进行判断是否为空操作，然后添加并返回]
     */
    public function role_note_add($role_id, $note_id){
        $res = DB::table('role_note') -> where('role_id', $role_id) ->delete();
        if(!empty($note_id)){
            $res = DB::table('role_note') -> where('role_id', $role_id) ->delete();  
            foreach ($note_id as $key => $value) {
                $arr[] = array('role_id'=>$role_id, 'note_id'=>$value);
            }
            $res = DB::table('role_note') -> insert($arr);  
        }
        return $res;
    }
}