@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ویرایش عضو حاضر در جلسه</h2>
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
                            <label class="control-label col-md-1 col-sm-1 " for="name">نام</label>
                            <div class="col-md-3 col-sm-3 ">
                                <input type="text" id="name" name="addMember[name]" Lang="fa-IR"
                                       value="{{ $member->name }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("addMember[name]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[name]")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-1 col-sm-1 " for="sazman_matbooe">سازمان
                                متبوعه</label>
                            <div class="col-md-3 col-sm-3 ">
                                <input type="text" id="sazman_matbooe" name="addMember[sazman_matbooe]" Lang="fa-IR"
                                       value="{{ $member->sazman_matbooe }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("addMember[sazman_matbooe]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[sazman_matbooe]")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-1 col-sm-1 " for="madrak">مدرک</label>
                            <div class="col-md-3 col-sm-3 ">
                                <input type="text" id="madrak" name="addMember[madrak]" Lang="fa-IR"
                                       value="{{ $member->madrak }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("addMember[madrak]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[madrak]")}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="haghozzahme">حق الزحمه</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="haghozzahme" name="addMember[haghozzahme]" Lang="fa-IR"
                                       value="{{ $member->haghozzahme }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("addMember[haghozzahme]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[haghozzahme]")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-1 col-sm-1 " for="tarikh_pardakht">تاریخ
                                پرداخت</label>
                            <div class="col-md-3 col-sm-3 ">
                                <input type="text" id="tarikh_pardakht" name="addMember[tarikh_pardakht]" Lang="fa-IR"
                                       value="{{ $member->tarikh_pardakht }}"
                                       class="form-control col-md-7  date-it-is">
                                @if($errors->has("addMember[tarikh_pardakht]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[tarikh_pardakht]")}}</h5>
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
    </div>
@endsection
