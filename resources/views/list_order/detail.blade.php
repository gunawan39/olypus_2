@extends('layouts.app')
@section('content')
@include('sweetalert::alert')
<?php
// $awal
$awal = isset($_GET['awal'])?$_GET['awal']:'';
$akhir = isset($_GET['akhir'])?$_GET['akhir']:'';
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2> Detail List Order</h2> 

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>


                    @foreach($order as $o)
                    <div class="form-group">
                            <label for="pekerjaan">Tanggal Order</label>
                            <input class="form-control" value="{{ $o->order_time }}" disabled>
                    </div>
                    <div class="form-group">
                            <label for="pekerjaan">Nama</label>
                            <input class="form-control" value="{{ $o->name }}" disabled>
                    </div>
                    <div class="form-group">
                            <label for="pekerjaan">Address</label>
                            <input class="form-control" value="{{ $o->address }}" disabled>
                    </div>
                    <div class="form-group">
                            <label for="pekerjaan">Payment</label>
                            <input class="form-control" value="{{ $o->payment_method }}" disabled>
                    </div>
                    @endforeach

                    <table class='table table-bordered'>
                        <tr>
                            <th align="center" >No</th>
                            <th>Product</th>
                            <th>type</th>
                            <th>harga</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                        </tr>
                        @php $i=1 @endphp
                        @foreach($detail as $p)
                        <tr>
                            <td align=center>{{ $i++ }}</td>
                            <td>{{ $p->product_name }}</td>
                            <td>{{ $p->type }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->qty }}</td>
                            <td>{{ $p->total_price }}</td>
                        </tr>
                        @endforeach


                        @foreach($order as $d)
                        <tr>
                            <td colspan="5" align=center> <b>Total</b> </td>
                            <td> {{ $d->payment_total }}</td>
                        </tr>

                        @endforeach
                    </table>
                    <br/>
                  
                    <a href="{{ url('/list_order') }}"  class="btn btn-success">  Kembali</a>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
