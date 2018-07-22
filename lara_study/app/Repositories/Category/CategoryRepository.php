<?php
namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepository implements CategoryInterface
{
    protected $esProduct;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function categoryList($request)
    {

        $categories = $this->category->whereNull('parent_category_id')->with('children')->get();

        return $categories;
    }


}