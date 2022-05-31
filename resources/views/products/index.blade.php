@extends('layout.app')
@section('page_title', 'Products')
@section('content')
    <div class="mx-auto" style="width: 800px">
        <x-flash-message />
        <a href="{{ route('products.create') }}">
            <button type="button" class="btn btn-primary btn-lg">Add New Product</button>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td><a href="{{ route('products.edit', $product->id) }}"><button type="button"
                                    class="btn btn-primary">Edit</button></a></td>
                        <td>
                            <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>

@endsection('content')
