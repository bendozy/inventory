<?php

use Inventory\Item;
use Inventory\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class ItemTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function an_item_has_a_name_and_price()
    {
        $item = new Item(['name' => 'Pen','price' => 20, 'category_id' => 1]);
        $this->assertEquals('Pen', $item->name);
        $this->assertEquals(20, $item->price);
    }

    /** @test */
    public function an_item_belongs_to_a_category()
    {
        $item = factory(Item::class)->create();
        $category = $item->category;
        $this->assertNotEmpty($category->name);
    }
}
