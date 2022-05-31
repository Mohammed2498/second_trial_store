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
        $categories = Category::paginate(2);
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
        $image = $request->file('image');
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image_url = $image->store('categories', 'public');
            $data['image'] = $image_url;
        }

        // $category = new Cate gory();
        // $category->name = $request->name;
        // $category->description = $request->description;
        // $category->slug = Str::slug($request->name);
        // $category->parent_id = $request->parent_id;
        // $category->save();

        Category::create($data);

        // Category::create($request->all());
        return redirect()->route('categories.index')->with('done', 'Category Added');
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::where('id', '<>', $id)->get();
        return view('categories.edit', compact('category', 'categories'));
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
