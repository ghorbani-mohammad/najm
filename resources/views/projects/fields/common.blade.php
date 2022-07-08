<div class="row">
    <h4>مشخصات</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="name">عنوان پروژه
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="name" name="info[name]" Lang="fa-IR"
                   value="{{ $new ? old('name') : $project->name ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('name'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('name')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="mojri">مجری
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="mojri" name="info[mojri]" Lang="fa-IR"
                   value="{{ $new ? old('mojri') : $project->mojri ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('mojri'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('mojri')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="rahnama">استاد راهنما
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="rahnama" name="info[rahnama]" Lang="fa-IR"
                   value="{{ $new ? old('rahnama') : $project->rahnama ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('rahnama'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('rahnama')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="moshaver">استاد مشاور
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="moshaver" name="info[moshaver]" Lang="fa-IR"
                   value="{{ $new ? old('moshaver') : $project->moshaver ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('moshaver'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('moshaver')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="mizan_kasri">میزان کسری
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="mizan_kasri" name="info[mizan_kasri]" Lang="fa-IR"
                   value="{{ $new ? old('mizan_kasri') : $project->mizan_kasri ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('mizan_kasri'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('mizan_kasri')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="start_date">تاریخ شروع
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="start_date" name="info[start_date]" Lang="fa-IR"
                   value="{{ $new ? old('start_date') : $project->start_date ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('start_date'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('start_date')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="end_date">تاریخ پایان
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="end_date" name="info[end_date]" Lang="fa-IR"
                   value="{{ $new ? old('end_date') : $project->end_date ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('end_date'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('end_date')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="tarikh_ghardad">تاریخ قرارداد
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tarikh_ghardad" name="info[tarikh_ghardad]" Lang="fa-IR"
                   value="{{ $new ? old('tarikh_ghardad') : $project->tarikh_ghardad ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('tarikh_ghardad'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tarikh_ghardad')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="tarikh_bahrebardari">تاریخ بهره‌برداری
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tarikh_bahrebardari" name="info[tarikh_bahrebardari]" Lang="fa-IR"
                   value="{{ $new ? old('tarikh_bahrebardari') : $project->tarikh_bahrebardari ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('tarikh_bahrebardari'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tarikh_bahrebardari')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="hoze_karbord">حوزه کاربرد
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="hoze_karbord" name="info[hoze_karbord]" Lang="fa-IR"
                   value="{{ $new ? old('hoze_karbord') : $project->hoze_karbord ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('hoze_karbord'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('hoze_karbord')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="ghesmat_bahrebar">قسمت بهره‌بردار
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="ghesmat_bahrebar" name="info[ghesmat_bahrebar]" Lang="fa-IR"
                   value="{{ $new ? old('ghesmat_bahrebar') : $project->ghesmat_bahrebar ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('ghesmat_bahrebar'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('ghesmat_bahrebar')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="file">فایل قرارداد
        </label>
        @if ($project->gharardad_link ?? false)
            <a class='btn btn-success' target="_blank"
               href="{{route('project.download-gharardad', ['project' => $project->id])}}">مشاهده
                قرارداد</a>
        @endif
        <div class="col-md-2 col-sm-2 ">
            <input type="file" id="'gharardad'" name="file[gharardad]" Lang="fa-IR"
                   value="{{ $new ? old('gharardad') : $project->gharardad ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('gharardad'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('gharardad')}}</h5>
            @endif
        </div>
    </div>
</div>
