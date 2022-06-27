
<!DOCTYPE html>
<html dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex,nofollow">
        <title>404 != Found</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro/" />
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/')}}public/images/favicon.png">
        <!-- Custom CSS -->
        <link href="{{asset('/')}}public/css/style.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="main-wrapper">
            <div class="preloader">
                <div class="lds-ripple">
                    <div class="lds-pos"></div>
                    <div class="lds-pos"></div>
                </div>
            </div>
            <div class="error-box">
                <div class="error-body text-center">
                    <h1 class="error-title text-danger">404</h1>
                    <h3 class="text-uppercase error-subtitle">PAGE NOT FOUND !</h3>
                    <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-danger btn-rounded waves-effect waves-light mb-5">Back to home</a> </div>
            </div>
        </div>
        <script src="{{asset('/')}}public/js/jquery.min.js"></script>
        <script src="{{asset('/')}}public/js/popper.min.js"></script>
        <script src="{{asset('/')}}public/js/bootstrap.min.js"></script>
        <script>
                        $('[data-toggle="tooltip"]').tooltip();
                        $(".preloader").fadeOut();
        </script>
    </body>

</html>