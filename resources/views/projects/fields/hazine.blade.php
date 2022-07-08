<div class="row hazine">
    <h4>هزینه‌ی مجری</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="hazine_nazer_1"> هزینه‌ی ناظر ۱
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_nazer_1" name="info[hazine_nazer_1]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_nazer_1') : $project->hazine_nazer_1 ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_nazer_1'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_nazer_1')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="hazine_nazer_2">هزینه‌ی ناظر دو
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_nazer_2" name="info[hazine_nazer_2]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_nazer_2') : $project->hazine_nazer_2 ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_nazer_2'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_nazer_2')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="hazine_nazer_3">  هزینه‌ی ناظر ۳
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_nazer_3" name="info[hazine_nazer_3]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_nazer_3') : $project->hazine_nazer_3 ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_nazer_3'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_nazer_3')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="hazine_davar_1">هزینه‌ی داور ۱
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_davar_1" name="info[hazine_davar_1]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_davar_1') : $project->hazine_davar_1 ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_davar_1'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_davar_1')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="hazine_davar_2">هزینه‌ی داور دو
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_davar_2" name="info[hazine_davar_2]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_davar_2') : $project->hazine_davar_2 ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_davar_2'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_davar_2')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="hazine_davar_3">هزینه‌ی داور ۳
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_davar_3" name="info[hazine_davar_3]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_davar_3') : $project->hazine_davar_3 ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_davar_3'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_davar_3')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="hazine_moshaver">هزینه‌ی مشاور
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_moshaver" name="info[hazine_moshaver]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_moshaver') : $project->hazine_moshaver ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_moshaver'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_moshaver')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="hazine_kol_gharardad">مبلغ کل قرارداد
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hazine_kol_gharardad" name="info[hazine_kol_gharardad]" Lang="fa-IR"
                   value="{{ $new ? old('hazine_kol_gharardad') : $project->hazine_kol_gharardad ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hazine_kol_gharardad'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hazine_kol_gharardad')}}</h5>
            @endif
        </div>
    </div>
</div>
