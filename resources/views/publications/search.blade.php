@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>جستجو‌</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="post" data-parsley-validate class="form-horizontal form-label-left"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-2 " for="date_from">تاریخ از
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="text" id="date_from" name="search[date_from]" Lang="fa-IR" value="{{ old('date_from') }}"
                                   class="form-control col-md-7  date-it-is">
                            @if($errors->has('date_from'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('date_from')}}</h5>
                            @endif
                        </div>
                        <label class="control-label col-md-1 col-sm-1 " for="date_to">تاریخ تا
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="text" id="date_to" name="search[date_to]" Lang="fa-IR" value="{{ old('date_to') }}"
                                   class="form-control col-md-7  date-it-is">
                            @if($errors->has('date_to'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('date_to')}}</h5>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="q" name="search[q]" Lang="fa-IR" value="{{ old('q') }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('q'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('q')}}</h5>
                            @endif
                        </div>
                        <button class="btn btn-success">جستجو</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
