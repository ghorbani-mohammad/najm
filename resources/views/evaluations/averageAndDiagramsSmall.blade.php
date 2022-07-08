<div class="row noprint">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>میانگین ارزیابی‌های دریافتی</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="font-size: 30px">
                <div class="row">
                    <div class="col-md-6">
                        کیفیت علمی محتوایی:
                        <span style="font-size: 30px"
                              class="badge @if($average['mohtavayi'] >= 4) bg-green @elseif($average['mohtavayi'] >= 2) bg-primary @else bg-red @endif">
                        {{$average['mohtavayi']}}
                        </span>
                    </div>
                    <div class="col-md-6">
                        تاثیرگذاری در افزایش آگاهی:
                        <span style="font-size: 30px"
                              class="badge @if($average['tasir_gozari'] >= 4) bg-green @elseif($average['tasir_gozari'] >= 2) bg-primary @else bg-red @endif">
                        {{$average['tasir_gozari']}}
                    </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        میزان کاربردی بودن:
                        <span style="font-size: 30px"
                              class="badge @if($average['karbordi'] >= 4) bg-green @elseif($average['karbordi'] >= 2) bg-primary @else bg-red @endif">
                        {{$average['karbordi']}}
                    </span>
                    </div>
                    <div class="col-md-6">
                        کیفیت شکلی/چاپی:
                        <span style="font-size: 30px"
                              class="badge @if($average['shekli'] >= 4) bg-green @elseif($average['shekli'] >= 2) bg-primary @else bg-red @endif">
                        {{$average['shekli']}}
                    </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        میانگین کل:
                        <span style="font-size: 30px"
                              class="badge @if($average['kol'] >= 4) bg-green @elseif($average['kol'] >= 2) bg-primary @else bg-red @endif">
                        {{$average['kol']}}
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="chartsDiv" class="row">
    <div class="col-md-12" >
        <div class="mohtavayii col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5>نمودار فراوانی کیفیت علمی محتوایی</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="pieChart2_mohtavayi" width="489" height="244"
                            style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
        <div class="tasirgozarii col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5>نمودار فراوانی براساس میزان تاثیرگذاری</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="pieChart2_tasir_gozari" width="489" height="244"
                            style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
        <div class=" karbordii col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5>نمودار فراوانی براساس میزان کاربردی بودن</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="pieChart2_karbordi" width="489" height="244"
                            style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 tasirgozarii">
        <div class="mohtavayii col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5> تعداد ارزیابی‌ها بر اساس کیفیت علمی محتوایی</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="mybarChart2_mohtavayi" width="489" height="244"
                            style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
        <div class="tasirgozarii col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5> تعداد ارزیابی‌ها  براساس میزان تاثیرگذاری</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="mybarChart2_tasir_gozari" width="489" height="244"
                            style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
        <div class="karbordii col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5> تعداد ارزیابی‌ها  براساس میزان کاربردی بودن</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="mybarChart2_karbordi" width="489" height="244"
                            style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="sheklii col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5>نمودار فراوانی براساس کیفیت شکلی/چاپ</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="pieChart2_shekli" width="489" height="244"
                            style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
        <div class="kolll col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5>نمودار فراوانی ارزیابی‌ها</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="pieChart2_kol" width="489" height="244" style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>

    </div>
    <div class="col-md-12">
        <div class="sheklii col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5> تعداد ارزیابی‌ها براساس کیفیت شکلی/چاپ</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="mybarChart2_shekli" width="489" height="244"
                            style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
        <div class="kolll col-md-4 col-sm-4 col-xs-4">
            <div class="x_panel">
                <div class="x_title">
                    <h5>تعداد ارزیابی‌ها بر اساس نتیجه‌ی ارزیابی</h5>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <iframe class="chartjs-hidden-iframe"
                            style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; inset: 0px;"></iframe>
                    <canvas id="mybarChart2_kol" width="489" height="244" style="width: 489px; height: 244px;"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('admin/vendors/Chart.js/dist/Chart2.7.3.min.js')}}"></script>
<script src="{{asset('admin/vendors/Chart.js-plugins/chartjs-plugin-datalabels@0.7.0.min.js')}}"></script>
<script>
    var opts = {
        tooltips: {
            enabled: false
        },
        plugins: {
            datalabels: {
                display: true,
                align: 'center',
                anchor: 'center',
                formatter: (value, categories) => {
                    let sum = 0;
                    let dataArr = categories.chart.data.datasets[0].data;
                    dataArr.map(data => {
                        sum += data;
                    });
                    let percentage = (value*100 / sum).toFixed(2);
                    if (percentage > 0) {
                        return percentage+"%";
                    }

                    return "";
                },
                color: '#ffffff',
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    var backgroundColors = [
        'rgb(128,6,6)',
        'rgb(243,210,43)',
        'rgba(227,111,56,0.73)',
        'rgba(75,139,192,0.76)',
        'rgb(38,246,6)',
    ];
    var datas_shekli = {{$barChartValues_shekli}};
    const ctx_shekli = document.getElementById('mybarChart2_shekli');
    const mybarChart2_shekli = new Chart(ctx_shekli, {
        type: 'bar',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_shekli,
                hoverBackgroundColor: 'rgb(255,248,248)',
                backgroundColor: backgroundColors,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    display: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx2_shekli = document.getElementById('pieChart2_shekli');
    const pieChart2_shekli = new Chart(ctx2_shekli, {
        type: 'pie',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_shekli,
                backgroundColor: backgroundColors,
                hoverBackgroundColor: 'rgb(2,1,1)',
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: opts,
    });
    //---
    var datas_mohtavayi = {{$barChartValues_mohtavayi}};
    const ctx_mohtavayi = document.getElementById('mybarChart2_mohtavayi');
    const mybarChart2_mohtavayi = new Chart(ctx_mohtavayi, {
        type: 'bar',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_mohtavayi,
                backgroundColor: backgroundColors,
                hoverBackgroundColor: 'rgb(255,248,248)',
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    display: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx2_mohtavayi = document.getElementById('pieChart2_mohtavayi');
    const pieChart2_mohtavayi = new Chart(ctx2_mohtavayi, {
        type: 'pie',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_mohtavayi,
                hoverBackgroundColor: 'rgb(2,1,1)',
                backgroundColor: backgroundColors,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: opts,
    });
    //---
    var datas_karbordi = {{$barChartValues_karbordi}};
    const ctx_karbordi = document.getElementById('mybarChart2_karbordi');
    const mybarChart2_karbordi = new Chart(ctx_karbordi, {
        type: 'bar',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_karbordi,
                hoverBackgroundColor: 'rgb(255,248,248)',
                backgroundColor: backgroundColors,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    display: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx2_karbordi = document.getElementById('pieChart2_karbordi');
    const pieChart2_karbordi = new Chart(ctx2_karbordi, {
        type: 'pie',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_karbordi,
                backgroundColor: backgroundColors,
                hoverBackgroundColor: 'rgb(2,1,1)',
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: opts,
    });
    //---
    var datas_tasir_gozari = {{$barChartValues_tasir_gozari}};
    const ctx_tasir_gozari = document.getElementById('mybarChart2_tasir_gozari');
    const mybarChart2_tasir_gozari = new Chart(ctx_tasir_gozari, {
        type: 'bar',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_tasir_gozari,
                backgroundColor: backgroundColors,
                hoverBackgroundColor: 'rgb(255,248,248)',
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    display: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx2_tasir_gozari = document.getElementById('pieChart2_tasir_gozari');
    const pieChart2_tasir_gozari = new Chart(ctx2_tasir_gozari, {
        type: 'pie',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_tasir_gozari,
                hoverBackgroundColor: 'rgb(2,1,1)',
                backgroundColor: backgroundColors,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: opts,
    });
    //---
    var datas_kol = {{$barChartValues_kol}};
    const ctx_kol = document.getElementById('mybarChart2_kol');
    const mybarChart2_kol = new Chart(ctx_kol, {
        type: 'bar',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_kol,
                hoverBackgroundColor: 'rgb(255,248,248)',
                backgroundColor: backgroundColors,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    display: false,
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    const ctx2_kol = document.getElementById('pieChart2_kol');
    const pieChart2_kol = new Chart(ctx2_kol, {
        type: 'pie',
        data: {
            labels: ['ضعیف', 'متوسط', 'خوب', 'خیلی خوب', 'عالی'],
            datasets: [{
                label: 'تعداد ارزیابی‌ها',
                data: datas_kol,
                hoverBackgroundColor: 'rgb(2,1,1)',
                backgroundColor: backgroundColors,
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: opts,
    });
    //---
</script>


