@extends('layout.app')
@section('content')
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
                            <td>تعداد کل پژوهشگران</td>
                            <td>{{$total}}</td>
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
                <h2>پژوهشگران برتر</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row col-md-12 col-sm-12 col-xs-12">
                    @foreach($lastThree as $item)
                        <a href="{{route('get-personnel-info', ['id' => $item->id])}}">
                            <div class="col-md-3">
                                <div style="height: 190px; width: 190px" class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%;height: 100%; display: block;"
                                             src="{{$item->profile_pic ?? asset('admin/build/images/default_picture.png')}}" alt="image">
                                    </div>
                                    <div class="caption">
                                        <h4>{{$item->name ?? ""}}</h4>
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
                    <h2 id="tableTitle">پژوهشگران موجود</h2>
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
                            <th> نام</th>
                            <th> کد ملی</th>
                            <th>تحصیلات</th>
                            <th>تلفن همراه</th>
                            <th>نوع همکاری</th>
                            <th>تعداد نشریات و کتب</th>
                            <th> اطلاعات کامل</th>
                            <th>حذف</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($personnel as $person)
                            <tr>
                                <td>{{$person->name}}</td>
                                <td>{{$person->national_code}}</td>
                                <td>{{$person->educationText}}</td>
                                <td>{{$person->mobile_number}}</td>
                                <td>{{$person->hamkari}}</td>
                                <td>
                                    <a class="btn btn-info" href={{route('personnel.activities', ['person' => $person->id])}}>
                                        فعالیت‌ها‌
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success" href={{route('get-personnel-info', ['id' => $person->id])}}>
                                        مشاهده اطلاعات کامل
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href={{route('delete-personnel', ['id' => $person->id])}}>
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
        $(document).ready(function() {
            $('#myTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        title: title,
                        exportOptions: {
                            columns: [ 0, 1, 2 ,3,4]
                        }
                    },
                ]
            } );

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
                    data: ['تعداد کل', 'تعداد مقیم', 'تعداد غیرمقیم']
                }],
                series: [{
                    name: 'تعداد',
                    type: 'bar',
                    data: [{{$total}}, {{$moghim}}, {{$gheyrmoghim}}]
                }]
            });
        } );
    </script>
@endsection
