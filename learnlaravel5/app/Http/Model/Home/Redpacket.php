<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/8/17
 * Time: 19:19
 */

namespace App\Http\Model\Home;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use DB;
use Redis;

class Redpacket extends Model
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

    //检测用户名
    public function checkuhm($username)
    {
        $res = DB::table('userinfo')->where('username',$username)->first();
        if($res){
            return 1;
        }else{
            return 2;
        }
    }
    //红包码入库1
    public function hbm($hbcode,$phone)
    {
        $info  = DB::table('userinfo')->where('telephone',$phone)->first();
        $id = $info->id;
        $addtime = date('Y-m-d');
        $endtime = date("Y-m-d",strtotime("+1months",strtotime($addtime)));

        $arr = array(
            'user_id'=>$id,
            'cdkey'=>$hbcode,
            'money'=>100,
            'add_time'=>$addtime,
            'end_time'=>$endtime

        );
        $res = DB::table('redpacket')->insert($arr);
        if($res){
            return 1;
        }
    }

    //红包码入库2
    public function hbm2($hbcode2,$phone)
    {
        $info  = DB::table('userinfo')->where('telephone',$phone)->first();
        $id = $info->id;
        $addtime = date('Y-m-d');
        $endtime = date("Y-m-d",strtotime("+1months",strtotime($addtime)));

        $arr = array(
            'user_id'=>$id,
            'cdkey'=>$hbcode2,
            'money'=>200,
            'add_time'=>$addtime,
            'end_time'=>$endtime

        );
        $res = DB::table('redpacket')->insert($arr);
        if($res){
            return 1;
        }
    }

    //红包码入库3
    public function hbm3($hbcode3,$phone)
    {
        $info  = DB::table('userinfo')->where('telephone',$phone)->first();
        $id = $info->id;
        $addtime = date('Y-m-d');
        $endtime = date("Y-m-d",strtotime("+1months",strtotime($addtime)));

        $arr = array(
            'user_id'=>$id,
            'cdkey'=>$hbcode3,
            'money'=>300,
            'add_time'=>$addtime,
            'end_time'=>$endtime

        );
        $res = DB::table('redpacket')->insert($arr);
        if($res){
            return 1;
        }
    }
}