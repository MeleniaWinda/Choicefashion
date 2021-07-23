<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @property $id
 * @property $name
 * @property $_type
 * @property $quality
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Category extends Model
{
    
    static $rules = [
		'name' => 'required',
		'_type' => 'required',
		'quality' => 'required',
    'question' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','_type','quality','question'];

    public function categoriesSubs()
    {
        return $this->hasMany('App\Models\CategoriesSub', 'category_id', 'id');
    }

}
