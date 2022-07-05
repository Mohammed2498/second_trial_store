@extends('layout.app')
@section('page_title', 'Edit Category')
@section('content')
    <div class="mx-auto" style="width: 800px">
        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger">
                    {{ $item }}
                </div>
            @endforeach ($errors as $item)
        @endif
        <form method="POST" action="{{ route('categories.update', $category->id) }}">
            @method('PUT')
            @csrf
            @include('categories.partials.form')
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
    </body>
@endsection('content')
