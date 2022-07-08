@extends('layout.app')
@section('styles')
    <link rel="stylesheet" href="{{asset('admin/vendors/morris.js/morris.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>{{$title ?? "نمودار مقایسه فعالیت همکاران"}}</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="graph_bar_result" style="height: 400px;"></div>
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
                element: "graph_bar_result",
                data: <?php echo json_encode($result); ?>,
                xkey: 'name',
                ykeys: ['total'],
                labels: ['تعداد'],
                barRatio: 0.4,
                barColors: ['#26B99A'],
                hideHover: 'auto',
                resize: true,
                fillOpacity: 0.6,
                behaveLikeLine: true,
                pointFillColors:['#ffffff'],
                pointStrokeColors: ['black'],
                lineColors:['gray','red'],
                xLabelAngle: 45,
            });
        });
    </script>
@endsection
