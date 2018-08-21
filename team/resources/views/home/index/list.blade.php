<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <!-- 引入Layui样式 -->
    <link rel="stylesheet" href="/statics/css/layui.css" media="all">
    <link rel="stylesheet" href="/statics/css/index.css">
</head>

<body>
<!-- 导航模块 开始 -->
<div class="layui-container nav_main">
    <div class="layui-row">
        <div class="layui-col-xs8">
            <div class="layui-col-xs6">
                <a href="/">
                    <img src="/statics/picture/logo_bjtydx.png" alt="">
                </a>
            </div>
            <div class="layui-col-xs6">
                <a href="/">
                    <img src="/statics/picture/ittf_logo.png" alt="">
                </a>
            </div>
        </div>
        <!--<div class="layui-col-xs4 nav_lag">
            <div class="layui-inline">
                <div class="layui-input-inline">
                    <select name="lang">
                        <option value="中文">中文</option>
                         <option value="EN">EN</option>
                    </select>
                </div>
            </div>
        </div>-->
    </div>
</div>
<!-- 导航模块结束 -->
<!-- 列表页欢迎头 开始 -->
<!-- 列表页面主体 开始 -->
<div class="layui-fluid lisg_bg">
    <div class="layui-container list_main_conter">
        <fieldset class="layui-elem-field layui-field-title">
            <legend>整场比赛详情</legend>
        </fieldset>
        <div class="layui-container list_main_conter_in">
            <div class="match_all layui-row">
                <div class="layui-col-xs3 img_man">
                    <h3 class="name_name" style="color:black;">{{ $username[0]->a_user }}</h3>
                    <img src="{{ $username[0]->a_pic }}" alt="" class="img_in">
                    <!-- echarts -->
                    <div class="echars_in">
                        <div id="user_a_s" style="width: 250px;height:160px;"></div>
                    </div>
                    <div class="echars_in">
                        <div id="user_a_d" style="width: 250px;height:160px;"></div>
                    </div>
                </div>
                <div class="layui-col-xs6 chars_table_center">
                    <!--  ECharts -->
                    <div id="main" class="chars_table">
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th style="font-size: 20px;text-align: center">失分</th>
                                <th style="font-size: 20px;text-align: center">得分</th>
                                <th style="font-size: 20px;text-align: center">指标</th>
                                <th style="font-size: 20px;text-align: center">得分</th>
                                <th style="font-size: 20px;text-align: center">失分</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['fqsf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['fqdf'] }}</td>
                                <td style="font-size: 20px">发球</td>
                                <td style="font-size: 20px">{{ $b_count['fqdf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['fqsf'] }}</td>
                            </tr>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['zssf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['zsdf'] }}</td>
                                <td style="font-size: 20px">正手</td>
                                <td style="font-size: 20px">{{ $b_count['zsdf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['zssf'] }}</td>
                            </tr>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['fssf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['fsdf'] }}</td>
                                <td style="font-size: 20px">反手</td>
                                <td style="font-size: 20px">{{ $b_count['fsdf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['fssf'] }}</td>
                            </tr>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['cssf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['csdf'] }}</td>
                                <td style="font-size: 20px">侧身</td>
                                <td style="font-size: 20px">{{ $b_count['csdf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['cssf'] }}</td>
                            </tr>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['kzsf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['kzdf'] }}</td>
                                <td style="font-size: 20px">控制</td>
                                <td style="font-size: 20px">{{ $b_count['kzdf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['kzsf'] }}</td>
                            </tr>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['fqdsf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['fqddf'] }}</td>
                                <td style="font-size: 20px">发抢段</td>
                                <td style="font-size: 20px">{{ $b_count['fqddf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['fqdsf'] }}</td>
                            </tr>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['jqdsf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['jqddf'] }}</td>
                                <td style="font-size: 20px">接抢段</td>
                                <td style="font-size: 20px">{{ $b_count['jqddf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['jqdsf'] }}</td>
                            </tr>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['zhdsf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['zhddf'] }}</td>
                                <td style="font-size: 20px">转换段</td>
                                <td style="font-size: 20px">{{ $b_count['zhddf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['zhdsf'] }}</td>
                            </tr>
                            <tr style="text-align: center;height: 50px;">
                                <td style="font-size: 20px">{{ $a_count['xcdsf'] }}</td>
                                <td style="font-size: 20px">{{ $a_count['xcddf'] }}</td>
                                <td style="font-size: 20px">相持段</td>
                                <td style="font-size: 20px">{{ $b_count['xcddf'] }}</td>
                                <td style="font-size: 20px">{{ $b_count['xcdsf'] }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="layui-col-xs3 img_man">
                    <h3 class="name_name" style="color:black;">{{ $username[0]->b_user }}</h3>
                    <img src="{{ $username[0]->b_pic }}" alt="" class="img_in">
                    <div class="echars_in">
                        <div id="user_b_d" style="width: 250px;height:160px;"></div>
                    </div>
                    <div class="echars_in">
                        <div id="user_b_s" style="width: 250px;height:160px;"></div>
                    </div>
                </div>
            </div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
            <legend>各板得失分及得分率</legend>
        </fieldset>
        <div class="layui-container list_main_conter_in defen">
            <div class="match_all layui-row">
                <div class="layui-col-xs6">
                    <div id="user_a_zhu" style="width: 500px;height:410px;"></div>
                </div>
                <div class="layui-col-xs6 margin0">
                    <div id="user_b_zhu" style="width: 500px;height:400px;"></div>
                </div>
            </div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
            <legend>各段得失分及雷达图</legend>
        </fieldset>
        <div class="layui-container list_main_conter_in defen">
            <div class="match_all layui-row">
                <div class="layui-col-xs6">
                    <div id="duan_leida" style="width: 440px;height:400px;"></div>
                </div>
                <div class="layui-col-xs6 margin0">
                    <div id="duan_skill" style="width: 440px;height:400px;"></div>
                </div>
            </div>
        </div>
        <fieldset class="layui-elem-field layui-field-title">
            <legend>每局得分趋势图</legend>
        </fieldset>
        <div class="layui-container list_main_conter_in defen">
            <div class="match_all layui-row">
                <form class="layui-form" action="">

                    <div class="layui-form-item">
                        <label class="layui-form-label">选择局数</label>
                        <div class="layui-input-inline">
                            <select name="class" lay-verify="required">
                                <option value=""></option>
                                @foreach($office as $item)
                                <option value="{{ $item->id }}">{{ $item->office_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="layui-input-inline">
                            <button class="layui-btn" id="submitButton" lay-submit lay-filter="formDemo">立即提交</button>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $username[0]->a_id }}">
                    <input type="hidden" name="mess_id" value="{{ $username[0]->id }}">
                </form>

                <div class="layui-col-xs6" style="width: 100%">
                    <div id="danju" style="width: 100%;height:400px;"></div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- 列表页面主体 结束 -->
<footer class="footer">
    <p>XXXXX有限公司</p>
</footer>
<script src="/statics/js/echarts.simple.min.js"></script>
<script src="/statics/js/jquery.js"></script>
<script src="/statics/js/layui.all.js"></script>

</body>
<!--前4个统计图-->
<script type="text/javascript">
    // 用户1失分比例
    var myChart = echarts.init(document.getElementById('user_a_d'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '各段失分比例',

            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{b} : {c} ({d}%)"
        },

        series: [
            {
                name: '',
                type: 'pie',
                radius: '55%',
                center: ['50%', '60%'],
                data: [
                    {value: '{{ $a_count['fqdsf'] }}', name: '发抢段'},
                    {value: '{{ $a_count['jqdsf'] }}', name: '接抢段'},
                    {value: '{{ $a_count['zhdsf'] }}', name: '转换段'},
                    {value: '{{ $a_count['xcdsf'] }}', name: '相持段'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);

    //用户1得分比例
    var myChart1 = echarts.init(document.getElementById('user_a_s'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '各段得分比例',

            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{b} : {c} ({d}%)"
        },

        series: [
            {
                name: '',
                type: 'pie',
                radius: '55%',
                center: ['50%', '60%'],
                data: [
                    {value: '{{ $a_count['fqddf'] }}', name: '发抢段'},
                    {value: '{{ $a_count['jqddf'] }}', name: '接抢段'},
                    {value: '{{ $a_count['zhddf'] }}', name: '转换段'},
                    {value: '{{ $a_count['xcddf'] }}', name: '相持段'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart1.setOption(option);


    //用户2得分比例
    var myChart2 = echarts.init(document.getElementById('user_b_d'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '各段得分比例',

            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{b} : {c} ({d}%)"
        },

        series: [
            {
                name: '',
                type: 'pie',
                radius: '55%',
                center: ['50%', '60%'],
                data: [
                    {value: '{{ $b_count['fqddf'] }}', name: '发抢段'},
                    {value: '{{ $b_count['jqddf'] }}', name: '接抢段'},
                    {value: '{{ $b_count['zhddf'] }}', name: '转换段'},
                    {value: '{{ $b_count['xcddf'] }}', name: '相持段'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart2.setOption(option);

    // 用户2失分比例
    var myChart3 = echarts.init(document.getElementById('user_b_s'));

    // 指定图表的配置项和数据
    var option = {
        title: {
            text: '各段失分比例',

            x: 'center'
        },
        tooltip: {
            trigger: 'item',
            formatter: "{b} : {c} ({d}%)"
        },

        series: [
            {
                name: '',
                type: 'pie',
                radius: '55%',
                center: ['50%', '60%'],
                data: [
                    {value: '{{ $b_count['fqdsf'] }}', name: '发抢段'},
                    {value: '{{ $b_count['jqdsf'] }}', name: '接抢段'},
                    {value: '{{ $b_count['zhdsf'] }}', name: '转换段'},
                    {value: '{{ $b_count['xcdsf'] }}', name: '相持段'},

                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };


    // 使用刚指定的配置项和数据显示图表。
    myChart3.setOption(option);
</script>

<!---->
<script>

    var my1 = echarts.init(document.getElementById('user_a_zhu'));

    option = {
        title: {
            text: '{{ $username[0]->a_user }}各板得失分及得分率',
            y: 'bottom',
            x: 'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                crossStyle: {
                    color: '#999'
                }
            }
        },
        legend: {
            data: ['得分', '失分', '得分率']
        },
        xAxis: [
            {
                type: 'category',
                data: ['发球', '接发球', '第三板', '第四板', '第五版', '第六版', '六板后'],
                axisPointer: {
                    type: 'shadow'
                }
            }
        ],
        yAxis: [
            {
                type: 'value',
                name: '分数',
                min: 0,
                max: 25,
                interval: 1,
                axisLabel: {
                    formatter: '{value}'
                }
            },
            {
                type: 'value',
                name: '得分率',
                min: 0,
                max: 100,
                interval: 10,
                axisLabel: {
                    formatter: '{value} %'
                }
            }
        ],
        series: [
            {
                name: '得分',
                type: 'bar',
                data: [{{$a_count['fqdf']}}, {{$a_count['jqddf']}}, {{$a_count['fqddf']}}, {{$a_count['jqddf']}}, {{$a_count['zhddf']}}, {{$a_count['zhddf']}}, {{$a_count['xcddf']}}]
            },
            {
                name: '失分',
                type: 'bar',
                data: [{{$a_count['fqsf']}}, {{$a_count['jqdsf']}}, {{$a_count['fqdsf']}}, {{$a_count['jqdsf']}}, {{$a_count['zhdsf']}}, {{$a_count['zhdsf']}}, {{$a_count['xcdsf']}}]
            },
            {
                name: '得分率',
                type: 'line',
                yAxisIndex: 1,
                data: [{{$a_fqdfl}}, {{$a_dsbdfl}}, {{$a_dsabdfl}}, {{$a_dsbdfl}}, {{$a_dlbdfl}}, {{$a_dlbdfl}}, {{$a_lbhdfl}}]
            }
        ]
    };
    my1.setOption(option);
</script>

<script>

    var my2 = echarts.init(document.getElementById('user_b_zhu'));

    option = {
        title: {
            text: '{{ $username[0]->b_user }}各板得失分及得分率',
            y: 'bottom',
            x: 'center'
        },
        tooltip: {
            trigger: 'axis',
            axisPointer: {
                type: 'cross',
                crossStyle: {
                    color: '#999'
                }
            }
        },
        legend: {
            data: ['得分', '失分', '得分率']
        },
        xAxis: [
            {
                type: 'category',
                data: ['发球', '接发球', '第三板', '第四板', '第五版', '第六版', '六板后'],
                axisPointer: {
                    type: 'shadow'
                }
            }
        ],
        yAxis: [
            {
                type: 'value',
                name: '分数',
                min: 0,
                max: 25,
                interval: 1,
                axisLabel: {
                    formatter: '{value}'
                }
            },
            {
                type: 'value',
                name: '得分率',
                min: 0,
                max: 100,
                interval: 10,
                axisLabel: {
                    formatter: '{value} %'
                }
            }
        ],
        series: [
            {
                name: '得分',
                type: 'bar',
                data: [{{$b_count['fqdf']}}, {{$b_count['jqddf']}}, {{$b_count['fqddf']}}, {{$b_count['jqddf']}}, {{$b_count['zhddf']}}, {{$b_count['zhddf']}}, {{$b_count['xcddf']}}]
            },
            {
                name: '失分',
                type: 'bar',
                data: [{{$b_count['fqsf']}}, {{$b_count['jqdsf']}}, {{$b_count['fqdsf']}}, {{$b_count['jqdsf']}}, {{$b_count['zhdsf']}}, {{$b_count['zhdsf']}}, {{$b_count['xcdsf']}}]
            },
            {
                name: '得分率',
                type: 'line',
                yAxisIndex: 1,
                data: [{{$b_fqdfl}}, {{$b_dsbdfl}}, {{$b_dsabdfl}}, {{$b_dsbdfl}}, {{$b_dlbdfl}}, {{$b_dlbdfl}}, {{$b_lbhdfl}}]
            }
        ]
    };
    my2.setOption(option);
</script>

<!--雷达图-->
<script>
    var my3 = echarts.init(document.getElementById('duan_leida'));
    option = {
        title: {
            text: '各段得分率',
            x: 'center',
            y: 'bottom'
        },
        tooltip: {},
        legend: {
            x: 'left',
            data: ['{{ $username[0]->a_user }}', '{{ $username[0]->b_user }}']

        },
        radar: {
            // shape: 'circle',
            name: {
                textStyle: {
                    color: 'black',
                    backgroundColor: '#999',
                    borderRadius: 6500,
                    padding: [3, 5]
                }
            },
            indicator: [
                {name: '发抢段', max: 100},
                {name: '接抢段', max: 100},
                {name: '转换段', max: 100},
                {name: '相持段', max: 100},
                {name: '综合', max: 100},

            ]
        },
        series: [{
            name: '预算 vs 开销（Budget vs spending）',
            type: 'radar',
            // areaStyle: {normal: {}},
            data: [
                {
                    value: [{{$a_dsbdfl}}, {{$a_dsbdfl}}, {{$a_dlbdfl}}, {{$a_lbhdfl}}, 52.31],
                    name: '{{ $username[0]->a_user }}'
                },
                {
                    value: [{{$b_dsbdfl}}, {{$b_dsbdfl}}, {{$b_dlbdfl}}, {{$b_lbhdfl}}, 52.89],
                    name: '{{ $username[0]->b_user }}'
                }
            ]
        }]
    };
    my3.setOption(option);
</script>
<script>
    var my4 = echarts.init(document.getElementById('duan_skill'));
    option = {
        title: {
            text: '各项技术得分率',
            x: 'center',
            y: 'bottom'
        },
        tooltip: {},
        legend: {
            x: 'left',
            data: ['{{ $username[0]->a_user }}', '{{ $username[0]->b_user }}']

        },
        radar: {
            // shape: 'circle',
            name: {
                textStyle: {
                    color: 'black',
                    backgroundColor: '#999',
                    borderRadius: 6500,
                    padding: [3, 5]
                }
            },
            indicator: [
                {name: '发球', max: 100},
                {name: '正手', max: 100},
                {name: '反手', max: 100},
                {name: '侧身', max: 100},
                {name: '控制', max: 100},

            ]
        },
        series: [{
            name: '预算 vs 开销（Budget vs spending）',
            type: 'radar',
            // areaStyle: {normal: {}},
            data: [
                {
                    value: [{{$a_count['fqdf']/($a_count['fqdf']+$a_count['fqsf'])*100}}, {{$a_count['zsdf']/($a_count['zsdf']+$a_count['zssf'])*100}}, {{$a_count['fsdf']/($a_count['fsdf']+$a_count['fssf'])*100}}, {{$a_count['csdf']/($a_count['csdf']+$a_count['cssf'])*100}}, {{$a_count['kzdf']/($a_count['kzdf']+$a_count['kzsf'])*100}}],
                    name: '{{ $username[0]->a_user }}'
                },
                {
                    value: [{{$b_count['fqdf']/($b_count['fqdf']+$b_count['fqsf'])*100}}, {{$b_count['zsdf']/($b_count['zsdf']+$b_count['zssf'])*100}}, {{$b_count['fsdf']/($b_count['fsdf']+$b_count['fssf'])*100}}, {{$b_count['csdf']/($b_count['csdf']+$b_count['cssf'])*100}}, {{$b_count['kzdf']/($b_count['kzdf']+$b_count['kzsf'])*100}}],
                    name: '{{ $username[0]->b_user }}'
                }
            ]
        }]
    };
    my4.setOption(option);
</script>

<!--单局数据-->
<script>
    var a = [];
    var b = [];
    var keys = [];
    a.push(0)
    keys.push('0')
    a.push(0)
    keys.push('1')
    a.push(0)
    keys.push('2')
    a.push(0)
    keys.push('3')
    a.push(1)
    keys.push('4')
    a.push(2)
    keys.push('5')
    a.push(2)
    keys.push('6')
    a.push(3)
    keys.push('7')
    a.push(4)
    keys.push('8')
    a.push(4)
    keys.push('9')
    a.push(5)
    keys.push('10')
    a.push(6)
    keys.push('11')
    a.push(6)
    keys.push('12')
    a.push(6)
    keys.push('13')
    a.push(7)
    keys.push('14')
    a.push(8)
    keys.push('15')
    a.push(8)
    keys.push('16')
    a.push(8)
    keys.push('17')
    a.push(8)
    keys.push('18')
    b.push(0)
    b.push(1)
    b.push(2)
    b.push(3)
    b.push(3)
    b.push(3)
    b.push(4)
    b.push(4)
    b.push(4)
    b.push(5)
    b.push(5)
    b.push(5)
    b.push(6)
    b.push(7)
    b.push(7)
    b.push(7)
    b.push(8)
    b.push(9)
    b.push(11)


    var my5 = echarts.init(document.getElementById('danju'));
    option = {

        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data: ['{{ $username[0]->a_user }}', '{{ $username[0]->b_user }}']
        },


        xAxis: {
            type: 'category',
            boundaryGap: true,
            data: keys
        },
        yAxis: {
            type: 'category',


        },
        series: [
            {
                name: '{{ $username[0]->a_user }}',
                type: 'line',
                stack: '总量',
                data: a
            },
            {
                name: '{{ $username[0]->b_user }}',
                type: 'line',
                stack: '总量',
                data: b
            }
        ]
    };
    my5.setOption(option);
    layui.use('form', function () {
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function (data1) {

            $.get('/home/index/list?class=' + data1.field.class + '&mess_id=' + data1.field.mess_id + '&user_id=' + data1.field.user_id).done(function (data) {
                // 填入数据
                if (data.code == 100) {
                    layer.msg(data.msg, {icon: 2});
                    return false;
                }
                my5.setOption({
                    xAxis: {
                        type: 'category',
                        boundaryGap: true,
                        data: data.c
                    },
                    yAxis: {
                        type: 'category',


                    },
                    series: [
                        {
                            name: '{{ $username[0]->a_user }}',
                            type: 'line',
                            stack: '总量',
                            data: data.a
                        },
                        {
                            name: '{{ $username[0]->b_user }}',
                            type: 'line',
                            stack: '总量',
                            data: data.b
                        }
                    ]
                });
            });


        });
    });

    document.getElementById('submitButton').onclick = function () {
        // your code here...
        return false;
    };
</script>

</html>