<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Transaction extends BaseModel
{
	protected $connection = 'mongodb';
    protected $collection = 'transactions';

    protected $guarded = [];
}
