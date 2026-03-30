<h1 class="text-center text-red-500">{{ config('app.name') }}</h1>
<nav>
    <ul class="flex justify-center space-x-4">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
</nav>