<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request; 
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function show()
    {
    }

    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        $categories = Category::all();
        // $products = Product::all();
        $tags = Tag::all();
        $product = new Product();
        return view(
            'products.create',
            compact('product', 'categories', 'tags')
        );
    }
    public function store(Request $request)
    {
        $request->validate($this->rules());
        $image = $request->file('image');
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image_url = $image->store('products', 'public');
            $data['image'] = $image_url;
        }
        $product = Product::create($data);
        if ($request->tags) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $item) {
                $tag = Tag::where('name', $item)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item,
                        'slug' => Str::slug($item)
                    ]);
                }
                DB::table('product_tag')->insert(
                    [
                        'product_id' => $product->id,
                        'tag_id' => $tag->id
                    ]
                );
            }
        }
        // foreach ($request->tags as $tag) {
        //     DB::table('product_tag')->insert(
        //         [
        //             'product_id' => $product->id,
        //             'tag_id' => $tag
        //         ]
        //     );
        // }

        // Product::create($request->all());
        return redirect()->route('products.index')->with('done', 'Product Added');
    }
    public function edit($id)
    {

        $categories = Category::all();
        $product = Product::findOrFail($id);
        $tags = $product->tags()->pluck('name')->toArray();
        $tags = implode(',', $tags);
        //$products = Product::where('id', '<>', $id)->get();
        return view('products.edit', compact('product', 'categories', 'tags'));
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
        if ($request->tags) {
            $tags = explode(',', $request->tags);
            foreach ($tags as $item) {
                $tag = Tag::where('name', $item)->first();
                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $item,
                        'slug' => Str::slug($item)
                    ]);
                }
                DB::table('product_tag')->insert(
                    [
                        'product_id' => $product->id,
                        'tag_id' => $tag->id
                    ]
                );
            }
        }
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
            'title' => ['required', 'max:200', 'unique:products'],
            'price' => ['min:1'],
            'description' => ['required'],
        ];
    }
}
