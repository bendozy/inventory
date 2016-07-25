<?php

namespace Inventory\Repository;

use DB;
use Inventory\Item;
use Illuminate\Http\Request;

class SearchRepository
{

    public function search(Request $request)
    {
        $query = Item::with('category');

        $name = $request->get('name');
        $category = $request->get('category');
        $price = $request->get('price');
        $order = $request->get('order');

        if($name && !empty($name)){
            $query->where('name','like',  '%'.$name .'%');
        }

        if($category && !empty($category)){
            $query->where('category_id','=',  $category);
        }

        if($price && !empty($price)){
            $query->where('price','=',  $price);
        }

        if($order === 'name'){
            $query->orderBy('name');
        } else {
            $query->orderBy('price');
        }

        return $query->paginate(10);
    }

}

