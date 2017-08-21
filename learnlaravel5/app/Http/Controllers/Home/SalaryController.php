<?php
namespace App\Http\Controllers\Home;
use DB;
use App\Http\Controllers\Controller;
//use App\Http\Model\Home\salary;
use Illuminate\Support\Facades\Input;

use App\Http\Model\Home\Productclass;
use App\Http\Model\Home\Productinfo;
use App\Http\Model\Home\Userinfo;
use App\Http\Model\Home\RedBag;
use App\Http\Model\Home\OrderList;
use App\Http\Model\Home\Order;
use App\Http\Model\Home\Thirds;
//首页
class SalaryController extends Controller{

    //我要投资首页展示
    public function index()
    {
        $model = new Productclass();
        $Productinfo = new Productinfo();
        $data = $model->Show();
        $info = $Productinfo->Show();
        return view('Home/salary/index',['data' => $data,'info'=>$info]);
    }
    //投资分类下项目的展示
    public function typeShow()
    {
        $id = input::get('id');
        $Productinfo = new Productinfo();
        $data = $Productinfo->whereShow($id);
        $info =  ajaxJsonencode($data);
        return $info;
    }

    //项目详情
    public function infor()
    {
        $id = input::get('id');
        // $id=1;
        $user_id = session('user_id');
        //项目详情表
        $Productinfo = new Productinfo();
        //薪计划单个产品数量
        $salarycount=$Productinfo->salarycount($id);

        //用户详情表
        $userinfo = new Userinfo();
        //项目详情数组
        $data = $Productinfo->oneShow($id);
        //用户详情数组
        $userdata = $userinfo->oneShow($user_id);
        //处理数组
        $info =  ajaxJsonencode($data);
        //投标人数
        $number=$info['number'];
        $sheng=$number-$salarycount;
        //处理数组
        $info2 =  ajaxJsonencode($userdata);
        $sj = diffBetweenTwoDays($info['entime'],date('Y-m-d'));
//        $jssj = diffBetweenTwoDays(date("Y-m-d",strtotime("+3 month",time())));
        if($info['contact'] == 1){

            if(date('Y-m-d') == $info['entime']){
                //计算出距离这个投资项目结束时长还有多少天
                $jssj = diffBetweenTwoDays(date('Y-m-d'),date("Y-m-d",strtotime("+".$info['deadline']." month",strtotime("".$info['entime'].""))));
                //计算出用户已经收益多钱
                $info['start'] = 1;
//                p($jssj);die;
            }else{
                $info['jx'] = "已完成";
                $info['start'] = 0;
//                p($info);die;
            }

        }else{
                $info = $info;
        }

        return view('Home/salary/infor',['data'=>$info,'userdata'=>$info2,'ensj'=>$sj,'sheng'=>$sheng]);

    }
  // 校验身份证号码 邮箱是否绑定
    public function jiaoyan()
    {
        $user_id = input::get('user_id');
        $userinfo = new Userinfo();
        $userdata = $userinfo->oneShow($user_id);
        $data = ajaxJsonencode($userdata);
        if(empty($data['idcard']) || empty($data['email'])){
                return 0;
        }else{
                return 1;
        }
//        p($data);
    }


    public function order()
    {
        //用户ID
        $user_id = input::get('user_id');
        //项目ID
        $id = input::get('id');
        //投资金额
        $orderAmount = input::get('orderAmount');
        // p($orderAmount);
        //用户MODEL
        $userinfo = new Userinfo();
        //用户详情
        $userdata = ajaxJsonencode($userinfo->oneShow($user_id));
//        p($userdata);die;
        //判断身份证 邮箱是否为空
        if(empty($userdata['idcard']) || empty($userdata['email'])){
            return view('Home/salary/orderr');
        }else{
            $Productinfo = new Productinfo();
            $RedBag = new RedBag();
            //项目详情数组
            $data = ajaxJsonencode($Productinfo->oneShow($id));
            //查找未使用的红包
            $rebData = ajaxJsonencode($RedBag->showData());
            $info = array(
                 'user_id'          =>$userdata['id'],
                 'productId'        =>$data['id'],
                 'order_money'     =>$orderAmount,
                 'rate'             =>$data['rate'],
                 'deadline'         =>$data['deadline'],
                 'interestEndTime' =>endTime($data['deadline'],$data['entime']),
                 'annualinterest'  =>nianXi($orderAmount,$data['rate']),
                 'productName'      =>$data['productName']
             );
            return view('Home/salary/order',['data'=>$info,'rebData'=>$rebData]);
        }
    }
    //订单添加
    public function addOrder()
    {
        $data = input::get();
        $productId = $data['productId'];
        $ord = new OrderList();
        $info = array(
             'user_id'          =>$data['userid'],
             'order_money'      =>$data['order_money'],
             'rate'              => $data['rate'],
             'deadline'          => $data['deadline'],
             'interestEndTime'  =>$data['interestEndTime'],
             'totalincome'       =>$data['annualinterest'],
             'dailyinterest'     =>sprintf("%.8f",$data['annualinterest']/12/30),
             'productName'       => $data['productName'],
             'sn'                 => "U_".time().rand(10,99),
        );
        $order_id = $ord->AddOrderr($info);

        if(!$order_id){
            echo "<script>alert('失败');location.href='../salary/order';</script>";
        }
            $order = new Order();
            $infolist = array(
                'order_id'         =>$order_id,
                'userid'           =>$data['userid'],
                'productId'        =>$productId,
                'orderAmount'      =>$data['order_money'],
                'paytime'           =>'',
                'addtime'           =>date('Y-m-d H:i:s'),
                'orderStatus'      =>1,
                'interestTime'     =>date('Y-m-d'),
                'regular'           =>$data['deadline'],
                'interestEndTime'  =>$data['interestEndTime'],
                'rate'              =>$data['rate']
                );
//            p($infolist);die;
            $resz = $order->AddOrder($infolist);
            if($resz){
                $Productinfo = new Productinfo();
                $thirds = new Thirds();
                $thirdsData = ajaxJsonencode($thirds->whereShow($data['userid']));
                $res = $Productinfo->upda($productId,$data['order_money']);
                if($res){

                    return view('Home/salary/zhifu',['data'=>$info,'thirdsData'=>$thirdsData]);
                }else{
                    echo "<script>alert('失败');location.href='../salary/order';</script>";
                }
            }
    }

    public function zhi($info)
    {
//        p($info);die;
        return view('Home/salary/zhifu',['data'=>$info]);
    }
}