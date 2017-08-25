<?php
namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class CommonController extends Controller
{
    public function __construct()
    {
        if(!session('user_id')){

            die("<script>alert('请先登录');location.href='/login/'</script>");
        }

    }
}