<?php

namespace App\Repositories\Category;

interface CategoryInterface
{
    /**
     * get category data by category model
     *
     * @var string $name
     * @return object
     */
    public function categoryList($request);

}