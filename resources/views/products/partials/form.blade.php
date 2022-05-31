 <div class="mb-3">
     <label for="title" class="form-label">Title</label>
     <input value="{{ old('title', $product->title ?? '') }}" type="text" name="title" class="form-control"
         id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
 <div class="form-floating">
     <textarea value="{{ old('description', $product->description ?? '') }}" name="description" class="form-control"
         placeholder="Leave a description here" id="floatingTextarea2" style="height: 100px"></textarea>
     <label for="description">Description</label>
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
 <div class="mb-3">
     <label for="image" class="form-label">Add Image</label>
     <input value="{{ old('image', $product->image ?? '') }}" type="file" name="image" class="form-control"
         id="exampleInputEmail1" aria-describedby="emailHelp">
 </div>
