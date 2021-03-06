﻿<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/statics/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/statics/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/statics/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/statics/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/statics/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/statics/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/statics/static/h-ui.admin/css/style.css" />
    <!-- 载入webupload.css文件 -->

    <!--[if IE 6]>
    <script type="text/javascript" src="/statics/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->
    <title>添加用户 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>

<body>
<article class="page-container">

    <form action="" method="post" class="form form-horizontal" name="file" id="form-member-add" enctype="multipart/form-data">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">
                <span class="c-red">*</span>姓名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="{{ $data['0']->username }}" placeholder="姓名" id="username" name="username">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>新密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="新密码" id="userpwd" name="userpwd">
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>现在状态：</label>
            @if($data['0']->show == 1)
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="show" type="radio" value="1" id="show" checked>
                    <label for="hand-1">启用</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="show" value="0" name="show">
                    <label for="hand-2">停用</label>
                </div>
            </div>
            @elseif($data['0']->show == 0)
                <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                    <div class="radio-box">
                        <input name="show" type="radio" value="1" id="show" >
                        <label for="hand-1">启用</label>
                    </div>
                    <div class="radio-box">
                        <input type="radio" id="show" value="0" name="show" checked>
                        <label for="hand-2">停用</label>
                    </div>
                </div>
             @endif
        </div>


        {{csrf_field()}}

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <input id="sub" class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
            </div>
        </div>
    </form>

</article>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/statics/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/statics/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/statics/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/statics/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/statics/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/statics/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/statics/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/statics/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!-- 载入webuploader的js文件 -->

<script>

    $(function () {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
//            rules: {
//                username: {
//                    required: true,
//                    minlength: 2,
//                    maxlength: 16
//                },
//                gamename: {
//                    required: true,
//                },
//                inning: {
//                    required: true,
//                },
//                score_up: {
//                    required: true,
//                },
//                score_down: {
//                    required: true,
//                },
//                serve_catch: {
//                    required: true,
//                },
//                plate_num: {
//                    required: true,
//                },
//                means: {
//                    required: true,
//                },
//                goal: {
//                    required: true,
//                },
//
//            },
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

</body>

</html>