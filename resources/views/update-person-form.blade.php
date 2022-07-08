@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>مشاهده اطلاعات {{$person->name}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" action="{{route('update-personnel-info', ['personId' => $person->id])}}"
                          data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
                        <div class="form-group col-md-8">
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 " for="name">نام و نام خانوادگی
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="name" name="info[name]" Lang="fa-IR"
                                           value="{{ $person->name }}"
                                           class="form-control col-md-7 ">
                                    @if($errors->has('name'))
                                        <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                            {{$errors->first('name')}}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 " for="education_level">میزان
                                    تحصیلات
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="info[education_level]" class="col-md-12">
                                        <option
                                            @if($person->education_level ==\App\Models\Personnel::Tahsilat_Diplom )  selected
                                            @endif  value="{{\App\Models\Personnel::Tahsilat_Diplom}}">دیپلم
                                        </option>
                                        <option
                                            @if($person->education_level ==\App\Models\Personnel::Tahsilat_Karshenasi )  selected
                                            @endif value="{{\App\Models\Personnel::Tahsilat_Karshenasi}}">کارشناسی
                                        </option>
                                        <option
                                            @if($person->education_level ==\App\Models\Personnel::Tahsilat_KarshenasiArshad )  selected
                                            @endif value="{{\App\Models\Personnel::Tahsilat_KarshenasiArshad}}">کارشناسی
                                            ارشد
                                        </option>
                                        <option
                                            @if($person->education_level ==\App\Models\Personnel::Tahsilat_Doctora )  selected
                                            @endif value="{{\App\Models\Personnel::Tahsilat_Doctora}}">دکترا
                                        </option>
                                        <option
                                            @if($person->education_level ==\App\Models\Personnel::Tahsilat_FoghDoctora )  selected
                                            @endif value="{{\App\Models\Personnel::Tahsilat_FoghDoctora}}">فوق دکترا
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 " for="office_number">نوع همکاری
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="hamkari" name="info[hamkari]" Lang="fa-IR"
                                           value="{{ $person->hamkari }}"
                                           class="form-control col-md-7 "
                                           placeholder="طرح یا همکار پژوهشی یا سایر"
                                    >
                                    @if($errors->has('hamkari'))
                                        <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                            {{$errors->first('hamkari')}}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">وضعیت اشتغال<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="info[eshteghal]" class="col-md-12">
                                        <option value=0>انتخاب کنید</option>
                                        <option
                                            @if($person->eshteghal == \App\Models\Personnel::Eshteghal_Nezami_Shaghel) selected
                                            @endif value="{{\App\Models\Personnel::Eshteghal_Nezami_Shaghel}}">نظامی -
                                            شاغل
                                        </option>
                                        <option
                                            @if($person->eshteghal == \App\Models\Personnel::Eshteghal_Nezami_Bazneshaste) selected
                                            @endif value="{{\App\Models\Personnel::Eshteghal_Nezami_Bazneshaste}}">نظامی
                                            -
                                            بازنشسته
                                        </option>
                                        <option
                                            @if($person->eshteghal == \App\Models\Personnel::Eshteghal_Nokhbe) selected
                                            @endif value="{{\App\Models\Personnel::Eshteghal_Nokhbe}}">نخبه/پژوهشگر
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 " for="mobile_number">تلفن همراه
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="mobile_number" name="info[mobile_number]" Lang="fa-IR"
                                           value="{{ $person->mobile_number }}"
                                           class="form-control col-md-7 ">
                                    @if($errors->has('mobile_number'))
                                        <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                            {{$errors->first('mobile_number')}}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3 col-sm-3 ">وضعیت<span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select name="info[status]" class="col-md-12">
                                        <option value=0>انتخاب کنید</option>
                                        <option
                                            @if($person->status == \App\Models\Personnel::Status_Active) selected
                                            @endif value="{{\App\Models\Personnel::Status_Active}}">فعال
                                        </option>
                                        <option
                                            @if($person->status == \App\Models\Personnel::Status_Inactive) selected
                                            @endif value="{{\App\Models\Personnel::Status_Inactive}}">غیر فعال
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-55">
                            <div class="">
                                <div class="image view view-first">
                                    <img style="width: 100%; display: block;"
                                         src="{{$person->profile_pic ?? asset('admin/build/images/default_picture.png')}}"
                                         alt="عکس پرسنلی">
                                    <div class="mask">
                                        <p>عکس پرسنلی</p>
                                        <div class="tools tools-bottom">
                                            <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="caption">
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label">ویرایش عکس</label>
                                        <input class="form-control form-control-sm" id="formFileSm"
                                               name="file[profile_pic]" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group"></div>
                        <div class="ln_solid"></div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="parent_name">نام پدر
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="parent_name" name="info[parent_name]" Lang="fa-IR"
                                       value="{{ $person->parent_name }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('parent_name'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('parent_name')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="education_field">رشته تحصیلی
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="education_field" name="info[education_field]" Lang="fa-IR"
                                       value="{{ $person->education_field }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('education_field'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('education_field')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="birthday">تاریخ تولد
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="birthday" name="info[birthday]" Lang="fa-IR"
                                       value="{{ $person->birthday }}"
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
                                       value="{{ $person->birth_place }}"
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
                                       value="{{ $person->national_code }}"
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
                                       value="{{ $person->residence_city }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('residence_city'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('residence_city')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="job">شغل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="job" name="info[job]" Lang="fa-IR" value="{{ $person->job }}"
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
                                    <option
                                        @if($person->marital_status == \App\Models\Personnel::Martial_Single) selected
                                        @endif value="{{\App\Models\Personnel::Martial_Single}}">مجرد
                                    </option>
                                    <option
                                        @if($person->marital_status == \App\Models\Personnel::Martial_Married) selected
                                        @endif value="{{\App\Models\Personnel::Martial_Married}}">متاهل
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="home_number">تلفن منزل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="home_number" name="info[home_number]" Lang="fa-IR"
                                       value="{{ $person->home_number }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('home_number'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('home_number')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="email">پست الکترونیک
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="email" name="info[email]" Lang="fa-IR"
                                       value="{{ $person->email }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('email'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('email')}}</h5>
                                @endif
                            </div>

                            <label class="control-label col-md-2 col-sm-2 " for="bank_number">شماره حساب بانک
                                سپه
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="bank_number" name="info[bank_number]" Lang="fa-IR"
                                       value="{{ $person->bank_number }}"
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
                                       value="{{ $person->card_number }}"
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
                                       value="{{ $person->shomare_personel }}"
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
                                <input type="text" id="daryafti" name="info[daryafti]" Lang="fa-IR"
                                       value="{{ $person->daryafti }}"
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
                                       value="{{ $person->makhaz }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('makhaz'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('makhaz')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="resume">رزومه
                            </label>
                            @if ($person->resume_link ?? false)
                                <a target="_blank"
                                   class="btn btn-success"
                                   href="{{route('personnel.download-resume', ['person' => $person->id])}}">مشاهده
                                    رزومه</a>
                            @endif
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

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 ">عضو هیات علمی<span
                                    class="required">*</span></label>
                            <div>
                                <div class="col-md-1 col-sm-1 ">

                                    <select name="info[is_heyat_elmi]" class="col-md-12">
                                        <option @if($person->is_heyat_elmi == 0) selected @endif  value="0">خیر</option>
                                        <option @if($person->is_heyat_elmi == 1) selected @endif value="1">بلی</option>
                                    </select>
                                </div>
                                <div class="col-md-3 col-sm-3 "></div>

                                <label class="control-label col-md-2 col-sm-2 " for="university">دانشگاه/پژوهشگاه
                                </label>
                                <div class="col-md-4 col-sm-4 ">
                                    <input type="text" id="university" name="info[university]" Lang="fa-IR"
                                           value="{{ $person->university }}"
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
                                       value="{{ $person->daraje_elmi }}"
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
                                       value="{{ $person->hoze_motaleati }}"
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
                                    <option value=0 selected>انتخاب کنید</option>
                                    <option
                                        @if($person->nahve_ashnayi == \App\Models\Personnel::Ashnayi_Hamkaran) selected
                                        @endif value="{{\App\Models\Personnel::Ashnayi_Hamkaran}}">از طریق همکاران
                                        یا
                                        دوستان
                                    </option>
                                    <option
                                        @if($person->nahve_ashnayi == \App\Models\Personnel::Ashnayi_Poster) selected
                                        @endif value="{{\App\Models\Personnel::Ashnayi_Poster}}">پوستر مرکز مطالعات
                                    </option>
                                    <option
                                        @if($person->nahve_ashnayi == \App\Models\Personnel::Ashnayi_Shabake) selected
                                        @endif value="{{\App\Models\Personnel::Ashnayi_Shabake}}">شبکه های اجتماعی
                                    </option>
                                    <option
                                        @if($person->nahve_ashnayi == \App\Models\Personnel::Ashnayi_Sazman) selected
                                        @endif value="{{\App\Models\Personnel::Ashnayi_Sazman}}">سازمانی
                                    </option>
                                </select>
                            </label>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="home_address">آدرس منزل
                            </label>
                            <div class="col-md-10 col-sm-10 ">
                                <input type="text" id="home_address" name="info[home_address]" Lang="fa-IR"
                                       value="{{ $person->home_address }}"
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
                                       value="{{ $person->office_address }}"
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
                                       value="{{ $person->office_number }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('office_number'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('office_number')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>سوابق پژوهشی و کاری</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>محل</th>
                                            <th>از</th>
                                            <th>تا</th>
                                            <th>شرح</th>
                                            <th>نوع</th>
                                            <th>مشاهده فایل‌</th>
                                            {{--                                            <th>ویرایش</th>--}}
                                            <th>حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($person->jobs as $job)
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>{{$job->place}}</td>
                                                <td>{{$job->from}}</td>
                                                <td>{{$job->to}}</td>
                                                <td>{{$job->description}}</td>
                                                <td>{{$job->type}}</td>
                                                <td>
                                                    @if($job->link)
                                                        <a href="{{route('jobs.download', ['job' => $job->id])}}">مشاهده</a>
                                                    @else
                                                        ندارد
                                                    @endif
                                                </td>
                                                {{--                                                <td>ویرایش</td>--}}
                                                <td><a href="{{route('jobs.delete', ['job' => $job->id])}}">حذف</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bs-example-modal-lg">اضافه کردن
                            </button>

                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>مدارک تحصیلی و دوره‌های طی شده</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>عنوان</th>
                                            <th>مشاهده</th>
                                            <th>حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($person->documents ?? [] as $document)
                                            <tr>
                                                <td>{{$document->title}}</td>
                                                <td>
                                                    <a href="{{route('documents.download', ['document' => $document->id])}}">مشاهده</a>
                                                </td>
                                                <td>
                                                    <a href="{{route('documents.delete', ['document' => $document->id])}}">حذف</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bs-example-modal-lg2">اضافه کردن
                            </button>

                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>زبان‌های خارجی</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>زبان</th>
{{--                                            <th>مدرک</th>--}}
                                            <th>خواندن</th>
                                            <th>نوشتن</th>
                                            <th>گفتار</th>
                                            <th>شنوایی</th>
                                            <th>حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($person->languages as $language)
                                            <tr>
                                                <td>{{$language->language}}</td>
{{--                                                <td>{{$language->license}}</td>--}}
                                                <td>{{$language->reading}}</td>
                                                <td>{{$language->writing}}</td>
                                                <td>{{$language->speaking}}</td>
                                                <td>{{$language->listening}}</td>
                                                <td>
                                                    <a href="{{route('personnel.language.delete', ['language' => $language->id])}}">حذف</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bs-example-modal-lg-foreign">اضافه کردن
                            </button>

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
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <form method="post" action="{{route('jobs.add', ['person' => $person->id])}}" enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن سابقه کاری/پژوهشی</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="place">محل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="place" name="addJob[place]" Lang="fa-IR"
                                       value="{{ old('place') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('place'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('place')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="type">نوع
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="type" name="addJob[type]" Lang="fa-IR" value="{{ old('type') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('type'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('type')}}</h5>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="from">از
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="from" name="addJob[from]" Lang="fa-IR" value="{{ old('from') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('from'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('from')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="to">تا
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="to" name="addJob[to]" Lang="fa-IR" value="{{ old('to') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('to'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('to')}}</h5>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="description">شرح
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="description" name="addJob[description]" Lang="fa-IR"
                                       value="{{ old('description') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('description'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('description')}}</h5>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="file">فایل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="jobfile" name="addJobFiles[file]" Lang="fa-IR"
                                       value="{{ old('file') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('file'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('file')}}</h5>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">اعمال</button>
                    </div>

                </div>
            </div>
        </form>

    </div>
    <div class="modal fade bs-example-modal-lg2" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <form method="post" action="{{route('documents.add', ['person' => $person->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن مدرک</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="place">عنوان
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="title" name="addDocument[title]" Lang="fa-IR"
                                       value="{{ old('title') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('title'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('title')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="file">مدرک
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="file" name="addDocumentFiles[file]" Lang="fa-IR"
                                       value="{{ old('file') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('file'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('file')}}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">اعمال</button>
                    </div>

                </div>
            </div>
        </form>

    </div>
    <div class="modal fade bs-example-modal-lg-foreign" tabindex="-1" role="dialog" style="display: none;"
         aria-hidden="true">
        <form method="post" action="{{route('personnel.language.add', ['person' => $person->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن زبان</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="place">زبان
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="language" name="addLanguage[language]" Lang="fa-IR"
                                       value="{{ old('language') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('language'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('language')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="place">مدرک
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="license" name="addLanguage[license]" Lang="fa-IR"
                                       value="{{ old('license') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('license'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('license')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 ">مهارت خواندن<span
                                    class="required">*</span></label>
                            <div class="col-md-4 col-sm-4 ">
                                <select name="addLanguage[reading]" class="col-md-12">
                                    <option disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Zaeef}}">ضعیف</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Motevasset}}">متوسط</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Khoob}}">خوب</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Awli}}">عالی</option>
                                </select>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 ">مهارت شنیداری<span
                                    class="required">*</span></label>
                            <div class="col-md-4 col-sm-4 ">
                                <select name="addLanguage[listening]" class="col-md-12">
                                    <option disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Zaeef}}">ضعیف</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Motevasset}}">متوسط</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Khoob}}">خوب</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Awli}}">عالی</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 ">مهارت نوشتاری<span
                                    class="required">*</span></label>
                            <div class="col-md-4 col-sm-4 ">
                                <select name="addLanguage[writing]" class="col-md-12">
                                    <option disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Zaeef}}">ضعیف</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Motevasset}}">متوسط</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Khoob}}">خوب</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Awli}}">عالی</option>
                                </select>
                            </div>
                            <label class="control-label col-md-2 col-sm-2 ">مهارت گفتاری - مکالمه<span
                                    class="required">*</span></label>
                            <div class="col-md-4 col-sm-4 ">
                                <select name="addLanguage[speaking]" class="col-md-12">
                                    <option disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Zaeef}}">ضعیف</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Motevasset}}">متوسط</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Khoob}}">خوب</option>
                                    <option value="{{\App\Models\ForeignLanguage::State_Awli}}">عالی</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">اعمال</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
@endsection
