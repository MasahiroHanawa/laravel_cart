<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,100) as $index) {
	        DB::table('categories')->insert([
                'name' => $faker->realText($maxNbChars = 20, $indexSize = 1),
                'parent_category_id' => 20 < $index ? $faker->numberBetween($min = 1, $max = 20) : null,
            ]);
        }
    }
}
