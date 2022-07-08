@extends('layout.app')
@section('content')
    <div class="row">
        <div class="x_content">
            <div class="x_panel">
                <div class="x_title">
                    <h2>ویرایش و مشاهده کتاب</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" data-parsley-validate class="form-horizontal form-label-left"
                          enctype="multipart/form-data">
                        {{--                        <div class="form-group">--}}
                        {{--                            <label class="control-label col-md-2 col-sm-2 " for="type">نوع کتاب--}}
                        {{--                            </label>--}}
                        {{--                            <label>--}}
                        {{--                                <select name="info[type]" class="col-md-12">--}}
                        {{--                                    @foreach($types as $value=>$text)--}}
                        {{--                                        <option @if($book->type == $value) selected--}}
                        {{--                                                @endif value="{{$value}}">{{$text}}</option>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </select>--}}
                        {{--                            </label>--}}
                        {{--                        </div>--}}
                        @include('books.fields.common', ['book' => $book , 'new' => false])
                        <div class="ln_solid"></div>
                        @include('books.fields.tahrir', ['book' => $book , 'new' => false])
                        <div class="ln_solid"></div>
                        @if($isAdmin)
                        @include('books.fields.hazine', ['book' => $book , 'new' => false])
                        <div class="ln_solid"></div>
                        @endif
                        @include('books.fields.enteshar', ['book' => $book , 'new' => false])
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
