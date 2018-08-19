<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="/favicon.ico">
    <link rel="Shortcut Icon" href="/favicon.ico"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/statics/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/statics/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/statics/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="/statics/static/h-ui.admin/css/H-ui.admin.css"/>
    <link rel="stylesheet" type="text/css" href="/statics/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="/statics/static/h-ui.admin/skin/default/skin.css" id="skin"/>
    <link rel="stylesheet" type="text/css" href="/statics/static/h-ui.admin/css/style.css"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="/statics/lib/DD_belatedPNG_0.0.8a-min.js"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->

    <title>修改比赛数据 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
    <form action="{{ route('matchscore_edit') }}" method="post" class="form form-horizontal" id="form-member-add">
        {{ csrf_field() }}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>编号：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" disabled="disabled" class="input-text" value="{{ $data[0]->id }}" placeholder="" id="id" name="id">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>比赛名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ $data[0]->game_name }}" placeholder="" name="gamename">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>左大比分：</label>
            <div class="formControls col-xs-8 col-sm-9">
                    <input type="text" class="input-text" value="{{ $data[0]->big_left }}" name="bigleft">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>左小比分：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ $data[0]->score_left }}" name="leftscore">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>运动员A：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" disabled="disabled" class="input-text" value="{{ $data[0]->a_user }}" name="usera">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>运动员B：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" disabled="disabled" value="{{ $data[0]->b_user }}" class="input-text" name="userb">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>右小比分：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" value="{{ $data[0]->score_right }}" class="input-text" name="rightscore">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>右大比分：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ $data[0]->big_right }}" name="big_right">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>局数：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" value="{{ $data[0]->class }}" class="input-text" name="inning">
            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/statics/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/statics/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/statics/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/statics/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/statics/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/statics/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/statics/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/statics/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">
    $(function () {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
            rules: {
                gamename: {
                    required: true,
                },
                bigleft: {
                    required: true,
                },
                leftscore: {
                    required: true,
                },
                usera: {
                    required: true,
                },
                userb: {
                    required: true,
                },
                rightscore: {
                    required: true,
                },
                big_right: {
                    required: true,
                },
                inning: {
                    required: true,
                },

            },
            onkeyup: false,
            focusCleanup: true,
            success: "valid",
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "",	//提交给当前地址
                    success: function (data) {
                        //判断返回值code
                        if (data.code == '0') {
                            //成功
                            layer.msg(data.msg, {icon: 1, time: 2000}, function () {
                                var index = parent.layer.getFrameIndex(window.name);
                                parent.location.href = parent.location.href;
                                parent.layer.close(index);
                            });
                        } else {
                            //失败
                            layer.msg(data.msg, {icon: 5, time: 2000});
                        }
                    },
                    error: function () {
                        layer.msg('error!', {icon: 5, time: 2000});
                    }
                });
            }
    });
    });

</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>