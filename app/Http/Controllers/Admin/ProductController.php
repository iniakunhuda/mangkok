<?php

namespace App\Http\Controllers\Admin;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['merchant'] = $this->__getGroupedMerchant();
        $data['products'] = Product::all();
        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $merchant = Merchant::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();
        $data['merchants'] = $merchant;
        $data['categories'] = $categories;

        return view('admin.product.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $merchant = $this->merchantModel->getId($request->merchant);
        $data = [
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => [
                'real_price' => (int) $request->price['real_price'],
                'discount_price' => (int) $request->price['discount_price'],
            ],
            'category' => (array) $request->category,
            'merchant' => $request->merchant,
            'note' => $request->note,
            'is_active' => 1,
            'desc_long' => $request->desc_long,
            'slug' => $merchant->code.'-'. \Str::slug($request->name),
            'images' => [],
            'rating' => 5,
            'reviews' => [],
            'is_best_seller' => 1
        ];
        $this->productModel->save($data);

        alert()->success('Berhasil menambah produk baru', 'Sukses');
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $dt = $this->productModel->getOne(['_id' => $product]);
        if(!$dt) abort(404);
        $merchant = Merchant::orderBy('name', 'ASC')->get();
        $categories = Category::orderBy('name', 'ASC')->get();

        $data['product'] = $dt;
        $data['merchants'] = $merchant;
        $data['categories'] = $categories;
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product)
    {
        $product_data = $this->productModel->getId($product); 
        $merchant = $this->merchantModel->getId($request->merchant);
        $data = [
            '_id' => $product,
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => [
                'real_price' => (int) $request->price['real_price'],
                'discount_price' => (int) $request->price['discount_price'],
            ],
            'category' => (array) $request->category,
            'merchant' => $request->merchant,
            'note' => $request->note,
            'is_active' => 1,
            'desc_long' => $request->desc_long,
            'slug' => $merchant->code.'-'. \Str::slug($request->name)
        ];

        if(!isset($product_data['rating'])) {
            $data['rating'] = 5;
            $data['reviews'] = [];
            $data['is_best_seller'] = 1;
        }

        if(!isset($product_data['images'])) {
            $data['images'] = [];
        }

        $this->productModel->save($data);

        alert()->success('Berhasil memperbarui produk', 'Sukses');
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $product)
    {
        $this->productModel->deleteById($product);
        alert()->success('Berhasil menghapus produk', 'Sukses');
        return redirect()->route('admin.products.index');
    }



    public function photoIndex()
    {

    }


    public function photoEdit($photo)
    {

    }

    public function photoStore()
    {

    }

    public function photoUpdate($photo)
    {
        
    }

    public function photoDestroy($photo)
    {
        
    }
}
