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
                <div class="card-header"><h2> Data Customer</h2> 

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class='table table-bordered'>
                        <tr>
                            <th align="center" >No</th>
                            <th>Customer</th>
                            <th>Role</th>
                            <th>Jumlah</th>
                        </tr>
                        @php $i=1 @endphp
                        @foreach($customer as $p)

                        @if ( $i <= 10)
                        <tr>
                            <td align=center>{{ $i++ }}</td>
                            <td>{{ $p->first_name }} {{ $p->last_name }}</td>
                            <td>{{ $p->account_role }}</td>
                            <td>{{ $p->jumlah }}</td>
                            <td>
                        </tr>
                        @endif
                        @endforeach
                    </table>
                    <br/>
                  
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
