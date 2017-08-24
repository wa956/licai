<?php

namespace App\Http\Model\Admin\Rbac;

use Illuminate\Database\Eloquent\Model;

use DB;
class Test extends Model
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

    public function registered_do($username, $email, $password){
        $arr = array(
            'id'            =>  null,
            'username'      =>  $username,
            'email'         =>  $email,
            'password'      =>  md5($password),
            'created_time'  =>  date('Y-m-d H:i:s')
        );
        $re = DB::table('user') -> insert($arr);
        return $re;
    }
    public function username_find($username){
        $arr = array('username'  =>  $username);
        $re = $this->user($arr);
        return $re;
    }
    public function login_do($username, $password){
        $arr = array('username'=>$username, 'password'=>md5($password));
        $re = $this->user($arr);
        return $re;
    }
    public function user($arr){
        $re = DB::table('user') -> where($arr)->first();
        return $re;
    }
}
