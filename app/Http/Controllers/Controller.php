<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Merchant;
use App\Models\Product;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $productModel, $merchantModel;

    public function __construct()
    {
        $this->productModel = new Product;
        $this->merchantModel = new Merchant;
        $this->categoryModel = new Category;
    }

    public function __getGroupedMerchant()
    {
        $merchants = Merchant::get()->toArray();
        $_merchant = [];
        foreach((array) $merchants as $m) {
            $_merchant[$m['_id']] = $m;
        }

        return $_merchant;
    }
}
