@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>ویرایش مقاله</h2>
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
                        <label class="control-label col-md-2 col-sm-2 " for="place">عنوان
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="place" name="addMaghale[title]" Lang="fa-IR"
                                   value="{{ $maghale->title }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('title'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('title')}}</h5>
                            @endif
                        </div>
                        <label class="control-label col-md-2 col-sm-2 " for="type">عنوان انگلیسی
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="type" name="addMaghale[title_en]" Lang="fa-IR"
                                   value="{{ $maghale->title_en }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('title_en'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('title_en')}}</h5>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 " for="place">نویسنده/نویسندگان
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="authors" name="addMaghale[authors]" Lang="fa-IR"
                                   value="{{ $maghale->authors }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('authors'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('authors')}}</h5>
                            @endif
                        </div>
                        <label class="control-label col-md-2 col-sm-2 " for="type">داور/داوران
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="davar" name="addMaghale[davar]" Lang="fa-IR"
                                   value="{{ $maghale->davar }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('davar'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('davar')}}</h5>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 " for="haznie_talif">هزینه تالیف
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="haznie_talif" name="addMaghale[haznie_talif]" Lang="fa-IR"
                                   value="{{ $maghale->haznie_talif }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('haznie_talif'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('haznie_talif')}}</h5>
                            @endif
                        </div>
                        <label class="control-label col-md-2 col-sm-2 " for="haznie_davari">هزینه داوری
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="haznie_davari" name="addMaghale[haznie_davari]" Lang="fa-IR"
                                   value="{{ $maghale->haznie_davari }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('haznie_davari'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('haznie_davari')}}</h5>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 " for="haznie_virast">هزینه ویراستیاری
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="haznie_virast" name="addMaghale[haznie_virast]" Lang="fa-IR"
                                   value="{{ $maghale->haznie_virast }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('haznie_virast'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('haznie_virast')}}</h5>
                            @endif
                        </div>
                        <label class="control-label col-md-2 col-sm-2 " for="haznie_tarjome">هزینه ترجمه
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="haznie_tarjome" name="addMaghale[haznie_tarjome]" Lang="fa-IR"
                                   value="{{ $maghale->haznie_tarjome }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('haznie_tarjome'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('haznie_tarjome')}}</h5>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 " for="tarikh_pardakht">تاریخ پرداخت
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="tarikh_pardakht" name="addMaghale[tarikh_pardakht]" Lang="fa-IR"
                                   value="{{ $maghale->tarikh_pardakht }}"
                                   class="form-control col-md-7  date-it-is">
                            @if($errors->has('tarikh_pardakht'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('tarikh_pardakht')}}</h5>
                            @endif
                        </div>
                    </div>
                    @csrf
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6  col-md-offset-3">
                            <button type="submit" class="btn btn-success">ثبت</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
