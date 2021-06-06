<?php

namespace App\Models;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Jenssegers\Mongodb\Eloquent\Model;
use \MongoDB\Operation\FindOneAndUpdate;

class BaseModel extends Model
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

    public function gen($filter)
    {
        return $this->_collection->findOneAndUpdate(
            $filter,
            ['$inc' => ['seq' => 1]],
            [
                'upsert' => true,
                'returnDocument' => \MongoDB\Operation\FindOneAndUpdate::RETURN_DOCUMENT_AFTER
            ]
        );
    }

    public function getOne($filter = [], $select = null, $sort = null)
    {
        $opts = [];
        if($select) $opts['projection'] = $select;
        if($sort) $opts['sort'] = $sort;
        return $this->_collection->findOne($filter, $opts);
    }

    public function getId($id, $select = null){
        return ($select) ? $this->_collection->findOne(['_id' => $id], ['projection' => $select]) : $this->_collection->findOne(['_id' => $id]);
    }

    public function getAll($filter = [], $select = null, $sort = null, $limit = null, $offset = 0)
    {
        $opts = [];
        if($select) $opts['projection'] = $select;
        if($sort) $opts['sort'] = $sort;
        if($limit) {
            $opts['limit'] = intval($limit);
            $opts['skip'] = intval($offset);
        }

        return $this->_collection->find($filter, $opts)->toArray();
    }

    public function count($filter = null){
        return $this->_collection->count($filter);
    }

    public function deleteById($id)
    {
        if(is_array($id)) {
            $this->_collection->deleteMany(['_id' => ['$in' => $id]]);
        } else {
            $this->_collection->deleteOne(['_id' => $id]);
        }
    }

    public function distinct($key, $filter = [], $select = null, $sort = null)
    {
        $opts = [];
        if($select) $opts['projection'] = $select;
        if($sort) $opts['sort'] = $sort;
        
        return $this->_collection->distinct($key, $filter);
    }

    public function aggregate($param)
    {
        return $this->_collection->aggregate($param)->toArray();
    }

    protected function filterSearchinArray($res, $searchCols, $search)
    {
      $arrayBaru = array();

      $result = array_filter($res, function($arr) use ($searchCols, $search){
        
        foreach($searchCols as $cols )
        {                
            if(array_key_exists($cols, $arr))
            {
                if(!(stripos($arr[$cols], $search ) === false) ) return true;                            
            }else{
                return false;                            
            }            
        }
        return false;

      });

      foreach($result as $r)
      {
        $arrayBaru[] = $r;
      }

      return $arrayBaru;
    }

    
}