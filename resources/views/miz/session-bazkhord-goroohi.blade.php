@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>بازخورد تجمیعی</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" data-parsley-validate class="form-horizontal form-label-left"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="type"> میز
                            </label>
                            <label>
                                <select name="language_id" class="col-md-12">
                                    <option selected disabled>انتخاب کنید</option>
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->language}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="shomare_az">شماره مسلسل از</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="shomare_az" name="shomare_az" Lang="fa-IR"
                                       value="{{ old("shomare_az") }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("shomare_az"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("shomare_az")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="shomare_ta">شماره مسلسل تا</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="shomare_ta" name="shomare_ta" Lang="fa-IR"
                                       value="{{ old("shomare_ta") }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("shomare_ta"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("shomare_ta")}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="miangin_az">میانگین از</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="miangin_az" name="miangin_az" Lang="fa-IR"
                                       value="{{ old("miangin_az") }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("miangin_az"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("miangin_az")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="miangin_ta">میانگین تا</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="miangin_ta" name="miangin_ta" Lang="fa-IR"
                                       value="{{ old("miangin_ta") }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("miangin_ta"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("miangin_ta")}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        @csrf
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6  col-md-offset-3">
                                <button type="submit" class="btn btn-success">ثبت</button>
                                <button type="reset" class="btn btn-primary">انصراف</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
