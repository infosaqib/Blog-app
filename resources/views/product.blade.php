<div">
    <table border="true">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
        </tr>
        @isset($product)
            <tr>
                <td>{{$product['id']}}</td>
                <td>{{$product['title']}}</td>
                <td>{{$product['brand']}}</td>
                <td>{{$product['price']}}</td>
        @endisset
    </table>
    </div>