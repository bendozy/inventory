<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Inventory\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Inventory\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
    ];
});

$factory->define(Inventory\Item::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'category_id' => factory(Inventory\Category::class)->create()->id,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10000)
    ];
});
