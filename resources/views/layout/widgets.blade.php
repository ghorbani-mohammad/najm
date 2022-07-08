<div class="row">
    <div class="col-md-12 col-xs-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                 {{$name}} <span style="color: #2a74ff" id="subscribers_label"></span>
            </div>
            <div class="x_content">
                <div class="row tile_count" id="numbers">
                    <?php
                    $total_users = 0;
                    $color_array = ['#36c9c2', '#7043a8', '#6fd626', '#d18017', '#724bf2', '#ff8263', '#c43131', '#3afbff', '#93bcff', '#6fd626', '#d18017', '#c43131', '#ff8263', '#ffc863'];
                    $index = 0;
                    ?>
                    @foreach($data as $key=>$item)
                        <div class="col-md-2 col-sm-2 col-xs-6 tile_stats_count"
                             style="border: solid 2px {{$color_array[$index]}}; border-radius: 10px; margin-left:7px ;  color: #FFFFFF; background-color: {{$color_array[$index++]}}">
                            <span class="count_top"><i class="fa fa-user"
                                                       style="margin-left: 5px;"></i>{{$key}}</span>
                            <div class="count white">{{number_format($item)}}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
