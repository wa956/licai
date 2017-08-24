<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Model\Admin\Productinfo;
use Illuminate\Support\Facades\Input;

class LcController extends Controller{

	public function uplan()
	{
		$model = new Productinfo();
		$data = $model->ujh();
		return view('admin/lc/uplan',['data'=>$data]);
	}

	public function udel()
	{
		$id = Input::get('id');
		$model = new Productinfo();
		$res = $model->usc($id);
		if($res==1){
			return redirect('admin/lc/uplan');
		}
	}

	public function uupdate()
	{
		$id = Input::get('id');
		$model = new Productinfo();
		$info = $model->findone($id);
		return view('admin/lc/update',['info'=>$info]);
	}

	public function uadd()
	{
		return view('admin/lc/add');
	}

	public function duadd()
	{
		$data = Input::All();
		//产品名称
		$productName = $data['pname'];
		$type = $data['types'];
		$rate = $data['rate'];
		$deadline = $data['cpqx'];
		$productAmount = $data['jhje'];
		$investLimit = $data['tzsx'];
		$investTime = $data['start_time'];
		$entime = $data['end_time'];
		$repaymentmethods = $data['hkfs'];
		$productStatus = isset($data['cpzt']) ? $data['cpzt'] : 0;
		$sn = date("Ymd").'21'.rand(10,99);
		$arr = array(
			'productTypeId'=>$type,
			'productName'=>$productName,
			'rate'=>$rate,
			'deadline'=>$deadline,
			'productAmount'=>$productAmount,
			'investLimit'=>$investLimit,
			'investTime'=>$investTime,
			'entime'=>$entime,
			'repaymentmethods'=>$repaymentmethods,
			'productStatus'=>$productStatus,
			'sn'=>$sn
		);
		$model = new Productinfo();
		if(!isset($data['id'])){
			$res = $model->tujh($arr);
		}else{
			$res = $model->uxg($arr,$data['id']);
		}
		if($res==1){
			return redirect('admin/lc/uplan');
		}
	}

	public function uxplan()
	{
		$model = new Productinfo();
		$data = $model->uxjh();
	    return view('admin/lc/uxplan',['data'=>$data]);
	}

	public function xplan()
	{
		$model = new Productinfo();
		$data = $model->xjh();
		return view('admin/lc/xplan',['data'=>$data]);
	}


}