<?php

namespace App\Http\Model\Home;

use DB;
use Illuminate\Database\Eloquent\Model;

class Productinfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *   项目名称model
     * @var array
     */
    protected $fillable = [
        'name','pwd','age'
    ];
    protected $table='Productinfo';
    public $timestamps=false;
    //查询
    public function Show()
    {
        $data = DB::table('productinfo')->where("productStatus",1)->get();
        return $data;
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

    public function upda($id,$money)
    {
        $z = str_replace(',','',$money);
        $x = intval($z);
        $re = DB::update("update productinfo set repayments=repayments+".$x." where id='$id'");
        return $re;
    }
    //计算薪计划单个产品数量
    public function salarycount($id)
    {
        $res=DB::table('bill')->where(['product_id'=>$id])->count();
        $data = DB::table('productinfo')->where("id",$id)->first();
        $data=ajaxJsonencode($data);
        if($data['number']==$res){
            DB::update("update productinfo set contact=1 where id='$id'");
        }        
        return $res;
    }
    public function checksalarys()
    {

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
