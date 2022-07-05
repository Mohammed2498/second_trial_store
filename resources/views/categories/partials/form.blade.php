{{-- <x-forms.input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" label="Add Category"
    class="form-control" id="" label="Name" />

<x-forms.input type="text" name="description" value="{{ old('description', $category->description ?? '') }}"
    label="Add Category" class="form-control" id="" label="Description" />

<x-forms.input type="file" name="image" value="{{ old('image', $category->name ?? '') }}" label="Add Category"
    class="form-control" id="" label="Add Image" /> --}}

<div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" value="{{ old('name', $category->name ?? '') }}" name="name" class="form-control">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea value="{{ old('description', $category->description ?? '') }}" type="text" name="description"
        class="form-control" id="" rows="4"></textarea>
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
