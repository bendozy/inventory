<?php

namespace Inventory;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function items()
    {
        $this->hasMany(Item::class);
    }
}
