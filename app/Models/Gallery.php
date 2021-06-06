<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Gallery extends BaseModel
{
	protected $connection = 'mongodb';
    protected $collection = 'galleries';

    protected $guarded = [];
}
