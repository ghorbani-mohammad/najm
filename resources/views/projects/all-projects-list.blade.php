@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>عملیات‌ها</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a href="{{route('project.add')}}" type="button" class="btn btn-success btn-lg">اضافه کردن</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>آمار کلی</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>آمار</th>
                            <th>تعداد</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>پروژه‌های خاتمه‌یافته</td>
                            <td>{{$finished}}</td>
                        </tr>
                        <tr>
                            <td>پروژه‌های دردست‌اقدام</td>
                            <td>{{$unfinished}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div id="echart_bar_horizontal_pub" style="height:200px"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="tableTitle">پروژه ها</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_product">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th> عنوان</th>
                            <th> مجری</th>
                            <th> نوع</th>
                            <th> بازخورد</th>
                            <th> اطلاعات کامل</th>
                            <th>حذف</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($projects as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->mojri}}</td>
                                <td>{{$item->typeName}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href={{route('project.evaluations.all', ['project' => $item->id])}}>
                                        بازخوردها
                                    </a>
                                </td>
                                <td>
                                    <a href={{route('project.view', ['project' => $item->id])}}>
                                        مشاهده اطلاعات کامل
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger btn-sm"
                                       href={{route('project.delete', ['project' => $item->id])}}>
                                        حذف
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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

            var echartBar = echarts.init(document.getElementById('echart_bar_horizontal_pub'), theme);

            echartBar.setOption({
                tooltip: {
                    trigger: 'axis'
                },
                toolbox: {
                    show: false,
                    feature: {
                        saveAsImage: {
                            show: true,
                            title: "ذخیره"
                        }
                    }
                },
                calculable: true,
                xAxis: [{
                    type: 'value',
                    boundaryGap: [0, 1]
                }],
                yAxis: [{
                    type: 'category',
                    data: ['خاتمه‌یافته', 'دردست‌اقدام']
                }],
                series: [{
                    name: 'تعداد',
                    type: 'bar',
                    data: [{{$finished}}, {{$unfinished}}]
                }]
            });
        });
    </script>
@endsection
