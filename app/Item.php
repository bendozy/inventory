<?php

namespace Inventory;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    Protected $fillable = ['name', 'category_id'];
}
