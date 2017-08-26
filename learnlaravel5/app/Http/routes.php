<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
header('content-type:text/html;charset=utf8');
Route::get('/', function () {
    return view('welcome');
});
//前台 首页
Route::any('index', 'Home\IndexController@index');
//前台 登录
Route::any('login', 'Home\LoginController@index');
Route::any('loginout', 'Home\LoginController@loginout');
Route::any('forget', 'Home\LoginController@forget');
Route::any('checklogin', 'Home\LoginController@checklogin');
Route::any('checkname', 'Home\LoginController@checkname');
Route::any('updatepwd', 'Home\LoginController@updatepwd');
//前台 注册

Route::any('register', 'Home\LoginController@index');

Route::any('register', 'Home\RegisterController@register');
          //验证
Route::any('checkphone', 'Home\RegisterController@checkphone');
Route::any('checktel', 'Home\RegisterController@checktel');
Route::any('checkcode', 'Home\RegisterController@checkcode');
Route::any('regadd', 'Home\RegisterController@regadd');
Route::any('checkuname', 'Home\RegisterController@checkuname');
//前台 注册成功
Route::any('register1', 'Home\RegisterController@register1');

//Route:;group(['middleware'=>['web','checkflogin']],function(){
//
//});

//防非法登录中间件
//Route::any('my/index', function (){
//
//    //我的账户 个人中心首页
//
//})->middleware('checkflogin');

Route::any('my/index', 'Home\MyController@index');
	//资金记录
Route::any('my/capital', 'Home\MyController@capital');
	//投资记录
Route::any('my/invest', 'Home\MyController@invest');
    //回款计划
Route::any('my/backplan', 'Home\MyController@backplan');
	//开通第三方
Route::any('my/openthird', 'Home\MyController@openthird');
     //开通第三方1
Route::any('my/openthird1', 'Home\MyController@openthird1');
    //充值
Route::any('my/recharge', 'Home\MyController@recharge');
     //充值1
Route::any('my/recharge1', 'Home\MyController@recharge1');
    //提现
Route::any('my/withdrawals', 'Home\MyController@withdrawals');
    //提现1
Route::any('my/withdrawals1', 'Home\MyController@withdrawals1');
    //红包
Route::any('my/redbag', 'Home\MyController@redbag');
    //兑换历史
Route::any('my/exchange', 'Home\MyController@exchange');
    //系统信息
Route::any('my/system', 'Home\MyController@system');
    //账户设置
Route::any('my/account', 'Home\MyController@account');
    //新手入门
Route::any('my/novice', 'Home\MyController@novice');


//===================我要投资 首页=================
Route::any('invest/index', 'Home\InvestController@index');
//我要投资 详情
Route::any('invest/infor', 'Home\InvestController@infor');
//校验
Route::any('invest/jiaoyan', 'Home\InvestController@jiaoyan');
//分类查询
Route::any('invest/typeShow', 'Home\InvestController@typeShow');
//订单展示
Route::any('invest/order', 'Home\InvestController@order');
//添加订单
Route::any('invest/addOrder', 'Home\InvestController@addOrder');
//===================（薪计划）首页=================
Route::any('salary/index', 'Home\SalaryController@index');
//我要投资 详情 
Route::any('salary/infor', 'Home\SalaryController@infor');
//校验
Route::any('salary/jiaoyan', 'Home\SalaryController@jiaoyan');
//分类查询
Route::any('salary/typeShow', 'Home\SalaryController@typeShow');
//订单展示
Route::any('salary/order', 'Home\SalaryController@order');
//添加订单
Route::any('salary/addOrder', 'Home\SalaryController@addOrder');
//===================（优选计划）首页=================
Route::any('uxplan/infor', 'Home\UxplanController@infor');
//校验
Route::any('uxplan/jiaoyan', 'Home\UxplanController@jiaoyan');
//分类查询
Route::any('uxplan/typeShow', 'Home\UxplanController@typeShow');
//订单展示
Route::any('uxplan/order', 'Home\UxplanController@order');
//添加订单
Route::any('uxplan/addOrder', 'Home\UxplanController@addOrder');


//手机验证
Route::any('my/phone', 'Home\MyController@phone');
//修改手机页面
Route::any('my/cell_num', 'Home\MyController@cell_num');
//修改手机
Route::any('my/sava_phone', 'Home\MyController@sava_phone');
//身份证表单页面
Route::any('my/identity', 'Home\MyController@identity');
//验证身份证号码
Route::any('my/Aut', 'Home\MyController@Aut');
//邮箱修改
Route::any('my/sell_email', 'Home\MyController@sell_email');
//修改密码
Route::any('my/sell_password', 'Home\MyController@sell_password');
//验证身份证号码是否合法
Route::any('my/idcard', 'Home\MyController@idcard');



//安全保障
Route::any('safe/index', 'Home\SafeController@index');

//关于我们 首页
 Route::any('company/index', 'Home\CompanyController@index');
    // 网站公告
 Route::any('company/website', 'Home\CompanyController@website');
    // 媒体报道
 Route::any('company/media', 'Home\CompanyController@media');  
    // 公司简介 
 Route::any('company/introduce', 'Home\CompanyController@introduce');
     //管理团队
 Route::any('company/manage', 'Home\CompanyController@manage');   
    // 合作伙伴
 Route::any('company/partner', 'Home\CompanyController@partner');
    // 团队风采
 Route::any('company/styles', 'Home\CompanyController@styles');
    // 法律政策
 Route::any('company/legalpolicy', 'Home\CompanyController@legalpolicy');
    // 法律声明
 Route::any('company/statement', 'Home\CompanyController@statement');
    // 资费说明
 Route::any('company/postage', 'Home\CompanyController@postage');
     // 招贤纳士
 Route::any('company/personnel', 'Home\CompanyController@personnel'); 
    // 联系我们
 Route::any('company/contact', 'Home\CompanyController@contact');    
    // 公司公告详细
 Route::any('company/notice', 'Home\CompanyController@notice');

//支付宝支付处理路由
Route::any('alipay','Home\alipayController@Alipay');  // 发起支付请求

Route::any('notify','Home\alipayController@AliPayNotify'); //服务器异步通知页面路径
Route::any('return','Home\alipayController@AliPayReturn');  //页面跳转同步通知页面路径

//后台  首页
Route::any('admin/index', 'Admin\IndexController@index');
    //首页展示
Route::any('admin/welcome', 'Admin\IndexController@welcome');
    //登录
Route::any('admin/login', 'Admin\LoginController@index');
    //登录执行
Route::any('admin/login_do', 'Admin\LoginController@login_do');
// 验证密码是否匹配用户名
Route::any('admin/username_find', 'Admin\LoginController@username_find');
     // 验证密码
Route::any('admin/password_list', 'Admin\LoginController@password_list');   
    // 退出
Route::any('admin/login_out', 'Admin\LoginController@login_out');
    //会员列表
Route::any('admin/member/lists', 'Admin\MemberController@lists');
    // 会员添加
Route::any('admin/member/add', 'Admin\MemberController@add');
    //会员add
Route::any('admin/member/add_s', 'Admin\MemberController@add_s');
    //会员删除
Route::any('admin/member/del', 'Admin\MemberController@del');
    //产品管理 产品列表
Route::any('admin/product/lists', 'Admin\ProductController@lists');
    //产品管理 添加产品
Route::any('admin/product/add', 'Admin\ProductController@add');
    //产品管理 产品分类
Route::any('admin/product/category','Admin\ProductController@category');
    //产品管理 产品分类添加
Route::any('admin/product/category_add','Admin\ProductController@category_add');
//     //管理员  角色
    //删除会员，放入回收站
Route::any('admin/member/member_del', 'Admin\MemberController@member_del');
//编辑
Route::any('admin/member/member_save', 'Admin\MemberController@member_save');
//编辑成功
Route::any('admin/member/member_save_success', 'Admin\MemberController@member_save_success');

//修改密码表单
Route::any('admin/member/save_password', 'Admin\MemberController@save_password');
//修改密码成功
Route::any('admin/member/save_password_success', 'Admin\MemberController@save_password_success');
//回收站批量删除
Route::any('admin/member/true_del_all', 'Admin\MemberController@true_del_all');
////会员列表批量删除
Route::any('admin/member/mem_del_all', 'Admin\MemberController@mem_del_all');
//还原
Route::any('admin/member/member_huanyuan', 'Admin\MemberController@member_huanyuan');
//彻底删除
Route::any('admin/member/delete_it', 'Admin\MemberController@delete_it');
// 红包管理
Route::any('admin/redbag/add', 'Admin\RedBagController@index');
Route::any('admin/redbag/doAdd', 'Admin\RedBagController@doAdd');
Route::any('admin/redbag/show', 'Admin\RedBagController@welcome');
Route::any('admin/redbag/red', 'Admin\RedBagController@redIndex');
Route::any('admin/redbag/doData', 'Admin\RedBagController@addData');
Route::any('admin/redbag/lists', 'Admin\RedBagController@lists');
Route::any('admin/redbag/del', 'Admin\RedBagController@delData');
//投资管理
Route::any('admin/lc/uplan', 'Admin\LcController@uplan');
Route::any('admin/lc/uxplan', 'Admin\LcController@uxplan');
Route::any('admin/lc/xplan', 'Admin\LcController@xplan');
Route::any('admin/lc/udel', 'Admin\LcController@udel');
Route::any('admin/lc/uupdate', 'Admin\LcController@uupdate');
Route::any('admin/lc/uadd', 'Admin\LcController@uadd');
Route::any('admin/lc/duadd', 'Admin\LcController@duadd');

//================RBAC============
                // 添加角色关联的用户
Route::any('admin/user/user_list', 'Admin\Rbac\UserController@user_list');
                // 管理员列表
Route::any('admin/user/user_add_list', 'Admin\Rbac\UserController@user_add_list');           
                //删除管理员
Route::any('admin/user/user_del', 'Admin\Rbac\UserController@user_del');           // 权限控制
Route::any('admin/note/note_list', 'Admin\Rbac\NoteController@note_list');           // 添加权限
Route::any('admin/note/note_add_list', 'Admin\Rbac\NoteController@note_add_list');           
                //权限提交
Route::any('admin/note/note_add_do', 'Admin\Rbac\NoteController@note_add_do');
               //删除权限
Route::any('admin/note/note_del', 'Admin\Rbac\NoteController@note_del');
               //更新权限名称
Route::any('admin/note/name_up', 'Admin\Rbac\NoteController@name_up');
           // 角色控制
Route::any('admin/role/role_list', 'Admin\Rbac\RoleController@role_list');           // 添加控制
Route::any('admin/role/role_add_list', 'Admin\Rbac\RoleController@role_add_list');           // 角色提交
Route::any('admin/role/role_add_do', 'Admin\Rbac\RoleController@role_add_do');           // 角色提交
Route::any('admin/user/user_add_do', 'Admin\Rbac\UserController@user_add_do');  
                // 权限控制
Route::any('admin/role/role_note_list', 'Admin\Rbac\Role_noteController@role_note_list');   
                // 权限添加
Route::any('admin/role/role_note_add', 'Admin\Rbac\Role_noteController@role_note_add');                 
                // 添加角色关联的权限
Route::any('admin/role/user_role_list', 'Admin\Rbac\User_roleController@user_role_list');                
                // 用户控制
Route::any('admin/role/user_role_add', 'Admin\Rbac\User_roleController@user_role_add');                  
           


Route::get('cookieset', function()
{
    $foreverCookie = Cookie::forever('forever', 'Success');
    $tempCookie = Cookie::make('temporary', 'My name is fantasy', 5);//参数格式：$name, $value, $minutes
    return Response::make()->withCookie($foreverCookie)->withCookie($tempCookie);
});

Route::get('cookietest', function()
{
    $forever = Cookie::get('forever');
    $temporary = Cookie::get('temporary');
    return View::make('cookietest', array('forever' => $forever, 'temporary' => $temporary, 'variableTest' => 'it works'));
});