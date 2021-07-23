<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $file_dir
 * @property $file
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    static $rules = [
		'name' => 'required',
		// 'file_dir' => 'required',
		'file' => 'required',
		'desc' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','file_dir','file','file2','file3','desc'];

    public function productsQualities()
    {
        return $this->hasMany('App\Models\productsQuality', 'product_id', 'id');
    }

}
