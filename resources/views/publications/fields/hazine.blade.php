<div class="row">
    <h4>هزینه‌های مالی</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="hazine_maghalat_label" for="hazine_maghalat">حق الزحمه مقالات
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_maghalat" name="info[hazine_maghalat]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_maghalat') : $publication->hazine_maghalat ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_maghalat'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_maghalat')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="hazine_type_label" for="hazine_type">حق الزحمه تایپ
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_type" name="info[hazine_type]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_type') : $publication->hazine_type ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_type'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_type')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="hazine_safhe_arayi_label" for="hazine_safhe_arayi">حق الزحمه صفحه آرایی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_safhe_arayi" name="info[hazine_safhe_arayi]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_safhe_arayi') : $publication->hazine_safhe_arayi ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_safhe_arayi'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_safhe_arayi')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="hazine_tarahi_jeld_label" for="hazine_tarahi_jeld">حق الزحمه طراحی جلد
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_tarahi_jeld" name="info[hazine_tarahi_jeld]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_tarahi_jeld') : $publication->hazine_tarahi_jeld ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_tarahi_jeld'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_tarahi_jeld')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="hazine_davaran_label" for="hazine_davaran">حق الزحمه داوران
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_davaran" name="info[hazine_davaran]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_davaran') : $publication->hazine_davaran ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_davaran'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_davaran')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="hazine_nezarat_fani_label" for="hazine_nezarat_fani">حق الزحمه نظارت فنی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_nezarat_fani" name="info[hazine_nezarat_fani]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_nezarat_fani') : $publication->hazine_nezarat_fani ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_nezarat_fani'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_nezarat_fani')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="hazine_nezarat_adabi_label" for="hazine_nezarat_adabi">حق الزحمه نظارت ادبی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_nezarat_adabi" name="info[hazine_nezarat_adabi]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_nezarat_adabi') : $publication->hazine_nezarat_adabi ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_nezarat_adabi'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_nezarat_adabi')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="hazine_chap_label" for="hazine_chap">هزینه چاپ
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_chap" name="info[hazine_chap]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_chap') : $publication->hazine_chap ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_chap'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_chap')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="hazine_manabe_mostanadat_label" for="hazine_manabe_mostanadat">هزینه منابع و مستندات
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_manabe_mostanadat" name="info[hazine_manabe_mostanadat]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_manabe_mostanadat') : $publication->hazine_manabe_mostanadat ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_manabe_mostanadat'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_manabe_mostanadat')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="hazine_moshavere_label" for="hazine_moshavere">حق الزحمه مشاوره
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_moshavere" name="info[hazine_moshavere]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_moshavere') : $publication->hazine_moshavere ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_moshavere'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_moshavere')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="hazine_elsagh_ghardad_label" for="hazine_elsagh_ghardad">هزینه الصاق قرارداد‌های مربوطه
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_elsagh_ghardad" name="info[hazine_elsagh_ghardad]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_elsagh_ghardad') : $publication->hazine_elsagh_ghardad ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_elsagh_ghardad'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_elsagh_ghardad')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="hazine_majmooe_label" for="hazine_majmooe">مجموع هزینه‌ها
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_majmooe" name="info[hazine_majmooe]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_majmooe') : $publication->hazine_majmooe ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_majmooe'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_majmooe')}}</h5>
            @endif
        </div>
    </div>
</div>
