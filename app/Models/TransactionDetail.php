<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class TransactionDetail extends BaseModel
{
	protected $connection = 'mongodb';
    protected $collection = 'transaction_details';

    protected $guarded = [];
}
