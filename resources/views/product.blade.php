@includeif('common.header', ['page' => 'Products'])
<style>
    .w-5.h-5 {
        width: 10px;
    }

</style>
<div">
    <table border="true">
        <tr>
            <th>id</th>
            <th>Title</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
        @isset($products)
            @foreach ($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td>{{$product['title']}}</td>
                    <td>{{$product['category']}}</td>
                    <td>{{$product['price']}}</td>
            @endforeach
        @endisset
    </table>
    <div>
        {{ $products->links() }}
    </div>
    </div>