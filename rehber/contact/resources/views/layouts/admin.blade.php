<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@lang('messages.admin_title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <style>
        .content .row {
            min-height: 50vh;
            /* Yüksekliği ortalamak için */
        }

        .content .col-md-12.mt-5.d-flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
        integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('admin.home') }}" class="brand-link">
                <span class="brand-text font-weight-light">@lang('messages.phone_contact')</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin.users') }}" class="nav-link">
                                <i class="bi bi-people"></i>
                                <p>@lang('messages.users_on_site')</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.contacts') }}" class="nav-link">
                                <i class="bi bi-person-rolodex"></i>
                                <p>@lang('messages.contacts')</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="bi bi-arrow-clockwise"></i>
                                <p>@lang('messages.return_to_website')</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>@lang('messages.admin_panel')</h1>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center text-center">
                        <div class="col-md-12 mt-5">
                            <h2>{{ auth()->user()->name }}, @lang('messages.admin_panel_greetings')</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-5 d-flex flex-column align-items-center">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <!-- AdminLTE Scripts -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    </div>
</body>

</html>
