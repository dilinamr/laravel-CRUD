@extends('layouts.app')
@section('main')
        <div class="container">
            <h1>product page</h1>
            <div class="text-end">
                <a href="products/create" class="btn btn-dark mt-3"
                    >NEW PRODUCT</a
                >
            </div>
            <div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>DESCRIPTION</th>
                            <th>IMAGE</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <img
                                    class="rounded-circle"
                                    width="30px"
                                    height="30px"
                                    src="products/{{$product->image}}"
                                />
                            </td>
                            <td>
                                <a
                                    href="products/{{$product->id}}/edit"
                                    class="btn btn-dark btn-sm"
                                    >EDIT</a
                                >
                                 <a
                                    href="products/{{$product->id}}/delete"
                                    class="btn btn-danger btn-sm"
                                    >DELETE</a
                                >
                            </td>
                            
                               
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
@endsection