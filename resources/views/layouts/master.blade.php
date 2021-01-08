<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/ico.png') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <span style="margin-left:1rem;"
                    class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }} /{{ Auth::user()->role }}/</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @if (Auth::user()->role == 'casher' ||
                        Auth::user()->role == 'accountant' ||
                        Auth::user()->role == 'admin')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p> Самбарууд <i class="right fa fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="" class="nav-link">
                                        <i class="fa fa-user-circle nav-icon"></i>
                                        <p>Ажилтны самбар</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-laptop"></i>
                                <p> Касс <i class="right fa fa-angle-left"></i> </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ Route('cash') }}" class="nav-link">
                                        <i class="fa fa-user nav-icon"></i>
                                        <p>Барааны тооцоо</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ Route('cashreport') }}" class="nav-link">
                                        <i class="fa fa-list nav-icon"></i>
                                        <p>Дэлгүүр/Харилцагч тооцоо</p>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ Route('balancereport') }}" class="nav-link">
                                        <i class="fa fa-line-chart nav-icon"></i>
                                        <p>Баланс</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        @if (Auth::user()->role == 'accountant' ||
                        Auth::user()->role == 'admin')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fa fa-wrench"></i>
                                <p> Тохиргоо <i class="right fa fa-angle-left"></i> </p>
                            </a>
                            {{--  <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ Route('const_info') }}" class="nav-link">
                            <i class="fa fa-circle-o nav-icon"></i>
                            <p>Үндсэн мэдээлэл</p>
                            </a>
                        </li>
                    </ul> --}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('product_main') }}" class="nav-link">
                                <i class="fa fa-archive nav-icon"></i>
                                <p>Бүтээгдэхүүн /Ерөнхий/</p>
                            </a>
                        </li>
                    </ul>
                    {{--  <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ Route('product_item') }}" class="nav-link">
                    <i class="fa fa-sitemap nav-icon"></i>
                    <p>Бүтээгдэхүүн /Нэгж/</p>
                    </a>
                    </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('customers') }}" class="nav-link">
                                <i class="fa fa-handshake-o nav-icon"></i>
                                <p>Харилцагчид</p>
                            </a>
                        </li>
                    </ul>--}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('shops') }}" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>Салбар дэлгүүр</p>
                            </a>
                        </li>
                    </ul>
                    @if (Auth::user()->role == 'admin')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ Route('users') }}" class="nav-link">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Хэрэглэгчид</p>
                            </a>
                        </li>
                    </ul>
                   
                    @endif
                    </li>
                    @endif

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link text-danger">
                            <i class="nav-icon fa fa-circle text-danger"></i>
                            <p>Системээс ГАРАХ</p>
                        </a>
                    </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{--    <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div> --}}
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content" style="margin-top: 1rem;">
                <div class="container-fluid">
                    @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="#">Selenge</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- AdminLTE App -->
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('script')

    <script>
        // Show active menu
        var url = window.location;
        let menu = $('ul.nav-treeview a').filter(function () {
            return this.href == url;
        }).siblings();
        menu.removeClass('active').end().addClass('active');

        let parent = $('li.has-treeview a').filter(function () {
            return this.href == url;
        }).parentsUntil(".nav-treeview > .has-treeview").siblings();
        parent.removeClass('menu-open').end().addClass('menu-open');
        parent.find(".has-treeview > .nav-link").removeClass('active').end().addClass('active');

        //save user menu state
        $('#pushmenu').click(function () {
            let val = 0;
            if ($('body,html').hasClass('sidebar-open')) {
                val = 1;
            }
            $.get("/collapsemenu/" + val);
        });

    </script>

</body>

</html>
