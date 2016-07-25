<?php

namespace Inventory\Http\Controllers;

use Inventory\Item;

use Inventory\Category;

use Illuminate\Http\Request;

use Inventory\Http\Requests;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'items';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('item.create', compact('categories'));
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
            'name' => 'required|unique:items|min:2',
        ]);

        $category = Category::find($request->get('category'));

        if($category){
            Item::create(['name'=> $request->get('name'), 'category_id' => $request->get('category')]);

            return redirect('/items');
        }

        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        $categories = Category::all();
        $item = Item::find($item);

        if($item) {
            return view('item.create', compact('item', 'categories'));
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
    public function update(Request $request, $item)
    {
        $item = Item::find($item);

        if($item) {
            $this->validate($request, [
                'name' => 'required|min:2|unique:items,name,'.$item->id,
            ]);

            $item->name = $request->get('name');
            $item->category_id = $request->get('category');
            $item->save();

            return redirect('/items');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($item)
    {
        $item = Item::find($item);

        if($item) {
            Item::destroy($item->id);
        }

        return redirect('/items');
    }
}
