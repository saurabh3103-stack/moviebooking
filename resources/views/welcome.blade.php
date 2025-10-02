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
 
    <section class="banner-section">
        <div class="banner-bg bg_img bg-fixed" data-background="frontend/images/banner/banner01.jpg"></div>
        <div class="container">
            <div class="banner-content">
                <h1 class="title  cd-headline clip"><span class="d-block">book your</span> tickets for 
                    <span class="color-theme cd-words-wrapper p-0 m-0">
                        <b class="is-visible">Movie</b>
                    </span>
                </h1>
            </div>
        </div>
    </section>
    <section class="search-ticket-section padding-top pt-lg-0">
    <div class="container">
        <div class="search-tab bg_img" data-background="frontend/images/ticket/ticket-bg01.jpg">
            <div class="tab-area mt-0">
                <div class="tab-item active">
                    <form class="ticket-search-form" method="GET" action="{{ url('/') }}">
                        <div class="form-group">                        
                            <span class="type">Category</span>
                            <select class="form-control" name="category">
                                <option value="">Select Category</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ $selectedCategory == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <span class="type">From Date</span>
                            <input type="date" name="from_date" class="form-control" value="{{ $fromDate }}">
                        </div>
                        <div class="form-group">
                            <span class="type">To Date</span>
                            <input type="date" name="to_date" class="form-control" value="{{ $toDate }}">
                        </div>
                        <div class="d-flex"  style="gap:10px">
                            <button type="submit" class="btn btn-primary mt-3">Search</button>
<button type="button" class="btn btn-secondary mt-3" onclick="window.location.href='{{ url('/') }}'">
    Reset
</button>                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

   
 
    <section class="movie-section padding-top padding-bottom">
        <div class="container">
            <div class="tab">
                <div class="section-header-2">
                    <div class="left">
                        <h2 class="title">movies</h2>
                    </div>
                    
                </div>
                <div class="tab-area mb-30-none">
                    <div class="tab-item active">
                        <div class="row">
                           @foreach($movies as $movie)
    <div class="col-lg-3 col-sm-12 col-md-3">
        <div class="movie-grid">
            <div class="movie-thumb c-thumb">
                <a href="/movie-details?id={{ $movie->id }}">
                    <img src="{{ $movie->image }}" alt="movie">
                </a>
            </div>
            <div class="movie-content bg-one">
                <h5 class="title m-0">
                    <a href="/movie-details?id={{ $movie->id }}">{{ $movie->title }}</a>
                </h5>
                <h6>{{ $movie->category->name ?? 'No Category' }} | {{ $movie->theater->name ?? 'No Theater' }}</h6>
                <a href="/movie-details?id={{ $movie->id }}" class="btn btn-info mb-3 mt-3">Book Now</a>
            </div>
        </div> 
    </div>
@endforeach
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-section">
        
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
