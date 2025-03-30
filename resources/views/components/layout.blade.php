<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name','Home') }}</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Preload Compiled CSS (Fix FOUC) -->
        <!-- <link rel="stylesheet" href="{{ Vite::asset('resources/sass/app.scss') }}"> -->

        <!-- Vite directive to load JS & CSS properly -->
        <!-- @vite(['resources/js/app.js']) -->
    <!-- @vite(['resources/sass/app.scss' => 'resources/js/app.js']) -->
    <!-- @vite(['resources/sass/app.scss','resources/css/app.css','resources/js/app.js']) -->
    <!-- <link rel="stylesheet" href="{{ mix('resource/sass/app.css') }}">
    <script type="module" src="{{ mix('resources/js/app.js') }}"></script>
    <script type="module" src="{{ mix('resources/js/app.js') }}"></script>
    <script type="module" src="{{ mix('resources/js/app.js') }}"></script>
    <script type="module" src="{{ mix('resources/js/app.js') }}"></script>   -->
  
    <!-- <style>
    body {
        visibility: hidden;
    }
</style>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.body.style.visibility = "visible";
    });
</script> -->

</head>
<body>

    
    <header>
        <h1>Welcome to My Website</h1>
        <nav>
            <ul class="nav-left">
                @if(Auth::user() && Auth::user()->isAdmin())
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                @endif
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="{{ route('coders.index') }}">Programmers</a></li>
            </ul> 
            <ul class="nav-right">
                <!-- <li><a href="{{ 'login' }}">Login</a></li>
                <li><a href="{{ 'register' }}">Register</a></li> -->
                @auth
                    <li><a href="">Hi {{ Auth::user()->name }}</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" style="border: none; background: none; color: white; cursor: pointer;">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth

                <li> <button onclick="toggleDarkMode()">Toggle Theme</button></li>
            </ul>  
           
        </nav>
    </header>
    <main>    
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @elseif(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

         <!-- @if(session('error'))
          <div class="alert alert-danger" role="alert">
                {{ session('error') }}
          </div>
        @endif -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

       <!-- @yield('content') -->
       {{ $slot }}
    </main>

    <script>
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
            localStorage.setItem('dark-mode', document.body.classList.contains('dark-mode'));
        }

        // Load dark mode preference
        if (localStorage.getItem('dark-mode') === 'true') {
            document.body.classList.add('dark-mode');
        }
    </script>
</body>
</html>