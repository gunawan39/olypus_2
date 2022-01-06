<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\List_order;
use App\List_order_detail;

class List_orderController extends Controller
{
    //
    public function index(Request $request)
    {
        

        $awal = $request->awal. " 00:00:00";
        $akhir = $request->akhir." 23:59:59";

        if(!empty($request->awal) && !empty($request->akhir)){
            $list =List_order::whereBetween('order_time', [$awal, $akhir])->paginate(10);
        }else{
            $list = List_order::paginate(10);
        }
        return view('list_order/index',['list' => $list]);
    }

    public function detail($id)
    {

        $detail = DB::table('order_detail')
            ->leftJoin('product', 'product.id', '=', 'order_detail.product_id')
            ->select('order_detail.*', 'product.product_name', 'product.type')
            ->where('order_detail.order_id', '=', $id)
            ->get();
    
        $order = List_order::where('id',$id)->get();
        return view('list_order/detail',['order' => $order,'detail' => $detail]);
    
    }
}
