@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>اطلاعات همکار</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 " for="name">نام
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <h4>{{$person->name}}</h4>
                        </div>

                        <label class="control-label col-md-2 col-sm-2 " for="parent_name">نام پدر
                        </label>
                        <label class="control-label col-md-2 col-sm-2 ">
                            {{$person->parent_name}}
                        </label>
                    </div>
{{--                    --}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 " for="birthday">تاریخ تولد--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="birthday" name="birthday" Lang="fa-IR"--}}
{{--                                   value="{{ old('birthday') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('birthday'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('birthday')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <label class="control-label col-md-2 col-sm-2 " for="birth_place">محل تولد--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="birth_place" name="birth_place" Lang="fa-IR"--}}
{{--                                   value="{{ old('birth_place') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('birth_place'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('birth_place')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 " for="national_code">کد ملی--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="national_code" name="national_code" Lang="fa-IR"--}}
{{--                                   value="{{ old('national_code') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('national_code'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('national_code')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <label class="control-label col-md-2 col-sm-2 " for="residence_city">شهر محل سکونت--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="residence_city" name="residence_city" Lang="fa-IR"--}}
{{--                                   value="{{ old('residence_city') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('residence_city'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('residence_city')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 " for="education_level">میزان تحصیلات--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <select name="nahve_ashnayi" class="col-md-12">--}}
{{--                                <option value="{{\App\Models\Personnel::Tahsilat_Diplom}}">دیپلم</option>--}}
{{--                                <option value="{{\App\Models\Personnel::Tahsilat_Karshenasi}}">کارشناسی</option>--}}
{{--                                <option value="{{\App\Models\Personnel::Tahsilat_KarshenasiArshad}}">کارشناسی ارشد--}}
{{--                                </option>--}}
{{--                                <option value="{{\App\Models\Personnel::Tahsilat_Doctora}}">دکترا</option>--}}
{{--                                <option value="{{\App\Models\Personnel::Tahsilat_FoghDoctora}}">فوق دکترا</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                        <label class="control-label col-md-2 col-sm-2 " for="education_field">رشته تحصیلی--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="education_field" name="education_field" Lang="fa-IR"--}}
{{--                                   value="{{ old('education_field') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('education_field'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('education_field')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 " for="job">شغل--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="job" name="job" Lang="fa-IR" value="{{ old('job') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('job'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('job')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <label class="control-label col-md-2 col-sm-2 " for="marital_status">وضعیت تاهل--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="marital_status" name="marital_status" Lang="fa-IR"--}}
{{--                                   value="{{ old('marital_status') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('marital_status'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('marital_status')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 " for="home_number">تلفن منزل--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="home_number" name="home_number" Lang="fa-IR"--}}
{{--                                   value="{{ old('home_number') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('home_number'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('home_number')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <label class="control-label col-md-2 col-sm-2 " for="mobile_number">تلفن همراه--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="mobile_number" name="mobile_number" Lang="fa-IR"--}}
{{--                                   value="{{ old('mobile_number') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('mobile_number'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('mobile_number')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 " for="email">پست الکترونیک--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="email" name="email" Lang="fa-IR" value="{{ old('email') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('email'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('email')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                        <label class="control-label col-md-2 col-sm-2 " for="bank_number">شماره حساب--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="bank_number" name="bank_number" Lang="fa-IR"--}}
{{--                                   value="{{ old('bank_number') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('bank_number'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('bank_number')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 " for="card_number">شماره کارت--}}
{{--                        </label>--}}
{{--                        <div class="col-md-4 col-sm-4 ">--}}
{{--                            <input type="text" id="card_number" name="card_number" Lang="fa-IR"--}}
{{--                                   value="{{ old('card_number') }}"--}}
{{--                                   class="form-control col-md-7 ">--}}
{{--                            @if($errors->has('card_number'))--}}
{{--                                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                    {{$errors->first('card_number')}}</h5>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="ln_solid"></div>--}}

{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 ">وضعیت اشتغال<span--}}
{{--                                class="required">*</span></label>--}}
{{--                        <label>--}}
{{--                            <select name="eshteghal" class="col-md-12">--}}
{{--                                <option value="{{\App\Models\Personnel::Eshteghal_Nezami_Shaghel}}">نظامی - شاغل--}}
{{--                                </option>--}}
{{--                                <option value="{{\App\Models\Personnel::Eshteghal_Nezami_Bazneshaste}}">نظامی ---}}
{{--                                    بازنشسته--}}
{{--                                </option>--}}
{{--                                <option value="{{\App\Models\Personnel::Eshteghal_Nokhbe}}">نخبه/پژوهشگر</option>--}}
{{--                            </select>--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                    <div class="ln_solid"></div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="control-label col-md-2 col-sm-2 ">عضو هیات علمی<span--}}
{{--                                class="required">*</span></label>--}}
{{--                        <div>--}}
{{--                            <div class="col-md-1 col-sm-1 ">--}}

{{--                                <select name="is_heyat_elmi" class="col-md-12">--}}
{{--                                    <option value="0">خیر</option>--}}
{{--                                    <option value="1">بلی</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-3 col-sm-3 "></div>--}}

{{--                            <label class="control-label col-md-2 col-sm-2 " for="university">دانشگاه/پژوهشگاه--}}
{{--                            </label>--}}
{{--                            <div class="col-md-4 col-sm-4 ">--}}
{{--                                <input type="text" id="university" name="university" Lang="fa-IR"--}}
{{--                                       value="{{ old('university') }}"--}}
{{--                                       class="form-control col-md-7 ">--}}
{{--                                @if($errors->has('university'))--}}
{{--                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                        {{$errors->first('university')}}</h5>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label col-md-2 col-sm-2 " for="daraje_elmi">درجه علمی--}}
{{--                            </label>--}}
{{--                            <div class="col-md-4 col-sm-4 ">--}}
{{--                                <input type="text" id="daraje_elmi" name="daraje_elmi" Lang="fa-IR"--}}
{{--                                       value="{{ old('daraje_elmi') }}"--}}
{{--                                       class="form-control col-md-7 ">--}}
{{--                                @if($errors->has('daraje_elmi'))--}}
{{--                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                        {{$errors->first('daraje_elmi')}}</h5>--}}
{{--                                @endif--}}
{{--                            </div>--}}

{{--                            <label class="control-label col-md-2 col-sm-2 " for="hoze_motaleati">حوزه--}}
{{--                                مطالعاتی--}}
{{--                            </label>--}}
{{--                            <div class="col-md-4 col-sm-4 ">--}}
{{--                                <input type="text" id="hoze_motaleati" name="hoze_motaleati" Lang="fa-IR"--}}
{{--                                       value="{{ old('hoze_motaleati') }}"--}}
{{--                                       class="form-control col-md-7 ">--}}
{{--                                @if($errors->has('hoze_motaleati'))--}}
{{--                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                        {{$errors->first('hoze_motaleati')}}</h5>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="ln_solid"></div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label class="control-label col-md-2 col-sm-2 ">نحوه آشنایی با مرکز<span--}}
{{--                                    class="required">*</span></label>--}}
{{--                            <label>--}}
{{--                                <select name="nahve_ashnayi" class="col-md-12">--}}
{{--                                    <option value="{{\App\Models\Personnel::Ashnayi_Hamkaran}}">از طریق همکاران یا--}}
{{--                                        دوستان--}}
{{--                                    </option>--}}
{{--                                    <option value="{{\App\Models\Personnel::Ashnayi_Poster}}">پوستر مرکز مطالعات--}}
{{--                                    </option>--}}
{{--                                    <option value="{{\App\Models\Personnel::Ashnayi_Shabake}}">شبکه های اجتماعی--}}
{{--                                    </option>--}}
{{--                                    <option value="{{\App\Models\Personnel::Ashnayi_Sazman}}">سازمانی</option>--}}
{{--                                </select>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                        <div class="ln_solid"></div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label col-md-2 col-sm-2 " for="home_address">آدرس منزل--}}
{{--                            </label>--}}
{{--                            <div class="col-md-10 col-sm-10 ">--}}
{{--                                <input type="text" id="home_address" name="home_address" Lang="fa-IR"--}}
{{--                                       value="{{ old('home_address') }}"--}}
{{--                                       class="form-control col-md-7 ">--}}
{{--                                @if($errors->has('home_address'))--}}
{{--                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                        {{$errors->first('home_address')}}</h5>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="ln_solid"></div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="office_address">آدرس محل--}}
{{--                                کار--}}
{{--                            </label>--}}
{{--                            <div class="col-md-10 col-sm-10 ">--}}
{{--                                <input type="text" id="office_address" name="office_address" Lang="fa-IR"--}}
{{--                                       value="{{ old('office_address') }}"--}}
{{--                                       class="form-control col-md-7 ">--}}
{{--                                @if($errors->has('office_address'))--}}
{{--                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                        {{$errors->first('office_address')}}</h5>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}

{{--                            <label class="control-label col-md-2 col-sm-2 " for="office_number">شماره محل--}}
{{--                                کار--}}
{{--                            </label>--}}
{{--                            <div class="col-md-4 col-sm-4 ">--}}
{{--                                <input type="text" id="office_number" name="office_number" Lang="fa-IR"--}}
{{--                                       value="{{ old('office_number') }}"--}}
{{--                                       class="form-control col-md-7 ">--}}
{{--                                @if($errors->has('office_number'))--}}
{{--                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                        {{$errors->first('office_number')}}</h5>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="ln_solid"></div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label class="control-label col-md-2 col-sm-2 " for="hamkari">نوع همکاری--}}
{{--                            </label>--}}
{{--                            <div class="col-md-4 col-sm-4 ">--}}
{{--                                <input type="text" id="hamkari" name="hamkari" Lang="fa-IR"--}}
{{--                                       value="{{ old('hamkari') }}"--}}
{{--                                       class="form-control col-md-7 "--}}
{{--                                       placeholder="طرح یا همکار پژوهشی یا سایر"--}}
{{--                                >--}}
{{--                                @if($errors->has('hamkari'))--}}
{{--                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                                        {{$errors->first('hamkari')}}</h5>--}}
{{--                                @endif--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
@endsection
