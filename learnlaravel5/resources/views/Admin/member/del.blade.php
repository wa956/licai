@include('Admin.layouts.memberhead')
<title>删除的用户</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span class="c-gray en">&gt;</span> 删除的用户<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> </span> <span class="r">共有数据：<strong id="num">{{$num}}</strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" id="check" name="" value=""></th>
				<th width="80">ID</th>
				<th width="100">用户名</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="130">加入时间</th>
				<th width="70">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($p_info as $k=>$v)
			<tr class="text-c">
				<td><input type="checkbox" value="{{$v['id']}}" class="chckBox" name="chckBox"></td>
				<td>{{$v['id']}}</td>
				<td>{{$v['username']}}</td>
				<td>{{$v['telephone']}}</td>
				<td>{{$v['email']}}</td>
				<td>{{date("Y-m-d H:i:s",$v['regtime'])}}</td>
				<td class="td-status"><span class="label label-danger radius">已删除</span></td>
				<td class="td-manage"><a style="text-decoration:none" href="javascript:;" onClick="member_huanyuan(this,'{{$v['id']}}')" title="还原"><i class="Hui-iconfont">&#xe66b;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'{{$v['id']}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
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

	/*用户-删除*/
	function member_del(obj,id){
		layer.confirm('确认要删除吗？',function(index){
			$.ajax({
				type: 'GET',
				url: "delete_it",
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
	/*用户-还原*/
	function member_huanyuan(obj,id){
		layer.confirm('确认要还原吗？',function(index){
			$.ajax({
				type: 'GET',
				url: "member_huanyuan",
				data:{id:id},
				dataType: 'json',
				success: function(data){
					$(obj).parents("tr").remove();
					layer.msg('已还原!',{icon:1,time:1000});
					$("#num").html()
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
		for(var index =0 ; index<num ; index++){
			if(chckBox[index].checked){
				ids += chckBox[index].value + ",";
			}
		}
		if(ids!=""){
			if(window.confirm("确定删除所选记录？")){
				$.ajax( {
					type : "post",
					url : 'true_del_all?ids=' + ids, //要自行删除的action
					dataType : 'json',
					success : function(data) {
						alert("删除成功");
						window.location.href = "del" ;
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

</body>
</html>