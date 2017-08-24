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
    <title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 投资管理 <span class="c-gray en">&gt;</span> 优选计划 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a class="btn btn-primary radius" href="uadd"><i class="Hui-iconfont">&#xe600;</i> 添加计划</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
        {{--<tr>--}}
        {{--<th scope="col" colspan="6">U计划管理</th>--}}
        {{--</tr>--}}
        <tr class="text-c">
            <th width="60">编号</th>
            <th width="50">年化率</th>
            <th width="50">产品期限</th>
            <th width="50">计划金额</th>
            <th width="50">投资上限</th>
            <th width="50">投资时间</th>
            <th width="50">结束时间</th>
            <th width="50">产品状态</th>
            <th width="70">操作</th>
        </tr>
        </thead>
        <?php foreach($data as $v){?>
        <tbody>
        <tr class="text-c">
            <td><?php echo $v['sn']?></td>
            <td><?php echo $v['rate'].'%'?></td>
            <td><?php echo $v['deadline'].'个月'?></td>
            <td><?php echo $v['productAmount'].'元'?></td>
            <th><?php echo $v['investLimit'].'元'?></th>
            <th><?php echo $v['investTime']?></th>
            <th><?php echo $v['entime']?></th>
            <th><?php if($v['productStatus']==1){
                    echo "已上架";
                }else{
                    echo "未上架";
                }
                ?></th>

            <td class="f-14"><a title="编辑" href="uupdate?id=<?php echo $v['id']?>"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="udel?id=<?php echo $v['id']?>"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
        </tr>
        </tbody>
        <?php
        }
        ?>
    </table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../../Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../../Admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript">

</script>
</body>
</html>