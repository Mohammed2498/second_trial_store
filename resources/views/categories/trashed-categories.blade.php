@extends('layout.app')
@section('page_title', 'Categories')
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
                    <th scope="col">Description</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Parent</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td scope="row">{{ $category->id }}</th>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            {{ $category->slug }}
                            {{-- @if ($category->image)
                                <img width="30px" height="30px" src="{{ asset('storage/' . $category->image) }}" alt="">
                            @endif --}}
                        </td>
                        <td>{{ $category->parent->name }}</td>
                        <td>
                            <a href="" class="btn btn-warning">Restore</a>
                            <form action="{{ route('categories.forceDelete', $category->id) }}" method="POST"
                                class="d-inline-block">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $categories->links() }} --}}
    </div>
@endsection
