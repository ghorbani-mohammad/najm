@extends('layout.app')
@section('content')
    @include('evaluations.settings')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>بازخورد‌های میز</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2 id="tableTitle">بازخوردها</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table id="myTable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>شماره جلسه</th>
                                        <th>مرجع</th>
                                        <th class="mohtavayii">کیفیت علمی محتوایی</th>
                                        <th class="tasirgozarii">میزان تاثیرگذاری در افزایش آگاهی</th>
                                        <th class="karbordii">میزان کاربردی بودن</th>
                                        <th class="sheklii">کیفیت شکلی/چاپ</th>
                                        <th>مشاهده</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sessions as $session)
                                        @foreach($session->evaluations as $evaluation)
                                            <tr>
                                                <td>{{$session->shomare}}</td>
                                                <td>{{$evaluation->marjae}}</td>
                                                <td style="color: {{$evaluation->getEvaluationColor($evaluation->bazkhord_mohtavayi)}}" class="mohtavayii">{{$evaluation->bazkhord_mohtavayi}}</td>
                                                <td style="color: {{$evaluation->getEvaluationColor($evaluation->bazkhord_tasir_gozari)}}" class="tasir_gozarii">{{$evaluation->bazkhord_tasir_gozari}}</td>
                                                <td style="color: {{$evaluation->getEvaluationColor($evaluation->bazkhord_karbordi)}}" class="karbordii">{{$evaluation->bazkhord_karbordi}}</td>
                                                <td style="color: {{$evaluation->getEvaluationColor($evaluation->bazkhord_shekli)}}" class="sheklii">{{$evaluation->bazkhord_shekli}}</td>
                                                <td>
                                                    <a href="{{route('miz.sessions.evaluations.view', ['evaluation' => $evaluation->id])}}">مشاهده
                                                        اطلاعات کامل</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include(
        'evaluations.averageAndDiagrams',
         compact('average', 'barChartValues_shekli', 'barChartValues_mohtavayi', 'barChartValues_kol')
     )

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
                            columns: [ 0, 1, 2,3,4 ]
                        }
                    },
                ]
            } );
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('.bazkhord-selector').change(function() {
                if(this.checked) {
                    $('.'+this.id).show('medium')
                } else {
                    $('.'+this.id).hide('medium')
                }
            });
        });
    </script>
@endsection
