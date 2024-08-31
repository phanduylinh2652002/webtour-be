<?php

namespace Modules\Cms\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Cms\App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(){
        $query = Category::all();
        return view('Cms::admin.category.index', compact('query'));
    }
    public function create(){
        return view('Cms::admin.category.create');
    }
    public function store(CategoryRequest $request){
        Category::query()->create($request->validated());

        return redirect()->route('category.index');
    }
    public function edit(Category $category){
        return view('Cms::admin.category.edit', compact('category'));
    }
    public function update(Category $category, CategoryRequest $request){
        $category->update($request->all());
        return redirect()->route('category.index', compact('category'));
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('category.index');
    }
}
