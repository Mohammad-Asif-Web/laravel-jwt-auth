
@extends('backend.app')

@section('title', 'Users')

@push('style')

@endpush

@section('content')
<div class="main_content_iner ">
    <div class="container-fluid p-0">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="dashboard_header mb_50">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="dashboard_header_title">
                                <h3> Profilebox</h3>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="dashboard_breadcam text-end">
                                <p><a href="index-2.html">Dashboard</a> <i class="fas fa-caret-right"></i>
                                    Profilebox</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($users as $user)
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('backend/img/profilebox/1.jpg')}}" alt
                            data-original-title title></div>
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('backend/img/profilebox/7.jpg')}}" alt
                            data-original-title title></div>
                    <div class="text-center profile-details">
                        <h4>{{$user->name}}</h4>
                        <h6>{{$user->role}}</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Follower</h6>
                            <h3 class="counter">9564</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Following</h6>
                            <h3><span class="counter">49</span>K</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Total Post</h6>
                            <h3><span class="counter">96</span>M</h3>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            {{-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('backend/img/profilebox/2.jpg')}}" alt
                            data-original-title title></div>
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('backend/img/profilebox/8.jpg')}}" alt
                            data-original-title title></div>
                    <div class="text-center profile-details">
                        <h4>Johan Deo</h4>
                        <h6>Designer</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Follower</h6>
                            <h3 class="counter">9564</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Following</h6>
                            <h3><span class="counter">49</span>K</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Total Post</h6>
                            <h3><span class="counter">96</span>M</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('backend/img/profilebox/3.jpg')}}" alt
                            data-original-title title></div>
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('backend/img/profilebox/9.jpg')}}" alt
                            data-original-title title></div>
                    <div class="text-center profile-details">
                        <h4>Dev John</h4>
                        <h6>Developer</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Follower</h6>
                            <h3 class="counter">9064</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Following</h6>
                            <h3><span class="counter">59</span>K</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Total Post</h6>
                            <h3><span class="counter">56</span>M</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('backend/img/profilebox/1.jpg')}}" alt
                            data-original-title title></div>
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('backend/img/profilebox/7.jpg')}}" alt
                            data-original-title title></div>
                    <div class="text-center profile-details">
                        <h4>Mark Jecno</h4>
                        <h6>Manager</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Follower</h6>
                            <h3 class="counter">9564</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Following</h6>
                            <h3><span class="counter">49</span>K</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Total Post</h6>
                            <h3><span class="counter">96</span>M</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('backend/img/profilebox/2.jpg')}}" alt
                            data-original-title title></div>
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('backend/img/profilebox/8.jpg')}}" alt
                            data-original-title title></div>
                    <div class="text-center profile-details">
                        <h4>Johan Deo</h4>
                        <h6>Designer</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Follower</h6>
                            <h3 class="counter">9564</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Following</h6>
                            <h3><span class="counter">49</span>K</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Total Post</h6>
                            <h3><span class="counter">96</span>M</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                <div class="card custom-card">
                    <div class="card-header"><img class="img-fluid" src="{{asset('backend/img/profilebox/3.jpg')}}" alt
                            data-original-title title></div>
                    <div class="card-profile"><img class="rounded-circle" src="{{asset('backend/img/profilebox/9.jpg')}}" alt
                            data-original-title title></div>
                    <div class="text-center profile-details">
                        <h4>Dev John</h4>
                        <h6>Developer</h6>
                    </div>
                    <div class="card-footer row">
                        <div class="col-4 col-sm-4">
                            <h6>Follower</h6>
                            <h3 class="counter">9064</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Following</h6>
                            <h3><span class="counter">59</span>K</h3>
                        </div>
                        <div class="col-4 col-sm-4">
                            <h6>Total Post</h6>
                            <h3><span class="counter">56</span>M</h3>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
</div>
@endsection

@push('script')

@endpush


