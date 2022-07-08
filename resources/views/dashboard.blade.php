@extends('layout.app')
@section('styles')
@endsection
<style>
    .cstm-bg {
        background-image: url("{{asset('admin/build/images/background.jpg')}}")!important ;
        /* Full height */
        height: 100%;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .login_content {
    }

</style>
@section('content')
{{--    @include('layout.widgets-pic', ['name' => 'نشریات','data' => $pubs2])--}}
{{--    @include('layout.widgets-pic', ['name' => 'کتب','data' => $bs2])--}}
{{--    @include('layout.widgets', ['name' => 'پروژه ها','data' => $prs])--}}
    <div class="row cstm-bg"></div>
@endsection
