<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function show()
    {
    }

    public function index()
    {
        $products = Product::paginate();
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        $categories = Category::all();
        // $products = Product::all();
        $product = new Product();
        return view('products.create', ['product', $product])->with('categories', $categories);
    }
    public function store(Request $request)
    {
        $request->validate($this->rules());
        // $product = new Product();
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->description = $request->description;
        // $product->image = $request->image;
        // $product->save();
        Product::create($request->all());
        return redirect()->route('products.index')->with('done', 'Product Added');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::where('id', '<>', $id)->get();
        return view('products.edit', compact('product', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->rules());

        // $product =  Product::findOrFail($id);
        // $product->name = $request->name;
        // $product->price = $request->price;
        // $product->description = $request->description;
        // $product->image = $request->image;
        // $product->save();
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('done', 'Product Updated');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('done', 'Product Deleted');
    }
    protected function rules()
    {
        return [
            'name' => ['required', 'max:20', 'unique:products'],
            'price' => ['min:1'],
            'description' => ['required'],
        ];
    }
}
