<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{

    public function index() 
    {
        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        return view('index', $data);
    }

    public function menu() 
    {
        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        $data['products'] = Product::orderBy('name', 'ASC')->get();
        return view('menu', $data);
    }

    public function menuDetail($id) 
    {
        $data['merchant'] = $this->merchantModel->getOne(['_id' => $id]);
        if(!$data['merchant']) abort(404);

        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        $data['products'] = Product::where('merchant', $id)
                                        ->orderBy('name', 'ASC')
                                        ->get();
        return view('menu_detail', $data);
    }

    public function cartView()
    {
        $product = Product::with('merchant')->where(['slug' => 'almond-crispy-red-velvet'])->first();
        $carts = (Session::has('cart')) ? Session::get('cart') : [];
        $data['carts'] = (count($carts) > 0) ? array_values($carts) : [];
        return view('user.cart.view', $data);
    }

    public function cartCheckout()
    {
        $product = Product::with('merchant')->where(['slug' => 'almond-crispy-red-velvet'])->first();
        $data['carts'] = [
            [
                'image' => $product->images[0]['url'], 
                'slug' => $product->slug, 
                'title' => $product->name, 
                'price' => $product->price['discount_price'],
                'qty' => 2, 
                'total' => $product->price['discount_price'] * 2, 
                'merchant' => $product->merchant->name
            ]
        ];
        return view('user.cart.checkout', $data);
    }
}
