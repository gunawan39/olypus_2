<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Agent extends Model
{
    //

    protected $table = "product";

    public function semua()
    {
            $query =  DB::select(DB::raw('select p.* ,od.qty as jumlah
            from product p 
            join order_detail od on od.product_id = p.id 
            where od.id = (select max(id) from order_detail where product_id = p.id)
            order by jumlah desc
            '));

        return $query;
    }
}
