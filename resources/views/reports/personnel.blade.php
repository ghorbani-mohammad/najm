@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>مقایسه محصولات</h2>
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
                            <label class="control-label col-md-2 col-sm-2 " for="date_from">تاریخ از</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="date_from" name="date_from" Lang="fa-IR"
                                       value="{{ old("date_from") }}"
                                       class="form-control col-md-7 date-it-is">
                                @if($errors->has("date_from"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("date_from")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="date_to">تاریخ تا</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="date_to" name="date_to" Lang="fa-IR"
                                       value="{{ old("date_to") }}"
                                       class="form-control col-md-7 date-it-is">
                                @if($errors->has("date_to"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("date_to")}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="control-label col-md-6 col-sm-6 " for="limit">تعداد نفرات برتر
                                </label>
                                <label>
                                    <select id="limit" name="limit" class="col-md-12">
                                        <option value="" selected>همه</option>
                                        <option value="10" selected>ده</option>
                                        <option value="20" selected>بیست</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        @csrf
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6  col-md-offset-3">
                                <button type="submit" class="btn btn-success">مشاهده</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
