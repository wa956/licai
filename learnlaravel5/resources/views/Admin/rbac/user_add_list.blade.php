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
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add" method="post" action="user_add_do">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户昵称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="username" name="username">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password" name="password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="re-password" name="re-password">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" name="email" id="email">
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" id="submit-botton" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="../../Admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="../../Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../Admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="../../Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../../Admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="../../Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="../../Admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script>
	$(function(){
		$('#username').blur(function(){
			username();
			username_find();
		})
		$('#email').blur(function(){
			email();
		})
		$('#password').blur(function(){
			password();
		})
		$('#re-password').blur(function(){
			re_password();
		})
		function username() {	// 验证用户名	
			var reg = /^[\u4E00-\u9FA5]{2,8}$/;
			var username = $('#username').val();
			if(!reg.test(username)){
				$('#username').css('color','red');
	            return false;
	        }else{
	        	$('#username').css('color','#000');
	            return true;
	        }
			
		}
		function email(){	// 验证邮箱
			var reg = /\w+[@]{1}\w+[.]\w+/;
			var email = $('#email').val();
			if(!reg.test(email)){
				$('#email').css('color','red');
	            return false;
	        }else{
	        	$('#email').css('color','#000');
	            return true;
	        }
		}
		function password(){	// 验证密码
			var reg = /^\w{4,15}$/;
			var password = $('#password').val();
			if(!reg.test(password)){
				$('#password').css('color','red');
	            return false;
	        }else{
	        	$('#password').css('color','#000');
	            return true;
	        }
		}
		function re_password(){	// 确认密码
			var password = $('#password').val();
			var re_password = $('#re-password').val();
			if(re_password != password){
				$('#re-password').css('color','red');
	            return false;
	        }else{
	        	$('#re-password').css('color','#000');
	            return true;
	        }
		}
		function username_find(){
			var username = $('#username').val();
			$.ajax({
				type: 'get',
				url	: '{{ asset("/layouts/username_find") }}',
				data: {username:username},
				dataType: 'json',
				success:function(msg){
					if(msg['success'] == 1){
						$('#username').css('color','red');
						$("#submit-botton").attr("disabled", true);
						return false; 
					}else{
						$("#submit-botton").attr('disabled',false);
						return true;
					}
				}
			})
		}
		$("#submit-botton").click(function(){	// 表单提交验证
			if(username()&email()&password()&re_password()){
				return true;
				// layer.msg('添加成功!',{icon:1,time:1000});
				var index = parent.layer.getFrameIndex(window.name);
				// parent.$('.btn-refresh').click();
				parent.layer.close(index);
				var username=$('#username').val();
				var password=$('#password').val();
				var email=$('#email').val();
				$.ajax({
					type:'post',
					url:'user_add_do',
					data:{username:username,password:password,email:email},
					success:function(data){
						if(data==1){
						var index = parent.layer.getFrameIndex(window.name);
							parent.$('.btn-refresh').click();
							parent.layer.close(index);
						}
					}
				})
			}else{
				alert('请先完善信息');
				return false;
			}
		})
	})
</script>
<script type="text/javascript">
$(function(){
	// $('.skin-minimal input').iCheck({
	// 	checkboxClass: 'icheckbox-blue',
	// 	radioClass: 'iradio-blue',
	// 	increaseArea: '20%'
	// });
	
// 	$("#form-admin-add").validate({
// 		rules:{
// 			username:{
// 				required:true,
// 				minlength:2,
// 				maxlength:16
// 			},
// 			password:{
// 				required:true,
// 			},
// 			re_password:{
// 				required:true,
// 				equalTo: "#password"
// 			},
// 			email:{
// 				required:true,
// 				email:true,
// 			},
// 		},
// 		onkeyup:false,
// 		focusCleanup:true,
// 		success:"valid",
// 		submitHandler:function(form){
// 			$(form).ajaxSubmit({
// 				alert(form)
// 				type: 'post',
// 				url: "user/user_add_do" ,
// 				success: function(data){
// 			alert(data)
// 					layer.msg('添加成功!',{icon:1,time:1000});
// 				},
//                 error: function(XmlHttpRequest, textStatus, errorThrown){
// 					layer.msg('error!',{icon:1,time:1000});
// 				}
// 			});
// 			var index = parent.layer.getFrameIndex(window.name);
// 			parent.$('.btn-refresh').click();
// 			parent.layer.close(index);
// 		}
// 	});
// });
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>