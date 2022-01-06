<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    //
    public function semua()
    {
        $query =  DB::select(DB::raw('select c.*,u.first_name,u.last_name,u.account_role ,count(o.id) as jumlah
        from customer c
        join users u on u.id = c.id 
        join orders o on o.customer_id = c.id 
        where o.id = (select max(id) from orders where customer_id = c.id)
        order by jumlah desc
        '));

        return $query;
    }
}
