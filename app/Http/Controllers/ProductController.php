<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $req)
    {
        $product = Product::orderBy('rating', 'DESC')->orderBy('updated_at', 'DESC');
        if(isset($req->category) && ($req->category != "")) {
            $cat = $req->category;
            $cat_detail = Category::where('name', $cat);
            $product = $product->where('category', $cat_detail->_id);
        }

        if(isset($req->name) && ($req->name != "")) {
            $product = $product->orWhere('name', 'like', '%'.$req->name.'%');
        }

        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        $data['products'] = $product->paginate(12);
        
        $merchants = $this->__getGroupedMerchant();
        $data['merchants'] = $merchants;
        return view('user.produk.index', $data);
    }

    public function detail(Request $req, $slug) 
    {
        $product = $this->productModel->getOne(['slug' => $slug]);
        if(!$product) abort(404);

        $merchant = $this->merchantModel->getOne(['_id' => $product->merchant ]);
        if(!$merchant) abort(404);

        $data['product'] = $product;
        $data['merchant'] = $merchant;
        return view('user.produk.detail', $data);
    }
}
