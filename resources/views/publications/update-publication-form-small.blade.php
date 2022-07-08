@extends('layout.app')
@section('content')
    <div class="row">
        <div id="pp" class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ویرایش و مشاهده نشریه</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" data-parsley-validate class="form-horizontal form-label-left"
                          enctype="multipart/form-data">
                        @include('publications.fields.small.common', ['new' => false, 'publication' => $publication])
{{--                        <div class="ln_solid"></div>--}}
{{--                        @if($publication->type == \App\Models\Publication::GahName_AyandeBan || $publication->type == \App\Models\Publication::GahName_Negahe2)--}}
{{--                        @include('publications.fields.small.related', ['new' => false, 'publication' => $publication])--}}
{{--                        <div class="ln_solid"></div>--}}
{{--                        @endif--}}
                        @if($hasMaghale)
                            <div class="form-group noprint">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2 id="tableTitle">مقالات</h2>
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

                                        <table id="myTable" class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>عنوان</th>
                                                <th>عنوان انگلیسی</th>
                                                <th>نویسنده/نویسندگان</th>
                                                <th>داور/داوران</th>
                                                <th>ویرایش</th>
                                                @if($isAdmin)

                                                    <th>حذف</th>
                                                @endif

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($publication->maghale as $maghale)
                                                <tr>
                                                    <td>{{$maghale->title}}</td>
                                                    <td>{{$maghale->title_en}}</td>
                                                    <td>{{$maghale->authors}}</td>
                                                    <td>{{$maghale->davar}}</td>
                                                    <td>
                                                        <a href="{{route('publication.maghale.view', ['maghale' => $maghale->id])}}">ویرایش</a>
                                                    </td>
                                                    @if($isAdmin)

                                                        <td>
                                                            <a href="{{route('publication.maghale.delete', ['maghale' => $maghale->id])}}">حذف</a>
                                                        </td>
                                                    @endif

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                  data-target=".bs-example-modal-lg">اضافه کردن
                                    </button>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        @endif
                        @include('publications.fields.small.tahrir', ['new' => false, 'publication' => $publication])
                        <div class="ln_solid"></div>
                        @if($isAdmin)
                            @include('publications.fields.small.hazine', ['new' => false, 'publication' => $publication])
                            <div class="ln_solid"></div>
                        @endif

                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="control-label col-md-2 col-sm-2 " for="type">عنوان نشریه--}}
                        {{--                            </label>--}}
                        {{--                            <label class="col-md-4 col-sm-4 ">--}}
                        {{--                                <select name="info[type]" class="col-md-12">--}}
                        {{--                                    @foreach($types as $value=>$text)--}}
                        {{--                                        <option @if($publication->type == $value) selected--}}
                        {{--                                                @endif value="{{$value}}">{{$text}}</option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </select>--}}
                        {{--                            </label>--}}
                        {{--                            @if($extraFields['fields']['ravesh_tahie'] ?? false)--}}
                        {{--                            <label class="control-label col-md-2 col-sm-2 " for="type">روش تهیه--}}
                        {{--                            </label>--}}
                        {{--                            <label class="col-md-4 col-sm-4 ">--}}
                        {{--                                <select id="ravesh_tahie" name="info[ravesh_tahie]" class="col-md-12">--}}
                        {{--                                    <option @if($publication->ravesh_tahie == 'تالیف') selected--}}
                        {{--                                            @endif value="تالیف">تالیف--}}
                        {{--                                    </option>--}}
                        {{--                                    <option @if($publication->ravesh_tahie == 'تدوین') selected--}}
                        {{--                                            @endif value="تدوین">تدوین--}}
                        {{--                                    </option>--}}
                        {{--                                    <option @if($publication->ravesh_tahie == 'گردآوری') selected--}}
                        {{--                                            @endif value="گردآوری">گردآوری--}}
                        {{--                                    </option>--}}
                        {{--                                    <option @if($publication->ravesh_tahie == 'ترجمه') selected--}}
                        {{--                                            @endif value="ترجمه">ترجمه--}}
                        {{--                                    </option>--}}
                        {{--                                </select>--}}
                        {{--                            </label>--}}
                        {{--                            @endif--}}
                        {{--                        </div>--}}
                        @if($publication->type == \App\Models\Publication::FaslName)
                            <div class="row">
                                <div class="col-md-6 col-xs-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>اعضای هییت تحریریه</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                       role="button"
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
                                                    @if($isAdmin)
                                                        <th>حذف</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($publication->tahrir as $person)
                                                    <tr>
                                                        <td>{{$person->name}}</td>
                                                        @if($isAdmin)
                                                            <td>
                                                                <a href="{{route('publication.tahrir.delete', ['person' => $person->id])}}">حذف</a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target=".bs-example-modal-lg-tahrir">اضافه کردن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-6">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>مشاوران علمی</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                       role="button"
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
                                                    @if($isAdmin)
                                                        <th>حذف</th>
                                                    @endif
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($publication->moshaver as $person)
                                                    <tr>
                                                        <td>{{$person->name}}</td>
                                                        @if($isAdmin)
                                                            <td>
                                                                <a href="{{route('publication.moshaver.delete', ['person' => $person->id])}}">حذف</a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target=".bs-example-modal-lg-moshaver">اضافه کردن
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                        @endif
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
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <form method="post" action="{{route('publication.maghale.add', ['publication' => $publication->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن مقاله</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="place">عنوان
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="place" name="addMaghale[title]" Lang="fa-IR"
                                       value="{{ old('title') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('title'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('title')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="type">عنوان انگلیسی
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="type" name="addMaghale[title_en]" Lang="fa-IR"
                                       value="{{ old('title_en') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('title_en'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('title_en')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="place">نویسنده/نویسندگان
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="authors" name="addMaghale[authors]" Lang="fa-IR"
                                       value="{{ old('authors') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('authors'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('authors')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="type">داور/داوران
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="davar" name="addMaghale[davar]" Lang="fa-IR"
                                       value="{{ old('davar') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('davar'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('davar')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="haznie_talif">هزینه تالیف
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="haznie_talif" name="addMaghale[haznie_talif]" Lang="fa-IR"
                                       value="{{ old('haznie_talif') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('haznie_talif'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('haznie_talif')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="haznie_davari">هزینه داوری
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="haznie_davari" name="addMaghale[haznie_davari]" Lang="fa-IR"
                                       value="{{ old('haznie_davari') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('haznie_davari'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('haznie_davari')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="haznie_virast">هزینه
                                ویراستیاری
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="haznie_virast" name="addMaghale[haznie_virast]" Lang="fa-IR"
                                       value="{{ old('haznie_virast') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('haznie_virast'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('haznie_virast')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="haznie_tarjome">هزینه ترجمه
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="haznie_tarjome" name="addMaghale[haznie_tarjome]" Lang="fa-IR"
                                       value="{{ old('haznie_tarjome') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('haznie_tarjome'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('haznie_tarjome')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="tarikh_pardakht">تاریخ پرداخت
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="tarikh_pardakht" name="addMaghale[tarikh_pardakht]" Lang="fa-IR"
                                       value="{{ old('tarikh_pardakht') }}"
                                       class="form-control col-md-7  date-it-is">
                                @if($errors->has('tarikh_pardakht'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('tarikh_pardakht')}}</h5>
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
    <div class="modal fade bs-example-modal-lg-tahrir" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <form method="post" action="{{route('publication.tahrir.add', ['publication' => $publication->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن عضو هییت تحریر</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="name">نام
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="place" name="addTahrir[name]" Lang="fa-IR"
                                       value="{{ old('name') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('name'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('name')}}</h5>
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
    <div class="modal fade bs-example-modal-lg-moshaver" tabindex="-1" role="dialog" style="display: none;" aria-hidden="true">
        <form method="post" action="{{route('publication.moshaver.add', ['publication' => $publication->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن مشاور علمی</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="name">نام
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="place" name="addMoshaver[name]" Lang="fa-IR"
                                       value="{{ old('name') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('name'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('name')}}</h5>
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
@section('scripts')
    <!-- Datatables -->
    <script src="{{asset('admin/vendors/datatables.net/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-buttons/js/buttons.print.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/vendors/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('admin/vendors/jszip/jszip.min.js')}}"></script>
    <script>
        var title = document.getElementById('tableTitle').innerText
        $(document).ready(function() {
            $('#myTable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'print',
                        title: title,
                        exportOptions: {
                            columns: [ 0, 1, 2,3 ]
                        }
                    },
                ]
            } );
        } );
    </script>
@endsection
