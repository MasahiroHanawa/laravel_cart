<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Elasticquent\ElasticquentTrait;

class EsProduct extends Model
{
    use ElasticquentTrait;

    protected $table = 'products';

    public function getIndexName()
    {
        return \Config::get('elasticquent.default_index');
    }

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
            'char_filter' => [
                'normalize' => [
                    'type' => 'icu_normalizer',
                    'name' => 'nfkc',
                    'mode' => 'compose'
                ],
                'whitespaces' => [
                    'type' => 'pattern_replace',
                    'pattern' => '\\s[2,]',
                    'replacement' => '\u0020'
                ]
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
                ],
                'engram' => [
                    'type' => 'edge_ngram',
                    'min_gram' => 3,
                    'max_gram' => 10
                ]
            ],
            'analyzer' => [
                'autocomplete_index_analyzer' => [
                    'type' => 'custom',
                    'char_filter' => [
                        'normalize',
                        'whitespaces',
                    ],
                    'tokenizer' => 'keyword',
                    'filter' => [
                        'lowercase',
                        'trim',
                        'engram',
                    ]
                ],
                'autocomplete_search_analyzer' => [
                    'type' => 'custom',
                    'char_filter' => [
                        'normalize',
                        'whitespaces',
                    ],
                    'tokenizer' => 'keyword',
                    'filter' => [
                        'lowercase',
                        'trim',
                    ]
                ]
            ],
            'tokenizer' => [
                'engram' => [
                    'type' => 'edge_ngram',
                    'min_gram' => 3,
                    'max_gram' => 10,
                ]
            ]
        ]
    ];

    protected $mappingProperties = [
        'name' => [
            'type' => 'text',
            'analyzer' => 'autocomplete_index_analyzer',
            'fields' => [
                'autocomplete' => [
                    'type' => 'text',
                    'search_analyzer' => 'autocomplete_search_analyzer',
                    'analyzer' => 'autocomplete_index_analyzer'
                ]
            ]
        ],
        'description' => [
            'type' => 'text',
            'analyzer' => 'autocomplete_index_analyzer',
            'fields' => [
                'autocomplete' => [
                    'type' => 'text',
                    'search_analyzer' => 'autocomplete_search_analyzer',
                    'analyzer' => 'autocomplete_index_analyzer'
                ]
            ]
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
            'analyzer' => 'default'
        ],
        'image_2' => [
            'type' => 'text',
            'analyzer' => 'default'
        ],
        'image_3' => [
            'type' => 'text',
            'analyzer' => 'default'
        ],
        'image_4' => [
            'type' => 'text',
            'analyzer' => 'default'
        ],
        'image_5' => [
            'type' => 'text',
            'analyzer' => 'default'
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
                    'analyzer' => 'autocomplete_index_analyzer',
                    'fields' => [
                        'autocomplete' => [
                            'type' => 'text',
                            'search_analyzer' => 'autocomplete_search_analyzer',
                            'analyzer' => 'autocomplete_index_analyzer'
                        ]
                    ]
                ],
                'parent_category_id' => [
                    'type' => 'integer'
                ]
            ]
        ]
    ];

    public function categories()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

}
