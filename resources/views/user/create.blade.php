@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>ایجاد</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div>{{$error}}</div>
                    @endforeach
                @endif
                <form method="post" data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-2 " for="date_from">نام
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="text" id="name" name="info[name]" Lang="fa-IR" class="form-control col-md-7">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-2 " for="date_from">ایمیل
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="email" id="name" name="info[email]" Lang="fa-IR" class="form-control col-md-7">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-2 " for="date_from">نوع
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <select name="info[type]" class="col-md-12">
                                <option value="admin">مدیر</option>
                                <option value="normal">کاربر</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-2 " for="date_from">یوزرنیم
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="text" id="username" name="info[username]" Lang="fa-IR" class="form-control col-md-7">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-1 col-sm-2 " for="date_from">پسورد
                        </label>
                        <div class="col-md-2 col-sm-2 ">
                            <input type="text" id="password" name="info[password]" class="form-control col-md-7">
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm">ایجاد</button>
                </form>
            </div>
        </div>
    </div>
@endsection
