<?php

namespace App\Models;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\Models\BaseModel;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class BaseModelAuth extends Authenticatable
{
    protected $_collection;
    protected $collection;

    public function __construct()
    {
        $this->_collection = DB::getCollection($this->collection);
    }

    public function save(array $attributes = [], array $options = []) //can use to update
    {
        if(isset($attributes['created_at']))unset($attributes['created_at']);
        
    	if(!isset($attributes['_id'])) {
            $attributes['_id'] = (string) new \MongoDB\BSON\ObjectId();
            $attributes['created_at'] = new \MongoDB\BSON\UTCDateTime(new \DateTime());
        }

        $attributes['updated_at'] = new \MongoDB\BSON\UTCDateTime(new \DateTime());
        return $this->_collection->findOneAndUpdate(['_id' => $attributes['_id']],['$set' => $attributes],['upsert'=>true,'returnDocument' => \MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER])['_id'];
    }

    public function getId($id, $select = null){
        return ($select) ? $this->_collection->findOne(['_id' => $id], ['projection' => $select]) : $this->_collection->findOne(['_id' => $id]);
    }

}