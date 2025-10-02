<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.animatedheadline.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">

    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">

    <title>Booking  - Online Ticket Booking Website</title>


</head>

<body>
    <!-- ==========Preloader========== -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ==========Preloader========== -->
    <!-- ==========Overlay========== -->
    <div class="overlay"></div>
    <a href="#0" class="scrollToTop">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="/">
                       Booking
                    </a>
                </div>
                <ul class="menu">
                    <li>
                        <a href="/" class="active">Home</a>
                        
                    </li>
                    <li>
                        <a href="/">movies</a>
                      
                    </li>
                  
                    
                    <li class="header-button pr-0">
                        @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
                    </li>
                    
                </ul>
                <div class="header-bar d-lg-none">
					<span></span>
					<span></span>
					<span></span>
				</div>
            </div>
        </div>
    </header>
    <section class="details-banner bg_img" data-background="./assets/images/banner/banner03.jpg" style="background-image: url(&quot;./assets/images/banner/banner03.jpg&quot;);">
        <div class="container">
            <div class="details-banner-wrapper">
                <div class="details-banner-thumb">
                    <img src="{{$movies->image}}" alt="movie">
                    <a href="https://www.youtube.com/embed/KGeBMAgc46E" class="video-popup">
                        <img src="{{asset('frontend/images/movie/video-button.png')}}" alt="movie">
                    </a>
                </div>
                <div class="details-banner-content offset-lg-3">
                    <h3 class="title">{{$movies->title}}</h3>
                  
                    <a href="#0" class="button">{{$movies->title}}</a>
                    <div class="social-and-duration">
                        <div class="duration-area">
                            <div class="item">
                                <i class="fas fa-calendar-alt"></i><span>{{$movies->date}}06 Dec, 2020</span>
                            </div>
                            <div class="item">
                                <i class="far fa-clock"></i><span>2 hrs 50 mins</span>
                            </div>
                        </div>
                        <a href="/book-ticket?id={{$movies->id}}" class="custom-button">book tickets</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <footer class="footer-section" style="
    margin-top: 207px;
">
        
        <div class="container">
            <div class="footer-top">
                <div class="logo">
                    <a href="index-1.html">
                        
                    </a>
                </div>
                <ul class="social-icons">
                    <li>
                        <a href="#0">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0" class="active">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-google"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#0">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="footer-bottom">
                <div class="footer-bottom-area">
                    <div class="left">
                        <p>Copyright © 2020.All Rights Reserved By <a href="#0">Booking </a></p>
                    </div>
                    <ul class="links">
                        <li>
                            <a href="#0">About</a>
                        </li>
                        <li>
                            <a href="#0">Terms Of Use</a>
                        </li>
                        <li>
                            <a href="#0">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="#0">FAQ</a>
                        </li>
                        <li>
                            <a href="#0">Feedback</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('frontend/js/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('frontend/js/plugins.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/heandline.js')}}"></script>
    <script src="{{asset('frontend/js/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/wow.min.js')}}"></script>
    <script src="{{asset('frontend/js/countdown.min.js')}}"></script>
    <script src="{{asset('frontend/js/odometer.min.js')}}"></script>
    <script src="{{asset('frontend/js/viewport.jquery.js')}}"></script>
    <script src="{{asset('frontend/js/nice-select.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
