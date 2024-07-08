@extends('backend.app')

@section('title', 'Dashboard')

@push('style')

@endpush

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <!-- ===========Breadcrumb========= -->
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Welcome, Admin </h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="index-2.html">Dashboard</a> <i class="fas fa-caret-right"></i>Home</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- =========MAIN PANEL DETAILS========== -->
            <div class="col-md-4">
                <div class="card mb-3 widget-chart">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg bg-primary"></div>
                        <i class="ti-settings text-primary"></i>
                    </div>
                    <div class="widget-numbers"><span>46k</span></div>
                    <div class="widget-subheading">Total Views</div>
                    <div class="widget-description text-success">
                        <i class="fa fa-angle-up ">
                        </i>
                        <span class="ps-1"><span>176%</span></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 widget-chart">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg bg-danger"></div>
                        <i class="ti-settings text-danger"></i>
                    </div>
                    <div class="widget-numbers"><span>5,82k</span></div>
                    <div class="widget-subheading">Reports Submitted</div>
                    <div class="widget-description text-primary"><span class="pe-1">54.1%</span>
                        <i class="fa fa-angle-up ">
                        </i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 widget-chart">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg bg-info"></div>
                        <i class="ti-settings text-info"></i>
                    </div>
                    <div class="widget-numbers"><span>62k</span></div>
                    <div class="widget-subheading">Bugs Fixed</div>
                    <div class="widget-description text-info">
                        <i class="fa fa-arrow-right ">
                        </i>
                        <span class="ps-1">175.5%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 widget-chart">
                    <div class="icon-wrapper rounded">
                        <div class="icon-wrapper-bg bg-focus"></div>
                        <div class="center-svg">
                            <i class="fa fa-arrow-right ">
                            </i>
                        </div>
                    </div>
                    <div class="widget-numbers"><span>2,82k</span></div>
                    <div class="widget-subheading">Total Sales</div>
                    <div class="widget-description text-danger"><span class="pe-1">23.1%</span>
                        <i class="fa fa-angle-down ">
                        </i>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 widget-chart">
                    <div class="icon-wrapper rounded">
                        <div class="icon-wrapper-bg bg-primary"></div>
                        <div class="center-svg">
                            <i class="fa fa-angle-down ">
                            </i>
                        </div>
                    </div>
                    <div class="widget-numbers"><span>32k</span></div>
                    <div class="widget-subheading">Follow-ups</div>
                    <div class="widget-description text-focus">
                        <i class="fa fa-arrow-left ">
                        </i>
                        <span class="ps-1">115.5%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 widget-chart card-hover-shadow-2x">
                    <div class="icon-wrapper border-light rounded">
                        <div class="icon-wrapper-bg bg-light"></div>
                        <i class="ti-settings icon-gradient bg-happy-itmeo"></i>
                    </div>
                    <div class="widget-numbers">63.2k</div>
                    <div class="widget-subheading">Bugs Fixed</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 widget-chart">
                    <div class="widget-numbers">1.2M</div>
                    <div class="widget-subheading">Leads Generated</div>
                    <div class="widget-description text-info">
                        <i class="fa fa-ellipsis-h">
                        </i>
                        <span class="ps-1">115.5%</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-3 widget-chart">
                    <div class="widget-numbers">3.47k</div>
                    <div class="widget-subheading">Users Active</div>
                    <div class="widget-description text-danger"><span class="pe-1">31.2%</span>
                        <i class="fa fa-angle-down ">
                        </i>
                    </div>
                </div>
            </div>
            <!--=========== MAIN PANEL DETAILS END========= -->
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush

