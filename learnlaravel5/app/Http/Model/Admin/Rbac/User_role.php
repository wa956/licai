<?php

namespace App\Http\Model\Admin\Rbac;

use Illuminate\Database\Eloquent\Model;

use DB;

class User_role extends Model
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
     * [user_rolelist description]
     * @param  [type] $user_id [description:用户id]
     * @return [type]          [description:根据用户查询角色]
     */
    public function user_rolelist($user_id){
        $res = DB::select("select role_id from user_role where user_id='$user_id'");
        return $res;
    }

    /**
     * [user_role_list_true description]
     * @param  [type] $id [description:查询拥有用户]
     * @return [type]     [description:返回查询结果]
     */
    public function user_role_list_true($id){
        $res = DB::select("select * from user_role inner join user on user.id=user_role.user_id where role_id = '$id'");
        return $res;
    }


    /**
     * [user_role_list_false description]
     * @param  [type] $id [description:查询未有用户]
     * @return [type]     [description:返回查询结果]
     */
    public function user_role_list_false($id){
        $res = DB::select("select * from user where id NOT in(select user_id from user_role where role_id ='$id')");
        return $res;
    }

    /**
     * [user_role_add description]
     * @param  [type] $role_id [description:角色id]
     * @param  [type] $user_id [description:用户id]
     * @return [type]          [description:根据用户进行判断是否为空操作，然后添加并返回]
     */
    public function user_role_add($role_id, $user_id){
        $res = DB::table('user_role') -> where('role_id', $role_id) ->delete();
        if(!empty($user_id)){
            $res = DB::table('user_role') -> where('role_id', $role_id) ->delete();  
            foreach ($user_id as $key => $value) {
                $arr[] = array('user_id'=>$value, 'role_id'=>$role_id);
            }
            $res = DB::table('user_role') -> insert($arr);  
        }
        return $res;
    }
}