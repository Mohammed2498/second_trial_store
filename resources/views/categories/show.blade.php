@extends('layout.app')
@section('page_title')
    {{ $category->name }}
@endsection
@section('content')
    <div class="mx-auto" style="width: 800px">
        <x-flash-message />
        <a href="{{ route('categories.create') }}">
            <button type="button" class="btn btn-primary btn-lg">Add New Category</button>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->children as $child)
                    <tr>
                        <td>{{ $child->id }}</th>
                        <td>{{ $child->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                        <td scope="row">{{ $product->name }}</td>
                        <td scope="row">{{ $product->price }}</td>
                        <td scope="row">{{ $product->description }}</td>
                        <td scope="row"><a href="{{ route('products.edit', $product->id) }}"><button type="button"
                                    class="btn btn-primary">Edit</button></a></td>
                        <td scope="row">
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
    </div>
@endsection
