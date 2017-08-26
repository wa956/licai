@include('Home.layouts.myhead')
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="../Home/images/clist1.jpg" width="1200" height="96"></div>
    @include('Home.layouts.myleft')
    <label id="typeValue" style="display:none;"> </label>
    <script>
		$(function(){
		    $('.quick-tit').click(function(){
		      $(this).addClass('pay-cur');
		      $(this).siblings().removeClass('pay-cur');
		      $('.quick-main').show();
		      $('.online-main').hide();
		      $(".pay-tipcon").hide();
		      $(".pay-tipcon2").show();
		    })
		    $('.online-tit').click(function(){
		      $(this).addClass('pay-cur');
		      $(this).siblings().removeClass('pay-cur');
		      $('.quick-main').hide();
		      $('.online-main').show();

		      $(".pay-tipcon2").hide();
		      $(".pay-tipcon").show();
		    })
	  });
		//<![CDATA[
			function showSpan(op){
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
    <script>
			//<![CDATA[
			function checkRecharge() {
				var moneyRegex="^(([1-9]+[0-9]*)|((([1-9]+[0-9]*)|0)\\.[0-9]{1,2}))$";
				var money = $("#recharge\\:actualMoney").val();
				var nullFlag=(money=="")||money<=0;
				var numberFlag=isNaN(money);
				//如果输入为空
				if(nullFlag)
				{
					var $span = "<em></em>请输入金额";
					$("#actualMoneyErrorDiv").html($span);
					return false;
				}
				else
				{
					$("#actualMoneyErrorDiv").html("");
				}
				//如果输入的不是数字
				if(numberFlag)
				{
					var $span = "<em></em>请输入数字</span>";
					$("#actualMoneyErrorDiv").html($span);
					return false;
				}
				else
				{
					$("#actualMoneyErrorDiv").html("");
				}
				//输入金额是否合法
				var moneyPattern = new RegExp(moneyRegex);
		    	var legalFlag=moneyPattern.test(money);
				if(!legalFlag)
				{
					var $span = "<em></em>金额必须大于0且为整数或小数，小数点后不超过2位</span>";
					$("#actualMoneyErrorDiv").html($span);
					return false;		
				}
				else
				{
					$("#actualMoneyErrorDiv").html("");
				}
				return true;
			}
			function validateAgree()
			{
				var $checkname=$("#bank-check").children("b").hasClass("selected");
				if(!($checkname))
				{
					return false;
				}
				else
				{
					return true;		
				}
			}
			function getShowPayVal(){
				var rechargeFlag=checkRecharge();
				var agreeFlag=validateAgree();
				flag=rechargeFlag&&agreeFlag;
				$("#recharge\\:rechargeWay").val($("#showpay").html());
				var bankProtocol = $("#bankProtocol").attr('class');
				if(!bankProtocol)
				{
					$("#bankProtocol_message").show();
					 return false;
				}
				return flag;
			}
			
			
			function amount(th){
			    var regStrs = [
			        ['^0(\\d+)$', '$1'], //禁止录入整数部分两位以上，但首位为0
			        ['[^\\d\\.]+$', ''], //禁止录入任何非数字和点
			        ['\\.(\\d?)\\.+', '.$1'], //禁止录入两个以上的点
			        ['^(\\d+\\.\\d{2}).+', '$1'] //禁止录入小数点后两位以上
			    ];
			    for(i=0; i<regStrs.length; i++){
			        var reg = new RegExp(regStrs[i][0]);
			        th.value = th.value.replace(reg, regStrs[i][1]);
			    }
			    if(th.value>9999999.99){
			    	th.value = th.value.substr(0,th.value.length-1);
			    }
			}

/*			//验证输入银行卡号的合法性
			function checkBankCardNo() {
				//$("#form\\:defaultBankName").text("");
				var cardNo = $("#form\\:bankCardNo").val(); 
				var reg = /^\d{16,19}$/g; // 以19位数字开头，以19位数字结尾 
				if( !reg.test(cardNo) ) 
				{ 
					//$(".info2-bank").css({"display":"none"});
				    var $span = "<em></em>银行卡号输入错误";
				    $("#bankCardError").html($span);
					return false;		
				} else{
					//$(".info2-bank").css({"display":"block"});
					$("#bankCardError").html("");
				}
				return true;
			}*/
			function checkBank() {
				$("#form\\:defaultBankName").text("");
				var cardNo = $("#form\\:bankCardNo").val(); 
				var reg = /^\d{16,19}$/g; // 以19位数字开头，以19位数字结尾 
				if( !reg.test(cardNo) ) 
				{ 
					$(".info2-bank").css({"display":"none"});
					return false;		
				} else{
					$(".info2-bank").css({"display":"block"});
				}
				return true;
			}

			function validateAgree2()
			{
				var $checkname=$("#bank-check2").children("b").hasClass("selected");
				if(!($checkname))
				{
					showSpan('alert-tyht');
					return false;
				}
				else
				{
					return true;		
				}
			}
			
			function checkRecharge1() {
				var moneyRegex="^(([1-9]+[0-9]*)|((([1-9]+[0-9]*)|0)\\.[0-9]{1,2}))$";
				var money = $("#form\\:actualMoney1").val();
				var nullFlag=(money=="")||money<=0;
				var numberFlag=isNaN(money);
				//如果输入为空
				if(nullFlag)
				{
					var $span = "<em></em>请输入充值金额";
					$(".quick-error").html($span);
					return false;
				}
				else
				{
					$(".quick-error").html("");
				}
				//如果输入的不是数字
				if(numberFlag)
				{
					var $span = "<em></em>请输入数字";
					$(".quick-error").html($span);
					return false;
				}
				else
				{
					$(".quick-error").html("");
				}
				//输入金额是否合法
				var moneyPattern = new RegExp(moneyRegex);
		    	var legalFlag=moneyPattern.test(money);
				if(!legalFlag)
				{
					var $span = "<em></em>金额必须大于0且为整数或小数，小数点后不超过2位";
					$(".quick-error").html($span);
					return false;		
				}
				else
				{
					$(".quick-error").html("");
				}

				if(parseInt(money) > 50000){
					var $span = "<em></em>充值金额超过50000元";
					$(".quick-error").html($span);
					return false;
				}else
				{
					$(".quick-error").html("");
				}
				return true;
			}

			function getShowPayVal1(){
				var rechargeFlag=checkRecharge1();
				var bankCardFlag = checkBankCardNo();
				var agreeFlag=validateAgree2();
				var payflag=rechargeFlag && bankCardFlag && agreeFlag;
				var defaultBankName = $("#form\\:defaultBankName").text();
				if(defaultBankName.replace(/(^\s*)|(\s*$)/g, "")=="此银行暂不支持"){
					var $span = "<em></em>此银行暂不支持";
					$(".quick-error3").html($span);
					return false;
				}
				/*$("#recharge\\:rechargeWay").val($("#showpay").html());
				var bankProtocol = $("#bankProtocol").attr('class');
				if(!bankProtocol)
				{
					$("#bankProtocol_message").show();
					 return false;
				}*/
				return payflag;
			}

			function checkRecharge2() {
				var moneyRegex="^(([1-9]+[0-9]*)|((([1-9]+[0-9]*)|0)\\.[0-9]{1,2}))$";
				var money = $("#form2\\:actualMoney2").val();
				var nullFlag=(money=="")||money<=0;
				var numberFlag=isNaN(money);
				//如果输入为空
				if(nullFlag)
				{
					var $span = "<em></em>请输入充值金额";
					$("#quick-error2").html($span);
					return false;
				}
				else
				{
					$("#quick-error2").html("");
				}
				//如果输入的不是数字
				if(numberFlag)
				{
					var $span = "<em></em>请输入数字";
					$("#quick-error2").html($span);
					return false;
				}
				else
				{
					$("#quick-error2").html("");
				}
				//输入金额是否合法
				var moneyPattern = new RegExp(moneyRegex);
		    	var legalFlag=moneyPattern.test(money);
				if(!legalFlag)
				{
					var $span = "<em></em>金额必须大于0且为整数或小数，小数点后不超过2位";
					$("#quick-error2").html($span);
					return false;		
				}
				else
				{
					$("#quick-error2").html("");
				}

				if(parseInt(money) > 50000){
					var $span = "<em></em>充值金额超过50000元";
					$("#quick-error2").html($span);
					return false;
				}else
				{
					$("#quick-error2").html("");
				}
				return true;
			}

			function getShowPayVal2(){
				var rechargeFlag=checkRecharge2();
				var agreeFlag=validateAgree2();
				var payflag=rechargeFlag && agreeFlag;
				/*$("#recharge\\:rechargeWay").val($("#showpay").html());
				var bankProtocol = $("#bankProtocol").attr('class');
				if(!bankProtocol)
				{
					$("#bankProtocol_message").show();
					 return false;
				}*/
				return payflag;
			}

			/* function showSpan(op){
				$("body").append("<div id='maskCommon'></div>");
				$("#maskCommon").addClass("mask1").css("display","block");
				$("#"+op).css("display","block");
			} */

			/* function displaySpan(op){
				$("#alert-ClickDialog").hide();
				$("#maskCommon").hide();
			} */
			
			$(document).ready(function(){
				  if("false"=='true'){
					 showSpan("alert-ClickDialog");
				  } 
				  if("false"=='true'){
						 showSpan("alert-unbindMsgDialog");
					  } 
			 });
			//]]>
		</script>
    <div class="personal-main">
      <div class="personal-pay">
        <h3><i>充值</i></h3>
        <div class="quick-pay-wrap">
          <h4> <span class="quick-tit pay-cur"><em>快捷支付</em></span> <span class="online-tit"><em>网银充值</em></span> </h4>
          <form id="form" name="form" method="post" action="" >
            <div class="quick-main">
              <div class="fl quick-info">
                <div class="info-1"> <span class="info-tit">充值金额</span> <span class="info1-input">
                  <input id="form:actualMoney1" type="text" name="rech_money" class="pay-money-txt" maxlength="10" >
                  <em>元</em> </span> <span class="quick-error"> </span> </div>
                <div class="info-tips">多盈理财提醒您：充值金额超过50000元时，请切换到网银充值</div>
                <div class="info-2"> <span class="info-tit">银行卡号</span>
           
                 <span class="info2-input">
                  <input  value="" name="card_num" id='card_num' style="border:none;color:#333">
                  <em class="info2-bank" style="display: none;">
                  <label id="form:defaultBankName" style="font-size:16px;"> </label>
                  </em> </span> 
                  <span class="quick-error3" id="bankCardError"></span> 
           
                </div>
                <div class="info-2"> <span class="info-tit">支付密码</span>
           
                 <span class="info2-input">
                  <input  value="" type="password" name="paypwd" id='paypwd' maxlength="6" style="color:#333">
                  <em class="info2-bank" style="display: none;">
                  <label id="form:defaultBankName" style="font-size:16px;"> </label>
                  </em> </span> 
                  <span class="quick-error3" id="bankCardError"></span> 
           
                </div>                
                <div class="bank-check" id="bank-check2"> <b class="selected" id="bankProtocol1"></b><span class="bank-agree">我同意并接受<a href="#" target="_blank">《多盈理财投资咨询与管理服务电子协议》</a></span> <span class="error" id="bankProtocol_message" style="display:none;margin-top:-3px;">请同意协议内容！</span> </div>
                <input type="button" name="" value="充值" class="btn-paycz" >
              </div>
              <div class="fr bank-info">
                <p class="bank-tit">快捷支付支持银行：</p>
                <div class="bank-pic">
	            	<ul id="paysSpan" style="height:150px;">
	            		<?php foreach($userbankcard as $v){ ?>
	            		<div class="pay-bank">
	            		 <li class="imgs"  attr-id="<?= $v['id']?>" card_num="<?= $v['card_num']?>" user_id="<?= $v['user_id']?>">
	            		 <img src="../<?= $v['bank_logo']?>" style="border:1px solid #ccc;">
	            		 <em ></em>
	            		 <span class="i" style="display:none;"><i></i></span>
	            		 </li>
	            		 </div>
	              		<?php } ?>
	            	</ul>
                </div>
              </div>
            </div>
          </form>
          <script>
				$(document).on('click','.imgs',function(){
					//第三方id
				    id = $(this).attr('attr-id');
				    $('#thirds_id').val(id);
				    //银行卡号
				    card_num = $(this).attr('card_num');
				    //充值金额
				    rech_money=$('.pay-money-txt').val();
				    $('#hrech_money').val(rech_money);
				    rech_money1=$('#hrech_money').val();
				    //用户id
				    user_id=$(this).attr('user_id');
				    $('#huser_id').val(user_id);
				    huser_id=$('#huser_id').val();
				    // alert(huser_id);
				    $('#card_num').val(card_num);
				    $("#card_num").attr("disabled","disabled");
				    $(this).children('.i').show();
				    $(this).parent().siblings().children().children('.i').hide();	
				})
				$(document).on('click','.btn-paycz',function(){
					thirds_id=$('#thirds_id').val();			
					rech_money1=$('#hrech_money').val();
					huser_id=$('#huser_id').val();
					paypwd=$('#paypwd').val();
					if(!window.confirm("你确定要充值吗？")){
						return false;
					}else{
						$.ajax({
							type:'post',
							url:'recharge',
							data:{thirds_id:thirds_id,rech_money:rech_money1,user_id:huser_id,paypwd:paypwd},
							success:function(data){
								if(data==0){
									alert('充值成功');
									location.href="";
								}
							}
						})
					}
				})
          </script>
              <div class="alert-450" id="alert-updatePass" style="display: none;">
      <div class="alert-title">
        <h3>修改密码</h3>
        <span class="alert-close" onclick="displaySpan('alert-updatePass')"></span></div>
      <div class="alert-main">
        <form id="updatePassForm" name="" method="post" action="recharge1" enctype="application/x-www-form-urlencoded">
          <input type="hidden" name="hrech_money" id="hrech_money" value="">
          <input type="hidden" name="thirds_id" id="thirds_id" value="">
          <input type="hidden" name="huser_id" id="huser_id" value="">
          <ul>
            <li>
              <label class="txt-name">请输入支付密码</label>
              <input id="updatePassForm:oldPassword" type="password" name="paypwd" value="" maxlength="6" class="txt235">
              <div id="oldPasswordErrorDiv" class="alert-error120"></div>
            </li>
            <li>
              <input type="submit" value="确 认" id="recharge1" class="btn-ok btn-235 txt-right">
            </li>
          </ul>
        </form>
      </div>
      </div>
          <div class="online-main" style="display:none;float:left;">
            <form id="recharge" name="recharge" method="post" action="#" target="_blank">
              <div class="online-mar">
                <div class="quick-info quick-info-width">
                  <div class="info-1"> <span class="info-tit">充值金额</span> <span class="info1-input">
                    <input id="recharge:actualMoney" type="text" name="recharge:actualMoney" class="pay-money-txt" maxlength="10" onblur="checkRecharge()" onkeydown="amount(this);keyUpcheck()" onkeyup="amount(this);keyUpcheck()">
                    <em>元</em> </span> <span id="actualMoneyErrorDiv" class="quick-error2"> </span> </div>
                </div>
              </div>
              <div> <span><font style=" color:#848484;font-weight:bold; margin-left:80px; height:32px; line-height:32px; font-size:12px;">亿人提醒您：充值前，请核实您的可用支付额度！</font></span> </div>
              <div class="pay-bank" id="pay-bank">
                <h6>请选择充值银行</h6>
                <span id="showpay" style="display:none;">icbc</span>
                <ul id="paysSpan" style="height:150px;">
                	@foreach($banks as $v)
                  <li><img src="../{{$v->bank_logo}}" property1="icbc" ><em></em></li>
                  	@endforeach
                </ul>
                <span class="pay-other"><span class="paytxt">选择其他银行卡</span><i class="paydown"></i></span> </div>
              <div class="pay-bankstate"> <span class="bankstate-head"><i class="fl">请关注您的充值金额是否超限：</i><i class="fr" id="show-pay-hotLine">工商银行客服热线：95588</i></span>
                <table>
                  <tbody>
                    <tr>
                      <td>单笔限额（元）</td>
                      <td>每日限额（元）</td>
                      <td>需要满足条件</td>
                      <td>备注</td>
                    </tr>
                    <tr>
                      <td width="15%">5000</td>
                      <td width="15%">5000</td>
                      <td width="20%">工银e支付</td>
                      <td width="50%" rowspan="5">请到中国工商银行各营业网点办理成为个人网上银行客户并开通网上支付功能（静态密码用户进行网上支付如超过累计金额请直接到营业网点申领电子口令卡或USB Key）；</td>
                    </tr>
                    <tr>
                      <td>500</td>
                      <td>1000</td>
                      <td>电子口令卡</td>
                    </tr>
                    <tr>
                      <td>2000</td>
                      <td>5000</td>
                      <td>短信认证</td>
                    </tr>
                    <tr>
                      <td>50万</td>
                      <td>100万</td>
                      <td>电子密码</td>
                    </tr>
                    <tr>
                      <td>100万</td>
                      <td>100万</td>
                      <td>U盾</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="bank-check" id="bank-check"> <b class="selected" id="bankProtocol"></b><span class="bank-agree">我同意并接受<a href="/node/Candyprivacypolicy/candyprivacypolicy_tzzxyglfwdzxy" target="_blank">《多盈理财金融投资咨询与管理服务电子协议》</a></span> <span class="error" id="bankProtocol_message" style="display:none;margin-top:-3px;">请同意协议内容！</span> </div>
              <input type="submit" name="recharge:j_idt96" value="充值" class="btn-paycz"  onclick="showSpan('alert-updatePass')">
              <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState">
            </form>
          </div>
          <div class="pay-tipcon" style="display:none;"> <b>充值提示：</b><br>
            1．多盈理财充值过程免费，不向用户收取任何手续费。<br>
            2．为了您的账户安全，请在充值前进行身份认证、手机绑定以及交易密码设置。<br>
            3．您的账户资金将通过丰付支付第三方平台进行充值。<br>
            4．请注意您的银行卡充值限制，以免造成不便。<br>
            5．如果充值金额没有及时到账，请联系客服—400-999-8850 </div>
          <div class="pay-tipcon2"> <b>温馨提示：</b><br>
            1. 投资人充值过程全程免费，不收取任何手续费。<br>
            2. 为防止套现，所充资金必须经投标回款后才能提现。<br>
            3. 使用快捷支付进行充值，可能会受到不同银行的限制，如需大额充值请使用网银充值进行操作。<br>
            4. 充值/提现必须为银行借记卡，不支持存折、信用卡充值。<br>
            5. 严禁利用充值功能进行信用卡套现、转账、洗钱等行为，一经发现，将封停账号30天。<br>
            6. 充值期间，请勿关闭浏览器，待充值成功并返回首页后，所充资金才能入账，如有疑问，请联系客服。<br>
            7. 充值需开通银行卡网上支付功能，如有疑问请咨询开户行客服。<br>
          </div>
        </div>
      </div>
      <div class="alert-450 alert-h220" id="alert-rechargeFailture" style="display:none;">
        <div class="alert-title">
          <h3>登录网上银行充值</h3>
          <span class="alert-close" onclick="displaySpan('alert-rechargeFailture')"></span></div>
        <div class="alert-main">
          <form id="rechargeFailtureForm">
            <p class="msg1"><i class="no-icon"></i><i class="msgtxt">充值失败</i>您可以：<a href="#"><font color="#28A7E1">选择其他银行充值</font></a>或查看<a href="#"><font color="#28A7E1">充值帮助</font></a></p>
          </form>
        </div>
      </div>
      <div class="clear"></div>
      <div class="alert-400 alert-h220" id="alert-ClickDialog" style="display:none;">
        <div class="alert-title">
          <h3>消息</h3>
        </div>
        <div class="alert-main">
          <p class="msg4"> </p>
          <p class="msg-a"><a class="btn-ok btn-145" onclick="displaySpan('alert-ClickDialog')" href="#">关 闭</a></p>
        </div>
      </div>
      <div class="alert-400 alert-h220" id="alert-unbindMsgDialog" style="display:none;">
        <div class="alert-title">
          <h3>消息</h3>
        </div>
        <div class="alert-main">
          <p class="msg4"> </p>
          <p class="msg-a"><a class="btn-ok btn-145" onclick="displaySpan('alert-unbindMsgDialog')" href="#">关 闭</a></p>
        </div>
      </div>
      <script type="text/javascript">
	        $("#recharge\\:actualMoney").val("单笔大于0元");
	        var value = "单笔大于0元";
	        $("#recharge\\:actualMoney").focus(
					   function(){
						   	$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial","border":"1px solid #0caffe"});
						   if($("#recharge\\:actualMoney").val() == value) { 
							   	$("#recharge\\:actualMoney").val("")
								$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial"});
						   }
						}).blur(
						function(){
						   $(this).css("border","1px solid #D0D0D0");
						   if($("#recharge\\:actualMoney").val() == "") {
							  $("#recharge\\:actualMoney").val("单笔大于0元").css("color", "#D0D0D0");
							   	$(this).css({"color":"#D0D0D0","font-size":"14px","font-weight":"normal"});
					}
				})
			
			$("#form\\:actualMoney1").val("单笔大于0元");
	        $("#form\\:actualMoney1").focus(
					   function(){
						   	$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial","border":"1px solid #0caffe", "height":"38px"});
						   if($("#form\\:actualMoney1").val() == value) { 
							   	$("#form\\:actualMoney1").val("");
								$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial", "height":"38px"});
						   }
						}).blur(
						function(){
						   $(this).css("border","1px solid #D0D0D0");
						   if($("#form\\:actualMoney1").val() == "") {
							  $("#form\\:actualMoney1").val("单笔大于0元").css("color", "#D0D0D0");
							  $(this).css({"color":"#D0D0D0","font-size":"14px","font-weight":"normal", "height":"38px"});
					}
				})
				
			$("#form2\\:actualMoney2").val("单笔大于0元");
	        $("#form2\\:actualMoney2").focus(
					   function(){
						   	$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial","border":"1px solid #0caffe", "height":"38px"});
						   if($("#form2\\:actualMoney2").val() == value) { 
							   	$("#form2\\:actualMoney2").val("")
								$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial", "height":"38px"});
						   }
						}).blur(
						function(){
						   $(this).css("border","1px solid #D0D0D0");
						   if($("#form2\\:actualMoney2").val() == "") {
							  $("#form2\\:actualMoney2").val("单笔大于0元").css("color", "#D0D0D0");
							   	$(this).css({"color":"#D0D0D0","font-size":"14px","font-weight":"normal", "height":"38px"});
					}
				})
				
				function keyUpcheck()
				{
					$(this).css({"font-size":"24px","font-weight":"bold","font-family":"Arial"});
				}

	        $("#form\\:bankCardNo").val("请输入银行卡号");
	        var cardValue = "请输入银行卡号";
	        $("#form\\:bankCardNo").focus(
					   function(){
						   	$(this).css({"font-size":"14px","font-weight":"bold","font-family":"Arial","border":"1px solid #0caffe", "color": "rgb(75, 73, 72)"});
						   if($("#form\\:bankCardNo").val() == cardValue) { 
							   	$("#form\\:bankCardNo").val("")
								$(this).css({"font-size":"14px","font-weight":"bold","font-family":"Arial"});
						   }
						}).blur(
						function(){
						   $(this).css("border","1px solid #D0D0D0");
						   if($("#form\\:bankCardNo").val() == "") {
							  $("#form\\:bankCardNo").val("请输入银行卡号").css("color", "#D0D0D0");
							   	$(this).css({"color":"#D0D0D0","font-size":"14px","font-weight":"normal"});
					}
				})
			</script>
      <div class="alert-450" id="alert-tyht" style="display:none;">
        <div class="alert-title">
          <h3>提示信息</h3>
          <span class="alert-close" onclick="displaySpan('alert-tyht')"></span></div>
        <div class="alert-main" style="margin-bottom: 35px;margin-left: 25px;">
          <p class="msg4"> 你需要阅读并同意《多盈理财金融投资咨询与管理服务电子协议》 </p>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
@include('Home.layouts.foot')