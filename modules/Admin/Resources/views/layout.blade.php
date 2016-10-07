<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no" />

    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#49CEFF">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#49CEFF" />
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

    <meta name="description" content="NumencodeCMS">
    <meta name="author" content="Numencode.com">
    <meta name="_token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>

    <base href="{{ env('app_url') }}">
    <link href="{{ elixir('themes/admin/css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ elixir('themes/admin/css/common.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ elixir('themes/admin/css/libs.css') }}" rel="stylesheet" type="text/css">

    <!--
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
    -->

    <!--[if lt IE 9]>
        <script src="themes/admin/js/html5shiv.min.js"></script>
        <script src="themes/admin/js/respond.min.js"></script>
    <![endif]-->
</head>


<body class="fixed-all fixed-sidebar fixed-all">
<!--Preloader-->
<div id="preloader">
    <div class="refresh-preloader"><div class="preloader"><i>.</i><i>.</i><i>.</i></div></div>
</div>


<div class="wrapper">
    <nav class="navbar navbar-blue">
        <div class="navbar-header container brand-blue">
            <a href="#" class="menu-toggle"><i class="zmdi zmdi-menu"></i></a>
            <a href="index.html" class="logo"><img src="themes/admin/images/logo.png" alt="Logo Pacificonis"></a>
            <a href="index.html" class="icon-logo"></a>
        </div>
        <div class="navbar-container clearfix">
            <div class="pull-left">
                <a href="#" class="page-title text-uppercase">Dashboard</a>
            </div>

            <div class="pull-right">
                <div class="pull-left search-container">
                    <form class="searchbox">
                        <input type="search" placeholder="Search" name="search" class="searchbox-input">
                        <input type="submit" class="searchbox-submit" value="">
                        <span class="searchbox-icon"><span class="zmdi zmdi-search search-icon"></span></span>
                    </form>
                </div>

                <ul class="nav pull-right right-menu">
                    <li class="more-options dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <i class="zmdi zmdi-account-circle"></i>
                        </a>

                        <div class="more-opt-container dropdown-menu">
                            <a href="#"><i class="zmdi zmdi-account-o"></i>Account<span class="badge badge-warning">3</span></a>
                            <a href="#"><i class="zmdi zmdi-storage"></i>Storage <span class="badge badge-danger">2</span></a>
                            <a href="#"><i class="zmdi zmdi-calendar-note"></i>Calendar <span class="badge badge-success">2</span></a>
                            <a href="#"><i class="zmdi zmdi-chart-donut"></i>Analytics <span class="badge badge-success">7</span></a>
                            <a href="#"><i class="zmdi zmdi-balance"></i>Balance <span class="badge badge-info">5</span></a>
                            <a href="#"><i class="zmdi zmdi-run"></i>Exit</a>
                        </div>
                    </li>
                    <li class="notification dropdown">
                        <a class="dropdown-toggle">
                            <i class="zmdi zmdi-notifications"></i>
                            <span class="badge badge-primary">8</span>
                        </a>

                        <div class="dropdown-menu">
                            <h4 class="text-center info-color m-0">You have 19 new notifications</h4>
                            <div class="notification-container">
                                <a href="#"><i class="zmdi zmdi-email warning-color m-r-5"></i> You have 16 messages <span class="pull-right">4 minutes ago</span></a>
                                <a href="#"><i class="zmdi zmdi-twitter info-color m-r-5"></i> 3 new followers <span class="pull-right">12 minutes ago</span></a>
                                <a href="#"><i class="zmdi zmdi-dropbox info-color m-r-5"></i> 7 changed files <span class="pull-right">18 minutes ago</span></a>
                                <a href="#"><i class="zmdi zmdi-instagram warning-color m-r-5"></i> 26 new followers <span class="pull-right">22 minutes ago</span></a>
                                <a href="#"><i class="zmdi zmdi-twitter info-color m-r-5"></i> 8 new followers <span class="pull-right">23 minutes ago</span></a>
                            </div>
                            <a href="#" class="text-uppercase clear-all">Clear all notifications</a>
                            <div class="check-ok">
                                <i class="zmdi zmdi-check"></i>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="sidepanel-toggle" href="#">
                            <i class="zmdi zmdi-more-vert"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <aside class="sidebar sidebar-bleachedcedar">
        <ul class="nav metismenu">
            <li class="profile-sidebar-container">
                <div class="profile-sidebar text-center">
                    <div class="profile-userpic">
                        <img src="themes/admin/images/profile_user.jpg" class="img-responsive img-circle center-block" alt="user">
                        <span class="online"></span>
                    </div>
                    <div class="profile-usertitle">
                        <div class="name">
                            {{ $admin->name }}
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}"><i class="zmdi zmdi-view-dashboard"></i>Dashboard</a>
            </li>
            <li>
                <a href="#"><i class="zmdi zmdi-account"></i>Managers<span class="zmdi arrow"></span></a>
                <ul class="nav nav-inside collapse">
                    <li class="inside-title">Managers</li>
                    <li><a href="{{ route('managers.index') }}">List managers</a></li>
                    <li><a href="{{ route('managers.create') }}">Add new manager</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="zmdi zmdi-account-circle"></i>Users<span class="zmdi arrow"></span></a>
                <ul class="nav nav-inside collapse">
                    <li class="inside-title">Managers</li>
                    <li><a href="{{ route('users.index') }}">List users</a></li>
                    <li><a href="{{ route('managers.create') }}">Add new user</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('roles.index') }}"><i class="zmdi zmdi-lock"></i>Roles and permissions</a>
            </li>
            <li>
                <a href="{{ route('tasks.index') }}"><i class="zmdi zmdi-format-align-justify"></i>Tasks</a>
            </li>
        </ul>
    </aside>

    <div class="side-panel">
        <ul class="nav nav-tabs nav-justified m-0">
            <li class="active">
                <a href="#tab-side-1" data-toggle="tab"><i class="zmdi zmdi-comment-text"></i></a>
            </li>
            <li>
                <a href="#tab-side-2" data-toggle="tab"><i class="zmdi zmdi-settings"></i></a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab-side-1">
                <div class="side-title">Page Structure</div>
                <div class="p-15">
                    <div id="jstree">
                        @include ('admin::pages.list', ['collection' => $pageTree['root']])
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-side-2">
                <table class="table table-settings">
                    <tbody><tr>
                        <td>
                            <h5>Alerts</h5>
                            <p>Sets alerts to get notified when changes occur to get new alerming items</p>
                        </td>
                        <td><div class="checkbox checkbox-primary">
                                <label><input type="checkbox">
                                    <i></i></label>
                            </div></td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Notifications</h5>
                            <p>You will receive notification email for any notifications if you set notification</p>
                        </td>
                        <td>
                            <div class="checkbox checkbox-primary">
                                <label><input type="checkbox" checked>
                                    <i></i></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Messages</h5>
                            <p>You will receive notification on email after setting messages notifications</p>
                        </td>
                        <td>
                            <div class="checkbox checkbox-primary">
                                <label><input type="checkbox">
                                    <i></i></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Warnings</h5>
                            <p>You will get warnning only some specific setttings or alert system</p>
                        </td>
                        <td>
                            <div class="checkbox checkbox-primary">
                                <label><input type="checkbox" checked>
                                    <i></i></label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5>Sidebar</h5>
                            <p>You can hide/show use with sidebar collapsw settings</p>
                        </td>
                        <td>
                            <div class="checkbox checkbox-primary">
                                <label><input type="checkbox" checked>
                                    <i></i></label>
                            </div>
                        </td>
                    </tr>

                    </tbody></table>
            </div>
        </div>
    </div>

    <div class="container-fluid">

        <!-- BLOCK : Google Analytics -->
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="head head-with-btns clearfix">
                        <h5 class="content-title text-color pull-left">Total sales statistics</h5>
                        <div class="functions-btns pull-right">
                            <button type="button" class="btn btn-info">
                                Week
                            </button>
                            <button type="button" class="btn btn-warning">
                                Month
                            </button>
                            <button type="button" class="btn btn-warning">
                                Year
                            </button>
                        </div>
                    </div>
                    <div class="content">
                        <div id="js-legend" class="chart-legend"></div>
                        <div class="chartjs-container full-page-chart">
                            <canvas id="chart-line"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="content-box warning-bg white">
                    <div class="head clearfix">
                        <h5 class="content-title pull-left">Orders</h5>
                        <div class="functions-btns pull-right">
                            <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                            <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                            <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="content">
                        <div id="line-chart-3" class="flot-chart"></div>
                        <p class="text-uppercase zero-m">Total orders</p>
                        <p class="zero-m f-30">45,245,659</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="content-box">
                    <div class="head clearfix">
                        <h5 class="content-title text-color pull-left">Implementation of a plan</h5>
                        <div class="functions-btns pull-right">
                            <a class="refresh-btn text-color" href="#"><i class="zmdi zmdi-refresh"></i></a>
                            <a class="fullscreen-btn text-color" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                            <a class="close-btn text-color" href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="p-l-20">
                        <button type="button" class="btn btn-info m-b-5">
                            Week
                        </button>
                        <button type="button" class="btn btn-warning m-b-5">
                            Month
                        </button>
                    </div>
                    <div class="content">
                        <div class="easychart text-right" data-percent="55"></div>
                        <div class="p-absolute b-20 l-20">
                            <p class="text-uppercase zero-m">Profit</p>
                            <p class="zero-m danger-color f-30">254,395</p>
                        </div>
                    </div>
                    <!-- Used for demo purposes. Remove if it is needed-->
                    <div class="visible-lg visible-md" style="height: 6px;"></div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="content-box success-bg white">
                    <div class="head clearfix">
                        <h5 class="content-title pull-left">Visitors</h5>
                        <div class="functions-btns pull-right">
                            <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                            <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                            <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="content">
                        <div id="line-chart-4" class="flot-chart"></div>
                        <p class="text-uppercase zero-m">Total visitors</p>
                        <p class="zero-m f-30">15,654,700</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="content-box info-bg white">
                    <div class="head clearfix">
                        <h5 class="content-title pull-left">Returns</h5>
                        <div class="functions-btns pull-right">
                            <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                            <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                            <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="content">
                        <div id="line-chart-2" class="flot-chart"></div>
                        <p class="text-uppercase zero-m">Total returns</p>
                        <p class="zero-m f-30">573,935</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- BLOCK : DataTables -->
        <div class="row">
            <div class="col-lg-12">
                <div class="data-info">
                    <table id="table1" class="display datatable no-stripes table">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Number of Orders</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="info-color">Coats Tony Taylor</td>
                            <td>Mens</td>
                            <td>3 324</td>
                            <td>Alisa Kito</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$245</td>
                        </tr>
                        <tr>
                            <td class="info-color">Nike sneakers</td>
                            <td>Womans</td>
                            <td>5 467</td>
                            <td>John Tredmont</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$560</td>
                        </tr>
                        <tr>
                            <td class="info-color">Adidas T-shirt</td>
                            <td>Children</td>
                            <td>2 546</td>
                            <td>Kyle Jackson</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$2764</td>
                        </tr>
                        <tr>
                            <td class="info-color">Jacket</td>
                            <td>Womans</td>
                            <td>1 875</td>
                            <td>CJ Watson</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$1329</td>
                        </tr>
                        <tr>
                            <td class="info-color">Shirt Diamond</td>
                            <td>Mens</td>
                            <td>6 032</td>
                            <td>Olga Lutchkova</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$896</td>
                        </tr>
                        <tr>
                            <td class="info-color">Summer Shorts</td>
                            <td>Children</td>
                            <td>1 358</td>
                            <td>Silvia Saint</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$8 907</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="data-danger">
                    <table id="table2" class="display datatable">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Number of Orders</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Coats Tony Taylor</td>
                            <td>Mens</td>
                            <td>3 324</td>
                            <td class="danger-color">Alisa Kito</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$245</td>
                        </tr>
                        <tr>
                            <td>Nike sneakers</td>
                            <td>Womans</td>
                            <td>5 467</td>
                            <td class="danger-color">John Tredmont</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$560</td>
                        </tr>
                        <tr>
                            <td>Adidas T-shirt</td>
                            <td>Children</td>
                            <td>2 546</td>
                            <td class="danger-color">Kyle Jackson</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$2764</td>
                        </tr>
                        <tr>
                            <td>Jacket</td>
                            <td>Womans</td>
                            <td>1 875</td>
                            <td class="danger-color">CJ Watson</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$1329</td>
                        </tr>
                        <tr>
                            <td>Shirt Diamond</td>
                            <td>Mens</td>
                            <td>6 032</td>
                            <td class="danger-color">Olga Lutchkova</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$896</td>
                        </tr>
                        <tr>
                            <td>Summer Shorts</td>
                            <td>Children</td>
                            <td>1 358</td>
                            <td class="danger-color">Silvia Blake</td>
                            <td><span class="label label-default">Closed</span></td>
                            <td>$8 907</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <!-- BLOCK : Forms - elements -->
        <div class="row">
            <div class="col-lg-12">
                <div class="content-box">
                    <div class="head success-bg clearfix">
                        <h5 class="content-title pull-left">Input types</h5>
                        <div class="functions-btns pull-right">
                            <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                            <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                            <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>

                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputText" class="col-sm-2 control-label">Text</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputText" placeholder="Some text here">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPlaceholder" class="col-sm-2 control-label">Placeholder</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputPlaceholder" placeholder="Placeholder">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputPassword3" value="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Textarea</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputFocus" class="col-sm-2 control-label">Focused</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputFocus" placeholder="Focused" autofocus>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDisabled" class="col-sm-2 control-label">Disabled</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputDisabled" placeholder="Disabled input here..." disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputHelped" class="col-sm-2 control-label">Help</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputHelped" placeholder="Helping text">
                                            <span class="help-block"><small>A block of help text that breaks onto a new line and may extend beyond one line.</small></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Selects</label>
                                        <div class="col-sm-10">
                                            <select class="form-control selectpicker">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <select class="form-control selectpicker" data-style="btn-primary">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <select class="form-control selectpicker" data-style="btn-info">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-box">
                    <div class="head info-bg clearfix">
                        <h5 class="content-title pull-left">Input States</h5>
                        <div class="functions-btns pull-right">
                            <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                            <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                            <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <label class="control-label warning-color">Input warning</label>
                            <input type="text" class="form-control input-warning">
                        </div>
                        <div class="form-group">
                            <label class="control-label danger-color">Input error</label>
                            <input type="text" class="form-control input-danger">
                        </div>
                        <div class="form-group">
                            <label class="control-label success-color">Input success</label>
                            <input type="text" class="form-control input-success">
                        </div>
                        <div class="form-group">
                            <label class="control-label primary-color">Input primary</label>
                            <input type="text" class="form-control input-primary">
                        </div>
                        <div class="form-group">
                            <label class="control-label info-color">Input info</label>
                            <input type="text" class="form-control input-info">
                        </div>
                        <div class="form-group has-icon">
                            <label class="control-label success-color">Input success with icon</label>
                            <div class="p-relative">
                                <input type="text" class="form-control input-success">
                                <span class="zmdi zmdi-check success-color f-s-24 form-icon"></span>
                            </div>
                        </div>
                        <div class="form-group has-icon">
                            <label class="control-label warning-color">Input warning with icon</label>
                            <div class="p-relative">
                                <input type="text" class="form-control input-warning">
                                <span class="zmdi zmdi-alert-triangle warning-color f-s-24 form-icon"></span>
                            </div>
                        </div>
                        <div class="form-group has-icon">
                            <label class="control-label danger-color">Input danger with icon</label>
                            <div class="p-relative">
                                <input type="text" class="form-control input-danger">
                                <span class="zmdi zmdi-close danger-color f-s-24 m-r-5 form-icon"></span>
                            </div>
                        </div>
                        <div class="form-group has-icon">
                            <label class="control-label">Input with custom icon</label>
                            <div class="p-relative">
                                <input type="text" class="form-control">
                                <span class="zmdi zmdi-car f-s-24 form-icon"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="content-box">
                    <div class="head warning-bg clearfix">
                        <h5 class="content-title pull-left">Input sizes</h5>
                        <div class="functions-btns pull-right">
                            <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                            <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                            <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="content">
                        <div class="form-group">
                            <label class="control-label">Large Input</label>
                            <input type="email" class="form-control input-lg">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Default Input</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Small input</label>
                            <input type="email" class="form-control input-sm">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Grid sizes</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-5">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-10">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-4">
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-8">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-6">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-9">
                                </div>
                                <div class="col-md-3">
                                    <input type="text" class="form-control m-b-20" placeholder=".col-md-3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder=".col-md-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="content-box">
                    <div class="head danger-bg clearfix">
                        <h5 class="content-title pull-left">Input addons</h5>
                        <div class="functions-btns pull-right">
                            <a class="refresh-btn" href="#"><i class="zmdi zmdi-refresh"></i></a>
                            <a class="fullscreen-btn" href="#"><i class="zmdi zmdi-fullscreen"></i></a>
                            <a class="close-btn" href="#"><i class="zmdi zmdi-close"></i></a>
                        </div>
                    </div>
                    <div class="content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Static</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="zmdi zmdi-twitter"></span></div>
                                        <input type="text" class="form-control" placeholder="Twitter">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                        <div class="input-group-addon"><span class="zmdi zmdi-email"></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon"><span class="zmdi zmdi-edit"></span></div>
                                        <input type="text" class="form-control" placeholder="Username">
                                        <div class="input-group-addon">Profile</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Buttons</label>
                                    <div class="input-group">
                                        <div class="input-group-addon p-0"><button type="button" class="btn btn-default">$</button></div>
                                        <input type="text" class="form-control" placeholder="Amount">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                        <div class="input-group-addon p-0"><button type="button" class="btn btn-info">Submit</button></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon p-0"><button type="button" class="btn btn-success"><span class="zmdi zmdi-facebook"></span></button></div>
                                        <input type="text" class="form-control" placeholder="http://facebook.com">
                                        <div class="input-group-addon p-0"><button type="button" class="btn btn-warning"><span class="zmdi zmdi-edit m-r-5"></span>Edit</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div> <!-- ./container -->

    <footer class="page-footer">© 2016 Copyright</footer>
</div>


<script src="{{ elixir('themes/admin/js/libs.js') }}"></script>

<script>
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

    var lineChartData = {
        labels : ["MONDAY","TUESDAY","WEDNESDAY","THURSDAY","FRIDAY","SATURDAY","SUNDAY"],
        datasets : [
            {
                label: "Mens goods",
                fillColor : "rgba(73, 206, 255, 0.5)",
                strokeColor : "rgba(73, 206, 255, 0.7)",
                pointColor : "rgba(73, 206, 255, 0.9)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "rgba(255, 193, 7, 1)",
                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            },
            {
                label: "Women goods",
                fillColor : "rgba(255, 187, 51, 0.5)",
                strokeColor : "rgba(255, 187, 51, 0.7)",
                pointColor : "rgba(255, 187, 51, 0.9)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "rgba(244, 67, 54, 1)",
                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            },
            {
                label: "Children goods",
                fillColor : "rgba(153, 204, 0, 0.5)",
                strokeColor : "rgba(153, 204, 0, 0.7)",
                pointColor : "rgba(153, 204, 0, 0.9)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "rgba(33, 150, 243, 1)",
                data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
            }
        ]

    }

    window.onload = function(){
        var ctx = document.getElementById("chart-line").getContext("2d");
        var myLine = new Chart(ctx).Line(lineChartData, {
            scaleShowVerticalLines: false,
//        scaleShowLabels: false,
//        maintainAspectRatio: true,
            datasetStrokeWidth : 6,
            pointDotRadius : 6,
            responsive: true,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].pointColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"
        });

        document.getElementById('js-legend').innerHTML = myLine.generateLegend();
    }

</script>

<script>
    $(function () {
        /* Make some random data for the Chart*/

        var d1 = [];
        for (var i = 0; i <= 10; i += 1) {
            d1.push([i, parseInt(Math.random() * 100)]);
        }

        var d2 = [];
        for (var i = 0; i <= 10; i += 1) {
            d2.push([i, parseInt(Math.random() * 100)]);
        }

        var d3 = [];
        for (var i = 0; i <= 10; i += 1) {
            d3.push([i, parseInt(Math.random() * 100)]);
        }

        var d4 = [];
        for (var i = 0; i <= 50; i += 1) {
            d4.push([i, parseInt(Math.random() * 100)]);
        }

        /* Chart Options */

        var options = {
            series: {
                shadowSize: 0,
                label: "Qty",
                lines: {
                    show: true,
                    lineWidth: 2
                },
                points: {
                    show: true
                }
            },
            grid: {
                margin: 10,
                show: false,
                hoverable: true,
                clickable: true
            },
            yaxis: {
                max: 100,
                min: 0
            },
            legend: {
                show: false
            },
            tooltip: {
                show: true,
                cssClass: "flot-tooltip",
                defaultTheme: false,
                content: '%y.2',
                shifts: {
                    x: 1,
                    y: -45
                }
            }
        };

        var options2 = {
            series: {
                shadowSize: 5,
                label: "Qty",
                lines: {
                    show: true,
                    lineWidth: 2
                }
            },
            grid: {
                margin: 10,
                show: false,
                hoverable: true,
                clickable: false
            },
            legend: {
                show: false
            },
            tooltip: {
                show: true,
                cssClass: "flot-tooltip",
                defaultTheme: false,
                content: '%y.2',
                shifts: {
                    x: 1,
                    y: -45
                }
            }
        };


        /* Let's create the chart */
        if ($("#line-chart-2")[0]) {
            $.plot($("#line-chart-2"), [
                {data: d2, color: '#fff' }
            ], options);
        }

        if ($("#line-chart-3")[0]) {
            $.plot($("#line-chart-3"), [
                {data: d3, color: '#fff' }
            ], options);
        }

        if ($("#line-chart-4")[0]) {
            $.plot($("#line-chart-4"), [
                {data: d4, color: '#fff' }
            ], options2);
        }

    });
</script>

<script>
    $(function() {
        $('.easychart').easyPieChart({
            barColor: "#F44336",
            trackColor: '#cccccc',
            size: 115,
            lineWidth: 15,
            scaleLength: 0
        });
    });
</script>

<script>


    //Todo
    $(document).on('mouseover', '.list-group .checkbox', function () {
        $('.list-group input:checkbox').each(function () {
            $(this).on("change", function () {
                if ($(this).is(":checked")) {
                    $(this).closest(".list-group-item").addClass("checked-todo").removeClass("list-item");
                } else {
                    $(this).closest(".list-group-item").removeClass("checked-todo");
                }
            });
        });
    });

    $(document).on('click', '.trash', function (e) {
        var clearedCompItem = $(this).closest(".list-group-item").remove();
        e.preventDefault();
    });
</script>

<script src="{{ elixir('themes/admin/js/common.js') }}"></script>

<script>
    if($(window).width() >= 1440){
        $(".side-panel").addClass("open");
        $(".sidepanel-toggle").parent().addClass("open");
        $("body").addClass("small-content");
    }
    else{
        $(".side-panel").removeClass("open");
        $(".sidepanel-toggle").parent().removeClass("open");
        $("body").removeClass("fixed-sidebar-example small-content");
    }

    $(window).resize(function(){
        if($(window).width() >= 1440){
            $(".side-panel").addClass("open");
            $(".sidepanel-toggle").parent().addClass("open");
            $("body").addClass("fixed-sidebar-example small-content");
        }
        else{
            $(".side-panel").removeClass("open");
            $(".sidepanel-toggle").parent().removeClass("open");
            $("body").removeClass("fixed-sidebar-example small-content");
        }
    });

</script>


<script>
    //Data Tables
    $('#table1').DataTable({
        "dom": '<"toolbar tool1">rtip',
        info: false,
        paging: false,
        responsive: true
    });

    $("div.tool1").html('<h5 class="zero-m">Info table</h5>');

    $('#table2').DataTable({
        "dom": '<"toolbar tool2"><"clear-filter">frtip',
        info: false,
        paging: false,
        responsive: true,
        "oLanguage": { "sSearch": "" }
    });

    $("div.tool2").html('<h5 class="zero-m">Danger table</h5>');

    $('.dataTables_filter input').attr("placeholder", "Search");
</script>

<script src="{{ elixir('themes/admin/js/app.js') }}"></script>


{{--@include('admin::footer')--}}

</body>
</html>