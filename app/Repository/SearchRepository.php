<?php

namespace Inventory\Repository;

class SerchRepository
{
    public function filterBy($criteria, $constraint)
    {
        $collection = Item::all();
        $filtered = $collection->filter(function ($item) use($criteria, $constraint) {
            return $item->$criteria <= $constraint;
        });

        return $filtered;
    }


    public function search($criteria, $constraint)
    {
        return Item::where($criteria, 'like', '%' . $constraint . '%')->paginate(10);
    }

    public function searchByNameAndCategory($name, $category)
    {
        return Item::where('name', 'like', '%' . $name . '%')->where('category', 'like', '%' . $category . '%')->pagination(10);
    }

    public function order($collection, $criteria)
    {
        return $collection->sortBy($criteria);
    }

}

