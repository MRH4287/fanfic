<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fanfic</title>

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/css/core.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/css/components.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/css/icons.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/css/pages.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/css/responsive.css') }}" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{ URL::asset('/assets/js/modernizr.min.js') }}"></script>
</head>
<body class="fixed-left" id="app-layout">
<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <div class="text-center">
                <a href="{{ url('/home') }}" class="logo"><i class="glyphicon glyphicon-book"></i><span> Drabble</span></a>
            </div>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="">
                    <div class="pull-left">
                        <button class="button-menu-mobile open-left">
                            <i class="ion-navicon"></i>
                        </button>
                        <span class="clearfix"></span>
                    </div>

                    <form role="search" class="navbar-left app-search pull-left hidden-xs">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>


                    <ul class="nav navbar-nav navbar-right pull-right">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown hidden-xs">
                                <a href="#" data-target="#" class="dropdown-toggle waves-effect waves-light"
                                   data-toggle="dropdown" aria-expanded="true">
                                    <i class="icon-bell"></i> <span class="badge badge-xs badge-danger">3</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg">
                                    <li class="notifi-title"><span class="label label-default pull-right">New 3</span>Notification
                                    </li>
                                    <li class="list-group nicescroll notification-list">
                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order
                                                        has been placed</h5>

                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog fa-2x text-custom"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>

                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-bell-o fa-2x text-danger"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">Updates</h5>

                                                    <p class="m-0">
                                                        <small>There are <span class="text-primary font-600">2</span>
                                                            new updates available
                                                        </small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-user-plus fa-2x text-info"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New user registered</h5>

                                                    <p class="m-0">
                                                        <small>You have 10 unread messages</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-diamond fa-2x text-primary"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">A new order has been placed A new order
                                                        has been placed</h5>

                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>

                                        <!-- list item-->
                                        <a href="javascript:void(0);" class="list-group-item">
                                            <div class="media">
                                                <div class="pull-left p-r-10">
                                                    <em class="fa fa-cog fa-2x text-custom"></em>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="media-heading">New settings</h5>

                                                    <p class="m-0">
                                                        <small>There are new settings available</small>
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="list-group-item text-right">
                                            <small class="font-600">See all notifications</small>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="" class="dropdown-toggle profile" data-toggle="dropdown"
                                   aria-expanded="true">{{ Auth::user()->name }} <img
                                            src="assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle">
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)"><i class="ti-user m-r-5"></i> Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="ti-power-off m-r-5"></i> Logout</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <!-- Top Bar End -->

    @if (!Auth::guest())
            <!-- ========== Left Sidebar Start ========== -->

    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
            <!--- Divider -->
            <div id="sidebar-menu">
                <ul>

                    <li class="text-muted menu-title">Navigation</li>

                    <li class="has_sub">
                        <a href="#" class="waves-effect active"><i class="ti-home"></i> <span> Dashboard </span> </a>
                        <ul class="list-unstyled">
                            <li class="active"><a href="index.html">Dashboard 1</a></li>
                            <li><a href="dashboard_2.html">Dashboard 2</a></li>
                            <li><a href="dashboard_3.html">Dashboard 3</a></li>
                        </ul>
                    </li>

                    <li class="text-muted menu-title">Admin</li>

                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect">
                            <i class="fa fa-tv"></i><span>Series</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('/series/list') }}"><i class="fa fa-list"></i><span>List</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/series/add') }}"><i class="fa  fa-plus-square-o"></i><span>Add</span></a>
                            </li>
                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><span>Menu Level 1.1</span> </a>
                                <ul style="">
                                    <li><a href="javascript:void(0);"><span>Menu Level 2.1</span></a></li>
                                    <li><a href="javascript:void(0);"><span>Menu Level 2.2</span></a></li>
                                    <li><a href="javascript:void(0);"><span>Menu Level 2.3</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- Left Sidebar End -->
    @endif
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            @if (Auth::guest())
                <div class="container-alt">
            @else
                <div class="container">
            @endif
                    @yield('content')
                </div> <!-- container -->
            </div> <!-- content -->
            <footer class="footer text-right">
                   2015 � Ubold.
            </footer>

        </div>

    </div>
    <script>
        var resizefunc = [];
    </script>

    <script src="{{ URL::asset('/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/detect.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/fastclick.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.blockUI.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/waves.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/wow.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/moment/moment.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/waypoints/lib/jquery.waypoints.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/skyicons/skycons.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('/assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/pages/jquery.widgets.js') }}"></script>
    <script src="{{ URL::asset('/assets/pages/jquery.todo.js') }}"></script>
    <script src="{{ URL::asset('/assets/pages/jquery.chat.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/jquery-knob/jquery.knob.js') }}"></script>
    <script src="{{ URL::asset('/assets/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.core.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/jquery.app.js') }}"></script>

</body>
</html>
