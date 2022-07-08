<div class="row">
    <h4>مشخصات کلی</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="info[shomare]">شماره جلسه
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="shomare" name="info[shomare]" Lang="fa-IR"
                   value="{{ $new ? old('shomare') : $session->shomare ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('shomare'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('shomare')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="info[mozoo]">موضوع جلسه
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="mozoo" name="info[mozoo]" Lang="fa-IR"
                   value="{{ $new ? old('mozoo') : $session->mozoo ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('mozoo'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('mozoo')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="info[tarikh]">تاریخ جلسه
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tarikh" name="info[tarikh]" Lang="fa-IR"
                   value="{{ $new ? old('tarikh') : $session->tarikh ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('tarikh'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tarikh')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="info[duration]">مدت زمان جلسه(دقیقه)
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="duration" name="info[duration]" Lang="fa-IR"
                   value="{{ $new ? old('duration') : $session->duration ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('duration'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('duration')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="info[raees_miz]">رییس میز
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="raees_miz" name="info[raees_miz]" Lang="fa-IR"
                   value="{{ $new ? old('raees_miz') : $session->raees_miz ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('raees_miz'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('raees_miz')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="info[dabir_miz]">دبیر میز
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="dabir_miz" name="info[dabir_miz]" Lang="fa-IR"
                   value="{{ $new ? old('dabir_miz') : $session->dabir_miz ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('dabir_miz'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('dabir_miz')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="info[tarikh_gozaresh_be_masool]">تاریخ گزارش به
            مدیر مسیول
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tarikh_gozaresh_be_masool" name="info[tarikh_gozaresh_be_masool]" Lang="fa-IR"
                   value="{{ $new ? old('tarikh_gozaresh_be_masool') : $session->tarikh_gozaresh_be_masool ?? '' }}"
                   class="form-control col-md-7   date-it-is">
            @if($errors->has('tarikh_gozaresh_be_masool'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tarikh_gozaresh_be_masool')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="info[tarikh_enteshar]">تاریخ انتشار
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tarikh_enteshar" name="info[tarikh_enteshar]" Lang="fa-IR"
                   value="{{ $new ? old('tarikh_enteshar') : $session->tarikh_enteshar ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('tarikh_enteshar'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tarikh_enteshar')}}</h5>
            @endif
        </div>
    </div>
</div>
