<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\Category;

class Product extends BaseModel
{
	protected $connection = 'mongodb';
    protected $collection = 'products';
    protected $guarded = [];
    // protected $fillable = ['name', 'desc', 'price', 'images', 'category_id', 'merchant_id', 'note'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
