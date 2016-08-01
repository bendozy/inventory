<?php

use Inventory\Item;
use Inventory\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_catecory_has_a_name()
    {
        $team = new Category(['name' => 'Fashion']);
        $this->assertEquals('Fashion', $team->name);
    }

    /** @test */
    public function a_category_can_add_items()
    {
        $category = factory(Category::class)->create();
        $item = factory(Item::class)->create();
        $itemTwo = factory(Item::class)->create();
        $category->items()->save($item);
        $category->items()->save($itemTwo);
        $this->assertEquals(2, $category->items()->count());
    }

    /** @test */
    public function a_team_can_add_multiple_members_at_once()
    {
        $category = factory(Category::class)->create();
        $items = factory(Item::class, 2)->create();
        $category->items()->saveMany($items);
        $this->assertEquals(2, $category->items()->count());
    }
    /** @test */
    public function a_category_can_remove_all_items_at_once()
    {
        $category = factory(Category::class)->create();
        $items = factory(Item::class, 10)->create();
        $category->items()->saveMany($items);
        $this->assertEquals(10, $category->items()->count());
        $category->items()->delete();
        $this->assertEquals(0, $category->items()->count());
    }
}
