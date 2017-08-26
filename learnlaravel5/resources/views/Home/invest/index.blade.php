@include('Home.layouts.investhead')
<!--列表-->
<div class="page-filter wrap">
  <div class="breadcrumbs"><a href="index.html">首页</a>&gt;<span class="cur">散标投资列表</span></div>
  <div class="invest-filter" data-target="sideMenu">
    <div class="filter-inner clearfix">
      <div class="filter-item">
        <div class="hd">
          <h3>筛选投资项目</h3>
          <label>
          <input id="filterMulti" name="multiple_choice" type="checkbox">
          多选</label>
        </div>
        <div class="bd">
          <dl>
            <dt>项目类型</dt>
            <dd>
              <ul>
                <li class="n1"><a href="http://www.duoying.com/invest/index" id="post_type_" class="active">不限</a></li>
                <?php foreach($data as $k=>$v) { ?>
                <li class="n2"><a href="?typeid=<?php echo $v->id?>" id="post_type_car" class="lx" attr-id="<?php echo $v->id?>"><?php echo $v->typeName?></a></li>
                <?php } ?>
              </ul>
            </dd>
          </dl>
          <dl>
            <script>
              $('.lx').click(function(){
                    var id = $(this).attr('attr-id');
                $.ajax({
                       type:"POST",
                       url:"typeShow",
                       data:{id:id},
                       success:function(data){
                         var str="";
                         $.each(data,function(k,v){
                           str+="<div class='item'>";
                           str+="<ul>";
                          if(v.productTypeId==1){
                            str+="<li class='col-330 col-t'><a href='infor?id="+v.id+"' target='_blank'></a><a class='f18' href='' title='"+ v.productName+"' target='_blank'>"+ v.productName+"</a></li>";
                          }else if(v.productTypeId==2){
                            str+="<li class='col-330 col-t'><a href='infor?id="+v.id+"' target='_blank'></a><a class='f18' href='' title='"+ v.productName+"' target='_blank'>"+ v.productName+"</a></li>";
                          }else{
                            str+="<li class='col-330 col-t'><a href='infor?id="+v.id+"' target='_blank'></a><a class='f18' href='' title='"+ v.productName+"' target='_blank'>"+ v.productName+"</a></li>"
                          }
                           // str+="<li class='col-330 col-t'><a href='infor?id="+v.id+"' target='_blank'></a><a class='f18' href='../invest/infor' title='"+ v.productName+"' target='_blank'>"+ v.productName+"</a></li>";
                           str+="<li class='col-180'><span class='f20 c-333'>"+ v.productAmount+"</span>元</li>";
                           str+="<li class='col-110 relative'><span class='f20 c-orange'>"+ v.rate+"</span></li>";
                           str+="<li class='col-150'> <span class='f20 c-333'>"+ v.deadline+"</span>个月 </li>";
                           str+="<li class='col-150'>"+ v.repaymentmethods+"</li>";
                           str+="<li class='col-120'>";
                           str+="</li>";
                               if(v.contact == 1){
                                  if(v.productTypeId==1){
                                    str+="<li class='col-120-2'> <a class='ui-btn btn-gray' href='infor.html'>还款中</a> </li>";
                                  }else if(v.productTypeId==2){
                                    str+="<li class='col-120-2'> <a class='ui-btn btn-gray' href='../uxplan/infor.html'>还款中</a> </li>";
                                  }else{
                                    str+="<li class='col-120-2'> <a class='ui-btn btn-gray' href='../salary/infor.html'>还款中</a> </li>";
                                  }
                                       // str+="<li class='col-120-2'> <a class='ui-btn btn-gray' href='infor.html'>还款中</a> </li>";
                                }else{
                                  if(v.productTypeId==1){
                                    str+="<li class='col-120-2'> <a class='ui-btn btn-gray' style='background-color: green' href='infor?id="+v.id+"'>加入</a> </li>";
                                  }else if(v.productTypeId==2){
                                    str+="<li class='col-120-2'> <a class='ui-btn btn-gray' style='background-color: green' href='../uxplan/infor?id="+v.id+"'>加入</a> </li>";
                                  }else{
                                    str+="<li class='col-120-2'> <a class='ui-btn btn-gray' style='background-color: green' href='../salary/infor?id="+v.id+"'>加入</a> </li>";
                                  }                                  
                                       // str+="<li class='col-120-2'> <a class='ui-btn btn-gray' style='background-color: green' href='infor?id="+v.id+"'>加入</a> </li>";
                                }
                         str+="</ul>";
                         str+="</div>";
                         })
                         $('#div').html(str);

                       }
                })
              })
            </script>
        </div>
      </div>
      <div class="common-problem">
        <h3>常见问题</h3>
        <ul>
          <li><a href="#">什么是债权贷？</a></li>
          <li><a href="#">关于"债权贷"产品的说明</a></li>
          <li><a href="#">易贷网P2P理财收费标准</a></li>
          <li><a href="#">债权贷和房易贷、车易贷有什么区别？</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="invest-list mrt30 clearfix">
    <div class="hd">
      <h3>投资列表</h3>
      <div class="count">
        <ul>
          <li class="line">散标投资交易金额&nbsp;&nbsp;<span class="f20 bold">73.54亿元</span></li>
          <li>累计赚取收益&nbsp;&nbsp;<span class="f20 bold">2.52亿元</span></li>
        </ul>
      </div>
    </div>
    <div class="bd">
      <div class="invest-table clearfix">
        <div class="title clearfix">
          <ul>
            <li class="col-330">借款标题</li>
            <li class="col-180"><a href="javascript:url('order','account_up');" class="">借款金额</a> </li>
            <li class="col-110"><a href="javascript:url('order','apr_up');" class="">年利率</a> </li>
            <li class="col-150"><a href="javascript:url('order','period_up');" class="">借款期限</a> </li>
            <li class="col-150">还款方式</li>
            <li class="col-120"><a href="javascript:url('order','scale_up');" class=""></a></li>
            <li class="col-120-t">操作</li>
          </ul>
        </div>
        <!------------投资列表-------------->
        <div id="div">
        <?php foreach($info['data'] as $k=>$v) { ?>
        <div class="item">
          <ul>
            <li class="col-330 col-t">
            <a href="infor?id=<?php echo $v->id?>" target="_blank"></a>
              <?php  if($v->productTypeId==1){ ?>
                 <a class="f18" href="infor?id=<?php echo $v->id?>" title="<?php echo $v->productName ?>" target="_blank"><?php echo $v->productName ?> </a>
             <?php  }else if($v->productTypeId==2){ ?>
                 <a class="f18" href="../uxplan/infor?id=<?php echo $v->id?>" title="<?php echo $v->productName ?>" target="_blank"><?php echo $v->productName ?> </a>
              <?php  }else{ ?>
                 <a class="f18" href="../salary/infor?id=<?php echo $v->id?>" title="<?php echo $v->productName ?>" target="_blank"><?php echo $v->productName ?> </a>
             <?php  } ?>           
            </li>
            <li class="col-180"><span class="f20 c-333"><?php echo $v->productAmount?></span>元</li>
            <li class="col-110 relative"><span class="f20 c-orange"><?php echo $v->rate?></span></li>
            <li class="col-150"> <span class="f20 c-333"><?php echo $v->deadline?></span>个月 </li>
            <li class="col-150"><?php echo $v->repaymentmethods?></li>
            <li class="col-120">
            </li>
            <?php if($v->contact == 1) { ?>
              <?php  if($v->productTypeId==1){ ?>
                  <li class="col-120-2"> <a class="ui-btn btn-gray" href="infor.html">还款中</a> </li>              
             <?php  }else if($v->productTypeId==2){ ?>
                 <li class="col-120-2"> <a class="ui-btn btn-gray" href="../uxplan/infor.html">还款中</a> </li>             
              <?php  }else{ ?>
                 <li class="col-120-2"> <a class="ui-btn btn-gray" href="../salary/infor.html">还款中</a> </li>
              <?php  } ?>             
            <?php }else{ ?>
              <?php  if($v->productTypeId==1){ ?>
                   <li class="col-120-2"> <a class="ui-btn btn-gray" style="background-color: green" href="infor?id=<?php echo $v->id?>">加入</a> </li>             
             <?php  }else if($v->productTypeId==2){ ?>
                    <li class="col-120-2"> <a class="ui-btn btn-gray" style="background-color: green" href="../uxplan/infor?id=<?php echo $v->id?>">加入</a> </li>          
              <?php  }else{ ?>
                    <li class="col-120-2"> <a class="ui-btn btn-gray" style="background-color: green" href="../salary/infor?id=<?php echo $v->id?>">加入</a> </li>
              <?php  } ?>               
            <?php } ?>
          </ul>
        </div>
       <?php } ?>
        </div>
        <!------------投资列表-------------->
      </div>
      <div>
        <a href="?page=1&typeid=<?php echo $typeid?>">首页</a>
        <a href="<?php echo $info['prev_page_url']?>">上一页</a>
        <a href="<?php echo $info['next_page_url']?>">下一页</a>
        <a href="?page=<?php echo $info['last_page']?>&typeid=<?php echo $typeid?>">末页</a>
        共<?php echo $info['last_page']?>页

        当前为：第<?php echo $info['current_page']?>页

      </div>

      
    </div>
  </div>
</div>
@include('Home.layouts.foot')