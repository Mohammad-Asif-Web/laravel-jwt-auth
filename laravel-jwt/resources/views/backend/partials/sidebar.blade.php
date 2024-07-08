<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a class="large_logo" href="index.html"><img src="{{asset('backend/img/logo.png')}}" alt></a>
        <a class="small_logo" href="index.html"><img src="{{asset('backend/img/mini_logo.png')}}" alt></a>
    </div>
    <!--=========== SIDEBAR MENU ============-->
    <ul id="sidebar_menu">
        <li>
            <a href="{{route('dashboard')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/dashboard.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Dashboard</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{route('dashboard.profile')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/8.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Profile</span>
                </div>
            </a>
        </li>
        <li>

        <h4 class="menu-text"><span>Modules</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li>
            <a href="{{route('sport.index')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Sport</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{route('skill.index')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Skill</span>
                </div>
            </a>
        </li>
        {{-- <li>
            <a href="{{route('terms.index')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Terms & Conditions</span>
                </div>
            </a>
        </li> --}}

        {{-- <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Sport</span>
                </div>
            </a>
            <ul>
                <li><a href="{{route('sport.index')}}">Sport List</a></li>
            </ul>
        </li> --}}
        {{-- <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Skill</span>
                </div>
            </a>
            <ul>
                <li><a href="{{route('skill.create')}}">Add New Skill</a></li>
                <li><a href="{{route('skill.index')}}">Skill List</a></li>
            </ul>
        </li> --}}

        {{-- <h4 class="menu-text"><span>Frontend</span> <i class="fas fa-ellipsis-h"></i> </h4>
        <li>
            <a href="{{route('dashboard.users')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Users</span>
                </div>
            </a>
        </li>
        <li>
            <a href="faq.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Faq</span>
                </div>
            </a>
        </li>
        <li>
            <a href="{{route('dashboard.gallery')}}" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Gallery</span>
                </div>
            </a>
        </li>
        <li>
            <a href="setting.html" aria-expanded="false">
                <div class="nav_icon_small">
                    <img src="{{asset('backend/img/menu-icon/9.svg')}}" alt>
                </div>
                <div class="nav_title">
                    <span>Setting</span>
                </div>
            </a>
        </li> --}}

    </ul>
</nav>
