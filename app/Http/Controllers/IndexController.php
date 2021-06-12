<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class IndexController extends Controller
{

    public function index() 
    {
        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        return view('index', $data);
    }

    public function menu() 
    {
        $data['merchants'] = $this->__getGroupedMerchant();
        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        $data['products'] = Product::orderBy('name', 'ASC')->get();
        return view('menu', $data);
    }

    public function pesanan() 
    {
        $carts = (Session::has('cart')) ? Session::get('cart') : [];
        $data['carts'] = (count($carts) > 0) ? array_values($carts) : [];
        $data['merchants'] = $this->__getGroupedMerchant();
        $data['prods'] = $this->__getGroupedProduct();
        return view('pesanan', $data);
    }

    public function menuDetail($id) 
    {
        $data['merchant'] = $this->merchantModel->getOne(['_id' => $id]);
        if(!$data['merchant']) abort(404);

        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        $data['merchants'] = $this->__getGroupedMerchant();
        $data['products'] = Product::where('merchant', $id)
                                        ->orderBy('name', 'ASC')
                                        ->get();
        return view('menu_detail', $data);
    }

    public function riwayat_pesanan()
    {
        $data['categories'] = Category::orderBy('name', 'ASC')->get();
        $data['merchants'] = $this->__getGroupedMerchant();
        $data['carts'] = [];
        return view('riwayat_pesanan', $data);
    }

    public function checkout(Request $req)
    {
        $carts = Session::get('cart');
        $cart_arr = (array) array_values($carts);
        $id_merchant = $cart_arr[0]['merchant']['_id'];
        $dt_merchant = $this->merchantModel->getId($id_merchant);
    
        $buyer = [
            'name' => $req->nama,
            'address' => $req->alamat,
            'telp' => $req->telp
        ];

        $merchant = [
            '_id' => $id_merchant,
            'name' => $dt_merchant['name'],
            'telp' => $dt_merchant['telp']
        ];

        $total = 0;
        $products = [];
        foreach((array) $carts as $c) {
            $total += $c['total'];

            $items = [
                '_id' => $c['id'],
                'name' => $c['title'],
                'pict' => $c['image'],
                'qty' => $c['qty'],
                'price' => $c['price'],
                'subtotal' => $c['total']
            ];
            $products[] = $items;
        }

        $trans = [
            '_id' => (string) new \MongoDB\BSON\ObjectID(),
            'code' => Str::random(10), 
            'buyer' => $buyer, 
            'merchant' => $merchant,
            'products' => $products,
            'total' => $total,
            'status' => 'waiting',
            'note' => $req->note,
            'date' => \Carbon\Carbon::now()->timestamp
        ];

        $this->transModel->Save($trans);

        /**
         * Share pesanan ke pedagang WA
         */
        $text = "
*Informasi Pesanan Baru*
*Mangkok App*

_Biodata Pembeli_ \n
Nama : {$buyer['name']}
Alamat : {$buyer['address']}
Telp : {$buyer['telp']}

_Pesanan_ \n\n";
        foreach((array) $products as $i => $p) {
            $name = (string) $p['name'];
            $subtotal = (string) $p['subtotal'];
            $price = (string) $p['price'];
            $qty = (string) $p['qty'];

        $text .= "{$name} {$price} x {$qty} \t\t\t {$subtotal}\n";
        }

        $text .= "
_Transaksi_ \n
Total Bayar : {$trans['total']}
Metode Pembayaran : Manual
Kode Transaksi {$trans['code']}
        ";

        $sent = $this->sendWhatsappTo($dt_merchant['telp'], $text);

        if($sent) {
            Session::forget('cart');
            return response()->json([
                'status' => 200,
                'data' => $trans,
                'message' => 'Sukses membuat pesanan baru!'
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'data' => [],
                'message' => 'Gagal! Silahkan submit ulang'
            ]);
        }
    }


    public function sendWhatsappTo($number, $text)
    {
        $api_key = "Y39UFE13K2XWV734JHGR";
        $curl = curl_init();
        $url = "https://panel.rapiwha.com/send_message.php?apikey=".$api_key."&number=".$number."&text=".urlencode($text);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return false;
        } else {
            return true;
        }
    }
}
