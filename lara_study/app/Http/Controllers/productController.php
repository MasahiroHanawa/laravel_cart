<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\EsProduct\EsProductRepository;
use Illuminate\Http\Request;

class productController extends BaseController
{
    protected $esProductRepository;

    public function __construct(EsProductRepository $esProductRepository)
    {
        $this->esProductRepository = $esProductRepository;
    }
    
    public function get(Request $request)
    {
        $products = $this->esProductRepository
            ->productList($request->all());

        return response()->json([
            'products' => $products
        ]);
    }
}