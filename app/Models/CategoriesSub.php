<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriesSub
 *
 * @property $id
 * @property $category_id
 * @property $name
 * @property $quality
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriesSub extends Model
{
    
    static $rules = [
		'category_id' => 'required',
		'name' => 'required',
		'quality' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['category_id','name','quality'];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

}
