<?php

namespace Inventory\Http\Controllers;

use Inventory\Category;

use Illuminate\Http\Request;

use Inventory\Repository\SearchRepository;

use Inventory\Http\Requests;

class SearchController extends Controller
{
    protected $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        $this->searchRepository = $searchRepository;
    }

    public function search(Request $request)
    {
        $categories = Category::all();
        $items = $this->searchRepository->search($request);

        return view('item.index', compact('items', 'categories'));
    }
}
