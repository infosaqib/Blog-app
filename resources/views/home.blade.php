@includeif('common.header', ['page' => 'Home'])
<h1 class="text-center text-red-500">HOME page</h1>
<h2>{{ $name }}</h2>
<a href="{{ route('welcome') }}">Welcome</a>