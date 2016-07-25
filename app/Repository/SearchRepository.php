<?php


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
        return Item::where($criteria, 'like', '%' . $constraint . '%');
    }

    public function searchByNameAndCategory($name, $category)
    {
        return Item::where('name', 'like', '%' . $name . '%')->where('category', 'like', '%' . $category . '%');
    }

    public function order($collection, $criteria)
    {
        return $collection->sortBy($criteria);
    }

}