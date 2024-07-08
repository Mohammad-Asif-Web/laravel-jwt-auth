<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Login Page | Dashboard</title>
    <link rel="icon" href="img/mini_logo.png" type="image/png">
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap1.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/vendors/font_awesome/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('backend/css/style1.css')}}" />
</head>

<body class="crm_body_bg">

    <div class="col-lg-12" style="height: 100vh;">
        <div class="white_box mb_30 h-100"
            style="background-image: url(/backend/img/bg.png);
                    background-repeat: no-repeat;
                    background-position: center bottom;
                    background-size: contain;
                    /* background-blend-mode: luminosity;"
        >
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="modal-content cs_modal">
                        <div class="modal-header justify-content-center theme_bg_1">
                            <h5 class="modal-title text_white">Dashboard Log in</h5>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('dashboard.store') }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn_1 full_width text-center">Log in</button>
                                {{-- <div class="text-center">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#forgot_password" data-bs-dismiss="modal" class="pass_forget_btn">Forget Password?</a>
                                </div> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- default js -->
    <script src="{{asset('backend/js/popper1.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap1.min.js')}}"></script>
</body>

</html>
