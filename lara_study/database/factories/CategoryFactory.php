<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 20, $indexSize = 1),
        'parent_category_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});
