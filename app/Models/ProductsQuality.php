<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class ProductsQuality
 *
 * @property $id
 * @property $product_id
 * @property $categories_sub_id
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductsQuality extends Model
{
    
    static $rules = [
		'product_id' => 'required',
		'categories_sub_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id','categories_sub_id'];

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function categoriesSubs()
    {
        return $this->belongsTo('App\Models\CategoriesSub', 'categories_sub_id', 'id');
    }

}
