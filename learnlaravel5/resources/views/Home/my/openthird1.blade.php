@include('Home.layouts.myhead')
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="../Home/images/clist1.jpg" width="1200" height="96"></div>
    @include('Home.layouts.myleft')
    <input id="investorValiCodeError" type="hidden" name="investorValiCodeError">
    <div class="personal-main">
      <div class="personal-pay">
        <h3><i>开通第三方账户</i></h3>
          <div class="pay-notice">
            <p>开通第三方资金托管账户的信息将提交至<a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>网站执行，</p>
            <p><a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>系统将为您分配唯一用户ID（格式为：DY_用户名），并与您亿人宝账户自动绑定，您无需修改和记忆。 </p>
          </div>
          <div class="pay-form">
            <h6>请输入您的身份证信息</h6>
            <ul>
              <li>
                <label for="realname">真实姓名</label>
                <input type="text" id="realname"  class="pay-txt" maxlength="16"  placeholder="您的真实姓名">
                <div id="realnameErrorDiv"></div>
              </li>
              <li>
                <label for="idCard">身份证号</label>
                <input type="text" id="idcard" class="pay-txt" maxlength="18" placeholder="您的身份证号">
                <div id="id_card">
                  <p style="margin-top:10px;"></p>
                </div>
              </li>
              <li>
                <label for="idCard">支付密码</label>
                <input type="password" id="paypwd" class="pay-txt" maxlength="6" placeholder="您的6位支付密码">
                <div id="passwd"></div>
              </li>              
            </ul>
            <!-- <h6>邮箱已绑定</h6> -->
            <ul>
              <li>
                <label for="email">邮箱</label>
                <label id="form:email">{{$data->email}}</label>
              </li>
            </ul>
            <!-- <h6>手机号已绑定</h6> -->
            <ul>
              <li>
                <label for="phone">手机号</label>
                <input type="hidden" name="" value="15055100139">
                <label>{{$data->telephone}}</label>
              </li>
              <li>
                <label for="card_num">银行卡号</label>
                <input type="text" id="card_num"  class="pay-txt" maxlength="19"  placeholder="您的16-19位银行卡号">
                <div id="cardnum"></div>
              </li>              
            </ul>
          </div>
              <div class="pay-bank" id="pay-bank">
                <h6>请选择银行</h6>
                <span id="showpay" style="display:none;">icbc</span>
                <ul id="paysSpan" style="height:150px;">
                  <!-- <li><img src="../Uploads/bank/ABC.png"><em></em><i></i></li> -->
                  @foreach($banks as $v)
                  <li class="imgs" attr-id="{{$v->bank_id}}" id="{{$v->bank_id}}"><img src="../{{$v->bank_logo}}"><em></em><span id="i" style="display:none;"><i></i></span></li>
                  @endforeach
                </ul>
                <span class="pay-other"><span class="paytxt">选择其他银行卡</span><i class="paydown"></i></span> </div> 

                  <input name="recharge:j_idt96" value="开户" class="btn-paycz" onclick="return getShowPayVal()" type="submit">    
      <div class="alert-450" id="alert-activeEmail" style="display:none;" >
        <div class="alert-title">
          <h3></h3>
        </div>
        <div class="alert-main">
          <form id="activeEmail" name="activeEmail" method="post" action="/user/depositAuthenticationAccount" enctype="application/x-www-form-urlencoded" target="_blank">
            <input type="hidden" name="activeEmail" value="activeEmail">
            <ul>
              <li>
                <label class="txt-name"></label>
                <div id="activeEmailemailErrorDiv" class="alert-error120"></div>
              </li>
              <input type="button" name="activeEmail:j_idt108" value="开户成功" class="btn-ok txt-right" id="ok">
            </ul>
            <input type="hidden" name="javax.faces.ViewState" id="javax.faces.ViewState" value="3539659789631542353:-7321825572772818867" autocomplete="off">
          </form>
        </div>
      </div> 
<script type="text/javascript">
//真实姓名
$(document).on("blur","#realname",function(){
      var realname=$(this).val()
      var reg = /^[\u4E00-\u9FA5A-Za-z]+$/;
      var flag=reg.test(realname)
      if(realname==""){
        $("#realnameErrorDiv").html('<span style="color: red">真实姓名不能为空</span>')
      }else if(flag){
        $("#realnameErrorDiv").html('<span style="color: green">通过验证</span>')
      }else{
        $("#realnameErrorDiv").html('<span style="color: red">姓名格式不合法</span>')
      }
})
//身份证号
$(document).on("blur","#idcard",function(){
    var idcard=$(this).val()
    var reg = /^(\d{15}$|^\d{18}$|^\d{17}(\d|X|x))$/;
    var flag = reg.test(idcard); //true
    if(idcard==""){
      $("#id_card").html('<span style="color: red">身份证号不能为空</span>')
    }else{
      $("#id_card").html('<span style="color: green">通过验证</span>')
    }
    // }else if(flag){
    //   $.ajax({
    //     url:"idcard",
    //     data:{idcard:idcard},
    //     dataType:"json",
    //     type:"GET",
    //     success:function(msg){
    //       if(msg==0){
    //         $("#id_card").html('<span style="color: red">身份证不存在</span>')
    //       }
    //       if(msg==1){
    //         $("#id_card").html('<span style="color: green">通过验证</span>')
    //       }
    //       if(msg==2){
    //         $("#id_card").html('<span style="color: red">已被认证</span>')
    //       }
    //     }
    //   })
    // }else{
    //   $("#id_card").html('<span style="color: red">身份证格式错误</span>')
    // }
})
//支付密码
$(document).on("blur","#paypwd",function(){
    var paypwd=$(this).val()
    var reg = /^[0-9]{6}$/;
    var flag=reg.test(paypwd)
    if(paypwd==""){
      $("#passwd").html('<span style="color: red">支付密码不能为空</span>')
    }else if(flag){
      $("#passwd").html('<span style="color: green">通过验证</span>')
    }else{
      $("#passwd").html('<span style="color: red">输入密码不正确</span>')
    }
})
//银行卡号
$(document).on("blur","#card_num",function(){
    var card_num=$(this).val()
    var reg = /^[0-9]{16,19}$/;
    var flag=reg.test(card_num)
    if(card_num==""){
      $("#cardnum").html('<span style="color: red">银行卡号不能为空</span>')
    }else if(flag){
      $("#cardnum").html('<span style="color: green">通过验证</span>')
    }else{
      $("#cardnum").html('<span style="color: red">请输入21位银行卡号</span>')
    }
})  
$('#ok').click(function(){
    $('#alert-activeEmail').hide();
    referrer_url=document.referrer;
    location.href=referrer_url;
})
//给银行ID 设置一个全局变量
    id='';
$(document).on('click','#paysSpan li',function(){
    id = $(this).attr('attr-id');
    $(this).children('#i').show();
    $(this).siblings().children('#i').hide();
 })
$('.btn-paycz').click(function(){
  	var realname=$('#realname').val();
  	var idcard=$('#idcard').val();
    var paypwd=$('#paypwd').val();
  	var card_num=$('#card_num').val();
    var bank_id=id;
    if(realname=='' || idcard=='' || paypwd=='' || card_num==''){
        return false;
    }
    $.ajax({
    	type:'post',
    	url:'openthird',
    	dataType:'json',
    	data:{realname:realname,idcard:idcard,paypwd:paypwd,card_num:card_num,bank_id:bank_id},
    	success:function(data){
    		if(data==1){
    			$('#alert-activeEmail').show();
    		}
    	}
    })     	
})
</script>
        <div class="pay-tipcon"> 1、为切实保障投资人的利益，亿人宝将理财资金托管在<a href="http://www.htmlsucai.com" target="_blank">丰付第三方支付</a>平台。平台是2012年6月获批中国人民银行支付许可证和中国证监会基金支付许可的第三方支付公司，在金融支付领域业界领先地位。详情请登录<a href="http://www.htmlsucai.com" target="_blank">丰付支付</a>官方网站查看。<br>
          2、根据相关法律规定，亿人宝在开通资金托管账户时，需要验证您的身份信息。该信息一经设置，无法修改，请慎重选择。为了确保您可以顺利提现，请确认您拥有一张使用该身份证开户的有效储蓄卡。<br>
          3、亿人宝将最大限度的尊重和保护您的个人隐私，详情请阅读<a href="#" target="_blank">《亿人宝隐私条款》</a>。<br>
          4、您在开通第三方账号过程中，如有遇到问题，可以查看理财帮助，也可以联系我们的客服进行咨询，咨询电话：400-999-8850。 </div>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
@include('Home.layouts.foot')