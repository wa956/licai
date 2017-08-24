<?php

namespace App\Http\Model\Admin\Rbac;

use Illuminate\Database\Eloquent\Model;

use DB;

class Role extends Model
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

    public function role_list(){
        $re = DB::table('role')->get();
        return $re;
    }
    public function role_add_do($name){
        $arr = array('id'=>null, 'name'=>$name, 'created_time'=>date('Y-m-d H:i:s'));
        $re = DB::table('role')->insert($arr);
        return $re;
    }

}
