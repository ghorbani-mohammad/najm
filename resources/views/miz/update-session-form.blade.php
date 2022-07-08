@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ویرایش و مشاهده جلسه</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" data-parsley-validate class="form-horizontal form-label-left"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="type">میز
                            </label>
                            <label class="col-md-4 col-sm-4 ">
                                <select name="info[language_id]" class="col-md-12">
                                    @foreach($languages as $language)
                                        <option @if($session->language_id == $language->id) selected
                                                @endif value="{{$language->id}}">{{$language->language}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                            @include('miz.fields.common', ['new' => false, 'session' => $session])
                            <div class="ln_solid"></div>
                        @csrf
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6  col-md-offset-3">
                                <button type="submit" class="btn btn-success">ثبت</button>
                                <button type="reset" class="btn btn-primary">انصراف</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <a type="button" class="btn btn-success"
           href="{{route('miz.sessions.evaluations.all', ['session' => $session->id])}}">مشاهده
            بازخوردها</a>
    </div>
@endsection
