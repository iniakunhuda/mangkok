<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Product;

class Category extends BaseModel
{
	protected $connection = 'mongodb';
    protected $collection = 'categories';

    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
