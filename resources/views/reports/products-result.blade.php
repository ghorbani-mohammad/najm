@extends('layout.app')
@section('styles')
    <!-- Bootstrap -->
    <link href="{{asset('admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
{{--    <link href="{{asset('admin/build/css/custom.min.css')}}" rel="stylesheet">@endsection--}}
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title ?? "نمودار مقایسه میانگین ارزیابی محصولات"}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="graph_bar_result" style="height: 250px;"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('admin/vendors/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('admin/vendors/morris.js/morris.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            Morris.Bar({
                element: 'graph_bar_result',
                data: <?php echo json_encode($data); ?>,
                xkey: '{{$name}}',
                ykeys: ['میانگین'],
                ymax: 5,
                labels: ['میانگین'],
                barRatio: 0.4,
                barColors: ['#26B99A'],
                hideHover: 'auto',
                resize: true,
            });
        });
    </script>
@endsection
