@extends('layout.layout')

@php
$title = 'Dashboard';
$subTitle = '';
@endphp

<style>
    .bg-gradient-start-1 {
        background: linear-gradient(to right, #044520, #3abf73) !important;
    }
</style>

@section('content')

<div class="row gy-4">
    <div class="col-6 col-sm-4 ">
        <div class="card shadow-none bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-white mb-1">Total Challan</p>
                        <h6 class="mb-0 text-white">{{$totalChallanCount}}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="gridicons:multiple-users" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col-6 col-sm-4 ">
        <div class="card shadow-none bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Pending in Prosecution</p>
                        <h6 class="mb-0">{{$status1Count}}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fa-solid:award" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col-6 col-sm-4 ">
        <div class="card shadow-none bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Approved Challans</p>
                        <h6 class="mb-0">{{$status2Count}}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fluent:people-20-filled" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col-6 col-sm-4 ">
        <div class="card shadow-none bg-gradient-start-4 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Objected/Return to Police</p>
                        <h6 class="mb-0">{{$status3Count}}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col-6 col-sm-4 ">
        <div class="card shadow-none bg-gradient-start-4 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total FIRS</p>
                        <h6 class="mb-0">{{$totalFir}}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div><!-- card end -->
    </div>
  
    <div class="col-6 col-sm-4 ">
        <div class="card shadow-none bg-gradient-start-4 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Pending FIR</p>
                        <h6 class="mb-0">{{$totalFir - $totalChallanCount}}</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:wallet-bold" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
            </div>
        </div><!-- card end -->
    </div>
</div>
<div class="row gy-4 mt-1">
    <div class="col-xxl-6 col-xl-6 col-12">
        <div class="card h-100 radius-8 border">
            <div class="card-body p-24">
                <h6 class="mb-12 fw-semibold text-lg">FIR Stats</h6>
                <div class="d-flex align-items-center gap-2 mb-20">
                    <h6 class="fw-semibold mb-0">{{$weeklyFirCount}}</h6>
                </div>
                <div id="barChart1"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-xl-6 col-12">
        <div class="card h-100 radius-8 border">
            <div class="card-body p-24">
                <h6 class="mb-12 fw-semibold text-lg">Challan Stats</h6>
                <div class="d-flex align-items-center gap-2 mb-20">
                    <h6 class="fw-semibold mb-0">{{$weeklyChallanCount}}</h6>
                </div>
                <div id="barChart"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-xl-6">
        <div class="card h-100 radius-8 border-0 overflow-hidden">
            <div class="card-body p-24">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="mb-2 fw-bold text-lg">Users Overview</h6>
                    <!-- <div class="">
                        <select class="form-select form-select-sm w-auto bg-base border text-secondary-light">
                            <option>Today</option>
                            <option>Weekly</option>
                            <option>Monthly</option>
                            <option>Yearly</option>
                        </select>
                    </div> -->
                </div>


                <div id="userOverviewDonutChart"></div>
                <ul class="d-flex flex-wrap align-items-center justify-content-between mt-3 gap-3">
                    <li class="d-flex align-items-center gap-2">
                        <span class="w-12-px h-12-px radius-2 bg-primary-600"></span>
                        <span class="text-secondary-light text-sm fw-normal">Admin:
                            <span class="text-primary-light fw-semibold">{{$userChartSeries[0]}}</span>
                        </span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <span class="w-12-px h-12-px radius-2 bg-primary-600"></span>
                        <span class="text-secondary-light text-sm fw-normal">Court:
                            <span class="text-primary-light fw-semibold">{{$userChartSeries[1]}}</span>
                        </span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <span class="w-12-px h-12-px radius-2 bg-yellow"></span>
                        <span class="text-secondary-light text-sm fw-normal">Police:
                            <span class="text-primary-light fw-semibold">{{$userChartSeries[2]}}</span>
                        </span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <span class="w-12-px h-12-px radius-2 bg-yellow"></span>
                        <span class="text-secondary-light text-sm fw-normal">Prosecution:
                            <span class="text-primary-light fw-semibold">{{$userChartSeries[3]}}</span>
                        </span>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    
    <div class="col-6">
        <div class="card h-100">
            <div class="card-body p-24">
                <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                    <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center active" id="pills-to-do-list-tab" data-bs-toggle="pill" data-bs-target="#pills-to-do-list" type="button" role="tab" aria-controls="pills-to-do-list" aria-selected="true">
                                Latest Challans
                                <span class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">{{$totalChallanCount}}</span>
                            </button>
                        </li>
                    </ul>
                    <a href="{{route('challans.index')}}" class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                        View All
                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                    </a>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-to-do-list" role="tabpanel" aria-labelledby="pills-to-do-list-tab" tabindex="0">
                        <div class="table-responsive scroll-sm">
                            <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">FIR No </th>
                                        <th scope="col">Case Type</th>
                                        <th scope="col">Challan Type</th>
                                        <th scope="col" class="text-center">Investigating Officer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($latestChallans as $challan)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">{{$challan->fir_no}}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$challan->case_type}}</td>
                                        <td>{{$challan->challan_type}}</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">{{$challan->investigating_officer}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    var options = {
        series: [{
            name: "FIRS",
            data: @json($firChartData)
        }],
        chart: {
            type: 'bar',
            height: 235,
            toolbar: {
                show: false
            },
        },
        plotOptions: {
            bar: {
                borderRadius: 6,
                horizontal: false,
                columnWidth: '52%',
                endingShape: 'rounded',
            }
        },
        dataLabels: {
            enabled: false
        },
        fill: {
            type: 'gradient',
            colors: ['#dae5ff'],
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#dae5ff'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100],
            },
        },
        grid: {
            show: false,
            borderColor: '#D1D5DB',
            strokeDashArray: 4,
            position: 'back',
            padding: {
                top: -10,
                right: -10,
                bottom: -10,
                left: -10
            }
        },
        xaxis: {
            type: 'category',
            categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        },
        yaxis: {
            show: false,
        },
    };

    var chart = new ApexCharts(document.querySelector("#barChart1"), options);
    chart.render();
</script>
<script>
    var options = {
        series: [{
            name: "Challans",
            data: @json($challanChartData)
        }],
        chart: {
            type: 'bar',
            height: 235,
            toolbar: {
                show: false
            },
        },
        plotOptions: {
            bar: {
                borderRadius: 6,
                horizontal: false,
                columnWidth: '52%',
                endingShape: 'rounded',
            }
        },
        dataLabels: {
            enabled: false
        },
        fill: {
            type: 'gradient',
            colors: ['#dae5ff'],
            gradient: {
                shade: 'light',
                type: 'vertical',
                shadeIntensity: 0.5,
                gradientToColors: ['#dae5ff'],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100],
            },
        },
        grid: {
            show: false,
            borderColor: '#D1D5DB',
            strokeDashArray: 4,
            position: 'back',
            padding: {
                top: -10,
                right: -10,
                bottom: -10,
                left: -10
            }
        },
        xaxis: {
            type: 'category',
            categories: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
        },
        yaxis: {
            show: false,
        },
    };

    var chart = new ApexCharts(document.querySelector("#barChart"), options);
    chart.render();
</script>

<script>
    var donutOptions = {
        series: @json($userChartSeries), 
        colors: ['#FF9F29', '#487FFF', '#9cb7d5', '#C8FA0D'], 
        labels: @json($userChartLabels), 
        legend: {
            show: false
        },
        chart: {
            type: 'donut',
            height: 270,
            sparkline: {
                enabled: true 
            },
            margin: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            }
        },
        stroke: {
            width: 0,
        },
        dataLabels: {
            enabled: false
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 300
                },
                legend: {
                    position: 'bottom'
                }
            }
        }],
    };

    var donutChart = new ApexCharts(document.querySelector("#userOverviewDonutChart"), donutOptions);
    donutChart.render();
</script>

<!-- <script src="{{ asset('public/assets/js/homeOneChart.js') }}"></> -->
@endpush