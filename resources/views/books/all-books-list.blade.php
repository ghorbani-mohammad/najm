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
                    <a href="{{route('book.add')}}" type="button" class="btn btn-success btn-lg">اضافه کردن</a>
                    <a href="{{route('book.getSearch')}}" type="button" class="btn btn-warning btn-lg">جستجو</a>
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
                            <td>آمار کلی</td>
                            <td>{{$total}}</td>
                        </tr>
                        <tr>
                            <td>آمار سالیانه</td>
                            <td>{{$yearTotal}}</td>
                        </tr>
                        <tr>
                            <td>آمار ماهانه</td>
                            <td>{{$monthTotal}}</td>
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
        <div class="x_panel">
            <div class="x_title">
                <h2>آخرین عناوین</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row col-md-12 col-sm-12 col-xs-12">
                    @foreach($lastThree as $item)
                        <a href="{{route('book.view', ['book' => $item->id])}}">
                            <div class="col-md-3">
                                <div style="height: 190px;" class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%;height: 100%; display: block;"
                                             src="{{$item->cover ?? asset('/admin/build/images/dashboard/faslname.jpg')}}" alt="image">
                                    </div>
                                    <div class="caption">
                                        <h4>{{$item->title}}</h4>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="tableTitle">کتب</h2>
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
                            <th> مولف/مترجم</th>
                            <th> سال چاپ</th>
                            <th> نوبت چاپ</th>
                            <th> شمارگان</th>
                            <th> محتوا</th>
                            <th> اطلاعات کامل</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($books as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->tahrir_moallef}}</td>
                                <td>{{$item->sal}}</td>
                                <td>{{$item->nobate_chap}}</td>
                                <td>{{$item->shomaregan}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href={{route('book.contents.view', ['book' => $item->id])}}>
                                        محتوا
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href={{route('book.view', ['book' => $item->id])}}>
                                        مشاهده اطلاعات کامل
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
                            columns: [0, 1, 2, 3, 4]
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
                    data: ['آمار کلی', 'آمار سالیانه', 'آمار ماهانه']
                }],
                series: [{
                    name: 'تعداد',
                    type: 'bar',
                    data: [{{$total}}, {{$yearTotal}}, {{$monthTotal}}]
                }]
            });
        });
    </script>
@endsection
