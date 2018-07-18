<?php
namespace App\Repositories\EsProduct;

use App\Models\EsProduct;
use Illuminate\Support\Facades\Config;

class EsProductRepository implements EsProductInterface
{
    protected $esProduct;

    public function __construct(EsProduct $esProduct)
    {
        $this->esProduct = $esProduct;
    }

    public function productList($request)
    {

        $esQuery = [
            'index' => Config::get('elasticquent.default_index'),
            'size' => 30,
            'from' => 0,
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [],
                    ],
                ],
            ],
        ];

        if (!empty($request['keyword']))
        {
            $esQuery['body']['query']['bool']['must'][] = [
                'multi_match' => [
                    'query' => $request['keyword'],
                    'fields' => ["name", "description"]
                ]
            ];
            $esQuery['body']['min_score'] = 3;
        }

        $products = $this->esProduct->complexSearch($esQuery)->paginate(30);

        return $products;
    }


}