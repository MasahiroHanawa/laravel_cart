<?php

namespace App\Repositories\EsProduct;

interface EsProductInterface
{
    /**
     * make product query for elastic search
     *
     * @var string $name
     * @return object
     */
    public function productList($request);

}