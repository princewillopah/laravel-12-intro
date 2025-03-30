<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name','Home') }}</title>
    @vite(['resources/js/app.js', 'resources/scss/app.scss'])

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
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/coders">Programmers</a></li>
            </ul>
            <ul>
                <li><a href="/">Login</a></li>
                <li><a href="/about">Register</a></li>
                <li><a href="/coders">Change Theme</a></li>
            </ul>  
        </nav>
    </header>
    <main class="container">
       {{ $slot }}
    </main>
</body>
</html>