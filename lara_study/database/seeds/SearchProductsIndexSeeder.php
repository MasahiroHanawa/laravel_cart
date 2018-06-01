<?php

use Illuminate\Database\Seeder;
use App\Models\SearchProduct;

class SearchProductsIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = App\Models\SearchProduct::with('categories')->get();
        var_dump($products);
        $products->addToIndex();
    }
}
