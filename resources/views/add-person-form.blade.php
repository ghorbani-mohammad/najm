@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>اضافه کردن همکار</h2>
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
                            <label class="control-label col-md-2 col-sm-2 " for="name">نام و نام خانوادگی
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="name" name="info[name]" Lang="fa-IR" value="{{ old('name') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('name'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('name')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="parent_name">نام پدر
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="parent_name" name="info[parent_name]" Lang="fa-IR"
                                       value="{{ old('parent_name') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('parent_name'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('parent_name')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="birthday">تاریخ تولد
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="birthday" name="info[birthday]" Lang="fa-IR"
                                       value="{{ old('birthday') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('birthday'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('birthday')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="birth_place">محل تولد
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="birth_place" name="info[birth_place]" Lang="fa-IR"
                                       value="{{ old('birth_place') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('birth_place'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('birth_place')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="national_code">کد ملی
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="national_code" name="info[national_code]" Lang="fa-IR"
                                       value="{{ old('national_code') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('national_code'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('national_code')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="residence_city">شهر محل سکونت
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="residence_city" name="info[residence_city]" Lang="fa-IR"
                                       value="{{ old('residence_city') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('residence_city'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('residence_city')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="education_level">میزان تحصیلات
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <select name="info[education_level]" class="col-md-12">
                                    <option value=0 selected disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\Personnel::Tahsilat_Diplom}}">دیپلم</option>
                                    <option value="{{\App\Models\Personnel::Tahsilat_Karshenasi}}">کارشناسی</option>
                                    <option value="{{\App\Models\Personnel::Tahsilat_KarshenasiArshad}}">کارشناسی ارشد
                                    </option>
                                    <option value="{{\App\Models\Personnel::Tahsilat_Doctora}}">دکترا</option>
                                    <option value="{{\App\Models\Personnel::Tahsilat_FoghDoctora}}">فوق دکترا</option>
                                </select>
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="education_field">رشته تحصیلی
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="education_field" name="info[education_field]" Lang="fa-IR"
                                       value="{{ old('education_field') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('education_field'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('education_field')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="job">شغل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="job" name="info[job]" Lang="fa-IR" value="{{ old('job') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('job'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('job')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="marital_status">وضعیت تاهل
                            </label>
                            <label>
                                <select name="info[marital_status]" class="col-md-12">
                                    <option selected disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\Personnel::Martial_Single}}">مجرد</option>
                                    <option value="{{\App\Models\Personnel::Martial_Married}}">متاهل</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="home_number">تلفن منزل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="home_number" name="info[home_number]" Lang="fa-IR"
                                       value="{{ old('home_number') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('home_number'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('home_number')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="mobile_number">تلفن همراه
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="mobile_number" name="info[mobile_number]" Lang="fa-IR"
                                       value="{{ old('mobile_number') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('mobile_number'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('mobile_number')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="email">پست الکترونیک
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="email" name="info[email]" Lang="fa-IR" value="{{ old('email') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('email'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('email')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="bank_number"> شماره حساب بانک سپه
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="bank_number" name="info[bank_number]" Lang="fa-IR"
                                       value="{{ old('bank_number') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('bank_number'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('bank_number')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="card_number">شماره کارت
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="card_number" name="info[card_number]" Lang="fa-IR"
                                       value="{{ old('card_number') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('card_number'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('card_number')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="shomare_personel">شماره پرسنلی
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="shomare_personel" name="info[shomare_personel]" Lang="fa-IR"
                                       value="{{ old('shomare_personel') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('shomare_personel'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('shomare_personel')}}</h5>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="daryafti">جمع دریافتی به ریال
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="daryafti" name="info[daryafti]" Lang="fa-IR" value="{{ old('daryafti') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('daryafti'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('daryafti')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="makhaz">ماخذ
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="makhaz" name="info[makhaz]" Lang="fa-IR"
                                       value="{{ old('makhaz') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('makhaz'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('makhaz')}}</h5>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 ">وضعیت اشتغال<span
                                    class="required">*</span></label>
                            <label>
                                <select name="info[eshteghal]" class="col-md-12">
                                    <option selected disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\Personnel::Eshteghal_Nezami_Shaghel}}">نظامی - شاغل
                                    </option>
                                    <option value="{{\App\Models\Personnel::Eshteghal_Nezami_Bazneshaste}}">نظامی -
                                        بازنشسته
                                    </option>
                                    <option value="{{\App\Models\Personnel::Eshteghal_Nokhbe}}">نخبه/پژوهشگر</option>
                                </select>
                            </label>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 ">عضو هیات علمی<span
                                    class="required">*</span></label>
                            <div>
                                <div class="col-md-1 col-sm-1 ">

                                    <select name="info[is_heyat_elmi]" class="col-md-12">
                                        <option selected disabled>انتخاب کنید</option>
                                        <option value="0">خیر</option>
                                        <option value="1">بلی</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 "></div>

                                <label class="control-label col-md-2 col-sm-2 " for="university">دانشگاه/پژوهشگاه
                                </label>
                                <div class="col-md-4 col-sm-4 ">
                                    <input type="text" id="university" name="info[university]" Lang="fa-IR"
                                           value="{{ old('university') }}"
                                           class="form-control col-md-7 ">
                                    @if($errors->has('university'))
                                        <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                            {{$errors->first('university')}}</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="daraje_elmi">درجه علمی
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="daraje_elmi" name="info[daraje_elmi]" Lang="fa-IR"
                                       value="{{ old('daraje_elmi') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('daraje_elmi'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('daraje_elmi')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="hoze_motaleati">حوزه‌های
                                مطالعاتی
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="hoze_motaleati" name="info[hoze_motaleati]" Lang="fa-IR"
                                       value="{{ old('hoze_motaleati') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('hoze_motaleati'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('hoze_motaleati')}}</h5>
                                @endif
                            </div>
                        </div>

                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 ">نحوه آشنایی با مرکز<span
                                    class="required">*</span></label>
                            <label>
                                <select name="info[nahve_ashnayi]" class="col-md-12">
                                    <option value=0 selected disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\Personnel::Ashnayi_Hamkaran}}">از طریق همکاران یا
                                        دوستان
                                    </option>
                                    <option value="{{\App\Models\Personnel::Ashnayi_Poster}}">پوستر مرکز نگاه دو
                                    </option>
                                    <option value="{{\App\Models\Personnel::Ashnayi_Shabake}}">شبکه های اجتماعی
                                    </option>
                                    <option value="{{\App\Models\Personnel::Ashnayi_Sazman}}">سازمانی</option>
                                </select>
                            </label>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="home_address">آدرس منزل
                            </label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" id="home_address" name="info[home_address]" Lang="fa-IR"
                                       value="{{ old('home_address') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('home_address'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('home_address')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-2" for="office_address">آدرس محل
                                کار
                            </label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" id="office_address" name="info[office_address]" Lang="fa-IR"
                                       value="{{ old('office_address') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('office_address'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('office_address')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="control-label col-md-2 col-sm-2 " for="office_number">شماره محل
                                کار
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="office_number" name="info[office_number]" Lang="fa-IR"
                                       value="{{ old('office_number') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('office_number'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('office_number')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="office_number">نوع همکاری
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="hamkari" name="info[hamkari]" Lang="fa-IR"
                                       value="{{ old('hamkari') }}"
                                       class="form-control col-md-7 "
                                       placeholder="طرح یا همکار پژوهشی یا سایر"
                                >
                                @if($errors->has('hamkari'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('hamkari')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="office_number">رزومه
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="resume" name="file[resume]" Lang="fa-IR"
                                       value="{{ old('resume') }}"
                                       class="form-control col-md-7 "
                                >
                                @if($errors->has('resume'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('resume')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="profile_pic">عکس
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="profile_pic" name="file[profile_pic]" Lang="fa-IR"
                                       value="{{ old('profile_pic') }}"
                                       class="form-control col-md-7 "
                                >
                                @if($errors->has('profile_pic'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('profile_pic')}}</h5>
                                @endif
                            </div>
                        </div>
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
