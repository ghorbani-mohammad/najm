<div class="form-group">
    <div class="x_panel">
        <div class="x_title">
            <h2>محتوا</h2>
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
                    <th>نوع فایل</th>
                    <th>دریافت</th>
                    @if($isAdmin)
                        <th>حذف</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($files as $file)
                    <tr>
                        <td>{{$file->name}} @if($file->is_cover)<span class="btn-sm btn-danger">کاور</span>@endif</td>
                        <td><button class="btn {{$extentions[pathinfo($file->name, PATHINFO_EXTENSION)] ?? "btn-default"}}">{{pathinfo($file->name, PATHINFO_EXTENSION)}}</button></td>
                        <td>
                            <a class="btn btn-success" href="{{route("$routeName.download", ['file' => $file->id])}}">دریافت</a>
                        </td>
                        @if($isAdmin)

                            <td>
                                <a href="{{route("$routeName.delete", ['file' => $file->id])}}">حذف</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target=".bs-example-modal-lg-file">اضافه کردن
            </button>
        </div>
    </div>
</div>
