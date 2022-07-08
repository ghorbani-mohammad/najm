<div class="row">
    <h4>انتشار</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikh">تاریخ انتشار
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikh" name="info[enteshar_tarikh]" Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikh') : $book->enteshar_tarikh ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikh'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikh')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikhe_shoroo_hamkari">تاریخ شروع همکاری
            مولف
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikhe_shoroo_hamkari" name="info[enteshar_tarikhe_shoroo_hamkari]"
                   Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikhe_shoroo_hamkari') : $book->enteshar_tarikhe_shoroo_hamkari ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikhe_shoroo_hamkari'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikhe_shoroo_hamkari')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikhe_etmam_hamkari">تاریخ اتمام همکاری
            مولف
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikhe_etmam_hamkari" name="info[enteshar_tarikhe_etmam_hamkari]"
                   Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikhe_etmam_hamkari') : $book->enteshar_tarikhe_etmam_hamkari ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikhe_etmam_hamkari'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikhe_etmam_hamkari')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikhe_ersal_be_davari">تاریخ ارسال به
            داوری
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikhe_ersal_be_davari" name="info[enteshar_tarikhe_ersal_be_davari]"
                   Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikhe_ersal_be_davari') : $book->enteshar_tarikhe_ersal_be_davari ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikhe_ersal_be_davari'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikhe_ersal_be_davari')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
{{--todo        <label class="control-label col-md-2 col-sm-2 " for="natije_davari">نتیجه داوری--}}
{{--        </label>--}}
{{--        <div class="col-md-4 col-sm-4 ">--}}
{{--            <input type="text" id="natije_davari" name="info[natije_davari]" Lang="fa-IR"--}}
{{--                   value="{{ $new ? old('natije_davari') : $book->natije_davari ?? '' }}"--}}
{{--                   class="form-control col-md-7 ">--}}
{{--            @if($errors->has('natije_davari'))--}}
{{--                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">--}}
{{--                    {{$errors->first('natije_davari')}}</h5>--}}
{{--            @endif--}}
{{--        </div>--}}
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikhe_ersal_be_virastyar">تاریخ ارسال
            به ویراستار علمی و ادبی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikhe_ersal_be_virastyar" name="info[enteshar_tarikhe_ersal_be_virastyar]"
                   Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikhe_ersal_be_virastyar') : $book->enteshar_tarikhe_ersal_be_virastyar ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikhe_ersal_be_virastyar'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikhe_ersal_be_virastyar')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikhe_daryaft_salahiat_amniati">تاریخ
            دریافت صلاحیت امنیتی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikhe_daryaft_salahiat_amniati"
                   name="info[enteshar_tarikhe_daryaft_salahiat_amniati]" Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikhe_daryaft_salahiat_amniati') : $book->enteshar_tarikhe_daryaft_salahiat_amniati ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikhe_daryaft_salahiat_amniati'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikhe_daryaft_salahiat_amniati')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikhe_ersal_entesharat">تاریخ ارسال
            انتشارات
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikhe_ersal_entesharat" name="info[enteshar_tarikhe_ersal_entesharat]"
                   Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikhe_ersal_entesharat') : $book->enteshar_tarikhe_ersal_entesharat ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikhe_ersal_entesharat'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikhe_ersal_entesharat')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikhe_daryaft_shabak">تاریخ دریافت شابک
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikhe_daryaft_shabak" name="info[enteshar_tarikhe_daryaft_shabak]"
                   Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikhe_daryaft_shabak') : $book->enteshar_tarikhe_daryaft_shabak ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikhe_daryaft_shabak'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikhe_daryaft_shabak')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="enteshar_tarikhe_daryaft_fipa">تاریخ دریافت فیپا
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="enteshar_tarikhe_daryaft_fipa" name="info[enteshar_tarikhe_daryaft_fipa]"
                   Lang="fa-IR"
                   value="{{ $new ? old('enteshar_tarikhe_daryaft_fipa') : $book->enteshar_tarikhe_daryaft_fipa ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('enteshar_tarikhe_daryaft_fipa'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('enteshar_tarikhe_daryaft_fipa')}}</h5>
            @endif
        </div>
    </div>
</div>
