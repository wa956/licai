<?php

namespace App\Http\Model\Admin\Rbac;

use Illuminate\Database\Eloquent\Model;

use DB;

class Note extends Model
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

    public function note_list($limit,$pagesize){
        $re = DB::table('note')
                ->offset($limit)
                ->limit($pagesize)
                ->get();
        return $re;
    }
    public function note_add_do($name, $zh_name){
        $arr = array('id'=>null, 'name'=>$name, 'zh_name'=>$zh_name, 'created_time'=>date('Y-m-d H:i:s'));
        $re = DB::table('note')->insert($arr);
        return $re;
    }
    public function note_del($id){
        $res = DB::table('note')->where(['id'=>$id])->delete();
        return $res;
    }
    public function name_up($post){
        $id=$post['id'];
        $name=$post['name'];
        $res = DB::table('note')->where(['id'=>$id])->update(['name'=>$name]);
        return $res;
    }
}
