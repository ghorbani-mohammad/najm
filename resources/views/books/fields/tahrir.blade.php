<div class="row">
    <h4>مشخصات هیات تحریریه</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="tahrir_moallef">مؤلف
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahrir_moallef" name="info[tahrir_moallef]" Lang="fa-IR"
                   value="{{ $new ? old('tahrir_moallef'): $book->tahrir_moallef ?? ''}}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahrir_moallef'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahrir_moallef')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="tahrir_nazer_ali">ناظر عالی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahrir_nazer_ali" name="info[tahrir_nazer_ali]" Lang="fa-IR"
                   value="{{ $new ? old('tahrir_nazer_ali'): $book->tahrir_nazer_ali ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahrir_nazer_ali'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahrir_nazer_ali')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="tahrir_nazer_elmi">ناظر علمی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahrir_nazer_elmi" name="info[tahrir_nazer_elmi]" Lang="fa-IR"
                   value="{{ $new ? old('tahrir_nazer_elmi'): $book->tahrir_nazer_elmi ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahrir_nazer_elmi'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahrir_nazer_elmi')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="tahrir_nazer_fanni">ناظر فنی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahrir_nazer_fanni" name="info[tahrir_nazer_fanni]" Lang="fa-IR"
                   value="{{ $new ? old('tahrir_nazer_fanni'): $book->tahrir_nazer_fanni ?? ''}}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahrir_nazer_fanni'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahrir_nazer_fanni')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="tahrir_virastar">داور علمی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahrir_virastar" name="info[tahrir_virastar]" Lang="fa-IR"
                   value="{{ $new ? old('tahrir_virastar'): $book->tahrir_virastar ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahrir_virastar'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahrir_virastar')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="tahrir_nemoone_khan">ویراستار
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahrir_nemoone_khan" name="info[tahrir_nemoone_khan]" Lang="fa-IR"
                   value="{{ $new ? old('tahrir_nemoone_khan'): $book->tahrir_nemoone_khan ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahrir_nemoone_khan'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahrir_nemoone_khan')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="tahrir_type_safhe_arayi">نمونه خوان
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahrir_type_safhe_arayi" name="info[tahrir_type_safhe_arayi]" Lang="fa-IR"
                   value="{{ $new ? old('tahrir_type_safhe_arayi'): $book->tahrir_type_safhe_arayi ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahrir_type_safhe_arayi'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahrir_type_safhe_arayi')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="tahrir_tarrah_jeld">تایپ و صحفه آرایی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahrir_tarrah_jeld" name="info[tahrir_tarrah_jeld]" Lang="fa-IR"
                   value="{{ $new ? old('tahrir_tarrah_jeld'): $book->tahrir_tarrah_jeld ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahrir_tarrah_jeld'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahrir_tarrah_jeld')}}</h5>
            @endif
        </div>
    </div>
</div>
