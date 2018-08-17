<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
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
    <title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 用户中心 <span
            class="c-gray en">&gt;</span> 用户管理 <a class="btn btn-success radius r"
                                                  style="line-height:1.6em;margin-top:3px"
                                                  href="javascript:location.replace(location.href);" title="刷新"><i
                class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
    <span class="l">

            <a href="javascript:;" onclick="admin_permission_add('添加','{{ route('Sportsman_add') }}','600','600')"; class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i>添加</a>
        		</span>

    <table class="table table-border table-bordered table-hover table-bg table-sort">
        <thead>
        <tr class="text-c">
            <th width="25"><input type="checkbox" name="check" value="1"></th>

            <th width="80">ID</th>
            <th width="100">用户名</th>
            <th width="40">性别</th>
            <th width="80">年龄</th>
            <th width="150">国籍</th>
            <th width="150">左右手</th>
            <th width="80">横直拍</th>
            <th width="80">打法</th>
            <th width="80">图片</th>
            <th width="100">添加时间</th>
            <th width="100">add_admin_id</th>
            <th width="100">编辑</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $val)
            @if($val->del > 0)
            <tr class="text-c">

                <td><input type="checkbox" value="1" name=""></td>
                <td>{{ $val->id }}</td>
                <td>{{ $val->user_name }}</td>
                <td>{{ $val->sex }}</td>
                <td>{{ $val->age }}</td>
                <td>{{ $val->state }}</td>
                <td>{{ $val->hand }}</td>
                <td>{{ $val->bat }}</td>
                <td>{{ $val->play }}</td>
                <td>
                    <img src="{{ $val->image }}" width="50px" height="50px"/>
                </td>
                <td>{{ $val->add_time }}</td>
                <td>{{ $val->add_admin_id }}</td>
                <td>
				<span class="l">
            <a href="javascript:;" onclick="admin_permission_del(this,'{{ $val->id }}')" class="btn btn-danger radius">
                <i class="Hui-iconfont">&#xe6e2;</i> 删除</a>

            <a href="javascript:;"  onclick="admin_permission_add('修改','{{ route('Sportsman_edit') }}?id={{ $val->id }}','1000','600')";  class="btn btn-primary radius">
                <i class="Hui-iconfont">&#xe600;</i> 修改</a>
        		</span>
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/statics/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/statics/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/statics/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/statics/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/statics/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/statics/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/statics/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

    $('.table-sort').dataTable({
        "lengthMenu": false,//显示数量选择
        "bFilter": false,//过滤功能
        "bPaginate": false,//翻页信息
        "bInfo": false,//数量信息
        "aaSorting": [[1, "desc"]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable": false, "aTargets": [0, 8, 9]}// 制定列不参与排序
        ]
    });

    function admin_permission_del(obj, id) {
        layer.confirm('确认要删除吗？', function (index) {
            $.ajax({
                type: 'POST',
                url: '',
                data:{
                    id:id,
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!', {icon: 1, time: 1000});
                },
                error: function (data) {
                    console.log(data.msg);
                },
            });
        });
    };

    function admin_permission_add(title, url, w, h) {
        layer_show(title, url, w, h);
    };

    function admin_permission_edit(title, url, w, h) {
        layer_show(title, url, w, h);
    };
</script>
</body>
</html>
