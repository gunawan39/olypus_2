<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Customer;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $get = new Customer(); 
        $customer   = $get->semua();
        return view('customer/index',['customer' => $customer]);
    }
}
