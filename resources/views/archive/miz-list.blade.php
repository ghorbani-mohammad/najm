@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="tableTitle">میز تخصصی {{$language->language ?? ''}}</h2>
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
                            <th> میز</th>
                            <th> شماره جلسه</th>
                            <th> تاریخ</th>
                            <th>موضوع جلسه</th>
                            <th>بازخورد</th>
                            <th>حاضرین</th>
                            <th>محتوا</th>
                            <th> اطلاعات کامل</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($sessions as $item)
                            <tr>
                                <td>{{$item->language->language}}</td>
                                <td>{{$item->shomare}}</td>
                                <td>{{$item->tarikh}}</td>
                                <td>{{$item->mozoo}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href={{route('miz.sessions.evaluations.all', ['session' => $item->id])}}>
                                        بازخوردها
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href={{route('miz.sessions.members', ['session' => $item->id])}}>
                                        حاضرین
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href={{route('miz.sessions.contents.view', ['session' => $item->id])}}>
                                        محتوا
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href={{route('miz.sessions.view', ['session' => $item->id])}}>
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
                            columns: [0, 1, 2]
                        }
                    },
                ]
            });
        });
    </script>
@endsection
