<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\SearchProduct;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function __construct(SearchProduct $searchProduct)
    {
        $this->searchProduct = $searchProduct;
    }
    
    public function productList(Request $request)
    {
        $query = $this->searchProduct
            ->productList($request->all());
        $products = $this->searchProduct
            ->searchByQuery($query, null, null, 30, 0, null)->paginate(30);

        return response()->json([
            'products' => $products
        ]);
    }
}