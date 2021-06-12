<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->productModel = new Product;
        $this->merchantModel = new Merchant;
        $this->categoryModel = new Category;
        $this->transModel = new Transaction;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_merchant = \Auth::user()->merchant;
        $data['pesanan'] = $this->transModel->getAll(['merchant._id' => $id_merchant]);
        $data['merchants'] = $this->__getGroupedMerchant();
        return view('user.home', $data);
    }

    public function riwayat_pesanan()
    {
        $id_merchant = \Auth::user()->merchant;
        $data['trans'] = $this->transModel->getAll(['merchant._id' => $id_merchant]);
        return view('user.riwayat_pesanan', $data);
    }

    public function detail_riwayat_pesanan($code)
    {
        $data['pesanan'] = $this->transModel->getOne(['code' => $code]);
        if(!$data['pesanan']) abort(404);

        $data['products'] = $this->__getGroupedProduct();
        $data['merchants'] = $this->__getGroupedMerchant();
        $data['carts'] = [];
        return view('user.detail_riwayat_pesanan', $data);
    }

    public function update_pesanan(Request $req, $code)
    {
        $pesanan = $this->transModel->getOne(['code' => $code]);
        $pesanan['status'] = $req->status;
        $this->transModel->save((array) $pesanan);

        alert()->success('Berhasil memperbarui status transaksi', 'Berhasil!');
        return redirect()->route('home.riwayat_pesanan');
    }
}
