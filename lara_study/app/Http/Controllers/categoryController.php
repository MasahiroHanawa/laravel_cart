<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class categoryController extends BaseController
{
    protected $esProductRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    
    public function get(Request $request)
    {
        $categories = $this->categoryRepository
            ->categoryList($request->all());

        return response()->json([
            'categories' => $categories
        ]);
    }
}