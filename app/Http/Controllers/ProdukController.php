<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produk;

class ProdukController extends Controller
{
    //

    public function index()
    {
        // $produk = Produk::paginate(10);
        $get = new Produk(); 
        $produk   = $get->semua();
        return view('produk/index',['produk' => $produk]);
    }
}
