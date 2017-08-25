<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 2017/8/16
 * Time: 14:58
 */

namespace App\Http\Model\Admin;
use Faker\Provider\zh_CN\DateTime;
use Illuminate\Database\Eloquent\Model;
use DB;
class RedBag extends Model
{
    public static function setData($key)
    {
        if(count($key)<1) return false;
        $re=DB::table('redpackettype')->insert([$key]);
        if($re){
            return 1;
        }else{
            return 0;
        }
    }

    public static function getRedType()
    {
        $data=DB::table('redpackettype')->get();
        return $data;
    }

    public static function setAdd($post)
    {
        if(count($post)<1) return false;
        $re=DB::table('reg_bag')->insert([$post]);
        if($re){
            return 1;
        }else{
            return 0;
        }
    }

    public static function showData()
    {

        $data = DB::table('reg_bag')->where('is_del',0)->paginate(5);
        return $data;
    }

    public static function del($id)
    {
        $re=DB::table('reg_bag')
            ->where('id',"$id")
            ->update(['is_del' => 1]);
        return $re;

    }
}