<?php

namespace Inventory\Http\Controllers;

use Session;
use Inventory\Category;
use Illuminate\Http\Request;
use Inventory\Http\Requests;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @return string
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::paginate(10);

        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories|min:2',
        ]);

        Category::create($request->all());
        Session::flash('success', 'The Category has been created succesfully.');

        return redirect('/categories');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category = Category::find($category);

        if($category) {
            return view('category.create', compact('category'));
        }

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $category = Category::find($category);

        if($category) {
            $this->validate($request, [
                'name' => 'required|min:2|unique:categories,name,'.$category->id,
            ]);

            $category->name = $request->get('name');
            $category->save();
        } else{
           return back()->withInput($reques->input())
                        ->withErrors('name', 'Invalid Category');
        }

        Session::flash('success', 'The Category has been updated succesfully.');
        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category) {
            Category::destroy($category->id);
        }

        Session::flash('success', 'The Category has been deleted succesfully.');
        return redirect('/categories');
    }
}
