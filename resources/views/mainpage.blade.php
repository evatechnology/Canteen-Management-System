<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title') || CMS</title>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}public/favicon.ico" sizes="32x32">
        <link href="{{asset('/')}}public/css/c3.min.css" rel="stylesheet" type="text/css"/>
        <link href="{{asset('/')}}public/css/style.min.css" rel="stylesheet">
        <link href="{{asset('/')}}public/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="{{asset('/')}}public/css/sweetalert2.min.css">
        <link rel="stylesheet" href="{{asset('/')}}public/css/toastr.css">
        <link rel="stylesheet" href="{{asset('/')}}public/css/jquery-ui.css">
        <link rel="stylesheet" href="{{asset('/')}}public/css/select2.min.css">
        <link rel="stylesheet" href="{{asset('/')}}public/css/scrolltop.css">
        <style>
            @font-face {
                font-family: 'Montserrat';
                font-style: normal;
                font-weight: 400;
                src: url('{{asset("/")}}public/fonts/Montserrat-Regular.ttf');
            }
            .form-control{
                line-height: 15px;
            }
            .select2-container--default .select2-selection--single {
                height: calc(1.5em + .75rem + 2px);
                line-height: 2;
                padding: 6px 24px 6px 12px;
                border: 1px solid #1e88e5;
                border-radius: 10px;
            }
            .select2-container--default .select2-selection--single .select2-selection__rendered {
                color: #444;
                line-height: 20px;
            }
            .header_bootom{
                border-bottom: 1px solid #1e88e5;
            }
            .card_body{
                border: 1px solid #1e88e5;
            }
            .table_header{
                background:#1e88e5;
                color:#fff;
                font-weight:bold;
                text-transform: uppercase;
            }
            .form-control-sm{
                border: 1px solid #1e88e5;
            }
            .blink {
                animation: blinker 1.8s linear infinite;
                /*color: #1c87c9;*/
                /*font-size: 30px;*/
                /*font-weight: bold;*/
                /*font-family: sans-serif;*/
            }
            @keyframes blinker {
                50% {
                    opacity: 0;
                }
            }
        </style>
        <script src="{{asset('/')}}public/js/jquery.min.js"></script>
    </head>
    <body>
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div id="main-wrapper">
            <header class="topbar">
                <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                    <div class="navbar-header">
                        <!-- This is for the sidebar toggle which is visible on mobile only -->
                        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                                class="ti-menu ti-close"></i></a>
                        <a class="navbar-brand" href="javascript:void(0)" style="background: #1e88e5;">
                            <!-- Logo icon -->
                            <b class="logo-icon">
                                <img src="{{asset('/')}}public/images/icon.png" alt="Logo" style="height:50px;width:50px;" class="light-logo" />
                            </b>
                            <span class="logo-text">
                                <h3 class="light-logo" style="color: #fff;margin-top: 15px;text-transform: uppercase;">CMS</h3>
                            </span>
                        </a>
                        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                           data-toggle="collapse" data-target="#navbarSupportedContent"
                           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                                class="ti-more"></i></a>
                    </div>
                    <div class="navbar-collapse collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <!-- This is  -->

                        </ul>
                        <ul class="navbar-nav">
                            @if(Auth::user()->role==1)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="{{URL::to('/viewtodayssales')}}"
                                   aria-haspopup="true" aria-expanded="false"> 
                                    <i class="fa fa-shopping-cart"></i><span style="background: red;padding: 0px 4px 0px 4px;border-radius: 50px;position: relative;bottom: 10px;font-weight: bold;" id="datanoti"></span>
                                </a>
                            </li>
                            <li class="nav-item dropdown" id="alertnoti"></li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown"
                                   aria-haspopup="true" aria-expanded="false">
                                    <img src="{{asset(Session::get('userphoto'))}}" alt="user" width="30" class="profile-pic rounded-circle" />
                                </a>
                                <div class="dropdown-menu mailbox dropdown-menu-right scale-up">
                                    <ul class="dropdown-user list-style-none">
                                        <li>
                                            <div class="dw-user-box p-3 d-flex">
                                                <div class="u-img"><img src="{{asset(Session::get('userphoto'))}}" alt="user" class="rounded" width="80"></div>
                                                <div class="u-text ml-2">
                                                    <h4 class="mb-0">{{Session::get('username')}}</h4>
                                                    <p class="text-muted mb-1 font-14">{{Session::get('rolename')}}</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li role="separator" class="dropdown-divider"></li>
                                        <li class="user-list"><a class="px-3 py-2" href="{{URL::to('/profile')}}"><i class="ti-user"></i> My Profile</a></li>
                                        <!--<li class="user-list"><a class="px-3 py-2" href="{{URL::to('/inbox')}}"><i class="ti-email"></i> Inbox</a></li>-->
                                        <li class="user-list"><a class="px-3 py-2 logout" href="javascript:void(0)"><i class="fa fa-power-off"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <aside class="left-sidebar" style="border-bottom: 1px solid #1e88e5;">
                <div class="scroll-sidebar">
                    <nav class="sidebar-nav">
                        @include('menu')
                    </nav>
                </div>
            </aside>
            <div class="page-wrapper">
                @yield('content')
                <footer class="footer">
                    <!--                    © 2020 Material Pro Admin by wrappixel.com-->
                </footer>
                <a id="back2Top" title="Back to top" href="#">&#10148;</a>
            </div>
        </div>
        <script src="{{asset('/')}}public/js/popper.min.js"></script>
        <script src="{{asset('/')}}public/js/bootstrap.min.js"></script>
        <script src="{{asset('/')}}public/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('/')}}public/js/app.min.js"></script>
        <script src="{{asset('/')}}public/js/app.init.horizontal.js"></script>
        <script src="{{asset('/')}}public/js/app-style-switcher.horizontal.js"></script>
        <script src="{{asset('/')}}public/js/perfect-scrollbar.jquery.min.js"></script>
        <script src="{{asset('/')}}public/js/sparkline.js"></script>
        <script src="{{asset('/')}}public/js/waves.js"></script>
        <script src="{{asset('/')}}public/js/sidebarmenu.js"></script>
        <script src="{{asset('/')}}public/js/custom.min.js"></script>
        <script src="{{asset('/')}}public/js/d3.min.js"></script>
        <script src="{{asset('/')}}public/js/c3.min.js"></script>
        <script src="{{asset('/')}}public/js/jquery.dataTables.js"></script>
        <script src="{{asset('/')}}public/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('/')}}public/js/custom-datatable.js"></script>
        <script src="{{asset('/')}}public/js/sweetalert2.all.min.js"></script>
        <script src="{{asset('/')}}public/js/jquery-ui.js"></script>
        <script src="{{asset('/')}}public/js/select2.min.js"></script>
        <script src="{{asset('/')}}public/js/scrolltop.js"></script>
        <script>
        </script>
        <script>
            $(function () {
                $(".allDate").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "dd-mm-yy"
                });
            });
            $(document).ready(function () {
                $('form').attr('autocomplete', 'off');
            });
            $(document).ready(function () {
                $('[data-toggle=tooltip]').tooltip();
            });
            $(".multipleselect").select2({
//                placeholder: "Type 'aero'",
            });
        </script>
        <script>
            $(function () {
                $('.setdatatable').DataTable();
            });
            $(function () {
                $('.allTable').DataTable({
                    "paging": false,
                    "ordering": false,
                    "info": false
                });
            });
        </script>
        <script src="{{asset('/')}}public/js/toastr.min.js"></script>
        @if (Session::has('message'))
        <script>
            var type = "{{Session::get('alert-type')}}";
            if (type === "success") {
                toastr.options.timeOut = 4000;
                toastr.success("{{Session::get('message')}}");
            } else {
                toastr.options.timeOut = 4000;
                toastr.error("{{Session::get('message')}}");
            }
        </script>
        @endif
        <script type="text/javascript">
            get_daily_notification();
            function get_daily_notification() {
                $.ajax({
                    type: "GET",
                    url: "{{URL::to('get_sales_notification')}}",
                    success: function (data) {
                        $('#datanoti').html(data);
                    }
                });
            }
            product_zerro_notification();
            function product_zerro_notification() {
                $.ajax({
                    type: "GET",
                    url: "{{URL::to('product_zerro_notification')}}",
                    success: function (data) {
                        if (data) {
                            var li = '<a class="nav-link dropdown-toggle waves-effect waves-dark blink" href="{{URL::to("/viewzerroproducts")}}"' +
                                    'aria-haspopup="true" aria-expanded="false">' +
                                    '<i class="fa fa-gift"></i><span style="background: red;padding: 0px 4px 0px 4px;border-radius: 50px;position: relative;bottom: 10px;font-weight: bold;">' + data + '</span>' +
                                    '</a>';
                            $("#alertnoti").append(li);
                        }
                    }
                });
            }
        </script>
        <script type="text/javascript">
            $('.logout').click(function () {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes',
                    cancelButtonText: "No"
                }).then((result) => {
                    if (result.value) {
                        Swal(window.location.href = '{{URL::to("logout")}}');
                    }
                });
            });
        </script>
        <script>
            function numberOnly(id) {
                var element = document.getElementById(id);
                var regex = /[^0-9]/gi;
                element.value = element.value.replace(regex, "");
            }
            function numberOnlyTwo(id) {
                var element = document.getElementById(id);
                var regex = /[^0-9]/gi;
                element.value = element.value.replace(regex, "");
            }
            function numberOnlyThree(id) {
                var element = document.getElementById(id);
                var regex = /[^0-9]/gi;
                element.value = element.value.replace(regex, "");
            }
            function numberOnlyFour(id) {
                var element = document.getElementById(id);
                var regex = /[^0-9]/gi;
                element.value = element.value.replace(regex, "");
            }
            function numberOnlyFive(id) {
                var element = document.getElementById(id);
                var regex = /[^0-9]/gi;
                element.value = element.value.replace(regex, "");
            }
            function numberOnlySix(id) {
                var element = document.getElementById(id);
                var regex = /[^0-9]/gi;
                element.value = element.value.replace(regex, "");
            }
        </script>
        <script type="text/javascript">
            $('.reportpage').click(function () {
                alert('Reporting task is comeing soon....');
            });
        </script>
    </body>

</html>