<div class="row">
    <h4>مشخصات کلی</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="sal_label" for="sal">سال
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="sal" name="info[sal]" Lang="fa-IR"
                   value="{{ $new ? old('sal') : $publication->sal ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('sal'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('sal')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="fasl_label" for="fasl">فصل
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="fasl" name="info[fasl]" Lang="fa-IR"
                   value="{{ $new ? old('fasl') : $publication->fasl ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('fasl'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('fasl')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="shomare_mosalsal_label" for="shomare_mosalsal">شماره
            مسلسل
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="shomare_mosalsal" name="info[shomare_mosalsal]" Lang="fa-IR"
                   value="{{ $new ? old('shomare_mosalsal') : $publication->shomare_mosalsal ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('shomare_mosalsal'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('shomare_mosalsal')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="shomare_label" for="shomare">شماره
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="shomare" name="info[shomare]" Lang="fa-IR"
                   value="{{ $new ? old('shomare') : $publication->shomare ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('shomare'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('shomare')}}</h5>
            @endif
        </div>

        <label class="control-label col-md-2 col-sm-2 " id="tarikhe_enteshar_label" for="tarikhe_enteshar">تاریخ
            انتشار
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="tarikhe_enteshar" name="info[tarikhe_enteshar]" Lang="fa-IR"
                   value="{{ $new ? old('tarikhe_enteshar') : $publication->tarikhe_enteshar ?? '' }}"
                   class="form-control col-md-7  date-it-is">
            @if($errors->has('tarikhe_enteshar'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tarikhe_enteshar')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="shomaregan_label" for="shomaregan">شمارگان
        </label>
        <div class="col-md-2 col-sm-2 ">
            <input type="text" id="shomaregan" name="info[shomaregan]" Lang="fa-IR"
                   value="{{ $new ? old('shomaregan') : $publication->shomaregan ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('shomaregan'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('shomaregan')}}</h5>
            @endif
        </div>
    </div>
    @if($new || $publication->type == \App\Models\Publication::GahName_Negahe2)
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="title_label"
               for="title">عنوان فارسی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="title" name="info[title]" Lang="fa-IR"
                   value="{{ $new ? old('title') : $publication->title ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('title'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('title')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="title_en_label"
               for="title_en">عنوان انگلیسی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="title_en" name="info[title_en]" Lang="fa-IR"
                   value="{{ $new ? old('title_en') : $publication->title_en ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('title_en'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('title_en')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="authors_label"
               for="authors">نویسنده/نویسندگان
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="authors" name="info[authors]" Lang="fa-IR"
                   value="{{ $new ? old('authors') : $publication->authors ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('authors'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('authors')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " id="moassese_montasher_konande_label"
               for="moassese_montasher_konande">موسسه منتشر کننده
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="moassese_montasher_konande" name="info[moassese_montasher_konande]" Lang="fa-IR"
                   value="{{ $new ? old('moassese_montasher_konande') : $publication->moassese_montasher_konande ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('moassese_montasher_konande'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('moassese_montasher_konande')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " id="tahie_konande_label"
               for="tahie_konande">مولف/مترجم/تهیه و تدوین
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="tahie_konande" name="info[tahie_konande]" Lang="fa-IR"
                   value="{{ $new ? old('tahie_konande') : $publication->tahie_konande ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('tahie_konande'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('tahie_konande')}}</h5>
            @endif
        </div>
    </div>
    @endif
</div>
