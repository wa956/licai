@include('Home.layouts.myhead')
<!--个人中心-->
<div class="wrapper wbgcolor">
  <div class="w1200 personal">
    <div class="credit-ad"><img src="../Home/images/clist1.jpg" width="1200" height="96"></div>
    @include('Home.layouts.myleft')
    <style type="text/css">
		.invest-tab .on  a{color:#fff;}
	</style>
    <div class="personal-main">
      <div class="personal-investnote">
        <h3><i>投资记录</i></h3>
        <div class="investnote-money"> <span><b class="fb">累计投资</b><br>
          <i>0.00</i> 元 </span> <span><b class="fb">累计收益</b><br>
          <i class="c-pink">0.00</i> 元 </span> <span><b class="fb">待收本金</b><br>
          <i>0.00</i> 元 </span> <span class="none"><b class="fb">待收收益</b><br>
          <i>0.00</i> 元 </span> </div>
        <form id="form" name="form" method="post" action="">
          <script type="text/javascript">clearPage = function() {PrimeFaces.ab({source:'form:j_idt82',formId:'form',process:'form:j_idt82',params:arguments[0]});}</script>
          <span id="form:dataTable">
          <div class="invest-tab">
            <ul>
              <li class="on"><span><a href="#" title="投标中">投标中 </a> </span> </li>
              <li><a href="#" title="回款中">回款中 </a> </li>
              <li><a href="#" title="已结束">已结束 </a> </li>
            </ul>
          </div>
          <div class="investnote-list">
            <div class="investnote-contitle"> <span class="investnote-w1 fb">交易时间</span> <span class="investnote-w2 fb">项目</span> <span class="investnote-w3 fb">状态</span> <span class="investnote-hbw4 fb">我的投资</span> <span class="investnote-hbw5 fb">我的收益</span> <span class="investnote-hbw6 fb">操作</span> </div>
            <ul>
              <li><span class="investnote-w1">2015-10-1</span><span class="investnote-w2">债权转让</span><span class="investnote-w3">已还款</span><span class="investnote-hbw4">12000.00</span> <span class="investnote-hbw5">12000.00</span> <span class="investnote-hbw6"><a href="#">删除</a></span></li>
              <li><span class="investnote-w1">2015-10-1</span><span class="investnote-w2">债权转让</span><span class="investnote-w3">已还款</span><span class="investnote-hbw4">12000.00</span> <span class="investnote-hbw5">12000.00</span> <span class="investnote-hbw6"><a href="#">删除</a></span></li>
              <li><span class="investnote-w1">2015-10-1</span><span class="investnote-w2">债权转让</span><span class="investnote-w3">已还款</span><span class="investnote-hbw4">12000.00</span> <span class="investnote-hbw5">12000.00</span> <span class="investnote-hbw6"><a href="#">删除</a></span></li>
              <li><span class="investnote-w1">2015-10-1</span><span class="investnote-w2">债权转让</span><span class="investnote-w3">已还款</span><span class="investnote-hbw4">12000.00</span> <span class="investnote-hbw5">12000.00</span> <span class="investnote-hbw6"><a href="#">删除</a></span></li>
              <!--<div style=" width:760px;height:200px;padding-top:100px; text-align:center;color:#d4d4d4; font-size:16px;">
								 <img src="images/nondata.png" width="60" height="60"><br><br>
								   暂无投资记录</div>-->
            </ul>
          </div>
          </span>
        </form>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</div>
@include('Home.layouts.foot')