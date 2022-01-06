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
                <div class="card-header"><h2> Data List Order</h2> 

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <form action="list_order" method="GET">
                    Cari Data  : <input type="date" name="awal" value="{{ $awal }}"> S/d
                        <input type="date" name="akhir" value="{{ $akhir }}">
                        <input type="submit" name="" class="btn btn-primary" value="Cari">
                        <a href="{{ url('/list_order') }}"  class="btn btn-warning">  Reset</a>
                    </form>
                    

                    Total Data : {{ $list->total() }} <br/>
                    <table class='table table-bordered'>
                        <tr>
                            <th align="center" >No</th>
                            <th>Tanggal order</th>
                            <th>nama</th>
                            <th>address</th>
                            <th>total</th>
                            <th>Status Order</th>
                            <th>Opsi</th>
                        </tr>
                        @php $i=1 @endphp
                        @foreach($list as $p)

                        @if ( $i <= 10)
                        <tr>
                            <td align=center>{{ $i++ }}</td>
                            <td>{{ $p->order_time }}</td>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->address }}</td>
                            <td>{{ $p->payment_total }}</td>
                            <!-- @if ( $i <= 10)
                            <td>{{ $p->status }}</td>
                            @endif -->
                            @if ($p->status === 1)
                            <td>new orde</td>
                            @elseif ($p->status == 2)
                            <td>payment succes</td>
                            @elseif ($p->status == 3)
                            <td>order process</td>
                            @elseif ($p->status == 4)
                            <td>order completed</td>
                            @elseif ($p->status == 5)
                            <td>order cancel</td>
                            @elseif ($p->status == 6)
                            <td>order completed</td>
                            @elseif ($p->status == 7)
                            <td>payment failed</td>
                            @endif 
                            
                            <td>
                            <a href="list_order/detail/{{ $p->id }}"  class="btn btn-success">  Detail</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                    <br/>
                    Page : {{ $list->currentPage() }} <br/>
                    {{ $list->links() }}
                  
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
