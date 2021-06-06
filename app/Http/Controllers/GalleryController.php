<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index() {
        $data['galleries'] = Gallery::all();
        return view('user.gallery.index', $data);
    }

    public function detail(Request $req, $slug) {
        $data['data'] = Gallery::where(['slug' => $slug])->first();
        return view('user.gallery.detail', $data);
    }
}
