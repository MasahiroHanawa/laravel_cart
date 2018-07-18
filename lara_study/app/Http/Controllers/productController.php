<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Repositories\EsProduct\EsProductRepository;
use Illuminate\Http\Request;

class productController extends Controller
{
    protected $esProductRepository;

    public function __construct(EsProductRepository $esProductRepository)
    {
        $this->esProductRepository = $esProductRepository;
    }
    
    public function productList(Request $request)
    {
        $products = $this->esProductRepository
            ->productList($request->all());

        return response()->json([
            'products' => $products
        ]);
    }
}