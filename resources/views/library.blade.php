<div>
    <table border="true">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
        </tr>
        @foreach($library as $book )
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->price}}</td>
        </tr>
        @endforeach
    </table>
</div>