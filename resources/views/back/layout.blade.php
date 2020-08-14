<!DOCTYPE html>
<html lang="tr" class="loading">
<head>
    <base href="http://127.0.0.1:8002/admin/">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Dashboard1 - Apex responsive bootstrap 4 admin template</title>
    <link rel="apple-touch-icon" sizes="60x60" href="/back/app-assets/img/ico/apple-icon-60.html">
    <link rel="apple-touch-icon" sizes="76x76" href="/back/app-assets/img/ico/apple-icon-76.html">
    <link rel="apple-touch-icon" sizes="120x120" href="/back/app-assets/img/ico/apple-icon-120.html">
    <link rel="apple-touch-icon" sizes="152x152" href="/back/app-assets/img/ico/apple-icon-152.html">
    <link rel="shortcut icon" type="image/x-icon" href="/back/app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="/back/app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/toastr.css">
    @yield("css")
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="/back/app-assets/css/app.css">
</head>
<body data-col="2-columns" class=" 2-columns ">
<div class="wrapper">
    <div data-active-color="white" data-background-color="man-of-steel" data-image="/back/app-assets/img/sidebar-bg/01.jpg" class="app-sidebar">
        <div class="sidebar-header">
            <div class="logo clearfix"><a href="index.html" class="logo-text float-left">
                    <div class="logo-img"><img src="/back/app-assets/img/logo.png"/></div><span class="text align-middle">APEX</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
        </div>
        <div class="sidebar-content">
            <div class="nav-container">
                <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
                    <li class=" nav-item"><a href="../../../app/Http/Controllers/back"><i class="ft-home"></i><span class="menu-title">Dashboard</span></a></li>
                    <li class=" nav-item"><a href="./options"><i class="ft-settings"></i><span class="menu-title">Genel Ayarlar</span></a></li>
                    <li class=" nav-item"><a href="./pages"><i class="ft-align-center"></i><span class="menu-title">Sayfalar</span></a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-background"></div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
                <form role="search" class="navbar-form navbar-right mt-1">
                    <div class="position-relative has-icon-right">
                        <input type="text" placeholder="Search" class="form-control round"/>
                        <div class="form-control-position"><i class="ft-search"></i></div>
                    </div>
                </form>
            </div>
            <div class="navbar-container">
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="dropdown nav-item"><a id="dropdownBasic2" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-bell font-medium-3 blue-grey darken-4"></i><span class="notification badge badge-pill badge-danger">4</span>
                                <p class="d-none">Notifications</p></a>
                            <div class="notification-dropdown dropdown-menu dropdown-menu-right">
                                <div class="noti-list"><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell info float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 info">New Order Received</span><span class="noti-text">Lorem ipsum dolor sit ametitaque in, et!</span></span></a><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell warning float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 warning">New User Registered</span><span class="noti-text">Lorem ipsum dolor sit ametitaque in </span></span></a><a class="dropdown-item noti-container py-3 border-bottom border-bottom-blue-grey border-bottom-lighten-4"><i class="ft-bell danger float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 danger">New Order Received</span><span class="noti-text">Lorem ipsum dolor sit ametest?</span></span></a><a class="dropdown-item noti-container py-3"><i class="ft-bell success float-left d-block font-large-1 mt-1 mr-2"></i><span class="noti-wrapper"><span class="noti-title line-height-1 d-block text-bold-400 success">New User Registered</span><span class="noti-text">Lorem ipsum dolor sit ametnatus aut.</span></span></a></div><a class="noti-footer primary text-center d-block border-top border-top-blue-grey border-top-lighten-4 text-bold-400 py-1">Read All Notifications</a>
                            </div>
                        </li>
                        <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
                                <p class="d-none">User Settings</p></a>
                            <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right">
                                <a href="{{url('admin/users')}}" class="dropdown-item py-1"><i class="ft-edit mr-2"></i><span>Edit Profile</span></a>
                                <a href="https://pixinvent.com/html/html/ltr/inbox.html" class="dropdown-item py-1"><i class="ft-mail mr-2"></i><span>My Inbox</span></a>
                                <div class="dropdown-divider"></div><a href="https://pixinvent.com/html/html/ltr/login-page.html" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                            </div>
                        </li>
                        <li class="nav-item d-none d-lg-block"><a href="javascript:;" class="nav-link position-relative notification-sidebar-toggle"><i class="ft-align-left font-medium-3 blue-grey darken-4"></i>
                                <p class="d-none">Notifications Sidebar</p></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-panel">
        <div class="main-content">@yield("content")</div>
        <footer class="footer footer-static footer-light">
            <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2019 <a href="https://1.envato.market/pixinvent_portfolio" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>
    </div>
</div>
<aside id="notification-sidebar" class="notification-sidebar d-none d-sm-none d-md-block"><a class="notification-sidebar-close"><i class="ft-x font-medium-3"></i></a>
    <div class="side-nav notification-sidebar-content">
        <div class="row">
            <div class="col-12 mt-1">
                <h6 class="mt-1 mb-3 text-bold-400">Languages Options</h6>
                <form class="change_lang" action="/admin/change_lang" method="post">
                    @csrf
                    <input type="text" name="langs" placeholder="Lang Names" class="w-100 form-group form-control" id="langs">
                    <input type="text" class="form-control form-group" placeholder="Langs Short Name" name="langs_short">
                    <div class="d-block text-right">
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</aside>
<div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-sm-none d-md-block">
    <a class="customizer-close"><i class="ft-x font-medium-3"></i></a>
    <a id="customizer-toggle-icon" class="customizer-toggle bg-danger"><i class="ft-settings font-medium-4 fa fa-spin white align-middle"></i></a>
    <div data-ps-id="df6a5ce4-a175-9172-4402-dabd98fc9c0a" class="customizer-content p-3 ps-container ps-theme-dark">
        <h4 class="text-uppercase mb-0 text-bold-400">Theme Customizer</h4>
        <p>Customize & Preview in Real Time</p>
        <hr>
        <h6 class="text-center text-bold-500 mb-3 text-uppercase">Layout Options</h6>
        <div class="layout-switch ml-4">
            <div class="custom-control custom-radio d-inline-block custom-control-inline light-layout">
                <input id="ll-switch" type="radio" name="layout-switch" checked class="custom-control-input">
                <label for="ll-switch" class="custom-control-label">Light</label>
            </div>
            <div class="custom-control custom-radio d-inline-block custom-control-inline dark-layout">
                <input id="dl-switch" type="radio" name="layout-switch" class="custom-control-input">
                <label for="dl-switch" class="custom-control-label">Dark</label>
            </div>
            <div class="custom-control custom-radio d-inline-block custom-control-inline transparent-layout">
                <input id="tl-switch" type="radio" name="layout-switch" class="custom-control-input">
                <label for="tl-switch" class="custom-control-label">Transparent</label>
            </div>
        </div>
        <hr>
        <h6 class="text-center text-bold-500 mb-3 text-uppercase sb-options">Sidebar Color Options</h6>
        <div class="cz-bg-color sb-color-options">
            <div class="row p-1">
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="pomegranate" class="gradient-pomegranate d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="king-yna" class="gradient-king-yna d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="ibiza-sunset" class="gradient-ibiza-sunset d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="flickr" class="gradient-flickr d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="purple-bliss" class="gradient-purple-bliss d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="man-of-steel" class="gradient-man-of-steel d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="purple-love" class="gradient-purple-love d-block rounded-circle"></span></div>
            </div>
            <div class="row p-1">
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="black" class="bg-black d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="white" class="bg-grey d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="primary" class="bg-primary d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="success" class="bg-success d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="warning" class="bg-warning d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="info" class="bg-info d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="danger" class="bg-danger d-block rounded-circle"></span></div>
            </div>
        </div>
        <h6 class="text-center text-bold-500 mb-3 text-uppercase tl-color-options d-none">Background Colors</h6>
        <div class="cz-tl-bg-color d-none">
            <div class="row p-1">
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="hibiscus" class="bg-hibiscus d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-purple-pizzazz" class="bg-purple-pizzazz d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-blue-lagoon" class="bg-blue-lagoon d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-electric-viloet" class="bg-electric-violet d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-protage" class="bg-portage d-block rounded-circle"></span></div>
                <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-tundora" class="bg-tundora d-block rounded-circle"></span></div>
            </div>
        </div>
        <hr>
        <h6 class="text-center text-bold-500 mb-3 text-uppercase sb-bg-img">Sidebar Bg Image</h6>
        <div class="cz-bg-image row sb-bg-img">
            <div class="col-sm-2 mb-3"><img src="/back/app-assets/img/sidebar-bg/01.jpg" width="90" class="rounded sb-bg-01"></div>
            <div class="col-sm-2 mb-3"><img src="/back/app-assets/img/sidebar-bg/02.jpg" width="90" class="rounded sb-bg-02"></div>
            <div class="col-sm-2 mb-3"><img src="/back/app-assets/img/sidebar-bg/03.jpg" width="90" class="rounded sb-bg-03"></div>
            <div class="col-sm-2 mb-3"><img src="/back/app-assets/img/sidebar-bg/04.jpg" width="90" class="rounded sb-bg-04"></div>
            <div class="col-sm-2 mb-3"><img src="/back/app-assets/img/sidebar-bg/05.jpg" width="90" class="rounded sb-bg-05"></div>
            <div class="col-sm-2 mb-3"><img src="/back/app-assets/img/sidebar-bg/06.jpg" width="90" class="rounded sb-bg-06"></div>
        </div>
        <div class="tl-bg-img d-none">
            <h6 class="text-center text-bold-500 text-uppercase">Background Images</h6>
            <div class="cz-tl-bg-image row">
                <div class="col-sm-3"><img src="/back/app-assets/img/gallery/bg-glass-1.jpg" width="90" class="rounded bg-glass-1 selected"></div>
                <div class="col-sm-3"><img src="/back/app-assets/img/gallery/bg-glass-2.jpg" width="90" class="rounded bg-glass-2"></div>
                <div class="col-sm-3"><img src="/back/app-assets/img/gallery/bg-glass-3.jpg" width="90" class="rounded bg-glass-3"></div>
                <div class="col-sm-3"><img src="/back/app-assets/img/gallery/bg-glass-4.jpg" width="90" class="rounded bg-glass-4"></div>
            </div>
        </div>
        <hr>
        <div class="togglebutton toggle-sb-bg-img">
            <div class="switch"><span>Sidebar Bg Image</span>
                <div class="float-right">
                    <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                        <input id="sidebar-bg-img" type="checkbox" checked class="custom-control-input cz-bg-image-display">
                        <label for="sidebar-bg-img" class="custom-control-label"></label>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <div class="togglebutton">
            <div class="switch"><span>Compact Menu</span>
                <div class="float-right">
                    <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                        <input id="cz-compact-menu" type="checkbox" class="custom-control-input cz-compact-menu">
                        <label for="cz-compact-menu" class="custom-control-label"></label>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <label for="cz-sidebar-width">Sidebar Width</label>
            <select id="cz-sidebar-width" class="custom-select cz-sidebar-width float-right">
                <option value="small">Small</option>
                <option value="medium" selected="">Medium</option>
                <option value="large">Large</option>
            </select>
        </div>
    </div>
</div>
@yield("modal")
<script src="/back/app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="/back/app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
<script src="/back/app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="/back/app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="/back/app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
<script src="/back/app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="/back/app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
<script src="/back/app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
<script src="/back/app-assets/js/app-sidebar.js" type="text/javascript"></script>
<script src="/back/app-assets/js/notification-sidebar.js" type="text/javascript"></script>
<script src="/back/app-assets/js/customizer.js" type="text/javascript"></script>
<script src="/back/app-assets/js/jquery.mask.min.js" type="text/javascript"></script>
<script src="/back/app-assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/back/app-assets/vendors/js/toastr.min.js" type="text/javascript"></script>
@if(Session::has("message"))
    <script>
        $(document).ready(function () {
            toastr.{{Session::get('type','info')}}(
                "{{ Session::get('message') }}",
                "{{Session::get('head','İşlem Başarılı')}}",
                {progressBar:!0}
                )
        })
    </script>
@endif
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

</script>
@yield("js")

</body>

</html>
