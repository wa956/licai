<?php

namespace App\Http\Model\Admin\Rbac;

use Illuminate\Database\Eloquent\Model;

use DB;

class User extends Model
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

    public function user_list(){
        $res = DB::table('user') -> get();
        return $res;
    }
    public function user_del($id){
        $res = DB::table('user')->where(['id'=>$id])->delete();
        return $res;
    }
}
