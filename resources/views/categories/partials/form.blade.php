{{-- <x-forms.input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" label="Add Category"
    class="form-control" id="" label="Name" />

<x-forms.input type="text" name="description" value="{{ old('description', $category->description ?? '') }}"
    label="Add Category" class="form-control" id="" label="Description" />

<x-forms.input type="file" name="image" value="{{ old('image', $category->name ?? '') }}" label="Add Category"
    class="form-control" id="" label="Add Image" /> --}}

<div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    <input type="text" value="{{ old('name', $category->name ?? '') }}" name="name" class="form-control"
        id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Category Description</label>
    <input value="{{ old('description', $category->description ?? '') }}" type="text" name="description"
        class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="mb-3">
    <label for="image" class="form-label">Add Image</label>
    <input value="{{ old('image', $category->image ?? '') }}" type="file" name="image" class="form-control"
        id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
<div class="mb-3">
    <label for="parent_id" class="form-label">Select Category</label>
    <select class="form-select" name=" parent_id" id="">
        <option value="">Select Category</option>
        @foreach ($categories as $parent)
            <option value="{{ $parent->id }}" @if ($category->parent_id == $parent->id) selected @endif>
                {{ $parent->name }}</option>
        @endforeach
    </select>
</div>
