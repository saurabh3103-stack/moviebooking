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
    <div class="ticket-plan-section padding-top padding-bottom">
    <div class="container my-5">
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-lg mx-auto" style="max-width: 500px; border-radius: 15px; overflow: hidden;">
        <div class="card-header  text-white text-center" style="background: #001232;">
            <h4>Movie Ticket</h4>
        </div>
        <div class="card-body" style="background: #001232;">
            <p><strong>Movie:</strong> {{ $movie->title }}</p>
            <p><strong>Show Date:</strong> {{ date('d M Y', strtotime($booking->show_date)) }}</p>
            <p><strong>Show Time:</strong> {{ $booking->show_time }}</p>
            <p><strong>Tickets:</strong> {{ $booking->tickets }}</p>
            <p><strong>Price per Ticket:</strong> ₹{{ number_format($booking->ticket_price, 2) }}</p>
            <p><strong>Total Price:</strong> ₹{{ number_format($booking->total_price, 2) }}</p>
            <hr>

            @if($transaction && $transaction->status === 'success')
                <p><strong>Order ID:</strong> {{ $transaction->order_id }}</p>
                <p><strong>Transaction ID:</strong> {{ $transaction->transaction_id }}</p>
                <p class="text-success"><strong>Payment Status:</strong> Success </p>
            @else
                <p class="text-danger"><strong>Payment Status:</strong> Failed</p>
            @endif
        </div>
        <div class="card-footer text-center text-white" style="background: #001232;">
            <small>Thank you for booking with us!</small>
        </div>
    </div>
</div>

</div>

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
