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
           for="tahie_konande">مولف
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
