@extends('layout.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/vendors/morris.js/morris.css')}}">
@endsection
@section('content')
    <div class="row">
        {{--        <div class="col-md-12 col-sm-12">--}}
        {{--            <div class="x_panel">--}}
        {{--                <div class="x_title">--}}
        {{--                    <h2>نمودار فعالیت‌های {{$   person->name}}</h2>--}}
        {{--                    <div class="clearfix"></div>--}}
        {{--                </div>--}}
        {{--                <div class="x_content">--}}
        {{--                    <div id="graph_area_result" style="height: 250px;"></div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </div>--}}
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>نمودار مجموع فعالیت‌های فرد در بازه‌ی زمانی</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Settings 1</a>
                                <a class="dropdown-item" href="#">Settings 2</a>
                            </div>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div id="echart_line2" style="height:350px;"></div>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2 id="tableTitle">فعالیت‌های {{$person->name}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <table id="myTable" class="table table-bordered">
                    @php
                    $i = 1;
                    @endphp
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>نوع</th>
                        <th>عنوان</th>
                        <th>مشاهده</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publications['publications'] as $publication)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$publication->typeName}}</td>
                            <td>{{$publication->shomare_mosalsal}}</td>
                            <td>
                                <a href="{{route('publication.view', ['publication' => $publication->id])}}">مشاهده
                                    اطلاعات کامل</a>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($publications['maghales'] as $publication)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>مقاله</td>
                            <td>{{$publication->title}}</td>
                            <td>
                                <a href="{{route('publication.maghale.view', ['maghale' => $publication->id])}}">مشاهده
                                    اطلاعات کامل</a>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($publications['books'] as $publication)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$publication->typeName}}</td>
                            <td>{{$publication->title}}</td>
                            <td>
                                <a href="{{route('book.view', ['book' => $publication->id])}}">مشاهده
                                    اطلاعات کامل</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('admin/vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin/vendors/morris.js/morris.min.js')}}"></script>
    <script src="{{asset('admin/vendors/echarts/dist/echarts.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.print.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/vendors/jszip/jszip.min.js')}}"></script>
    <script>
        var title = document.getElementById('tableTitle').innerText
        $(document).ready(function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        title: title,
                        exportOptions: {
                            columns: [0, 1, 2]
                        }
                    },
                ]
            });
        });
    </script>
    <script>
        {{--configs = {--}}
        {{--    element: 'graph_area_result',--}}
        {{--    data:<?php echo json_encode($result); ?>,--}}
        {{--    xkey: 'frame',--}}
        {{--    ykeys: ['publications', 'maghales', 'books'],--}}
        {{--    labels: ['نشریات', 'مقالات', 'کتب'],--}}
        {{--    lineColors: ['#26B99A', '#34495E', '#ACADAC'],--}}
        {{--    pointSize: 2,--}}
        {{--    hideHover: 'auto',--}}
        {{--    resize: true--}}
        {{--};--}}
        {{--Morris.Bar(configs);--}}
        var theme = {
            color: [
                '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
                '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
            ],

            title: {
                itemGap: 8,
                textStyle: {
                    fontWeight: 'normal',
                    color: '#408829'
                }
            },

            dataRange: {
                color: ['#1f610a', '#97b58d']
            },

            toolbox: {
                color: ['#408829', '#408829', '#408829', '#408829']
            },

            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.5)',
                axisPointer: {
                    type: 'line',
                    lineStyle: {
                        color: '#408829',
                        type: 'dashed'
                    },
                    crossStyle: {
                        color: '#408829'
                    },
                    shadowStyle: {
                        color: 'rgba(200,200,200,0.3)'
                    }
                }
            },

            dataZoom: {
                dataBackgroundColor: '#eee',
                fillerColor: 'rgba(64,136,41,0.2)',
                handleColor: '#408829'
            },
            grid: {
                borderWidth: 0
            },

            categoryAxis: {
                axisLine: {
                    lineStyle: {
                        color: '#408829'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            },

            valueAxis: {
                axisLine: {
                    lineStyle: {
                        color: '#408829'
                    }
                },
                splitArea: {
                    show: true,
                    areaStyle: {
                        color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            },
            timeline: {
                lineStyle: {
                    color: '#408829'
                },
                controlStyle: {
                    normal: {color: '#408829'},
                    emphasis: {color: '#408829'}
                }
            },

            k: {
                itemStyle: {
                    normal: {
                        color: '#68a54a',
                        color0: '#a9cba2',
                        lineStyle: {
                            width: 1,
                            color: '#408829',
                            color0: '#86b379'
                        }
                    }
                }
            },
            map: {
                itemStyle: {
                    normal: {
                        areaStyle: {
                            color: '#ddd'
                        },
                        label: {
                            textStyle: {
                                color: '#c12e34'
                            }
                        }
                    },
                    emphasis: {
                        areaStyle: {
                            color: '#99d2dd'
                        },
                        label: {
                            textStyle: {
                                color: '#c12e34'
                            }
                        }
                    }
                }
            },
            force: {
                itemStyle: {
                    normal: {
                        linkStyle: {
                            strokeColor: '#408829'
                        }
                    }
                }
            },
            chord: {
                padding: 4,
                itemStyle: {
                    normal: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            }
                        }
                    },
                    emphasis: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            }
                        }
                    }
                }
            },
            gauge: {
                startAngle: 225,
                endAngle: -45,
                axisLine: {
                    show: true,
                    lineStyle: {
                        color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                        width: 8
                    }
                },
                axisTick: {
                    splitNumber: 10,
                    length: 12,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                axisLabel: {
                    textStyle: {
                        color: 'auto'
                    }
                },
                splitLine: {
                    length: 18,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                pointer: {
                    length: '90%',
                    color: 'auto'
                },
                title: {
                    textStyle: {
                        color: '#333'
                    }
                },
                detail: {
                    textStyle: {
                        color: 'auto'
                    }
                }
            },
            textStyle: {
                fontFamily: 'Arial, Verdana, sans-serif'
            }
        };

        var echartLine = echarts.init(document.getElementById('echart_line2'), theme);

        echartLine.setOption({
            title: {
                text: 'Line Graph',
                subtext: 'Subtitle'
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                x: 220,
                y: 40,
                data: ['نشریات', 'مقالات', 'کتب'],
            },
            toolbox: {
                show: true,
                feature: {
                    magicType: {
                        show: true,
                        title: {
                            line: 'خطی',
                            bar: 'میله ای',
                            stack: 'پشته ای',
                        },
                        type: ['line', 'bar', 'stack']
                    },
                    restore: {
                        show: true,
                        title: "ریست"
                    },
                    // saveAsImage: {
                    //     show: true,
                    //     title: "دانلود"
                    // },
                }
            },
            calculable: true,
            xAxis: [{
                type: 'category',
                boundaryGap: false,
                data: <?php echo json_encode($yAxis); ?>,
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [{
                name: 'نشریات',
                type: 'line',
                smooth: true,
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },
                data: <?php echo json_encode($result2['publications'] ?? []); ?>
            }, {
                name: 'مقالات',
                type: 'line',
                smooth: true,
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },
                data: <?php echo json_encode($result2['maghales'] ?? []); ?>
            }, {
                name: 'کتب',
                type: 'line',
                smooth: true,
                itemStyle: {
                    normal: {
                        areaStyle: {
                            type: 'default'
                        }
                    }
                },
                data: <?php echo json_encode($result2['books'] ?? []); ?>
            }]
        });
    </script>
@endsection
