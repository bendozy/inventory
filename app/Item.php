<?php

namespace Inventory;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    Protected $fillable = ['name', 'price', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
