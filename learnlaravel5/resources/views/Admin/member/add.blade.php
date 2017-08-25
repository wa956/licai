@include('Admin.layouts.memberhead')
<title>添加用户 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form action="add_s" method="post" class="form form-horizontal" id="form-member-add" target="_parent">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="由3-16位字母，数字下划线组成" id="username" name="username">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="password" class="input-text" value="" placeholder="由6位数字组成" id="password" name="password">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="请输入正确手机格式" id="mobile" name="telephone">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="请输入正确的邮箱格式" name="email" id="email">
			</div>
		</div>

		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input class="btn btn-primary radius" id="tiaojian" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
			</div>
		</div>
	</form>
</article>
<script src="jquery-1.7.2.min.js"></script>
<script>
	$(document).ready(function(){
		$("#tiaojian").click(function(check){
			var flag1=username();
			var flag2=password();
			var flag3=mobile();
			var flag4=email();

			if(flag1==false){
				alert("用户名格式错误！");
				check.preventDefault();//此处阻止提交表单
			}
			if(flag2==false){
				alert("密码格式错误！");
				check.preventDefault();//此处阻止提交表单
			}
			if(flag3==false){
				alert("手机号格式错误！");
				check.preventDefault();//此处阻止提交表单
			}
			if(flag4==false){
				alert("邮箱格式错误！");
				check.preventDefault();//此处阻止提交表单
			}
		});
	});
	//用户名

	function username(){
		var username=$("#username").val()
		var reg = /^[a-zA-Z0-9_]{3,16}$/
		var flag=reg.test(username)
		return flag
	}
	//密码

	function password(){
		var password=$("#password").val()
		var reg = /^[\w_]{6}$/;
		var flag=reg.test(password)
		return flag
	}
	//手机

	function mobile(){
		var mobile=$("#mobile").val()
		var reg = /^1[0-9]{10}$/;
		var flag=reg.test(mobile)
		return flag
	}
	//邮箱

	function email(){
		var email=$("#email").val()
		var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
		var flag=reg.test(email)
		return flag
	}

</script>


</body>
</html>
