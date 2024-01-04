<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Task Management Application</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ env('ASSET_URL') }}images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="{{ env('ASSET_URL') }}css/style.css" rel="stylesheet">
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">

</head>

<body>

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

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header bg-dark">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="text-white">Task Management Application</b>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->

        <?php 
            $user = App\Models\User
            ::join("persons","persons.id","=","users.person_id")
            ->where("users.id", "=", Auth::id())
            ->select("person_id", "lastname", "firstname")
            ->first();
        ?>

        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
                                <span><?php echo ($user->firstname??'') . " " . ($user->lastname??''); ?></span>
                            </a>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile   dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li><a href="/logoutget"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->


@yield('content')



    <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->


    <script src="{{ env('ASSET_URL') }}plugins/common/common.min.js"></script>
    <script src="{{ env('ASSET_URL') }}js/custom.min.js"></script>
    <script src="{{ env('ASSET_URL') }}js/settings.js"></script>
    <script src="{{ env('ASSET_URL') }}js/gleek.js"></script>
    <script src="{{ env('ASSET_URL') }}js/styleSwitcher.js"></script>

    

    

</body>

</html>