<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/users/app.css')}}">

    @yield('styles')



    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <header>
            <a href="{{route('freelancer.index')}}" class="text-decoration-none text-black">
                <h1>GUILD</h1>
            </a>

            <nav>
                <ul>
                    <li><a href="{{route('freelancer.projects.index')}}">Project</a></li>
                    <li><a href="{{route('freelancer.messages.index', Auth::user()->id)}}">Message</a></li>
                    <li><a href="{{route('freelancer.profile.show', Auth::user()->id)}}">Profile</a></li>
                    <li><a href="{{route('freelancer.contact')}}">Contact</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </ul>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        @if (!request()->is('freelancer/messages/*'))
            <footer>
                <nav>
                    <ul>
                        <li><a href="{{route('freelancer.projects.index')}}">Project</a></li>
                        <li><a href="{{route('freelancer.messages.index', Auth::user()->id)}}">Message</a></li>
                        <li><a href="{{route('freelancer.profile.show', Auth::user()->id)}}">Profile</a></li>
                        <li><a href="{{route('freelancer.contact')}}">Contact</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>
                    </ul>
                </nav>
                <p>&copy; {{ date('Y') }} GUILD. All Rights Reserved.</p>
            </footer>
        @endif


    </div>
    @yield('scripts')
</body>
</html>
