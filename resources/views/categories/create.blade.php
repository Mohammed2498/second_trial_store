
@extends('layout.app')
@section('page_title','Add Category')
@section('content')
    <div class="mx-auto" style="width: 800px">
        @if ($errors->any())
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger">
                    {{ $item }}
                </div>
            @endforeach ($errors as $item)
        @endif
        <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('categories.partials.form')
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('categories.index')}}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection('content')
