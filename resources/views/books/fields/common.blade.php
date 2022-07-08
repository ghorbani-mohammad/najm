<div class="row">
    <h4>مشخصات کلی</h4>
    <div class="ln_solid"></div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="title">عنوان فارسی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="title" name="info[title]" Lang="fa-IR"
                   value="{{ $new ? old('title') : $book->title ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('title'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('title')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="title_en">عنوان انگلیسی
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="title_en" name="info[title_en]" Lang="fa-IR"
                   value="{{ $new ? old('title_en') : $book->title_en ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('title_en'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('title_en')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="shomaregan">شمارگان
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="shomaregan" name="info[shomaregan]" Lang="fa-IR"
                   value="{{ $new ? old('shomaregan') : $book->shomaregan ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('shomaregan'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('shomaregan')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="shabak">شابک
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="shabak" name="info[shabak]" Lang="fa-IR"
                   value="{{ $new ? old('shabak') : $book->shabak ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('shabak'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('shabak')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="fipa">فیپا
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="fipa" name="info[fipa]" Lang="fa-IR"
                   value="{{ $new ? old('fipa') : $book->fipa ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('fipa'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('fipa')}}</h5>
            @endif
        </div>
        <label class="control-label col-md-2 col-sm-2 " for="sal">سال چاپ
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="sal" name="info[sal]" Lang="fa-IR"
                   value="{{ $new ? old('sal') : $book->sal ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('sal'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('sal')}}</h5>
            @endif
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-2 col-sm-2 " for="nobate_chap">نوبت چاپ
        </label>
        <div class="col-md-4 col-sm-4 ">
            <input type="text" id="nobate_chap" name="info[nobate_chap]" Lang="fa-IR"
                   value="{{ $new ? old('nobate_chap') : $book->nobate_chap ?? '' }}"
                   class="form-control col-md-7 ">
            @if($errors->has('nobate_chap'))
                <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                    {{$errors->first('nobate_chap')}}</h5>
            @endif
        </div>
    </div>
</div>
