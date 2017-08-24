<?php

namespace App\Http\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use DB;

/**
 * 此model层用来处理用户登录
 */
class My extends Model
{
    /*
     * 添加类型
     */
    public function recharge($post)
    {

        return DB::table('productclass')->insert([$post]);    	
    }
    /*
     * 查询类型
     */
    public function lists()
    {
        return DB::table('productclass')->get();    	
    }
    /*
     * 查询类型
     */
    public function product_add($post)
    {
        return DB::table('productinfo')->insert([$post]);    	
    }  
    /*
     * 查询产品
     */
    public function product_lists()
    {
        return DB::table('productinfo')->get();     
    }      
}