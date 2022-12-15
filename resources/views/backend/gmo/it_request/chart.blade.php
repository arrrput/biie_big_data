@extends('layouts.master')

@push('plugin-styles')
    {!! Html::style('assets/css/loader.css') !!}
@endpush

@section('content')
    <!--  Navbar Starts / Breadcrumb Area  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                <i class="las la-bars"></i>
            </a>
            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">{{__('IT & Media')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><span>{{__('Report')}}</span></li>
                            </ol>
                        </nav>
                    </div>
                </li>
            </ul>
        </header>
    </div>
    <!--  Navbar Ends / Breadcrumb Area  -->
    <!-- Main Body Starts -->
    <div class="layout-px-spacing">
        <div class="layout-top-spacing mb-2">
            <div class="col-md-12">
                <div class="row">
                    <div class="container p-0">
                        <div class="row layout-top-spacing">
                            
                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>
                                                    <i class="las la-chart-pie"></i>
                                                    {{__('IT Request Chart')}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_8" class="tabcontent">
                                                    <canvas id="canvas8"></canvas>

                                                    <table class="table table-hovered table-sm table-striped mt-3">
                                                        <thead>
                                                            <tr>
                                                                <td scope="col">Department</td>
                                                                <td scope="col">Total Request</td>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($table_it as $list)
                                                                <tr>
                                                                    <td>{{ $list->department}}</td>
                                                                    <td>{{ $list->total }} Request</td>
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


                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>
                                                    <i class="las la-chart-pie"></i>
                                                    {{__('Media Request Chart')}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_8" class="tabcontent">
                                                    <canvas id="canvas9"></canvas>

                                                    <table class="table table-hovered table-sm table-striped mt-3">
                                                        <thead>
                                                            <tr>
                                                                <td scope="col">Department</td>
                                                                <td scope="col">Total Request</td>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($table_media as $list)
                                                                <tr>
                                                                    <td>{{ $list->department}}</td>
                                                                    <td>{{ $list->total }} Request</td>
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

                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>
                                                    <i class="las la-chart-pie"></i>
                                                    {{__('Total IT Request')}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_8" class="tabcontent">
                                                    <canvas id="canvas10"></canvas>

                                                    <table class="table table-hovered table-sm table-striped mt-3">
                                                        <thead>
                                                            <tr>
                                                                <td scope="col">Category</td>
                                                                <td scope="col">Total Request</td>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td>Open</td>
                                                                    <td>{{ $total_it_open }} Request</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Close</td>
                                                                    <td>{{ $total_it_close }} Request</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="col-lg-6 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>
                                                    <i class="las la-chart-pie"></i>
                                                    {{__('Total Media Request')}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_8" class="tabcontent">
                                                    <canvas id="canvas11"></canvas>

                                                    <table class="table table-hovered table-sm table-striped mt-3">
                                                        <thead>
                                                            <tr>
                                                                <td scope="col">Category</td>
                                                                <td scope="col">Total Request</td>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td>Open</td>
                                                                    <td>{{ $total_media_open }} Request</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Close</td>
                                                                    <td>{{ $total_media_close }} Request</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 layout-spacing">
                                <div class="statbox widget box box-shadow">
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4>
                                                    <i class="las la-chart-pie"></i>
                                                    {{__('Monthly Report')}}
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-content widget-content-area">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div id="content_11" class="tabcontent">
                                                    <canvas id="canvas111"></canvas>

                                                    <table class="table table-hovered table-sm table-striped mt-3">
                                                        <thead>
                                                            <tr>
                                                                <td scope="col">Category</td>
                                                                <td scope="col">Total Request</td>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                                <tr>
                                                                    <td>Open</td>
                                                                    <td>{{ $total_media_open }} Request</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Close</td>
                                                                    <td>{{ $total_media_close }} Request</td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Body Ends -->
@endsection

@push('plugin-scripts')
    {!! Html::script('assets/js/loader.js') !!}
    {!! Html::script('plugins/chartjs/Chart.min.js') !!}
    {!! Html::script('plugins/chartjs/utils.js') !!}
    {!! Html::script('assets/js/charts/chart-js.js') !!}
@endpush

@push('custom-scripts')
<script>
(function($) {
    var config8 = {
        type: 'pie',
        data: {
            datasets: [{
                data: {!!json_encode($dataset)!!} ,
                backgroundColor: {!!json_encode($colours)!!},
                label: 'IT Media'
            }],
            labels:{!!json_encode($labels)!!}
        },
        options: {
            responsive: true
        }
    };

    var config9 = {
        type: 'pie',
        data: {
            datasets: [{
                data: {!!json_encode($dataset_media)!!} ,
                backgroundColor: {!!json_encode($colours_media)!!},
                label: 'Dataset 1'
            }],
            labels:{!!json_encode($labels_media)!!}
        },
        options: {
            responsive: true
        }
    };


    var config10 = {
        type: 'pie',
        data: {
            datasets: [{
                data: [{{ $total_it_open }}, {{ $total_it_close }}] ,
                backgroundColor: ["Red", "Grey"],
                label: 'Dataset 1'
            }],
            labels:["Open", "Close"]
        },
        options: {
            responsive: true
        }
    };

    var config11 = {
        type: 'pie',
        data: {
            datasets: [{
                data: [{{ $total_media_open }}, {{ $total_media_close }}] ,
                backgroundColor: ["Red", "Grey"],
                label: 'Dataset 1'
            }],
            labels:["Open", "Close"]
        },
        options: {
            responsive: true
        }
    };

    var chartData11 = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [{
            type: 'line',
            label: 'Dataset 1',
            borderColor: window.chartColors.blue,
            borderWidth: 2,
            fill: false,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ]
        }, {
            type: 'bar',
            label: 'Dataset 2',
            backgroundColor: window.chartColors.red,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ],
            borderColor: 'white',
            borderWidth: 2
        }, {
            type: 'bar',
            label: 'Dataset 3',
            backgroundColor: window.chartColors.green,
            data: [
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor(),
                randomScalingFactor()
            ]
        }]
    };


    window.onload = function() {

        var ctx11 = document.getElementById('canvas111').getContext('2d');
        window.myMixedChart = new Chart(ctx11, {
            type: 'bar',
            data: chartData11,
            options: {
                responsive: true,
                title: {
                    display: false,
                    text: 'Chart.js Combo Bar Line Chart'
                },
                tooltips: {
                    mode: 'index',
                    intersect: true
                }
            }
        });

        // 8
        var ctx8 = document.getElementById('canvas8').getContext('2d');
        window.myPie = new Chart(ctx8, config8);

        var ctx9 = document.getElementById('canvas9').getContext('2d');
        window.myPie = new Chart(ctx9, config9);

        var ctx10 = document.getElementById('canvas10').getContext('2d');
        window.myPie = new Chart(ctx10, config10);

        var ctx11 = document.getElementById('canvas11').getContext('2d');
        window.myPie = new Chart(ctx11, config11);
       
    };

})(jQuery)
</script>
@endpush
