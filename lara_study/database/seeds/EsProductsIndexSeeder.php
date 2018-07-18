<?php

use Illuminate\Database\Seeder;
use App\Models\EsProduct;

class EsProductsIndexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = App\Models\EsProduct::with('categories')->get();
        $products->addToIndex();
    }
}
