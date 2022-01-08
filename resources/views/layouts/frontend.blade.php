<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>{{ $page_data['title'] ?? '404 Not Found' }}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="/assets/css/bootstrap-f.min.css">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">

    <!--====== flaticon css ======-->
    <link rel="stylesheet" href="/assets/css/flaticon.css">

    <!--====== nice select css ======-->
    <link rel="stylesheet" href="/assets/css/nice-select.css">

    <!--====== animate css ======-->
    <link rel="stylesheet" href="/assets/css/animate.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="/assets/css/slick.css">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="/assets/css/default.css">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="/assets/css/style.css">

    <link rel="stylesheet" href="/floating/floating-wpp.css">
</head>

<body>

    <!--====== PRELOADER PART START ======-->

    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
                <div class="object" id="object_four"></div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->

    @include('frontend.includes.header')
    @yield('content')
    @include('frontend.includes.footer')


    <!--====== jquery js ======-->
    <script src="/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="/assets/js/core/bootstrap.min.js"></script>
    <script src="/assets/js/core/popper.min.js"></script>

    <!--====== Slick js ======-->
    <script src="/assets/js/slick.min.js"></script>

    <!--====== Isotope js ======-->
    <script src="/assets/js/isotope.pkgd.min.js"></script>

    <!--====== nice select js ======-->
    <script src="/assets/js/jquery.nice-select.min.js"></script>

    <!--====== counterup js ======-->
    <script src="/assets/js/jquery.counterup.min.js"></script>

    <!--====== circle progress js ======-->
    <script src="/assets/js/circle-progress.min.js"></script>

    <!--====== waypoints js ======-->
    <script src="/assets/js/waypoints.min.js"></script>

    <!--====== wow js ======-->
    <script src="/assets/js/wow.min.js"></script>

    <!--====== Images Loaded js ======-->
    <script src="/assets/js/imagesloaded.pkgd.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="/assets/js/jquery.magnific-popup.min.js"></script>
    
    <script src="/floating/floating-wpp.js"></script>

    <!--====== Main js ======-->
    <script src="/assets/js/main.js"></script>
    <script>
        $(function() {
            $('#WAButton').floatingWhatsApp({
                phone: '9876543210', //WhatsApp Business phone number International format-
                //Get it with Toky at https://toky.co/en/features/whatsapp.
                headerTitle: 'Chat with us on WhatsApp!', //Popup Title
                popupMessage: 'Hello, how can we help you?', //Popup Message
                showPopup: true, //Enables popup display
                buttonImage: '<img src="/assets/images/whatsapp.svg" />', //Button Image
                //headerColor: 'crimson', //Custom header color
                //backgroundColor: 'crimson', //Custom background button color
                position: "right"
            });
        });
    </script>
    
    @stack('script')
</body>

</html>