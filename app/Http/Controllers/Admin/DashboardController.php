<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Merchant;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::count();
        $products = Product::count();
        $merchants = Merchant::count();
        // $transactions = Transaction::count();

        return view('admin.dashboard', [
            'products' => $products,
            'categories' => $categories,
            'merchants' => $merchants
            // 'transactions' => $transactions
        ]);
    }
}
