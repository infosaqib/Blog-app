<div>
    <h1>Users</h1>
    <table border="1">
        <tr>
            <td>id</td>
            <td>name</td>
            <td>email</td>
            <td>password</td>
        </tr>
        @foreach ($data as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
            </tr>
        @endforeach
    </table>
</div>