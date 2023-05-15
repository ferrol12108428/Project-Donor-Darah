<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700"> <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="{{ asset('assets/font-awesome-4.7.0/css/font-awesome.min.css')}}"> <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"> <!-- Bootstrap style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/slick/slick-theme.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/datepicker.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tooplate-style.css')}}">
</head>

<body>
    <div class="container mt-5">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- load JS files -->
    <script src="{{asset('assets/js/jquery-1.11.3.min.js')}}"></script> <!-- jQuery (https://jquery.com/download/) -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script> <!-- https://popper.js.org/ -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script> <!-- https://getbootstrap.com/ -->
    <script src="{{asset('assets/js/datepicker.min.js')}}"></script> <!-- https://github.com/qodesmith/datepicker -->
    <script src="{{asset('assets/js/jquery.singlePageNav.min.js')}}"></script> <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
    <script src="{{asset('assets/slick/slick.min.js')}}"></script> <!-- http://kenwheeler.github.io/slick/ -->
    <script>
        /* Google map
            ------------------------------------------------*/
        var map = '';
        var center;

        function initialize() {
            var mapOptions = {
                zoom: 13,
                center: new google.maps.LatLng(-23.013104, -43.394365),
                scrollwheel: false
            };

            map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

            google.maps.event.addDomListener(map, 'idle', function() {
                calculateCenter();
            });

            google.maps.event.addDomListener(window, 'resize', function() {
                map.setCenter(center);
            });
        }

        function calculateCenter() {
            center = map.getCenter();
        }

        function loadGoogleMap() {
            var script = document.createElement('script');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVWt4rJfibfsEDvcuaChUaZRS5NXey1Cs&v=3.exp&sensor=false&' + 'callback=initialize';
            document.body.appendChild(script);
        }

        function setCarousel() {

            if ($('.tm-article-carousel').hasClass('slick-initialized')) {
                $('.tm-article-carousel').slick('destroy');
            }

            if ($(window).width() < 438) {
                // Slick carousel
                $('.tm-article-carousel').slick({
                    infinite: false,
                    dots: true,
                    slidesToShow: 1,
                    slidesToScroll: 1
                });
            } else {
                $('.tm-article-carousel').slick({
                    infinite: false,
                    dots: true,
                    slidesToShow: 2,
                    slidesToScroll: 1
                });
            }
        }

        function setPageNav() {
            if ($(window).width() > 991) {
                $('#tm-top-bar').singlePageNav({
                    currentClass: 'active',
                    offset: 79
                });
            } else {
                $('#tm-top-bar').singlePageNav({
                    currentClass: 'active',
                    offset: 65
                });
            }
        }

        function togglePlayPause() {
            vid = $('.tmVideo').get(0);

            if (vid.paused) {
                vid.play();
                $('.tm-btn-play').hide();
                $('.tm-btn-pause').show();
            } else {
                vid.pause();
                $('.tm-btn-play').show();
                $('.tm-btn-pause').hide();
            }
        }

        $(document).ready(function() {

            $(window).on("scroll", function() {
                if ($(window).scrollTop() > 100) {
                    $(".tm-top-bar").addClass("active");
                } else {
                    //remove the background property so it comes transparent again (defined in your css)
                    $(".tm-top-bar").removeClass("active");
                }
            });

            // Google Map
            loadGoogleMap();

            // Date Picker
            const pickerCheckIn = datepicker('#inputCheckIn');
            const pickerCheckOut = datepicker('#inputCheckOut');

            // Slick carousel
            setCarousel();
            setPageNav();

            $(window).resize(function() {
                setCarousel();
                setPageNav();
            });

            // Close navbar after clicked
            $('.nav-link').click(function() {
                $('#mainNav').removeClass('show');
            });

            // Control video
            $('.tm-btn-play').click(function() {
                togglePlayPause();
            });

            $('.tm-btn-pause').click(function() {
                togglePlayPause();
            });

            // Update the current year in copyright
            $('.tm-current-year').text(new Date().getFullYear());
        });
    </script>
</body>

</html>