<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="Call Stats Center">
    <link rel="shortcut icon" href="img/favicon.png">

    <meta name="token" content="{{ csrf_token() }}">



    <title>Irouting</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css"
        media="screen" />
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">

    <!--right slidebar-->
    <link href="{{ asset('css/slidebars.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-responsive.css') }}" rel="stylesheet" />
    <script>
        const API = "{{ $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . config('app.API') . '/' }}"
    </script>
</head>

<body class="light-sidebar-nav">
    <div id="app">
        <section id="container">
            <!--header start-->
            <header class="header white-bg">
                <!--logo start-->
                <a href="/voipiran/irouting/#/settings" class="logo"><span>IROUTING</span></a>

                <div class="sidebar-toggle-box">
                    <i class="fa fa-bars"></i>
                </div>

                <!--logo end-->
                <div class="nav notify-row d-none" id="top_menu">
                    <!--  notification start -->
                    <ul class="nav top-menu">
                        <!-- settings start -->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-tasks"></i>
                                <span class="badge badge-success">6</span>
                            </a>
                            <ul class="dropdown-menu extended tasks-bar">
                                <div class="notify-arrow notify-arrow-green"></div>
                                <li>
                                    <p class="green">You have 6 pending tasks</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Dashboard v1.3</div>
                                            <div class="percent">40%</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-success" role="progressbar"
                                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 40%">
                                                <span class="sr-only">40% Complete (success)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Database Update</div>
                                            <div class="percent">60%</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                                aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 60%">
                                                <span class="sr-only">60% Complete (warning)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Iphone Development</div>
                                            <div class="percent">87%</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-info" role="progressbar"
                                                aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 87%">
                                                <span class="sr-only">87% Complete</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Mobile App</div>
                                            <div class="percent">33%</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 33%">
                                                <span class="sr-only">33% Complete (danger)</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="task-info">
                                            <div class="desc">Dashboard v1.3</div>
                                            <div class="percent">45%</div>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped" role="progressbar"
                                                aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 45%">
                                                <span class="sr-only">45% Complete</span>
                                            </div>
                                        </div>

                                    </a>
                                </li>
                                <li class="external">
                                    <a href="#">See All Tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- settings end -->
                        <!-- inbox dropdown start-->
                        <li id="header_inbox_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge badge-danger">5</span>
                            </a>
                            <ul class="dropdown-menu extended inbox">
                                <div class="notify-arrow notify-arrow-red"></div>
                                <li>
                                    <p class="red">You have 5 new messages</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="./img/avatar-mini.jpg"></span>
                                        <span class="subject">
                                            <span class="from">Jonathan Smith</span>
                                            <span class="time">Just now</span>
                                        </span>
                                        <span class="message">
                                            Hello, this is an example msg.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="./img/avatar-mini2.jpg"></span>
                                        <span class="subject">
                                            <span class="from">حامد کوه فلاح</span>
                                            <span class="time">10 mins</span>
                                        </span>
                                        <span class="message">
                                            Hi, Jhon Doe Bhai how are you ?
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="./img/avatar-mini3.jpg"></span>
                                        <span class="subject">
                                            <span class="from">Jason Stathum</span>
                                            <span class="time">3 hrs</span>
                                        </span>
                                        <span class="message">
                                            This is awesome dashboard.
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="photo"><img alt="avatar" src="./img/avatar-mini4.jpg"></span>
                                        <span class="subject">
                                            <span class="from">Jondi Rose</span>
                                            <span class="time">Just now</span>
                                        </span>
                                        <span class="message">
                                            Hello, this is metrolab
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">See all messages</a>
                                </li>
                            </ul>
                        </li>
                        <!-- inbox dropdown end -->
                        <!-- notification dropdown start-->
                        <li id="header_notification_bar" class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <i class="fa fa-bell-o"></i>
                                <span class="badge badge-warning">7</span>
                            </a>
                            <ul class="dropdown-menu extended notification">
                                <div class="notify-arrow notify-arrow-yellow"></div>
                                <li>
                                    <p class="yellow">You have 7 new notifications</p>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        Server #3 overloaded.
                                        <span class="small italic">34 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-warning"><i class="fa fa-bell"></i></span>
                                        Server #10 not respoding.
                                        <span class="small italic">1 Hours</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                                        Database overloaded 24%.
                                        <span class="small italic">4 hrs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-success"><i class="fa fa-plus"></i></span>
                                        New user registered.
                                        <span class="small italic">Just now</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-info"><i class="fa fa-bullhorn"></i></span>
                                        Application error.
                                        <span class="small italic">10 mins</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">See all notifications</a>
                                </li>
                            </ul>
                        </li>
                        <!-- notification dropdown end -->
                    </ul>
                    <!--  notification end -->
                </div>
                <div class="top-nav d-none">
                    <!--search & user info start-->
                    <ul class="nav pull-left top-menu">
                        <li>
                            <input type="text" class="form-control search" placeholder="Search">
                        </li>
                        <!-- user login dropdown start-->
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <img alt="" src="img/avatar1_small.jpg">
                                <span class="username">حامد کوه فلاح</span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu extended logout dropdown-menu-right">
                                <div class="log-arrow-up"></div>
                                <li><a href="#"><i class=" fa fa-suitcase"></i>پروفایل</a></li>
                                <li><a href="#"><i class="fa fa-cog"></i> تنظیمات</a></li>
                                <li><a href="#"><i class="fa fa-bell-o"></i> اعلانات</a></li>
                                <li><a href="login.html"><i class="fa fa-key"></i> خروج</a></li>
                            </ul>
                        </li>
                        <li class="sb-toggle-right">
                            <i class="fa  fa-align-right"></i>
                        </li>
                        <!-- user login dropdown end -->
                    </ul>
                    <!--search & user info end-->
                </div>
            </header>
            <!--header end-->

            <!--sidebar start-->
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li class="active">
                            <router-link tag="a" to="/settings" class="active">
                                <i class="fa fa-dashboard"></i>
                                <span class="p-2">مسیریابی هوشمند</span>
                            </router-link>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!--sidebar end-->

            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <router-view></router-view>
                    @yield('content')
                </section>
            </section>
            <!--main content end-->

            <!-- Right Slidebar start -->
            <div class="sb-slidebar sb-right sb-style-overlay">
                <h5 class="side-title">Online Customers</h5>
                <ul class="quick-chat-list">
                    <li class="online">
                        <div class="media">
                            <a href="#" class="">
                                <img alt="" src="img/chat-avatar2.jpg" class="mr-3 rounded-circle">
                            </a>
                            <div class="media-body">
                                <strong>حامد کوه فلاح</strong>
                                <small>Dream Land, AU</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="">
                                <img alt="" src="img/chat-avatar.jpg" class="mr-3 rounded-circle">
                            </a>
                            <div class="media-body">
                                <div class="media-status">
                                    <span class=" badge bg-important">3</span>
                                </div>
                                <strong>Jonathan Smith</strong>
                                <small>United States</small>
                            </div>
                        </div><!-- media -->
                    </li>

                    <li class="online">
                        <div class="media">
                            <a href="#" class="">
                                <img alt="" src="img/pro-ac-1.png" class="mr-3 rounded-circle">
                            </a>
                            <div class="media-body">
                                <div class="media-status">
                                    <span class=" badge badge-success">5</span>
                                </div>
                                <strong>Jane Doe</strong>
                                <small>ABC, USA</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="">
                                <img alt="" src="img/avatar1.jpg" class="mr-3 rounded-circle">
                            </a>
                            <div class="media-body">
                                <strong>Anjelina Joli</strong>
                                <small>Fockland, UK</small>
                            </div>
                        </div><!-- media -->
                    </li>
                    <li class="online">
                        <div class="media">
                            <a href="#" class="">
                                <img alt="" src="img/mail-avatar.jpg" class="mr-3 rounded-circle">
                            </a>
                            <div class="media-body">
                                <div class="media-status">
                                    <span class=" badge bg-warning">7</span>
                                </div>
                                <strong>Mr Tasi</strong>
                                <small>Dream Land, USA</small>
                            </div>
                        </div><!-- media -->
                    </li>
                </ul>
                <h5 class="side-title"> pending Task</h5>
                <ul class="p-task tasks-bar">
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">40%</div>
                            </div>
                            <div class="progress">
                                <div style="width: 40%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="40"
                                    role="progressbar" class="progress-bar progress-bar-striped bg-success">
                                    <span class="sr-only">40% Complete (success)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Database Update</div>
                                <div class="percent">60%</div>
                            </div>
                            <div class="progress">
                                <div style="width: 60%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60"
                                    role="progressbar" class="progress-bar progress-bar-striped bg-warning">
                                    <span class="sr-only">60% Complete (warning)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Iphone Development</div>
                                <div class="percent">87%</div>
                            </div>
                            <div class="progress">
                                <div style="width: 87%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20"
                                    role="progressbar" class="progress-bar progress-bar-striped bg-info">
                                    <span class="sr-only">87% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Mobile App</div>
                                <div class="percent">33%</div>
                            </div>
                            <div class="progress">
                                <div style="width: 33%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="80"
                                    role="progressbar" class="progress-bar progress-bar-striped bg-danger">
                                    <span class="sr-only">33% Complete (danger)</span>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="task-info">
                                <div class="desc">Dashboard v1.3</div>
                                <div class="percent">45%</div>
                            </div>
                            <div class="progress">
                                <div style="width: 45%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="45"
                                    role="progressbar" class="progress-bar progress-bar-striped">
                                    <span class="sr-only">45% Complete</span>
                                </div>
                            </div>

                        </a>
                    </li>
                    <li class="external">
                        <a href="#">See All Tasks</a>
                    </li>
                </ul>
            </div>
            <!-- Right Slidebar end -->

            <!--footer start-->
            {{-- <footer class="site-footer">
            <div class="text-center">
                2018 &copy; FlatLab by VectorLab.
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer> --}}
            <!--footer end-->

        </section>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.customSelect.min.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>

    <!--right slidebar-->
    <script src="{{ asset('js/slidebars.min.js') }}"></script>

    <!--script for this page-->
    <script src="{{ asset('js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('js/easy-pie-chart.js') }}"></script>
    <script src="{{ asset('js/count.js') }}"></script>

    <script>
        //owl carousel

        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                navigation: true,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                autoPlay: true

            });
        });

        //custom select box

        $(function() {
            $('select.styled').customSelect();
        });

        $(window).on("resize", function() {
            var owl = $("#owl-demo").data("owlCarousel");
            // owl.reinit();
        });
    </script>

    {{-- custom javascripts --}}
    <script src="{{ asset('js/app.js') }}"></script>

    <!--common script for all pages-->
    <script src="{{ asset('js/common-scripts.js') }}"></script>

    <style>
        .router-link-active,
        .router-link-exact-active {
            background: rgba(237, 77, 83, .06);
            border-right: 3px solid #ff6c60;
            color: #ff6c60;
            border-radius: 40px 0 0 40px;
        }
    </style>
    @yield('javascript')

</body>

</html>
