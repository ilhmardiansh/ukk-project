<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];


    public function product()
    {
        return $this->hasMany(Product::class, 'categories_id', 'id');
    }
}
