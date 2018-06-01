<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 20, $indexSize = 1),
        'description' => $faker->realText,
        'price' => $faker->numberBetween($min = 1000, $max = 20000),
        'sale_price' => $faker->numberBetween($min = 1000, $max = 20000),
        'stock' => $faker->numberBetween($min = 1, $max = 100),
        'category_id' => $faker->numberBetween($min = 1, $max = 100),
        'image_1' => $faker->imageUrl($width = 640, $height = 480),
        'image_2' => $faker->imageUrl($width = 640, $height = 480),
        'image_3' => $faker->imageUrl($width = 640, $height = 480),
        'image_4' => $faker->imageUrl($width = 640, $height = 480),
        'image_5' => $faker->imageUrl($width = 640, $height = 480)
    ];
});
