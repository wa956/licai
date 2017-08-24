<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Http\Model\Home\index;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Monolog\Handler\HandlerWrapperTest;
use App\Exceptions\Handler;
use App\Http\Model\Home\Common;

//首页
class IndexController extends Controller{
    public function index()
    {
        $type=DB::select("select * from productclass");
        $data=array();

        foreach($type as $key=>$val){
            $res=DB::select("select * from bill as a JOIN userinfo as b ON a.user_id=b.id JOIN productinfo as c on a.product_id=c.id WHERE productTypeId=$val->id ORDER BY time DESC");
            $data[$val->typeName]=$res;
        }

        $invest=DB::select("select username,SUM(invest_money) as sum_money  from bill as a JOIN userinfo as b ON a.user_id=b.id JOIN productinfo as c on a.product_id=c.id GROUP BY username ORDER BY sum_money DESC LIMIT 0,5");
        $moneys=DB::select("select username,deadline,rate,SUM(FLOOR(rate/100/12*invest_money*deadline)) as profit from bill as a JOIN userinfo as b ON a.user_id=b.id JOIN productinfo as c on a.product_id=c.id GROUP BY username ORDER BY profit DESC LIMIT 0,5");
        return view('Home/Index/index',["data"=>$data,"invest"=>$invest,"moneys"=>$moneys]);
    }
}