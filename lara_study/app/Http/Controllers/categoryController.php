<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Repositories\Category\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends BaseController
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

        return $this->responseApiOk([
            'categories' => $categories
        ]);
    }
}