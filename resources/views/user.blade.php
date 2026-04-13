@includeif('common.header', ['page' => 'Users'])
<h3>User id: {{ rand() }}</h3>
<!-- <p>{{ print_r($users) }}</p> -->

<table border="true">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Country</th>
        <th>Action</th>
    </tr>
    @isset($users)
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->country }}</td>
                <td>
                    <form action="/users/{{ $user->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button style="background-color: red;color:white;">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    @endisset
</table>