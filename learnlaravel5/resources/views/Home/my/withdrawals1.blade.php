@include('Home.layouts.myhead')
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="../Home/images/clist1.jpg" width="1200" height="96"></div>
    @include('Home.layouts.myleft')
    <label id="typeValue" style="display:none;"> </label>
    <div class="personal-main">
      <div class="personal-deposit">
        <h3><i>提现</i></h3>
        <!-- <form id="form" name="form" method="post" action="withdrawals" enctype="application/x-www-form-urlencoded" target="_blank"> -->
        <div class="fl quick-info">
          <input type="hidden" name="form" value="form">
          <div class="deposit-form" style="margin-top:0px;border-top:0px none;">
            <h6>填写提现金额</h6>
            <ul>
              <li> <span class="deposit-formleft">可用金额</span> <span class="deposit-formright"> <i>
                <label id="form:blance" class="money"><?= $res['money']?>.00</label>
                </i>元 </span> </li>
              <li> <span class="deposit-formleft">提现金额</span> <span class="deposit-formright">
                <input id="form:actualMoney" type="text" name="form:actualMoney" class="deposite-txt" maxlength="10">
                元 </span> <span id="actualMoneyErrorDiv">
                <span id='cc'  style="display:none"  class="error"> <font style="color:#FF7D65">余额不足</font></span>
				<span id='dd'  style="display:none"  class="error"> <font style="color:#FF7D65">请选择提现金额</font></span>	
                </span> </li>
              <li> <span class="deposit-formleft">提现费用</span> <em id="txfy" class="markicon fl"></em> <span class="deposit-formright deposit-formright1"> <i>
                <label id="form:fee" class="tx"> 0.00</label>
                </i>元 </span> <span class="txarrow-show">2万以下，每笔收1元；2万-5万，每笔收3元；5万-100万，每笔收5元<!-- 提现金额的0.1%，最低不低于2元，最高100元封顶 --></span><span class="txicon-show"></span> </li>
              <li><span class="deposit-formleft">实际到账金额</span> <em id="dzje" class="markicon fl"></em> <span class="deposit-formright deposit-formright1"> <i>
                <label id="form:cashFine" class="shi"> 0.00</label>
                </i> 元</span> <span class="dzarrow-show">提现金额 - 提现费用</span><span class="dzicon-show"></span> 
                </li>              
                <li><span class="deposit-formleft">支付密码</span> <em id="dzje" class="markicon fl"></em> <span class="deposit-formright deposit-formright1"> <i>
                <label id="form:cashFine" class="paypwd"> <input id="paypwd" type="password" name="form:actualMoney" class="deposite-txt" maxlength="6"></label>
                </i> </span><span id='aa'  style="display:none"  class="error"> <font style="color:#FF7D65">请输入6位数字支付密码</font></span> 
                </li>
              <li>
              <input type="hidden" name="thirds_id" id="thirds_id" value="">
              <input type="hidden" name="huser_id" id="huser_id" value="">
                <input type="button" name="form:j_idt78" value="提现" class="btn-depositok" onclick="return checkActualMoney()">
              </li>
            </ul>
          </div>
          </div>
              <div class="fr bank-info">
                <p class="bank-tit">快捷支付支持银行：</p>
                <div class="bank-pic">
	            	<ul id="paysSpan" style="height:150px;">
	            		<?php foreach($userbankcard as $v){ ?>
	            		<div class="pay-bank">
	            		 <li class="imgs" attr-id="<?= $v['id']?>" card_num="<?= $v['card_num']?>" user_id="<?= $v['user_id']?>">
	            		 <img class="a"  src="../<?= $v['bank_logo']?>" style="border:1px solid #ccc;">
	            		 <em></em>
	            		 <!-- <span class="i" style="display:block;"><i></i></span> -->
	            		 </li>
	            		 </div>
	              		<?php } ?>
	            	</ul>
                </div>
              </div>           
        <!-- </form> -->
        <div class="deposit-tip"> 温馨提示：<br>
          1、用户需在完成身份认证、开通丰付托管账户并绑定银行卡后，方可申请提现；<br>
          2、请务必在提现时使用持卡人与身份认证一致的银行卡号，且确保填写信息准确无误；<br>
          3、工作日当天16:00前提交的提现申请将在当天处理，默认为T+1到账；<br>
          4、提现金额单笔上限为50万元，单日累计总额不可超过100万元；<br>
          5、提现手续费为提现金额的0.1%，最低每笔2元，100元封顶，手续费由第三方托管账户收取，用户自行承担。<br>
        </div>
      </div>
    </div>
  <script type="text/javascript">
  $(document).on('blur','#paypwd',function(){
  	var paypwd=$('#paypwd').val();
  	var reg = /^[0-9]{6}$/;
 	    var flag=reg.test(paypwd)
  	if(paypwd==''){
  		$('#aa').show()
  	}else if(flag){
  		$('#aa').hide()    		
  	}else{
  		$('#aa').show()
  	}
  })
  $(document).on('click','#paysSpan li',function(){
      $(this).children('img').css({"border":"1px solid red"});
       $(this).parent().siblings().children().children('img').css({"border":"1px solid #ccc"}); 
 	})    
	$(document).on('click','.imgs',function(){
		// //第三方id
	    id = $(this).attr('attr-id');
	    $('#thirds_id').val(id);
	    //银行卡号
	    card_num = $(this).attr('card_num');
	    //提现金额
	    rech_money=$('.pay-money-txt').val();
	    $('#hrech_money').val(rech_money);
	    rech_money1=$('#hrech_money').val();
	    //用户id
	    user_id=$(this).attr('user_id');
	    $('#huser_id').val(user_id);
	    huser_id=$('#huser_id').val();
	    $('#card_num').val(card_num);
	    $("#card_num").attr("disabled","disabled");
	})  	
    $(document).on('blur','.deposite-txt',function(){
    	var rech_money=$('.deposite-txt').val();
    	var money=$('.money').text();
    	if(rech_money==''){
    		$('#dd').show();
    	}else{
    		$('#dd').hide();   	
    	}
    	if(parseInt(money) <= parseInt(rech_money)){
    		$('#cc').show();
    		return false;
    	}else{
    		$('#cc').hide();
    	}
    	if(rech_money > 0 && rech_money < 20000){
    		$('.tx').html('1.00');    		 
    		var shi=rech_money-1
    		$('.shi').html(shi+'.00');
    	}else if(rech_money > 20000 && rech_money < 50000 ){
    		$('.tx').html('3.00'); 
    		var shi=rech_money-3
    		$('.shi').html(shi+'.00');    		  
    	}else if(rech_money > 50000 && rech_money < 1000000 ){
    		$('.tx').html('5.00');
    		var shi=rech_money-5
    		$('.shi').html(shi+'.00');    		 
    	}    	
    })
    $(document).on('click','.btn-depositok',function(){
    	var rech_money=$('.deposite-txt').val();
    	var paypwd=$('#paypwd').val();
    	var shi=$('.shi').text();
    	var thirds_id=$('#thirds_id').val();
    	var user_id=$('#huser_id').val();
    	if(rech_money=='' || paypwd==''){
    		return false;
    	}
    	if(thirds_id==''){
    		alert("请选择银行卡");
    		return false;
    	}
    	if(window.confirm("你确定要充值吗？")){
	    	$.ajax({
	    		type:'post',
	    		url:'withdrawals',
	    		data:{rech_money:rech_money,shi:shi,thirds_id:thirds_id,user_id:user_id,paypwd:paypwd},
	    		success:function(data){
	    			// alert(data)
	    			if(data==1){
	    				alert('提现成功')
	    				location.href='';
	    			}else if(data==2){
	    				alert('密码有误,提现失败')
	    				// location.href='';
	    			}else{
	    				alert('余额不足')
	    				location.href='';
	    			}
	    		}
	    	})
    	}else{
    		return false;
    	}
    })
</script>
    <div class="clear"></div>
  </div>
</div>
@include('Home.layouts.foot')