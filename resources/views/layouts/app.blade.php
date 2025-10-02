<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script type="module" crossorigin src="{{ asset('assets/404-6a89e66d.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('assets/404-f4fa55c2.css')}}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="layout">
    <nav class="sidebar">
    <div class="logo">
        <a class="inline-flex items-center">
            <span class="text-2xl italic transform -skew-x-3 font-semibold text-gray-500">
                {{ Auth::user()->name }}
            </span>
        </a>
    </div>

    <div class="sidebar__scroll-wrapper">
        <div id="sidebarNavScroll" class="sidebar__scroll scrollbar" data-scrollbar>
            <nav class="navigation">
                @if(Auth::user()->role === 'admin')
                    <ul>
                        <li class="navigation__item">
                            <a href="{{ route('admin.dashboard') }}" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="navigation__item">
                            <a href="javascript:;" class="navigation__item__toggler" data-collapse-toggle>
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Manage Movies/Shows</span>
                                <i data-icon="feather__chevronRight" class="navigation__item__chevron"></i>
                            </a>
                            <nav class="navigation__item__content collapse" data-collapse-group="sidenav">
                                <ul class="navigation-level">
                                    <li><a href="/admin/movies">Movies/Shows</a></li>
                                    <li><a href="/admin/movie-category">Add Category</a></li>
                                    <li><a href="/admin/add-movie">Add Movies/Shows</a></li>
                                </ul>
                            </nav>
                        </li>
                    </ul>
                    <ul>
                        <li class="navigation__item">
                            <a href="javascript:;" class="navigation__item__toggler" data-collapse-toggle>
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Theatres</span>
                                <i data-icon="feather__chevronRight" class="navigation__item__chevron"></i>
                            </a>
                            <nav class="navigation__item__content collapse" data-collapse-group="sidenav">
                                <ul class="navigation-level">
                                    <li><a href="/admin/theatres">Theatres</a></li>
                                    <li><a href="/admin/add-theatres">Add Theatre</a></li>
                                </ul>
                            </nav>
                        </li>
                    </ul>
                    <ul>
                        <li class="navigation__item">
                            <a href="/admin/booking" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Booking</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="navigation__item">
                            <a href="/admin/transactions" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Transactions</span>
                            </a>
                        </li>
                    </ul>
                @elseif(Auth::user()->role === 'manager')
                    <ul>
                        <li class="navigation__item">
                            <a href="{{ route('manager.dashboard') }}" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="navigation__item">
                            <a href="javascript:;" class="navigation__item__toggler" data-collapse-toggle>
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Manage Movies/Shows</span>
                                <i data-icon="feather__chevronRight" class="navigation__item__chevron"></i>
                            </a>
                            <nav class="navigation__item__content collapse" data-collapse-group="sidenav">
                                <ul class="navigation-level">
                                    <li><a href="/manager/movies">Movies/Shows</a></li>
                                    <li><a href="/manager/add-movie">Add Movies/Shows</a></li>
                                </ul>
                            </nav>
                        </li>
                    </ul>
                     <ul>
                        <li class="navigation__item">
                            <a href="/manager/booking" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Booking</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="navigation__item">
                            <a href="/manager/transactions" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Transactions</span>
                            </a>
                        </li>
                    </ul>
                @elseif(Auth::user()->role === 'customer')
                    <ul>
                        <li class="navigation__item">
                            <a href="/" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Book Movie</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="navigation__item">
                            <a href="/customer/tickets" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">My Tickets</span>
                            </a>
                        </li>
                    </ul>
                    <ul>
                        <li class="navigation__item">
                            <a href="/customer/transactions" class="navigation__item__toggler">
                                <span class="navigation__item__icon"><i data-icon="feather__home"></i></span>
                                <span class="navigation__item__title">Transactions</span>
                            </a>
                        </li>
                    </ul>
                @endif

            </nav>
        </div>
    </div>
</nav>



    <div class="wrapper">
       
        <div class="flex-1">
            @include('layouts.navigation')
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main class="p-4">
                {{ $slot }}
            </main>
        </div>
    </div>
</div>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.querySelector('aside');

    if(menuToggle){
        menuToggle.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
        });
    }
</script>
</body>
</html>
