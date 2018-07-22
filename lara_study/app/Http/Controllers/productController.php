<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Repositories\EsProduct\EsProductRepository;
use Illuminate\Http\Request;

class ProductController extends BaseController
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

        return $this->responseApiOk([
            'products' => $products
        ]);
    }
}