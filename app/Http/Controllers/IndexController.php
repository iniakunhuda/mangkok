<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{

    // $data = [
    //     'name' => 'Superadmin',
    //     'telp' => '08111',
    //     'otp' => '12345',
    //     'password' => Hash::make('admin123456'),
    //     'otp_inactive' => null,
    //     'role' => 'superadmin',
    //     'last_login' => new \MongoDB\BSON\UTCDateTime(new \DateTime())
    // ];

    // $admin = new Admin;
    // $admin->save($data);

    public function index() 
    {
        $data['merchants'] = Merchant::limit(5)->get();
        return view('index', $data);
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

    public function tentangKami() 
    {
        return view('about');
    }

    public function kontak() 
    {
        return view('contact');
    }
}
