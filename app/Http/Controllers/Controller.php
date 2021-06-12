<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\Transaction;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public $productModel, $merchantModel;

    public function __construct()
    {
        $this->productModel = new Product;
        $this->merchantModel = new Merchant;
        $this->categoryModel = new Category;
        $this->transModel = new Transaction;
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

    public function __getGroupedProduct()
    {
        $products = Product::get()->toArray();
        $_product = [];
        foreach((array) $products as $m) {
            $_product[$m['_id']] = $m;
        }

        return $_product;
    }
}
