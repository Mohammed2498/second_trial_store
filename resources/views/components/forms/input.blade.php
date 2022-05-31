@props(['type', 'class', 'name', 'value', 'id', 'label'])
{{-- <label for="{{$name}}" >name</label> --}}
<label>
    {{ $label }}
</label>
<input  type="{{ $type }}" name="{{ $name }}" class="{{ $class }}"
    value="{{ $value }}" id="{{ $id }}" {{ $attributes }}>
