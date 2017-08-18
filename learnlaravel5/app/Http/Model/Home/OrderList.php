<?php

namespace App\Http\Model\Home;

use DB;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    /**
     * The attributes that are mass assignable.
     *   项目名称model
     * @var array
     */
    protected $fillable = [
        'name','pwd','age'
    ];
    protected $table='orderlist';
    public $timestamps=false;
    //查询
    public function AddOrderr($data)
    {
        $res = DB::table('orderlist')->insertGetId($data);
        return $res;
//        return $data;
    }

    public function whereShow($id)
    {
        $data = DB::table('productinfo')->where("productTypeId",$id)->get();
        return $data;
    }

    public function oneShow($id)
    {
        $data = DB::table('productinfo')->where("id",$id)->first();
        return $data;
    }


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
