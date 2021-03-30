@extends('layout.dashboard')

@section('content')
<div class="app-content">
    <section class="section">

        <!--page-header open-->
        @include('include.breadcrum')
        <!--page-header closed-->

        <!--row open-->
        <div class="row">
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">
                            Today sales
                        </p>
                        <div class="">
                            <h4 class="mt-2 mb-3">$2,345</h4>
                            <div class="">
                                <span class="sparkline_bar-1"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <p class="mb-0"><span class=""><i class="fa fa-arrow-circle-o-up ml-1 text-success"></i>
                                    2.5%</span> last
                                month</p>
                        </div>
                        <div class="float-right">
                            <i class="fa fa-line-chart"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">
                            Today Orders
                        </p>
                        <div class="">
                            <h4 class="mt-2 mb-3">$568</h4>
                            <div class="">
                                <span class="sparkline_pie"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <p class="mb-0"><span class=""><i class="fa fa-arrow-circle-o-down ml-1 text-danger"></i>
                                    4%</span> last
                                month</p>
                        </div>
                        <div class="float-right">
                            <i class="fa fa-shopping-cart "></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">
                            Sales Revenue
                        </p>
                        <div class="">
                            <h4 class="mt-2 mb-3">$135</h4>
                            <div class="">
                                <span class="sparkline_line1"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <p class="mb-0"><span class=""><i class="fa fa-arrow-circle-o-up ml-1 text-success"></i>
                                    12%</span> last
                                month</p>
                        </div>
                        <div class="float-right">
                            <i class="fa fa-signal"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-md-6 col-12">
                <div class="card">
                    <div class="card-body text-center">
                        <p class="text-muted mb-1">
                            Today Profit
                        </p>
                        <div class="">
                            <h4 class="mt-2 mb-3">15%</h4>
                            <div class="">
                                <span class="sparkline_discreet"></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-left">
                            <p class="mb-0"><span class=""><i class="fa fa-arrow-circle-o-down ml-1 text-danger"></i>
                                    5%</span> last
                                month</p>
                        </div>
                        <div class="float-right">
                            <i class="fa fa-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--row closed-->

        <!--row open-->
        <div class="row row-deck">
            <div class="col-lg-6 col-xl-5 col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Revenue</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="text-center">
                                <div class="mb-2">
                                    <h6 class=" mb-1">Total Revenue</h6>
                                    <h3 class=" mb-2">15,730</h3>
                                    <span class="text-success"><i
                                            class="zmdi zmdi-long-arrow-up zmdi-hc-lg mr-2"></i><span>+24%</span></span><span
                                        class="text-muted ml-2">From Last Month</span>
                                </div>
                            </div>
                        </div>
                        <canvas id="barChart" class="chartjs-render-monitor  h-250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-7 col-md-12 col-12">
                <div class="card overflow-hidden">
                    <div class="card-header">
                        <h4>Statistics</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="sales-chart" class="chartjs-render-monitor chart-dropshadow h-350"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!--row closed-->

        <!--row open-->
        <div class="row">
            <div class="col-lg-6 col-xl-3 col-sm-12 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-primary mr-3">
                            <i class="fa fa-users"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong>765</strong></h4>
                            <h6 class="mb-0">Customers</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-sm-12 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-orange mr-3">
                            <i class="fa fa-cart-arrow-down"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong>92</strong></h4>
                            <h6 class="mb-0">Selling</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-sm-12 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-warning mr-3">
                            <i class="fa fa-eye"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong>2,456 </strong></h4>
                            <h6 class="mb-0">Visitors</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-3 col-sm-12 col-md-6">
                <div class="card p-3">
                    <div class="d-flex align-items-center">
                        <span class="stamp stamp-md bg-success mr-3">
                            <i class="fa fa-file-text"></i>
                        </span>
                        <div>
                            <h4 class="m-0"><strong>125 </strong></h4>
                            <h6 class="mb-0">FeedBack</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--row closed-->

        <!--row open-->
        <div class="row row-deck">
            <div class="col-xl-4 col-lg-6 col-sm-12 col-sm-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4>Sales Status</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="pieChart" class="chartjs-render-monitor chart-dropshadow"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-sm-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Browsing Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <p class="mb-2">Chrome<span class="float-right text-muted">80%</span></p>
                            <div class="progress h-6">
                                <div class="progress-bar bg-primary w-80 " role="progressbar"></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="mb-2">Firefox<span class="float-right text-muted">70%</span></p>
                            <div class="progress h-6">
                                <div class="progress-bar bg-secondary w-70" role="progressbar"></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="mb-2">Safari<span class="float-right text-muted">70%</span></p>
                            <div class="progress h-6">
                                <div class="progress-bar bg-warning w-70" role="progressbar"></div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <p class="mb-2">Opera<span class="float-right text-muted">60%</span></p>
                            <div class="progress h-6">
                                <div class="progress-bar bg-success w-60" role="progressbar"></div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-2">Internet Explore<span class="float-right text-muted">60%</span></p>
                            <div class="progress h-6">
                                <div class="progress-bar bg-info w-60" role="progressbar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-12 col-sm-12 col-sm-12">
                <div class="card ">
                    <div class="card-header ">
                        <h4>Order Status</h4>
                    </div>
                    <div class="card-body">
                        <div id="bar-chart2" class="overflow-hidden h-280 chart-dropshadow"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--row closed-->

    </section>
</div>
@endsection
