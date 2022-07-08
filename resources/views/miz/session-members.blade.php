@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2 id="tableTitle">حاضرین جلسه شماره {{$session->shomare}} میز {{$session->language->language}}</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_product">
                    <table id="myTable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th> نام</th>
                            <th> مدرک</th>
                            <th> سازمان متبوعه</th>
                            <th> نقش</th>
                            @if($isAdmin)
                                <th> حق الزحمه(ریال)</th>
                                <th> تاریخ پرداخت</th>
                                <th> ویرایش</th>
                                <th> حذف</th>
                            @endif
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{$member->name}}</td>
                                <td>{{$member->madrak}}</td>
                                <td>{{$member->sazman_matbooe}}</td>
                                <td>{{$member->role}}</td>
                                @if($isAdmin)
                                    <td>{{$member->haghozzahme}}</td>
                                    <td>{{$member->tarikh_pardakht}}</td>
                                    <td>
                                        <a href={{route('miz.sessions.update-member', ['member' => $member->id])}}>
                                            ویرایش
                                        </a>
                                    </td>
                                    <td>
                                        <a href={{route('miz.sessions.members.delete', ['member' => $member->id])}}>
                                            حذف
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>اضافه کردن عضو متغیر</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post"
                          action="{{route('miz.sessions.post-variable-members', ['session' => $session->id])}}"
                          data-parsley-validate class="form-horizontal form-label-left"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="name">نام</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="name" name="addMember[name]" Lang="fa-IR"
                                       value="{{ old("addMember[name]") }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("addMember[name]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[name]")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="sazman_matbooe">سازمان
                                متبوعه</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="sazman_matbooe" name="addMember[sazman_matbooe]" Lang="fa-IR"
                                       value="{{ old("addMember[sazman_matbooe]") }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("addMember[sazman_matbooe]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[sazman_matbooe]")}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="madrak">مدرک</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="madrak" name="addMember[madrak]" Lang="fa-IR"
                                       value="{{ old("addMember[madrak]") }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("addMember[madrak]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[madrak]")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="role">نقش
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <select name="addMember[role]" class="col-md-12">
                                    <option value=0 selected disabled>انتخاب کنید</option>
                                    <option value="رئیس میز">رئیس میز</option>
                                    <option value="دبیر میز">دبیر میز</option>
                                    <option value="کارشناس مدعو">کارشناس مدعو</option>
                                    <option value="نماینده پژوهشکده">نماینده پژوهشکده</option>
                                    <option value="مدیر اجرایی">مدیر اجرایی</option>
                                    <option value="مدیر اجرایی">مدیر اجرایی</option>
                                    <option value="مدیر داخلی">مدیر داخلی</option>
                                    <option value="سایر">سایر</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="haghozzahme">حق
                                الزحمه(ریال)</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="haghozzahme" name="addMember[haghozzahme]" Lang="fa-IR"
                                       value="{{ old("addMember[haghozzahme]") }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has("addMember[haghozzahme]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[haghozzahme]")}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="tarikh_pardakht">تاریخ
                                پرداخت</label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="tarikh_pardakht" name="addMember[tarikh_pardakht]" Lang="fa-IR"
                                       value="{{ old("addMember[tarikh_pardakht]") }}"
                                       class="form-control col-md-7  date-it-is">
                                @if($errors->has("addMember[tarikh_pardakht]"))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first("addMember[tarikh_pardakht]")}}</h5>
                                @endif
                            </div>
                        </div>
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
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>انتخاب اعضای ثابت حاضر در جلسه</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post"
                          action="{{route('miz.sessions.post-permanent-members', ['session' => $session->id])}}"
                          data-parsley-validate class="form-horizontal form-label-left"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="control-label col-md-1 col-sm-1 "
                                   for="addPermanentMember">نام</label>
                            <div class="col-md-4 col-sm-4 ">
                                <select class="col-md-12" name="addPermanentMember">
                                    <option disabled selected>انتخاب کنید</option>
                                    @foreach($permanentMembers as $member)
                                        <option value="{{$member->id}}">{{$member->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
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
                            columns: [ 0, 1, 2,3,4,5 ]
                        }
                    },
                ]
            } );
        } );
    </script>
@endsection
