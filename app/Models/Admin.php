<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use App\Models\BaseModel;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
	protected $connection = 'mongodb';
    protected $collection = 'admins';
    protected $primaryKey = '_id';

    protected $guarded = [];
}
