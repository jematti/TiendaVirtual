<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create');
        $this->middleware('can:admin.categories.edit')->only('edit','update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }


    public function index()
    {
        $data['category']= Category::orderBy('id','asc')->where('habilitado',1)->paginate(10);
        return view('category.index',$data);
    }


    public function create()
    {
        return view('category.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_categoria' => 'required|unique:categories|max:255'
        ]);


        Category::create($request->all());

        session()->flash('message', 'Post successfully updated.');

        // return redirect()->route('category.index')
        //                 ->with('store','ok');

        return redirect()->route('category.index');


    }


    public function show(Category $category)
    {
        return view('category.show',compact('category'));
    }


    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nombre_categoria' => 'required'
        ]);

        $category->update($request->all());

        return redirect()->route('category.index')->with('update','ok');
    }


    public function destroy(Category $category)
    {
        $category->habilitado='0';
        $category->save();

        return redirect()->route('category.index')
                         ->with('eliminar','ok');
    }

}
