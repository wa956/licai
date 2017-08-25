<?php

namespace App\Http\Model\Home;

use DB;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *   项目名称model
     * @var array
     */
    protected $fillable = [
        'name','pwd','age'
    ];
    protected $table='order';
    public $timestamps=false;
    //查询
    public function AddOrder($data)
    {
        $res = DB::table('order')->insertGetId($data);
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
//投资记录
   public static function productOrder($id)
   {
       //产品详情数组
       $data =DB::table('productinfo')->select('productName','entime')->where("id",$id)->first();
       //已支付产品订单
       $order=DB::table('order')->where(["productId"=>$id,"orderStatus"=>2])->limit(3)->get();
       $order=ajaxJsonencode($order);//对象转数组
       $arr=[];//用户id数组
       $orderData=[];//定义所需数据数组
       foreach($order as $v){
           $arr[]=$v['userid'];
       }
       $str=implode(',',$arr);
       if(strlen($str)<1) return false;
       $user=DB::select("select username from userinfo where id in($str) limit 3");
       $user=ajaxJsonencode($user);   //以下拼接所需数组
       $day=$data->productName;
       $enTime=$data->entime;
       $now=date("Y-m-d",time());
       $strDay=substr($day,-4);
       foreach($order as $key=>$v){
           $orderData[$key]['time']=date("Y-m-d",($v['paytime']+7200*12));
           $orderData[$key]['orderAmount']=$v['orderAmount'];
           $orderData[$key]['interest']=($v['orderAmount']*$v['rate']/100);
           $orderData[$key]['num']=($v['orderAmount']+$v['orderAmount']*$v['rate']/100);
           $orderData[$key]['day']=$strDay;
           $orderData[$key]['entime']=$enTime;
           $orderData[$key]['now']=$now;
       }
       foreach($user as $k=>$v){
           $orderData[$k]['username']=$v['username'];
       }
       return $orderData;
   }

    //借款信息
   public static function orderMoney($id)
   {
       $order=DB::table('order')->select('orderAmount','paytime','payType','userid')->where(["productId"=>$id,"orderStatus"=>2])->limit(3)->get();
       $order=ajaxJsonencode($order);//对象转数组
       $arr=[];//用户id数组
       $moneyData=[];//定义所需数据数组
       foreach($order as $v){
           $arr[]=$v['userid'];
       }
       $str=implode(',',$arr);
       if(strlen($str)<1) return false;
       $user=DB::select("select username from userinfo where id in($str) limit 3");
       $user=ajaxJsonencode($user);   //以下拼接所需数组
        foreach($order as $key=>$v){
            $moneyData[$key]['time']=date("Y-m-d",$v['paytime']);
            $moneyData[$key]['orderAmount']=$v['orderAmount'];
            $moneyData[$key]['payType']=$v['payType'];
        }
        foreach($user as $k=>$v){
            $moneyData[$k]['username']=$v['username'];
        }
        return $moneyData;
    } 
}
