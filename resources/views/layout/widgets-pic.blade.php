<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                تعداد {{$name}} <span style="color: #2a74ff" id="subscribers_label"></span>
            </div>
            <div class="x_content">
                <div class="row tile_count" id="numbers">
                    <?php
                    $total_users = 0;
                    $color_array = ['#36c9c2', '#7043a8', '#6fd626', '#d18017', '#724bf2', '#ff8263', '#c43131', '#3afbff', '#93bcff', '#6fd626', '#d18017', '#c43131', '#ff8263', '#ffc863'];
                    $index = 0;
                    ?>
                    @foreach($data as $key=>$item)
                        <a href="{{$item->link}}">
                        <div class="col-md-3">
                            <div style="height: 190px;" class="thumbnail">
                                <div class="image view view-first">
                                    <img style="width: 100%;height: 100%; display: block;" src="{{asset('/admin/build/images/dashboard/'.$item->type.'.jpg')}}" alt="image">
                                </div>
                                <div class="caption">
                                    <h4>{{$item->name}}: {{number_format($item->count)}}</h4>
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
