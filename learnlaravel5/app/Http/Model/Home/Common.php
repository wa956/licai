<?php

namespace App\Http\Model\Home;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Common extends Model
{
    protected $table = 'userinfo';
    protected $proinfo_table='productinfo';
    protected $proclass_table='productclass';
    public $timestamps = false;
    public function readCommon()//查  
    {
        return $this->all()->toArray();
    }
    public function oneCommon($data,$arr)//单条查询  
    {
        return $this->where($data,$arr)->first()->toArray();
    }
    public function delCommon($data)//删  
    {
        $Common = $this->where($data);
        return $Common->delete();
    }
    public function updCommon($data,$list,$arr)//改  
    {
        $Common = $this->where($data,$list);
        return $Common->update($arr);
    }
    public function addCommon($data)//增  
    {
        return DB::table('Common')->insert($data);
    }
    public function selectOne($key,$val){//查询一条
        return DB::table($this->table)->where($key,$val)->get();
    }
    public function selectJoin($main,$fromTable){
        return DB::table($this->proinfo_table)->join($this->proclass_table,$main,'=',$fromTable)->get();
    }
}  