<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_category_id'
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_category_id');
    }
}
