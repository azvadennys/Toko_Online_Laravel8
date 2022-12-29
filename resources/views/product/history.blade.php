@extends('layouts.app')

@section('content')
<div class="container">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-8">
            @if($transaction->first() == NULL)
            <div class="alert alert-warning my-1 alert-dismissible fade show" role="alert">
                Tidak Ada Riwayat Belanja
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @foreach ($transaction as $index)
            @php
            $total = 0;
            $qty = 0;
            @endphp
            <div class="card mb-3">
                <div class="row g-0">
                    <table class="table table-hover">
                        <thead>
                            <tr class="table-primary">
                                <th colspan="4" scope="col">Transaction Date {{ $index->created_at }}</th>
                            </tr>
                            <tr>
                                <th class="col-8" scope="col-8">Name</th>
                                <th class="col-2" scope="col-2">Quantity</th>
                                <th class="col-2" scope="col-2">Sub price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($index->transactiondetail as $index)
                            <tr>
                                <td>{{ $index->productdetail->name }}</td>
                                <td>{{ $index->quantity }}</td>
                                <td>IDR {{number_format($index->price*$index->quantity,0,',','.');}}</td>
                            </tr>
                            @php
                            $qty += $index->quantity;
                            $total += $index->price*$index->quantity;
                            @endphp
                            @endforeach
                            <tr>
                                <th>TOTAL</th>
                                <th>{{$qty}} Item(s)</th>
                                <th>IDR {{number_format($total,0,',','.');}}</th>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection