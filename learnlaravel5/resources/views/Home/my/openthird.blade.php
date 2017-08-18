@include('Home.layouts.myhead')
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="../Home/images/clist1.jpg" width="1200" height="96"></div>
    @include('Home.layouts.myleft')
    <style>
		        /*获取验证码*/
				a.hqyzm{ float:left; background:#ea524a; width:125px; height:35px; line-height:35px; font-size:14px; margin-left:6px; text-align:center; color:#fff; border-radius:2px;}
				a.hqyzm:hover{color:#fff;background:#ff8882;}
				/*获取验证码后在倒计时中的样式*/
				a.hqyzmAfter{float:left; background:#c0c0c0; width:125px; height:35px; line-height:35px; font-size:14px; margin-left:6px; text-align:center; color:#fff; border-radius:2px;}
	   </style>
    <script type="text/javascript">
			//<![CDATA[
			    var flag = false;
				function sCode(xhr, status, args, args2) {
					if (!args.validationFailed) {
						$("#sendCode").hide();
						$("#sendCodeGrey").show();
						/* if(flag && $("#sendCode").is(":hidden")){
							return;
						} */
						flag = true;
						var mobileNumber = $("#form\\:mobileNumber").val().replace(/(^\s*)|(\s*$)/g,"");
						if("dx" == args2){
							$("#mobileMsg").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
							$("#authCodeMsg").css({"display": ""});
							$("#authCodeMsg2").css({"display": "none"});
						}else if("yy" == args2){
							$("#mobileMsg2").html(mobileNumber.substring(0,3) + "****" + mobileNumber.substring(7,11));
							$("#authCodeMsg").css({"display": "none"});
							$("#authCodeMsg2").css({"display": ""});
						}
						timer("sendAuthCodeBtn1", {
							"count" : 60,
							"animate" : true,
							initTextBefore : "后可重新操作",
							initTextAfter : "秒",
							callback:function(){
								$("#sendCode").show();
								$("#sendCodeGrey").hide();
								flag = false;
								$("#authCodeMsg").css({"display": "none"});
								$("#authCodeMsg2").css({"display": "none"});
							}
						}).begin();
					}
				}
				 //验证验证码是否为空
		       function phoneValidate()
		       {
	        	   var authCode=$("#form\\:authCode").val();
	        	   var nullFlag=(authCode=="");
	        	   if(nullFlag)
		   			{
		   				$("#form\\:authCode_message").remove();
		   				var $span = $("<span id=form\:authCode_message class=error>请输入验证码</span>");
		   				$("#authCodeErrorDiv").append($span);
		   				return false;
		   			}
		   			
	        	   return true;
		       }
		       $(document).ready(function(){
		  			var investorValiCodeError = $("#investorValiCodeError").val();
		  			if(investorValiCodeError.length > 0){
		  				$("#form\\:formauthCode_message").remove();
		  	   			var $span = $("<span id=form\:formauthCode_message class=error>"+investorValiCodeError+"</span>");
		  	   			$("#authCodeErrorDiv").append($span);
		  			}
		  	   });
		          
		          
		          
	         function showSpan(op)
	         {
					$("body").append("<div id='mask'></div>");
					$("#mask").addClass("mask").css("display","block");
		
					$("#"+op).css("display","block");
			 }

			function displaySpan(op){
					$("#mask").css("display","none");
					$("#"+op).css("display","none");
			}
			//]]>
		</script>
    <script type="text/javascript">
	//<![CDATA[
	     $(function(){
				var emailFlag="false";
				if(emailFlag=='false')
				{
					showSpan('alert-activeEmail');//绑定邮箱
					return;
				}
			})      
	//]]>
	</script>
    <div class="personal-main">
      <div class="personal-pay">
        <h3><i>开通第三方账户</i></h3>
        <form id="form" name="form" method="post" action="">
          <div class="pay-notice">
            <p>开通第三方资金托管账户的信息将提交至<a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>网站执行，</p>
            <p><a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>系统将为您分配唯一用户ID（格式为：TG_用户名），并与您亿人宝金融账户自动绑定，您无需修改和记忆。 </p>
          </div>
          <div class="pay-form">
            <h6>请输入您的身份证信息</h6>
            <ul>
              <li>
                <label for="realname">真实姓名</label>
                <input type="text" name="" class="pay-txt" maxlength="16"  placeholder="您的真实姓名">
                <div id="realnameErrorDiv"></div>
              </li>
              <li>
                <label for="idCard">身份证号</label>
                <input type="text" name="" class="pay-txt" maxlength="18" placeholder="您的身份证号">
                <div id="idCardErrorDiv">
                  <p style="margin-top:10px;">身份证信息认证后将不可修改，请您仔细填写</p>
                </div>
              </li>
            </ul>
            <h6>手机号已绑定</h6>
            <ul>
              <li>
                <label for="phone">手机号</label>
                <input type="hidden" name="form:j_idt98" value="15055100139">
                <label> 150****0139</label>
              </li>
              <li>
                <input type="submit" name="" value="开户" style="border:none;" class="btn-paykh">
              </li>
            </ul>
          </div>
        </form>
        <script type="text/javascript">
			//<![CDATA[
			           //验证邮箱是否为空
			           function checkactiveEmailFormEmail()
			           {
			        	   var email=$("#activeEmail\\:activeEmailemail").val();
			        	   var nullFlag=(email=="");
			        	   if(nullFlag)
				   			{
				   				$("#activeEmail\\:activeEmailemail_message").remove();
				   				var $span = $("<span id=activeEmail\:activeEmailemail_message class=error>请输入邮箱</span>");
				   				$("#activeEmailemailErrorDiv").append($span);
				   				return false;
				   			}
				   			else
				   			{
				   				var error=$("#activeEmailemailErrorDiv").text();
				   				if(error=='请输入邮箱')
				   				$("#activeEmail\\:activeEmailemail_message").remove();
				   			}
			        	   return true;
			           }
			           //验证所有
			           function checkActiveEmailAll()
			           {
			        	   checkactiveEmailFormEmail();
			        	   var emailErrorFlag=$("#activeEmailemailErrorDiv").text()=="";
			        	   return emailErrorFlag;
			           }
			//]]>
		</script>
        <div class="pay-tipcon"> 1、为切实保障投资人的利益，亿人宝金融将理财资金托管在<a href="http://www.htmlsucai.com" target="_blank">丰付第三方支付</a>平台。平台是2012年6月获批中国人民银行支付许可证和中国证监会基金支付许可的第三方支付公司，在金融支付领域业界领先地位。详情请登录<a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>官方网站查看。<br>
          2、根据相关法律规定，亿人宝金融在开通资金托管账户时，需要验证您的身份信息。该信息一经设置，无法修改，请慎重选择。为了确保您可以顺利提现，请确认您拥有一张使用该身份证开户的有效储蓄卡。<br>
          3、亿人宝金融将最大限度的尊重和保护您的个人隐私，详情请阅读<a href="/node/Candyprivacypolicy/RegistrationAgreement0001test" target="_blank">《亿人宝金融隐私条款》</a>。<br>
          4、您在开通第三方账号过程中，如有遇到问题，可以查看理财帮助，也可以联系我们的客服进行咨询，咨询电话：400-999-8850。 </div>
      </div>
      <div class="alert-450" id="alert-activeEmail" style="display: block;">
        <div class="alert-title">
          <h3>激活邮箱</h3>
        </div>
        <div class="alert-main">
          <form id="activeEmail" name="activeEmail" method="post" action="/user/depositAuthenticationAccount" enctype="application/x-www-form-urlencoded" target="_blank">
            <input type="hidden" name="activeEmail" value="activeEmail">
            <ul>
              <li>
                <label class="txt-name">邮箱</label>
                <input id="activeEmail:activeEmailemail" type="text" name="activeEmail:activeEmailemail" class="txt235" onblur="jsf.util.chain(this,event,'return checkactiveEmailFormEmail()','mojarra.ab(this,event,\'blur\',0,0)')" placeholder="请输入邮箱">
                <div id="activeEmailemailErrorDiv" class="alert-error120"></div>
              </li>
              <input type="submit" name="activeEmail:j_idt108" value="立即激活邮箱" class="btn-ok txt-right" onclick="return checkActiveEmailAll()">
            </ul>
            <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="3539659789631542353:-7321825572772818867" autocomplete="off">
          </form>
        </div>
      </div>
      <script type="text/javascript">
				//<![CDATA[
		    	if(window.ActiveXObject)
			    {
			        var browser=navigator.appName 
			        var b_version=navigator.appVersion 
			        var version=b_version.split(";"); 
			        var trim_Version=version[1].replace(/[ ]/g,""); 
			        if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE7.0") 
			        { 
			        	$("#form\\:sendAuthCodeBtn2").css("display","block");
			        	$("#form\\:sendAuthCodeBtn").css("display","none");
			        } 
		        }
		        function sCode2(){
		        	var mobile = $("#form\\:mobileNumber").val();
		        	var mobileRegex="^1[3|4|5|7|8][0-9]{9}$";
		        	var mobilePattern = new RegExp(mobileRegex);
    				var mobileFlag=mobilePattern.test(mobile);
    				
    				if(!mobileFlag){
    					return;
    				}
    				
		        	$("#sendCode").hide();
					$("#sendCodeGrey").show();
					if(flag && $("#sendCode").is(":hidden")){
						return;
					}
					flag = true;
					timer("sendAuthCodeBtn1", {
						"count" : 60,
						"animate" : true,
						initTextBefore : "后可重新操作",
						initTextAfter : "秒",
						callback:function(){
							$("#sendCode").show();
							$("#sendCodeGrey").hide();
							flag = false;
						}
					}).begin();
		        }
		        var ua = navigator.userAgent; 
				if(ua.indexOf("Windows NT 5")!=-1) { 
				    if(window.ActiveXObject)
				    {
				        var browser=navigator.appName 
				        var b_version=navigator.appVersion 
				        var version=b_version.split(";"); 
				        var trim_Version=version[1].replace(/[ ]/g,""); 
				        if(browser=="Microsoft Internet Explorer" && (trim_Version=="MSIE8.0" || trim_Version=="MSIE7.0")) 
				        { 
				        	$("#form\\:sendAuthCodeBtn2").css("display","block");
			        		$("#form\\:sendAuthCodeBtn").css("display","none");
				        } 
			        }
				}

				var second = 0;
                var internal;
                /** 校验修改手机验证码 */
				function validateSMS(){
					$("#form\\:authCode_message").remove();
					var mobileNumber = $("#form\\:mobileNumber").val();
					if(mobileNumber == '请输入手机'){
		                return;
					}
					var returnResult = false;
					$.ajax({
						   url: "/valiSms",
						   async:false,
						   data:{
								mobileNumber:mobileNumber
						   },
						   success: function(data){
							   if(data.flag == 'NO'){
								   $("#form\\:authCode_message").remove();
						   		   var $span = $("<span id=form\:authCode_message class=alerterror>点击过于频繁,请<b>"+data.second+"</b>秒后重试</span>");
				   				   $("#authCodeErrorDiv").append($span);
								   second = data.second;
								   clearInterval(internal);
								   internal = setInterval(function(){
		                              if(second == 0){
		                            	  $("#form\\:authCode_message").remove();
		                              }else{
		                            	  second = second -1;
		                            	  $("#form\\:authCode_message").find('b').html(second);
		                              }
								   },1000);
								   returnResult = false;
							   }else if(data.flag == 'NO1'){
								   $("#form\\:authCode_message").remove();
						   		   var $span = $("<span id=form\:authCode_message class=alerterror>"+data.smsVali+"</span>");
				   				   $("#authCodeErrorDiv").append($span);
								   returnResult = false;
							   }else{
								   returnResult = true;
							   }
						   }
					    });
		               return returnResult;
				}
		        //]]>
		    </script>
    </div>
    <div class="clear"></div>
  </div>
</div>
@include('Home.layouts.foot')