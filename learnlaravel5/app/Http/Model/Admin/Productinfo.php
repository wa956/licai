<?php

/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/8/23
 * Time: 16:58
 */
namespace App\Http\Model\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
class Productinfo extends Model
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

    //查U计划
    public function ujh()
    {
        $res = DB::table('productinfo')->where('productTypeid',1)->get();
        $data = json_decode(json_encode($res),true);
        return $data;
    }

    //查优选计划
    public function uxjh()
    {
        $res = DB::table('productinfo')->where('productTypeid',2)->get();
        $data = json_decode(json_encode($res),true);
        return $data;
    }

    //查薪计划
    public function xjh()
    {
        $res = DB::table('productinfo')->where('productTypeid',3)->get();
        $data = json_decode(json_encode($res),true);
        return $data;
    }

    //删除
    public function usc($id)
    {
        $res = DB::table('productinfo')->delete($id);
        if($res){
            return 1;
        }
    }
    //添加U计划
    public function tujh($arr)
    {
        $res = DB::table('productinfo')->insert($arr);
        if($res){
            return 1;
        }
    }

    //修改
    public function uxg($arr,$id)
    {
        $res = DB::table('productinfo')->where('id',$id)->update($arr);
        if($res){
            return 1;
        }
    }
    public function findone($id)
    {
        $info = DB::table('productinfo')->where('id',$id)->first();
        $info = json_decode(json_encode($info),true);
        return $info;
    }
}