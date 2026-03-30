@includeif('common.common', ['page' => 'Welcome'])
<x-alert message="Welcome to the site" state="info"/>
<nav>
    <ul class="flex justify-center space-x-4">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About</a></li>
        <li><a href="{{ route('contact') }}">Contact</a></li>
    </ul>
</nav>