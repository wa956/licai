@include('Admin.layouts.memberhead')
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="content" name="">
		<button type="submit" class="btn btn-success radius" id="search" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="member_add('添加用户','../../admin/member/add','','510')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span> <span class="r">共有数据：<strong>{{$p_info['total']}}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				{{--<th width="40">性别</th>--}}
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				{{--<th width="">地址</th>--}}
				<th width="130">加入时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($p_info["data"] as $k=>$v)
			<tr class="text-c">
				<td><input type="checkbox" value="{{$v['id']}}" name="chckBox"></td>
				<td>{{$v['id']}}</td>
				<td>{{$v['username']}}</td>
				<td>{{$v['telephone']}}</td>
				<td>{{$v['email']}}</td>
				<td>{{date("Y-m-d H:i:s",$v['regtime'])}}</td>
				<td class="td-status"><span class="label label-success radius">已启用</span></td>
				<td class="td-manage">
					<a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>
					<a title="编辑" href="javascript:;" onclick="member_edit('编辑','member_save?id={{$v['id']}}','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','save_password?id={{$v['id']}}','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a>
					<a title="删除" href="javascript:;" onclick="member_del(this,'{{$v['id']}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
		<a href="http://www.duoying.com/admin/member/lists?page=1">首页</a>&nbsp;
		<a href="{{$p_info['prev_page_url']}}">上一页</a>&nbsp;
		<a href="{{$p_info['next_page_url']}}">下一页</a>&nbsp;
		<a href="http://www.duoying.com/admin/member/lists?page={{$p_info['last_page']}}">末页</a>&nbsp;&nbsp;&nbsp;&nbsp;
		当前为第 _<span style="color: red">{{$p_info['current_page']}}</span>_页&nbsp;&nbsp;&nbsp;&nbsp;共{{$p_info['last_page']}}页
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../../Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../../Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../../Admin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'GET',
			url: "member_del",
			data:{id:id},
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
//批量删除
function datadel(){
	var chckBox = document.getElementsByName("chckBox");
	var num = chckBox.length;
	var ids = "";
	for(var index=num-1 ;index >=0 ;  index--){
		if(chckBox[index].checked){
			ids += chckBox[index].value + ",";
		}
	}
	if(ids!=""){
		if(window.confirm("确定删除所选记录？")){
			$.ajax( {
				type : "post",
				url : 'mem_del_all?ids=' + ids, //要自行删除的action
				dataType : 'json',
				async: false,
				success : function(data) {
					if(data>=0){
						alert("删除成功");
						for(var index=num-1 ;index >=0 ;  index--){
							if(chckBox[index].checked){
								chckBox[index].parentNode.parentNode.parentNode.removeChild(chckBox[index].parentNode.parentNode)
							}
						}
					}else{
						alert("删除失败")
					}

//					window.location.href = "lists" ;
				},
				error : function(data) {
					alert("系统错误，删除失败");
				}
			});
		}
	}else{
		alert("请选择要删除的记录");
	}
}
</script>
<script>
	$(document).on("click","#search",function(){
		var datemin=$("#datemin").val()
		var datemax=$("#datemax").val()
		var content=$("#content").val()

		window.location.href="http://www.duoying.com/admin/member/lists?datemin="+datemin+"&datemax="+datemax+"&content="+content;


//		$.ajax( {
//			type : "GET",
//			url : 'lists', //要自行删除的action
//			data:{datemin:datemin,datemax:datemax,content:content},
//			dataType : 'json',
//			async: false,
//			success : function(data) {
//
//			}
//		})
	})
</script>
</body>
</html>