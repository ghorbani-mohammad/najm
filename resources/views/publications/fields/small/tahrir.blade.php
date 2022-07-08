<div class="row">
    <h4>مشخصات هیات تحریریه</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_sardabir_label" for="heyat_sardabir">سردبیر
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_sardabir" name="info[heyat_sardabir]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_sardabir') : $publication->heyat_sardabir ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_sardabir'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_sardabir')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_modir_masool_label" for="heyat_modir_masool">مدیر
            مسئول
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_modir_masool" name="info[heyat_modir_masool]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_modir_masool') : $publication->heyat_modir_masool ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_modir_masool'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_modir_masool')}}</h5>
            @endif
        </div>
        @if(in_array($publication->type, []))
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_nazer_ali_label" for="heyat_nazer_ali">ناظر
            عالی
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_nazer_ali" name="info[heyat_nazer_ali]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_nazer_ali') : $publication->heyat_nazer_ali ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_nazer_ali'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_nazer_ali')}}</h5>
            @endif
        </div>
        @endif
        @if(in_array($publication->type, [\App\Models\Publication::GahName_Negahe2, \App\Models\Publication::GahName_DideBan]))
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_nazer_elmi_label" for="heyat_nazer_elmi">ناظر
            علمی
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_nazer_elmi" name="info[heyat_nazer_elmi]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_nazer_elmi') : $publication->heyat_nazer_elmi ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_nazer_elmi'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_nazer_elmi')}}</h5>
            @endif
        </div>
        @endif
    </div>
    <div class="form-group">
        @if(in_array($publication->type, [\App\Models\Publication::GahName_DideBan]))
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_nazer_fani_label" for="heyat_nazer_fani">ناظر
            فنی
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_nazer_fani" name="info[heyat_nazer_fani]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_nazer_fani') : $publication->heyat_nazer_fani ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_nazer_fani'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_nazer_fani')}}</h5>
            @endif
        </div>
        @endif
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_modir_ejrayi_label" for="heyat_modir_ejrayi">مدیر
            اجرایی
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_modir_ejrayi" name="info[heyat_modir_ejrayi]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_modir_ejrayi') : $publication->heyat_modir_ejrayi ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_modir_ejrayi'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_modir_ejrayi')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_tarrahe_jeld_label" for="heyat_tarrahe_jeld">طراح
            جلد
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_tarrahe_jeld" name="info[heyat_tarrahe_jeld]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_tarrahe_jeld') : $publication->heyat_tarrahe_jeld ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_tarrahe_jeld'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_tarrahe_jeld')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_virastar_elmi_label"
               for="heyat_virastar_elmi">ویراستار علمی
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_virastar_elmi" name="info[heyat_virastar_elmi]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_virastar_elmi') : $publication->heyat_virastar_elmi ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_virastar_elmi'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_virastar_elmi')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_virastar_adabi_label"
               for="heyat_virastar_adabi">ویراستار ادبی
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_virastar_adabi" name="info[heyat_virastar_adabi]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_virastar_adabi') : $publication->heyat_virastar_adabi ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_virastar_adabi'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_virastar_adabi')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-1 col-sm-1 col-xs-1" id="heyat_nemoone_khan_label" for="heyat_nemoone_khan">نمونه‌خوان
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="heyat_nemoone_khan" name="info[heyat_nemoone_khan]" Lang="fa-IR"
                   value="{{ $new ? old('heyat_nemoone_khan') : $publication->heyat_nemoone_khan ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('heyat_nemoone_khan'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('heyat_nemoone_khan')}}</h5>
            @endif
        </div>

        <label class="control-label col-md-1 col-sm-1 " id="tahie_konande" for="tahie_konande">مولف/مترجم
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="tahie_konande" name="info[tahie_konande]" Lang="fa-IR"
                   value="{{ $new ? old('tahie_konande') : $publication->tahie_konande ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahie_konande'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahie_konande')}}</h5>
            @endif
        </div>
    </div>
</div>
