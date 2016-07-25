<?php

namespace Inventory\Http\Controllers;

use Illuminate\Http\Request;

use Inventory\Repository\SerchRepository;

use Inventory\Http\Requests;

class SearchController extends Controller
{
    protected $searchRepository;

    public function __construct(SearchRepository $searchRepository)
    {
        $this->$searchRepository = $searchRepository;
    }

    public function search(Request $request)
    {

        $items = $this->searchRepository->search($request->all());
    }
}
