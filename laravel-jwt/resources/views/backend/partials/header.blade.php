<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0 ">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <!-- sidebar on/off toggle checkbox -->
                <label class="form-label switch_toggle d-none d-lg-block" for="checkbox">
                    <input type="checkbox" id="checkbox">
                    <div class="slider round open_miniSide"></div>
                </label>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <!-- =====searchbox===== -->
                        {{-- <li>
                            <div class="serach_button">
                                <i class="ti-search"></i>
                                <div class="serach_field-area d-flex align-items-center">
                                    <div class="search_inner">
                                        <form action="#">
                                            <div class="search_field">
                                                <input type="text" placeholder="Search here...">
                                            </div>
                                            <button class="close_search"> <i class="ti-search"></i> </button>
                                        </form>
                                    </div>
                                    <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                                </div>
                            </div>
                        </li> --}}
                        <!-- =====notification====== -->
                        <li>
                            <a class="bell_notification_clicker" href="#"> <img src="{{asset('backend/img/icon/bell.svg')}}" alt>
                                <span>2</span>
                            </a>

                            <div class="Menu_NOtification_Wrap">
                                <div class="notification_Header">
                                    <h4>Notifications</h4>
                                </div>
                                <div class="Notification_body">

                                    {{-- single notification --}}
                                    @forelse($notifications as $notification)
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_thumb">
                                                <a href="#"><img src="{{ asset($notification->user->profile_img) }}" alt=""></a>
                                            </div>
                                            <div class="notify_content">
                                                <a href="#">
                                                    <h5>{{ $notification->title ?? 'Notification Title' }}</h5>
                                                </a>
                                                <p>
                                                    @if ($notification->post)
                                                        Post: {{ $notification->post->post_text }}
                                                    @elseif ($notification->comment)
                                                        Comment: {{ $notification->comment }}
                                                    @else
                                                        {{ $notification->mention['message'] ?? 'No additional information' }}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="single_notify d-flex align-items-center">
                                            <div class="notify_content">
                                                <p>No new notifications</p>
                                            </div>
                                        </div>
                                    @endforelse


                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="#" class="btn_1">See More</a>
                                    </div>
                                </div>
                            </div>

                        </li>
                    </div>
                    <!-- ===========profile=========== -->
                    <div class="profile_info">
                        <div class="img" style="width: 42px; height:42px; border-radius:50px;">
                            <img src="{{asset( Auth::user()->profile_img )}}" class="w-100 h-100" alt="#">
                        </div>

                        <div class="profile_info_iner">
                            <div class="profile_author_name">
                                <p class="text-capitalize">{{ Auth::user()->role }}</p>
                                <h5>{{ Auth::user()->name }}</h5>
                            </div>
                            <div class="profile_info_details">
                                <a href="{{ route('dashboard.profile') }}">My Profile </a>
                                <a href="setting.html">Settings</a>
                                <form action="{{ route('dashboard.logout') }}" method="POST">
                                    @csrf
                                    {{-- <input type="hidden" name="token" value="{{ auth()->user()->token }}"> --}}
                                    <button type="submit" style="border: 0; color: #2e4765;font-size: 14px;display: block;padding: 10px 0;font-weight: 400;background: 0;">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
