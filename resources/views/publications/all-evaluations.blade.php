@extends('layout.app')
@section('content')
    @include('evaluations.settings')
    <div class="row noprint">
        <div class="x_panel">
            <div class="x_title">
                <h2>بازخورد‌های نشریه</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">


                <table id="datatable" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>مرجع</th>
                        <th class="mohtavayii">کیفیت علمی محتوایی</th>
                        <th class="tasirgozarii">میزان تاثیرگذاری در افزایش آگاهی</th>
                        <th class="karbordii">میزان کاربردی بودن</th>
                        <th class="sheklii">کیفیت شکلی/چاپ</th>
                        <th>مشاهده</th>
                        <th>حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($publication->evaluations as $evaluation)
                        <tr>
                            <td>{{$evaluation->marjae}}</td>
                            <td style="color: {{$evaluation->getEvaluationColor($evaluation->bazkhord_mohtavayi)}}" class="mohtavayii">{{$evaluation->bazkhord_mohtavayi}}</td>
                            <td style="color: {{$evaluation->getEvaluationColor($evaluation->bazkhord_tasir_gozari)}}" class="tasir_gozarii">{{$evaluation->bazkhord_tasir_gozari}}</td>
                            <td style="color: {{$evaluation->getEvaluationColor($evaluation->bazkhord_karbordi)}}" class="karbordii">{{$evaluation->bazkhord_karbordi}}</td>
                            <td style="color: {{$evaluation->getEvaluationColor($evaluation->bazkhord_shekli)}}" class="sheklii">{{$evaluation->bazkhord_shekli}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm"
                                   href="{{route('publication.evaluations.view', ['evaluation' => $evaluation->id])}}">ویرایش</a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm"
                                   href="{{route('publication.evaluations.delete', ['evaluation' => $evaluation->id])}}">حذف</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".bs-example-modal-lg">اضافه کردن
                </button>

            </div>
        </div>
    </div>
    @include(
    'evaluations.averageAndDiagrams',
     compact('average', 'barChartValues_shekli', 'barChartValues_mohtavayi', 'barChartValues_kol')
     )
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" style="display: none;"
         aria-hidden="true">
        <form method="post" action="{{route('publication.evaluations.add', ['publication' => $publication->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن بازخورد</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="place">مرجع
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="text" id="marjae" name="addEvaluation[marjae]" Lang="fa-IR"
                                       value="{{ old('marjae') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('marjae'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('marjae')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="type">سند/مدرک
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="type" name="addEvaluationFile[file]" Lang="fa-IR"
                                       value="{{ old('file') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('file'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('file')}}</h5>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 ">کیفیت علمی محتوایی<span
                                    class="required">*</span></label>
                            <div class="col-md-2 col-sm-2 ">
                                <select name="addEvaluation[bazkhord_mohtavayi]" class="col-md-12">
                                    <option disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\Evaluation::State_Zaeef}}">ضعیف</option>
                                    <option value="{{\App\Models\Evaluation::State_Motevasset}}">متوسط</option>
                                    <option value="{{\App\Models\Evaluation::State_Khoob}}">خوب</option>
                                    <option value="{{\App\Models\Evaluation::State_KeyliKhoob}}">خیلی خوب</option>
                                    <option value="{{\App\Models\Evaluation::State_Awli}}">عالی</option>
                                </select>
                            </div>
                            <label class="control-label col-md-4 col-sm-4 ">کیفیت شکلی/چاپ<span
                                    class="required">*</span></label>
                            <div class="col-md-2 col-sm-2 ">
                                <select name="addEvaluation[bazkhord_shekli]" class="col-md-12">
                                    <option disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\Evaluation::State_Zaeef}}">ضعیف</option>
                                    <option value="{{\App\Models\Evaluation::State_Motevasset}}">متوسط</option>
                                    <option value="{{\App\Models\Evaluation::State_Khoob}}">خوب</option>
                                    <option value="{{\App\Models\Evaluation::State_KeyliKhoob}}">خیلی خوب</option>
                                    <option value="{{\App\Models\Evaluation::State_Awli}}">عالی</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4 ">میزان تاثیرگذاری در افزایش
                                آگاهی<span
                                    class="required">*</span></label>
                            <div class="col-md-2 col-sm-2 ">
                                <select name="addEvaluation[bazkhord_tasir_gozari]" class="col-md-12">
                                    <option disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\Evaluation::State_Zaeef}}">ضعیف</option>
                                    <option value="{{\App\Models\Evaluation::State_Motevasset}}">متوسط</option>
                                    <option value="{{\App\Models\Evaluation::State_Khoob}}">خوب</option>
                                    <option value="{{\App\Models\Evaluation::State_KeyliKhoob}}">خیلی خوب</option>
                                    <option value="{{\App\Models\Evaluation::State_Awli}}">عالی</option>
                                </select>
                            </div>
                            <label class="control-label col-md-4 col-sm-4 ">میزان کاربردی بودن<span
                                    class="required">*</span></label>
                            <div class="col-md-2 col-sm-2 ">
                                <select name="addEvaluation[bazkhord_karbordi]" class="col-md-12">
                                    <option disabled>انتخاب کنید</option>
                                    <option value="{{\App\Models\Evaluation::State_Zaeef}}">ضعیف</option>
                                    <option value="{{\App\Models\Evaluation::State_Motevasset}}">متوسط</option>
                                    <option value="{{\App\Models\Evaluation::State_Khoob}}">خوب</option>
                                    <option value="{{\App\Models\Evaluation::State_KeyliKhoob}}">خیلی خوب</option>
                                    <option value="{{\App\Models\Evaluation::State_Awli}}">عالی</option>
                                </select>
                            </div>


                            {{-- <label class="control-label col-md-2 col-sm-2 " for="type"> ارزیابی متنی
                             </label>
                             <div class="col-md-4 col-sm-4 ">
                                 <input type="text" id="type" name="addEvaluation[natije]" Lang="fa-IR" value="{{ old('natije') }}"
                                        class="form-control col-md-7 ">
                                 @if($errors->has('natije'))
                                     <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                         {{$errors->first('natije')}}</h5>
                                 @endif
                             </div>--}}
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
    <script
        src="{{asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.bazkhord-selector').change(function() {
                if(this.checked) {
                    $('.'+this.id).show('medium')
                } else {
                    $('.'+this.id).hide('medium')
                }
            });
        });
    </script>
@endsection
