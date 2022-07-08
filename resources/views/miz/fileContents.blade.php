@extends('layout.app')
@section('content')
    <div class="row">
        @include('FileContents.contents', [
                            'files' => $session->files,
                            'routeName' => 'miz.sessions.files',
                            'type' => 'miz',
                            'id' => $session->id,
                        ])
    </div>
    <div class="modal fade bs-example-modal-lg-file" tabindex="-1" role="dialog" style="display: none;"
         aria-hidden="true">
        <form method="post" action="{{route('miz.sessions.files.add', ['session' => $session->id])}}"
              enctype="multipart/form-data">
            @csrf
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن محتوا</h4>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 " for="file">فایل
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input type="file" id="jobfile" name="addFiles[file]" Lang="fa-IR"
                                       value="{{ old('file') }}"
                                       class="form-control col-md-7 ">
                                @if($errors->has('file'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('file')}}</h5>
                                @endif
                            </div>
                            <label class="control-label col-md-2 col-sm-2 " for="file">کاور
                            </label>
                            <div class="col-md-4 col-sm-4 ">
                                <input id="is_cover" name="addFiles[is_cover]" type="checkbox" value="1">
                                @if($errors->has('is_cover'))
                                    <h5 style="color: red ;direction: rtl ; margin-top: 40px; margin-bottom: -3px">
                                        {{$errors->first('is_cover')}}</h5>
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

