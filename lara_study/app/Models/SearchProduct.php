<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class SearchProduct extends Model
{
    use ElasticquentTrait;

    protected $table = 'products';
    /**
     * The elasticsearch settings.
     *
     * @var array
     */
    protected $indexSettings = [
        'analysis' => [
            'char_filter' => [
                'replace' => [
                    'type' => 'mapping',
                    'mappings' => [
                        '&=> and '
                    ],
                ],
            ],
            'filter' => [
                'word_delimiter' => [
                    'type' => 'word_delimiter',
                    'split_on_numerics' => false,
                    'split_on_case_change' => true,
                    'generate_word_parts' => true,
                    'generate_number_parts' => true,
                    'catenate_all' => true,
                    'preserve_original' => true,
                    'catenate_numbers' => true,
                ]
            ],
            'analyzer' => [
                'default' => [
                    'type' => 'custom',
                    'char_filter' => [
                        'html_strip',
                        'replace',
                    ],
                    'tokenizer' => 'whitespace',
                    'filter' => [
                        'lowercase',
                        'word_delimiter',
                    ],
                ],
            ],
        ],
    ];

    protected $mappingProperties = [
        'lara_cart' => [
            'properties' => [
                'name' => [
                    'type' => 'text',
                    'analyzer' => 'keyword'
                ],
                'description' => [
                    'type' => 'text',
                    'analyzer' => 'keyword'
                ],
                'category_id' => [
                    'type' => 'integer'
                ],
                'stock' => [
                    'type' => 'integer'
                ],
                'price' => [
                    'type' => 'integer'
                ],
                'sale_price' => [
                    'type' => 'integer'
                ],
                'sale_start_at' => [
                    'type' => 'date',
                    'format' => 'yyyy-MM-dd HH:mm:ss'
                ],
                'sale_end_at' => [
                    'type' => 'date',
                    'format' => 'yyyy-MM-dd HH:mm:ss'
                ],
                'image_1' => [
                    'type' => 'text',
                    'analyzer' => 'standard'
                ],
                'image_2' => [
                    'type' => 'text',
                    'analyzer' => 'standard'
                ],
                'image_3' => [
                    'type' => 'text',
                    'analyzer' => 'standard'
                ],
                'image_4' => [
                    'type' => 'text',
                    'analyzer' => 'standard'
                ],
                'image_5' => [
                    'type' => 'text',
                    'analyzer' => 'standard'
                ],
                'created_at' => [
                    'type' => 'date',
                    'format' => 'yyyy-MM-dd HH:mm:ss'
                ],
                'updated_at' => [
                    'type' => 'date',
                    'format' => 'yyyy-MM-dd HH:mm:ss'
                ],
                'categories' => [
                    'type' => 'nested',
                    'properties' => [
                        'name' => [
                            'type' => 'text',
                            'analyzer' => 'keyword'
                        ],
                        'parent_category_id' => [
                            'type' => 'integer'
                        ]
                    ]
                ]
            ]
        ]
    ];

    public function categories()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function productList($request)
    {
        $esQuery = [];

        return $esQuery;
    }
}
