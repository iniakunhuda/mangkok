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
        if(!$cart || !(isset($cart[$id]))) {
            $merchants = $this->__getGroupedMerchant();

            // 1 invoice = 1 merchant
            if(isset($cart)) {
                $cart_arr = (array) array_values($cart);
                $last_merchant = $cart_arr[0]['merchant']['_id'];
                if($last_merchant != $merchants[$product->merchant]['_id']) {
                    return response()->json([
                        'status' => 404,
                        'message' => 'Selesaikan pesanan untuk merchant ' . $cart_arr[0]['merchant']['name'] . ' di menu Pesanan'
                    ]);
                }
            }


            $cart[$id] = [
                'id' => $id,
                'image' => $product->pict, 
                'title' => $product->name, 
                'price' => $product->price,
                'qty' => $qty, 
                'total' => $product->price * $qty, 
                'merchant' => $merchants[$product->merchant]
            ];
            Session::put('cart', (array) $cart);
            return response()->json([
                'status' => 200,
                'message' => 'Sukses menambah produk ke keranjang!'
            ]);
        }

        if(isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
            $cart[$id]['total'] = $product->price * $cart[$id]['qty'];
            Session::put('cart', $cart);
            return response()->json([
                'status' => 200,
                'message' => 'Sukses menambah produk ke keranjang!'
            ]);
        }

    }

    public function change_qty(Request $req, $id)
    {
        $product = $this->productModel->getOne(['_id' => $id]);
        if(!$product) {
            return response()->json([
                'status' => 404,
                'message' => 'Gagal! Produk tidak ditemukan. Silahkan reload ulang halaman'
            ]);
        }

        $cart = Session::get('cart');
        $qty = $req->qty;

        if(isset($cart[$id])) {
            $cart[$id]['qty'] = $qty;
            $cart[$id]['total'] = $product->price * $cart[$id]['qty'];
            Session::put('cart', $cart);
            return response()->json([
                'status' => 200,
                'message' => 'Sukses merubah total produk di keranjang!'
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Gagal! Produk tidak ditemukan. Tambahkan dulu produknya'
        ]);
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

    public function total_bayar()
    {
        $total = 0;
        $cart = Session::get('cart');
        foreach((array) $cart as $ct) {
            $total += $ct['total'];
        }
        return $total;
    }

    public function destroy()
    {
        Session::forget('cart');
        return response()->json([
            'status' => 200,
            'message' => 'Berhasil mengosongkan keranjang belanja!'
        ]);
    }

    public function riwayat_pesanan(Request $req)
    {
        $data = json_decode($req->data, true);
        $resp = [];
        foreach((array) $data as $dt) {
            $trans = $this->transModel->getOne(['_id' => $dt['_id']]);
            if(!$trans) continue;

            $trans['order_date'] = \Carbon\Carbon::parse($trans['date'])->format('d M Y');
            $resp[] = $trans;
        }

        if(count($resp) > 0)
        {
            usort($resp, function($a, $b){
                return strtotime($a['date']) - strtotime($b['date']);
            });
        }

        return response()->json([
            'status' => 200,
            'data' => $resp,
            'message' => 'Berhasil mengosongkan keranjang belanja!'
        ]);
    }

}
