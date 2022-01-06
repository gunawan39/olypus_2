<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;

class AgentController extends Controller
{
    //
    public function index()
    {
        $get = new Agent(); 
        $produk   = $get->semua();
        return view('agent/index',['produk' => $produk]);
    }
}
