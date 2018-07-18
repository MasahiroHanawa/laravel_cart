<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryRelations extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'parent_category_id'
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
