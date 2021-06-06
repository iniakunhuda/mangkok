<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add(Request $req, $id)
    {
        $qty = $req->qty;
        if($qty < 0) {
            return response()->json([
                'status' => 500,
                'message' => 'Gagal! Jumlah produk yang dibeli minimal 1!'
            ]);
        } elseif($qty == 0) {
            $this->remove($req, $id);
            return;
        }

        $product = $this->productModel->getOne(['_id' => $id]);
        if(!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Gagal! Produk tidak ditemukan. Silahkan reload ulang halaman'
            ]);
        }

        $cart = Session::get('cart');
        if(!$cart) {
            $merchants = $this->__getGroupedMerchant();
            $cart = [
                    $id => [
                        'id' => $id,
                        'image' => $product->images[0]['url'], 
                        'slug' => $product->slug, 
                        'title' => $product->name, 
                        'price' => $product->price['discount_price'],
                        'qty' => $qty, 
                        'total' => $product->price['discount_price'] * $qty, 
                        'merchant' => $merchants[$product->merchant]['name']
                    ]
            ];
            Session::put('cart', $cart);
            return response()->json([
                'status' => 200,
                'message' => 'Sukses menambah produk ke keranjang!'
            ]);
        }

        if(isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
            $cart[$id]['total'] = $product->price['discount_price'] * $cart[$id]['qty'];
            Session::put('cart', $cart);
            return response()->json([
                'status' => 200,
                'message' => 'Sukses menambah produk ke keranjang!'
            ]);
        }

    }

    public function remove(Request $req, $id)
    {
        $product = $this->productModel->getOne(['_id' => $id]);
        if(!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Gagal! Produk tidak ditemukan. Silahkan reload ulang halaman'
            ]);
        }

        $cart = Session::get('cart');
        if(!isset($cart[$id])) {
            return response()->json([
                'status' => 404,
                'message' => 'Gagal! Produk tidak ada dalam keranjang'
            ]);
        }

        unset($cart[$id]);
        Session::put('cart', $cart);
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil menghapus produk dari keranjang!'
        ]);
    }

    public function count()
    {
        $cart = Session::get('cart');
        return (!is_null($cart)) ? count($cart) : 0;
    }

    public function destroy()
    {
        Session::forget('cart');
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil mengosongkan keranjang belanja!'
        ]);
    }
}
