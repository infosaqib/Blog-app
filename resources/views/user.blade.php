@includeif('common.header', ['page' => 'Users'])
<h3>User id: {{ rand() }}</h3>
<!-- <p>{{ print_r($users) }}</p> -->

@foreach($users as $user)
    <h2>Mr. {{ $user->name }} with id: {{ $user->id}} and email: {{ $user->email }}</h2>
@endforeach