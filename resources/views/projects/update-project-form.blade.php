@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ویرایش و مشاهده پروژه‌</h2>
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
                            <label class="control-label col-md-2 col-sm-2 " for="type">نوع پروژه
                            </label>
                            <label>
                                <select name="info[type]" class="col-md-12">
                                    @foreach($types as $value=>$text)
                                        <option @if($project->type == $value) selected
                                                @endif value="{{$value}}">{{$text}}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>
                        @include('projects.fields.common', ['new' => false, 'project' => $project])
                        @if($isAdmin && $project->type == \App\Models\Project::Hamkar)
                            @include('projects.fields.hazine', ['new' => false, 'project' => $project])
                        @endif

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>گزارشات، دستاوردها و مستندات</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>عنوان</th>
                                            <th>تاریخ</th>
                                            <th>دریافت</th>
                                            @if($isAdmin)

                                                <th>حذف</th>
                                            @endif

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($project->reports as $file)
                                            <tr>
                                                <td>{{$file->title}}</td>
                                                <td>{{$file->date}}</td>
                                                <td>
                                                    <a href="{{route('project.reports.download', ['report' => $file->id])}}">دریافت</a>
                                                </td>
                                                @if($isAdmin)

                                                    <td>
                                                        <a href="{{route('project.reports.delete', ['report' => $file->id])}}">حذف</a>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bs-example-modal-lg-file">اضافه کردن
                            </button>

                        </div>


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
    <div class="row">
        <div class="x_panel">
            <div class="x_title">
                <h2>مدارک و مجوز‌ها</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>نام</th>
                        <th>دریافت</th>
                        @if($isAdmin)

                            <th>حذف</th>
                        @endif

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project->files as $file)
                        <tr>
                            <td>{{$file->name}}</td>
                            <td>
                                <a href="{{route('project.files.download', ['file' => $file->id])}}">دریافت</a>
                            </td>
                            @if($isAdmin)

                                <td>
                                    <a href="{{route('project.files.delete', ['file' => $file->id])}}">حذف</a>
                                </td>
                            @endif

                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".bs-example-modal-lg-file-2">اضافه کردن
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade bs-example-modal-lg-file" tabindex="-1" role="dialog" style="display: none;"
         aria-hidden="true">
        <form method="post" action="{{route('project.reports.add', ['project' => $project->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن گزارش</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="file">فایل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="file" name="addReports[file]" Lang="fa-IR"
                                       value="{{ old('file') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('file'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('file')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="file">تاریخ گزارش
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="date" name="addReports[date]" Lang="fa-IR"
                                       value="{{ old('date') }}"
                                       class="form-control col-md-7  date-it-is">
                                @if($errors->has('date'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('date')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="title">عنوان گزارش
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="title" name="addReports[title]" Lang="fa-IR"
                                       value="{{ old('title') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('title'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('title')}}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">اعمال</button>
                    </div>

                </div>
            </div>
        </form>

    </div>
    <div class="modal fade bs-example-modal-lg-file-2" tabindex="-1" role="dialog" style="display: none;"
         aria-hidden="true">
        <form method="post" action="{{route('project.files.add', ['project' => $project->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن مدرک/مجوز</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="file">فایل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="file" name="addFiles[file]" Lang="fa-IR"
                                       value="{{ old('file') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('file'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('file')}}</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                        <button type="submit" class="btn btn-primary">اعمال</button>
                    </div>

                </div>
            </div>
        </form>

    </div>

@endsection
