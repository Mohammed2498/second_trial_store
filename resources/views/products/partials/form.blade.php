 <div class="mb-3">
     <label for="title" class="form-label">Title</label>
     <input value="{{ old('title', $product->title ?? '') }}" type="text" name="title" class="form-control"
         id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
 <div class="mb-3">
     <label for="cost" class="form-label">Cost</label>
     <input value="{{ old('cost', $product->cost ?? '') }}" type="number" name="price" class="form-control"
         id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
 <div class="mb-3">
     <label for="price" class="form-label">Price</label>
     <input value="{{ old('price', $product->price ?? '') }}" type="number" name="price" class="form-control"
         id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
 <div class="mb-3">
     <label for="sale_price" class="form-label">Sale Price</label>
     <input value="{{ old('sale_price', $product->sale_price ?? '') }}" type="number" name="sale_price"
         class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
 <div class="mb-3">
     <label for="quantity" class="form-label">Quantity</label>
     <input value="{{ old('quantity', $product->quantity ?? '') }}" type="number" name="quantity"
         class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
 <div class="form-group">
     <label for="category_id">Select Category</label>
     <select name="category_id" id="" class="form-control">
         <option value="">Select Category</option>
         @foreach ($categories as $category)
             <option value="{{ old('category_id', $category->id) }}"
                 @if ($product->category_id == $category->id) selected @endif>
                 {{ $category->name }}
             </option>
         @endforeach
     </select>
 </div>
 <div class="form-group">
     <label for="description"> Description</label>
     <textarea class="form-control" name="description" class="form-control" placeholder="Leave a description here"
         id="floatingTextarea2" style="height: 100px">{{ old('description', $product->description ?? '') }}</textarea>
 </div>
 <div class="mb-3">
     <label for="image" class="form-label">Add Image</label>
     <input value="{{ old('image', $product->image ?? '') }}" type="file" name="image" class="form-control"
         id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
 {{-- @foreach ($tags as $tag)
     <div class="form-check">
         <input id="{{ $tag->name }}" type="checkbox" value="{{ $tag->id }}" name="tags[]"
             class="form-check-input">
         <label class="form-check-label" for="{{ $tag->name }}">{{ $tag->name }}</label>
     </div>
 @endforeach --}}
 <div class="mb-3">
     <label for="tags" class="form-label">Tags</label>
     <input value="{{ $tags }}" type="text" name="tags" class="form-control" id="tags"
         placeholder="Tags">
 </div>
