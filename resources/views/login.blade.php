<!DOCTYPE html>
<html dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login || CMS</title>
        <link rel="icon" type="image/png" href="{{asset('/')}}public/favicon.ico" sizes="32x32">
        <link href="{{asset('/')}}public/css/style.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/')}}public/css/toastr.css">
        <style>
            @font-face {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 400;
                src: url('{{asset("/")}}public/fonts/Montserrat-Regular.ttf');
            }
            ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
                color:#fff;
            }
            :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
                color:#fff;
            }
            ::-moz-placeholder { /* Mozilla Firefox 19+ */
                color:#fff;
            }
            :-ms-input-placeholder { /* Internet Explorer 10-11 */
                color:#fff;
            }
            ::-ms-input-placeholder { /* Microsoft Edge */
                color:#fff;
            }

            ::placeholder { /* Most modern browsers support this now. */
                color:#fff !important;
            }
        </style>
    </head>
    <body style="font-family: Montserrat">
        <div class="main-wrapper">
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url({{asset('/')}}public/images/bgimage.jpg) no-repeat center center; background-size: cover;">
                <div class="auth-box p-4 bg-white rounded" style="background: transparent !important;color: #fff">
                    <div id="loginform">
                        <div class="logo">
                            <h3 class="box-title mb-3" style="text-transform: uppercase;color: #fff;margin-left: 20px;">Welcome To Canteen</h3>
                        </div>
                        <!-- Form -->
                        <div class="row">
                            <div class="col-12">
                                <form class="form-horizontal mt-3 form-material" id="loginform" action="{{ route('useraccess') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <div class="">
                                            <input class="form-control" type="text" name="username" style="color: #fff;" placeholder="Username" required=""> 
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="">
                                            <input class="form-control" type="password" name="password" style="color: #fff;" placeholder="Password" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex">
                                            <div class="checkbox checkbox-info pt-0 d-flex align-items-center"></div> 
                                            <div class="ml-auto">
                                                <!--<a href="javascript:void(0)" id="to-recover" class="text-muted" style="color: #fff !important"><i class="fa fa-lock mr-1"></i> Forgot password?</a>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-center mt-4">
                                        <div class="col-xs-12">
                                            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" style="background: transparent;border-color: #fff">Log In</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="recoverform">
                        <div class="logo">
                            <h3 class="font-weight-medium mb-3" style="color: #fff !important">Recover Password</h3>
                            <span class="text-muted" style="color: #fff !important">Enter your Email and instructions will be sent to you!</span>
                        </div>
                        <div class="row mt-3 form-material">
                            <!-- Form -->
                            <form class="col-12" action="#">
                                <!-- email -->
                                <div class="form-group row">
                                    <div class="col-12">
                                        <input class="form-control" style="color: #fff" type="email" required="" placeholder="Username">
                                    </div>
                                </div>
                                <!-- pwd -->
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-lg btn-primary text-uppercase" type="submit" style="background: transparent;border-color: #fff">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('/')}}public/js/jquery.min.js"></script>
        <script src="{{asset('/')}}public/js/popper.min.js"></script>
        <script src="{{asset('/')}}public/js/bootstrap.min.js"></script>
        <script src="{{asset('/')}}public/js/toastr.min.js"></script>
        <script>
        </script>
        <script>
            $('[data-toggle="tooltip"]').tooltip();
            $(".preloader").fadeOut();
            $('#to-recover').on("click", function () {
                $("#loginform").slideUp();
                $("#recoverform").fadeIn();
            });
        </script>
        @if (Session::has('message'))
        <script>
            var type = "{{Session::get('alert-type')}}";
            if (type === "success") {
                toastr.options.timeOut = 3000;
                toastr.success("{{Session::get('message')}}");
            } else {
                toastr.options.timeOut = 3000;
                toastr.error("{{Session::get('message')}}");
            }
        </script>
        @endif
    </body>
</html>