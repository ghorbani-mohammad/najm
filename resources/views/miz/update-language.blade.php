@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>ویرایش {{$language-> language}}</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="post" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-2 " for="date_from">میز
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="text" id="language" name="data[language]" Lang="fa-IR" value="{{ $language->language }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('language'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('language')}}</h5>
                            @endif
                        </div>
                        <button class="btn btn-success">ویرایش</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
