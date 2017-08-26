<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="../../Admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="../../Admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../../Admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="../../Admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="../../Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="../../Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="../../Admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="../../Admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>权限管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 权限管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form class="Huiform" method="post" action="" target="_self">
			<input type="text" class="input-text" style="width:250px" placeholder="权限名称" id="" name="">
			<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜权限节点</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" href="../../admin/role/role_add_list"><i class="Hui-iconfont">&#xe600;</i> 添加角色</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<form action="user_role_add" method="post">
	<!-- <input type="hidden" name="_token" value="<?= csrf_token(); ?>"> -->
	<input type="hidden" name="id" value="<?= $id ?>">	
	<table class="table table-border table-bordered table-bg">
<!-- 		<thead>
			<tr>
				<th scope="col" colspan="7">权限节点</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="200">用户角色</th>
				<th>加入时间</th>
				<th width="100">操作</th>
			</tr>
		</thead> -->
		<tbody>
		<tr>
			<th class="center" colspan="4" style="font-size:20px; color:#abcdef; padding-right:90%;">已拥有用户↓</th>
		</tr>
		<?php foreach ($user_role_list_true as $key => $value): ?>
		<tr>
			<td class="center"><input type="checkbox" name="box_id[]" value="<?= $value->id ?>" class="center" checked ></td>
			<td class="center"><?= $value->username ?></td>
			<td class="center"><?= $value->email ?><br></td>
			<td class="center"><?= $value->created_time ?><br></td>
		</tr>
		<?php endforeach ?>	
		<tr>
			<th class="center" colspan="4" style="font-size:20px; color:#abcdef; padding-right:90%;">未拥有用户↓</th>
		</tr>		
		<?php foreach ($user_role_list_false as $key => $value): ?>
		<tr>
			<td class="center"><input type="checkbox" name="box_id[]" value="<?= $value->id ?>"></td>
			<td class="center"><?= $value->username ?></td>
			<td class="center"><?= $value->email ?><br></td>
			<td class="center"><?= $value->created_time ?><br></td>
		</tr>
		<?php endforeach ?>	
<!-- 		<tr>
			<td class="center" colspan="4" style="padding-right:4%; height:50px; "><input type="submit" value="提交" class="tdBtn "></td>
		</tr> -->		
		</tbody>
	</table>
		<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" id="submit-botton" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../../Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="../../Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="../../Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../../Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-权限-添加*/
function admin_permission_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-权限-编辑*/
function admin_permission_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*管理员-权限-删除*/
function admin_permission_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
</body>
</html>