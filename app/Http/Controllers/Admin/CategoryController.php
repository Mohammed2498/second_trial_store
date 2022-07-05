<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Rules\CheckNameRule;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::all()->paginate(5);;
        $categories = Category::with('parent')->paginate(5);

        return view('categories.index')->with('categories', $categories);
    }
    // public function index1(){
    //     $categories=DB::table('categories')->where('name','Category 1');
    //     return view('categories.index')->with('categories',$categories->name);
    // }
    public function create()
    {
        $categories = Category::all();
        $category = new Category();
        return view(
            'categories.create',
            [
                'categories' => $categories,
                'category' => $category
            ]
        );
    }
    public function store(Request $request)
    {
        $request->validate($this->rules());
        //add file
        $request['slug'] = Str::slug($request->name);
        // $category = new Cate gory();
        // $category->name = $request->name;
        // $category->description = $request->description;
        // $category->slug = Str::slug($request->name);
        // $category->parent_id = $request->parent_id;
        // $category->save();
        Category::create($request->all());
        // Category::create($request->all());
        return redirect()->route('categories.index')->with('done', 'Category Added');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '<>', $id)->get();
        return view('categories.edit', compact('category', 'categories'));
    }
    public function show($id)
    {
        $category = Category::with('parent', 'children')->findOrFail($id);
        $products = $category->products;
        return view('categories.show', compact('category', 'products'));
    }
    public function update(Request $request, $id)
    {
        $request->validate($this->rules());
        // $category = Category::findOrFail($id);
        // $category->name = $request->name;
        // $category->description = $request->description;
        // $category->slug = Str::slug($request->name);
        // $category->parent_id = $request->parent_id;
        // $category->save();
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('categories.index')->with('done', 'Category Updated');
    }
    public function trashedCategories()
    {
        $categories = Category::onlyTrashed()->get();
        return view(
            'categories.trashed-categories',
            ['categories' => $categories]
        );
    }
    public function forceDeleteCategory($id)
    {
        $category = Category::find($id);
        $category->forceDelete();
        return redirect()->route('categories.trashed-categories')
            ->with('done', 'Category Deleted');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categories.index')->with('done', 'Category Deleted');
    }
    protected function rules()
    {
        return [
            'name' => ['required', 'max:20', new CheckNameRule],
            'description' => ['required'],
        ];
    }
}
