<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="../../Admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="../../Admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="../../Admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="../../Admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="../../Admin/static/h-ui.admin/css/style.css" />
    <link href="../../Admin/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="page-container">
    <form action="duadd" method="post" class="form form-horizontal" >
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="types" class="select">
                    <option value="1">U计划</option>
                    <option value="2">优选计划</option>
                    <option value="3">薪计划</option>
                </select>
				</span> </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">产品名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="pname" id="" placeholder="" value="" class="input-text" style="width:90%">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">年化率：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="rate" id="" placeholder="" value="" class="input-text" style="width:90%">%
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">产品期限：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="cpqx" id="" placeholder="" value="" class="input-text" style="width:90%">月
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">计划金额：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="jhje" id="" placeholder="" value="" class="input-text" style="width:90%">元
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">投资上限：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="tzsx" id="" placeholder="" value="" class="input-text" style="width:90%">元
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">投资时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="start_time" onfocus="WdatePicker({ date:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:180px;">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">结束时间：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="end_time" onfocus="WdatePicker({ date:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:180px;">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">还款方式：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" name="hkfs" id="" placeholder="" value="" class="input-text" style="width:90%">
                </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                {{--<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>--}}
                <input type="submit" value="保存并提交审核" class="btn btn-primary radius">
            </div>
        </div>
    </form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="../../Admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../Admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="../../Admin/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="../../Admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="../../Admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="../../Admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="../../Admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="../../Admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="../../Admin/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="../../Admin/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="../../Admin/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="../../Admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

</body>
</html>