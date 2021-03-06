<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
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
    <!--[if IE 6]>
    <script type="text/javascript" src="/statics/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

    <div class="cl pd-5 bg-1 bk-gray mt-20"> <a href="javascript:;" onclick="admin_add('添加管理员','{{ route('Manager_add') }}','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></div>
    <table class="table table-border table-bordered table-sm">
        <thead>
        <tr>
            <th scope="col" colspan="9">管理员列表</th>
        </tr>
        <tr class="text-c">
            <th width="100"><input type="checkbox" name="" value=""></th>
            <th width="100">ID</th>
            <th width="100">登录名</th>
            <th width="100">密码</th>
            <th width="100">修改时间</th>
            <th width="100">状态</th>
            <th width="100">操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $val)
            <tr class="text-c">
                <td><input type="checkbox" value="1" name=""></td>
                <td>{{ $val -> id }}</td>
                <td>{{ $val -> username }}</td>
                <td>{{ $val -> userpwd }}</td>
                <td>{{  date('Y-m-d H:i:s',$val -> add_time) }}</td>

                <td class="td-status">
                    @if($val -> show == '1')
                        <span class="label label-success radius">已启用</span>
                    @else
                        <span class="label  radius">已停用</span>
                    @endif
                </td>
                <td class="td-manage">
                    @if($val -> show == '0')
                        <a style="text-decoration:none"

                           onClick="admin_start(this,'{{ $val -> id }}','{{ $val -> show }}')" href="javascript:;" title="停用">
                            <i class="Hui-iconfont">&#xe615;</i></a>
'
                        <a title="编辑" href="javascript:;"
                            onclick="admin_edit('管理员编辑','{{ route('Manager_edit') }}?id={{ $val -> id }}','800','500')"
                         class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>

                        <a title="删除" href="javascript:;" onclick="admin_del(this,' {{ $val -> id }} ')"
                           class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    @else

                        <a style="text-decoration:none" onClick="admin_stop(this,'{{ $val -> id }}','{{ $val -> show }}')"
                         href="javascript:;" title="启用">
                         <i class="Hui-iconfont">&#xe631;</i></a>

                        <a title="编辑"
                        href="javascript:;" onclick="admin_edit('管理员编辑','{{ route('Manager_edit') }}?id={{ $val -> id }}','800','500')"
                         class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>

                        <a title="删除" href="javascript:;" onclick="admin_del(this,'{{ $val -> id }}')" class="ml-5"
                           style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/statics/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/statics/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/statics/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/statics/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/statics/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/statics/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/statics/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    /*
        参数解释：
        title	标题
        url		请求的url
        id		需要操作的数据id
        w		弹出层宽度（缺省调默认值）
        h		弹出层高度（缺省调默认值）
    */
    /*管理员-增加*/
    function admin_add(title,url,w,h){
        layer_show(title,url,w,h);
    }

    /*管理员-删除*/
    function admin_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: '',
                data:{
                    id:id
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});
                },
                error:function(data) {
                    console.log(data.msg);
                }
            });
        });
    }

    /*管理员-编辑*/
    function admin_edit(title,url,id,w,h){
        layer_show(title,url,w,h);
    }


    /*管理员-停用*/
    function admin_stop(obj,id,show){
        layer.confirm('确认要停用吗？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('Manager_show')  }}',
                        data:{
                            id:id,
                            show:show
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function(data){
                            $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,\'{{ $val -> id }}\',\'{{ $val -> show }}\')" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                            $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
                            $(obj).remove();
                            layer.msg('已停用!',{icon: 5,time:1000});
                        },
                        error:function(data) {
                            console.log(data.msg);
                        }
                    });
                });
    }

    /*管理员-启用*/
    function admin_start(obj,id,show){
        layer.confirm('确认要启用吗？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……
                    $.ajax({
                        type: 'POST',
                        url: '{{ route('Manager_show')  }}',
                        data:{
                            id:id,
                            show:show,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        dataType: 'json',
                        success: function(data){
                            $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,\'{{ $val -> id }}\',\'{{ $val -> show }}\')" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                            $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
                            $(obj).remove();
                            layer.msg('已启用!', {icon: 6,time:1000});
                        },
                        error:function(data) {
                            console.log(data.msg);
                        },
                    });
                });
            }

    //jQuery页面载入事件
    $(function () {
        //dt初始化
        $('table').DataTable({
            "columnDefs" : [{"orderable" : false, 'targets' : 0}, ], //禁止第一列排序
            "order" : [[1, 'desc']] //指定第二列，默认为降序排序
        });
    })
</script>
</body>
</html>