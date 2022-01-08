<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Admin
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="/assets/demo/demo.css" rel="stylesheet" />
    @yield('css')
</head>

<body class="">

    <div class="wrapper">
        @include('backend.includes.sidenav')

        <div class="main-panel">
            @include('backend.includes.header')
            @yield('content')
            @include('backend.includes.footer')
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="/assets/js/core/jquery.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chart JS -->
    <script src="/assets/js/plugins/chartjs.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="/assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="/assets/demo/demo.js"></script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
        $('.confirmation').on('click', function() {
            return confirm('Are you sure?');
        });
        $('.confirmation-restrict').on('click', function() {
            return confirm('Are you sure? All data related to this will be deleted too.');
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    @if(Session::has('success'))
    <script>
        $.notify("<b>Success:</b> {{ Session::get('success') }}", {
            showProgressbar: false,
            type: 'success'
        });
    </script>
    @endif
    @if(Session::has('error'))
    <script>
        $.notify("<b>Error:</b> {{ Session::get('error') }}", {
            showProgressbar: false,
            type: 'error'
        });
    </script>
    @endif
    @yield('script')
</body>

</html>