@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>ویرایش بازخورد‌</h2>
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
                        <label class="control-label col-md-2 col-sm-2 " for="place">مرجع
                        </label>
                        <div class="col-md-4 col-sm-4 ">
                            <input type="text" id="marjae" name="addEvaluation[marjae]" Lang="fa-IR"
                                   value="{{ $evaluation->marjae }}"
                                   class="form-control col-md-7 ">
                            @if($errors->has('marjae'))
                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                    {{$errors->first('marjae')}}</h5>
                            @endif
                        </div>
                        <label class="control-label col-md-2 col-sm-2 " for="type">سند/مدرک
                        </label>
                        @if ($evaluation->link ?? false)
                            <div class="col-md-2">
                                <a class="btn btn-success" target="_blank"
                                   href="{{route('publication.evaluations.download', ['evaluation' => $evaluation->id])}}">مشاهده
                                    فایل</a>
                            </div>
                            <div class="col-md-2 col-sm-2 ">
                                <input type="file" id="type" name="addEvaluationFile[file]" Lang="fa-IR"
                                       value="{{ $evaluation->file }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('file'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('file')}}</h5>
                                @endif
                            </div>
                        @else
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="type" name="addEvaluationFile[file]" Lang="fa-IR"
                                       value="{{ $evaluation->file }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('file'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('file')}}</h5>
                                @endif
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 ">کیفیت علمی محتوایی<span
                                class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 ">
                            <select name="addEvaluation[bazkhord_mohtavayi]" class="col-md-12">
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_mohtavayi') == \App\Models\Evaluation::State_Zaeef) selected
                                    @endif value="{{\App\Models\Evaluation::State_Zaeef}}">ضعیف
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_mohtavayi') == \App\Models\Evaluation::State_Motevasset) selected
                                    @endif value="{{\App\Models\Evaluation::State_Motevasset}}">متوسط
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_mohtavayi') == \App\Models\Evaluation::State_Khoob) selected
                                    @endif value="{{\App\Models\Evaluation::State_Khoob}}">خوب
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_mohtavayi') == \App\Models\Evaluation::State_KeyliKhoob) selected
                                    @endif value="{{\App\Models\Evaluation::State_KeyliKhoob}}">خیلی خوب
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_mohtavayi') == \App\Models\Evaluation::State_Awli) selected
                                    @endif value="{{\App\Models\Evaluation::State_Awli}}">عالی
                                </option>
                            </select>
                        </div>
                        <label class="control-label col-md-2 col-sm-2 ">کیفیت شکلی/چاپ<span
                                class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 ">
                            <select name="addEvaluation[bazkhord_shekli]" class="col-md-12">
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_shekli') == \App\Models\Evaluation::State_Zaeef) selected
                                    @endif value="{{\App\Models\Evaluation::State_Zaeef}}">ضعیف
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_shekli') == \App\Models\Evaluation::State_Motevasset) selected
                                    @endif value="{{\App\Models\Evaluation::State_Motevasset}}">متوسط
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_shekli') == \App\Models\Evaluation::State_Khoob) selected
                                    @endif value="{{\App\Models\Evaluation::State_Khoob}}">خوب
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_shekli') == \App\Models\Evaluation::State_KeyliKhoob) selected
                                    @endif value="{{\App\Models\Evaluation::State_KeyliKhoob}}">خیلی خوب
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_shekli') == \App\Models\Evaluation::State_Awli) selected
                                    @endif value="{{\App\Models\Evaluation::State_Awli}}">عالی
                                </option>
                            </select>
                        </div>
                        {{--                            <label class="control-label col-md-2 col-sm-2 " for="type"> ارزیابی متنی--}}
                        {{--                            </label>--}}
                        {{--                            <div class="col-md-4 col-sm-4 ">--}}
                        {{--                                <input type="text" id="type" name="addEvaluation[natije]" Lang="fa-IR"--}}
                        {{--                                       value="{{ $evaluation->natije }}"--}}
                        {{--                                       class="form-control col-md-7 ">--}}
                        {{--                                @if($errors->has('natije'))--}}
                        {{--                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
                        {{--                                        {{$errors->first('natije')}}</h5>--}}
                        {{--                                @endif--}}
                        {{--                            </div>--}}
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 ">میزان تاثیرگذاری در افزایش آگاهی<span
                                class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 ">
                            <select name="addEvaluation[bazkhord_tasir_gozari]" class="col-md-12">
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_tasir_gozari') == \App\Models\Evaluation::State_Zaeef) selected
                                    @endif value="{{\App\Models\Evaluation::State_Zaeef}}">ضعیف
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_tasir_gozari') == \App\Models\Evaluation::State_Motevasset) selected
                                    @endif value="{{\App\Models\Evaluation::State_Motevasset}}">متوسط
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_tasir_gozari') == \App\Models\Evaluation::State_Khoob) selected
                                    @endif value="{{\App\Models\Evaluation::State_Khoob}}">خوب
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_tasir_gozari') == \App\Models\Evaluation::State_KeyliKhoob) selected
                                    @endif value="{{\App\Models\Evaluation::State_KeyliKhoob}}">خیلی خوب
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_tasir_gozari') == \App\Models\Evaluation::State_Awli) selected
                                    @endif value="{{\App\Models\Evaluation::State_Awli}}">عالی
                                </option>
                            </select>
                        </div>
                        <label class="control-label col-md-2 col-sm-2 ">یزان کاربردی بودن<span
                                class="required">*</span></label>
                        <div class="col-md-4 col-sm-4 ">
                            <select name="addEvaluation[bazkhord_karbordi]" class="col-md-12">
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_karbordi') == \App\Models\Evaluation::State_Zaeef) selected
                                    @endif value="{{\App\Models\Evaluation::State_Zaeef}}">ضعیف
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_karbordi') == \App\Models\Evaluation::State_Motevasset) selected
                                    @endif value="{{\App\Models\Evaluation::State_Motevasset}}">متوسط
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_karbordi') == \App\Models\Evaluation::State_Khoob) selected
                                    @endif value="{{\App\Models\Evaluation::State_Khoob}}">خوب
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_karbordi') == \App\Models\Evaluation::State_KeyliKhoob) selected
                                    @endif value="{{\App\Models\Evaluation::State_KeyliKhoob}}">خیلی خوب
                                </option>
                                <option
                                    @if($evaluation->getRawOriginal('bazkhord_karbordi') == \App\Models\Evaluation::State_Awli) selected
                                    @endif value="{{\App\Models\Evaluation::State_Awli}}">عالی
                                </option>
                            </select>
                        </div>
                    </div>
                    @csrf
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
