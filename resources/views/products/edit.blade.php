@extends('layout.app')
@section('page_title', 'Edit Product')
@section('content')
    <div class="mx-auto" style="width: 800px">

        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger">
                    {{ $item }}
                </div>
            @endforeach ($errors as $item)

        @endif
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            @include('products.partials.form')
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
    </body>

    </html>
@endsection('content')
