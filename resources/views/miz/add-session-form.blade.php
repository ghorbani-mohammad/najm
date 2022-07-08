@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>اضافه کردن جلسه</h2>
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
                            <label class="control-label col-md-2 col-sm-2 " for="type"> میز
                            </label>
                            <label>
                                <select name="info[language_id]" class="col-md-12">
                                    <option selected disabled>انتخاب کنید</option>
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->language}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        @include('miz.fields.common', ['new' => true])

                        <div class="ln_solid"></div>
                        @csrf
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6  col-md-offset-3">
                                <button type="submit" class="btn btn-success">ثبت</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
