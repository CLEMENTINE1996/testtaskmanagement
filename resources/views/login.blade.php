
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Test App Login</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ env('APP_URL') }}public/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="{{ env('APP_URL') }}public/css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <form method="POST" action="{{ route('authenticate') }}" class="login-form-bg h-100">
        {{ csrf_field() }}
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="index.html"> <h4>Task Management Application</h4></a>
                                <br>

                                <h5 class="text-danger">{{ session('error') }}</h5>
                                <form class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100">Sign In</button>
                                    <br><br>
                                    <a href="{{ env('ASSET_URL') }}register" class="btn btn-info  w-100">Register</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{ env('APP_URL') }}public/plugins/common/common.min.js"></script>
    <script src="{{ env('APP_URL') }}public/js/custom.min.js"></script>
    <script src="{{ env('APP_URL') }}public/js/settings.js"></script>
    <script src="{{ env('APP_URL') }}public/js/gleek.js"></script>
    <script src="{{ env('APP_URL') }}public/js/styleSwitcher.js"></script>
</body>
</html>





