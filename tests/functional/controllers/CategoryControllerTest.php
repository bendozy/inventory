<?php

use Inventory\Item;
use Inventory\User;
use Inventory\Category;
use Inventory\Http\Controllers\CategoryController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_redirects_if_user_is_not_logged_in()
    {
        $this->action('GET', 'CategoryController@index');
        $this->assertResponseStatus(302);
    }

    /** @test */
    public function it_redirecdisplays_index_page()
    {
        $this->withoutMiddleware();
        $this->action('GET', 'CategoryController@index');
        $this->assertResponseOk();
        $this->assertViewHas('categories');
    }

    /** @test */
    public function it_displays_create_category_form()
    {
        $user = new User(array('name' => 'John'));
        $this->be($user);

        $this->action('GET', 'CategoryController@create');

        $this->assertResponseOk();
    }

    /** @test */
    public function it_creates_a_new_category_and_redirects()
    {
        $categoryAttributes = ['name' => 'Shoes'];

        $this->withoutMiddleware();

        $this->action('POST', 'CategoryController@store', $categoryAttributes);

        $this->assertResponseStatus(302);
        // // Get the new user ID
        $category = Category::latest()->first();

        $this->assertRedirectedToAction('CategoryController@index');
    }

    /** @test */
    public function it_fails_to_create_category_if_name_is_blank()
    {
        $this->withoutMiddleware();

        $this->action('POST', 'CategoryController@store');
    }

}
