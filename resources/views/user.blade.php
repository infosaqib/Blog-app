@includeif('common.header', ['page' => 'Users'])
<h3>User id: {{ rand() }}</h3>
@if($name === 'joe')
    <h1>User is {{ $name }}</h1>
@elseif($name === 'osama')
    <h1>User is osama</h1>
@else
    <h1>other user</h1>
@endif

@foreach($users as $user)
    <h2>{{ $user  }}</h2>
@endforeach