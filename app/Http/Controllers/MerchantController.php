<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['merchants'] = $this->merchantModel->orderBy('name', 'ASC')->get();
        return view('user.unitdagang.index', $data);
    }

    public function detail(Request $req, $code)
    {
        $merchant = $this->merchantModel->getOne(['code' => $code]);
        if(!$merchant) abort(404);
        
        $data['products'] = $this->productModel->getAll(['merchant' => $merchant->_id]);
        $data['merchant'] = $merchant;
        return view('user.unitdagang.detail', $data);
    }
}
