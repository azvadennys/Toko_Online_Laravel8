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
            @if($cart->first() == NULL)
            <div class="alert alert-warning my-1 alert-dismissible fade show" role="alert">
                Tidak Ada Barang dalam keranjang
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @foreach ($cart as $index)
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('storage/images')}}/{{ $index->productdetail->photo }}"
                            class="img-fluid rounded-start" style="max-height: 200px;" alt="...">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h5 class="card-title">{{ $index->productdetail->name }}</h5>

                            <div class="row mb-0">
                                <label for="inputEmail3" class="col-sm-3 ">Quantity</label>

                                <div class="col-sm-9">
                                    <p style="white-space: pre-line;">{{ $index->quantity }}</p>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <label for="inputEmail3" class="col-sm-3 ">Price</label>

                                <div class="col-sm-9">
                                    <p>IDR {{ number_format($index->productdetail->price,0,',','.'); }} </p>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <label for="inputEmail3" class="col-sm-3 ">Total Price</label>

                                <div class="col-sm-9 ">
                                    <p style="white-space: pre-line;">IDR {{number_format($index->quantity *
                                        $index->productdetail->price,0,',','.'); }}</p>
                                </div>
                            </div>
                            @php
                            $total += ($index->quantity * $index->productdetail->price);
                            @endphp
                        </div>
                    </div>
                    <div class="col-md-1 my-4">
                        <a href="/delete-cart/{{ $index->id }}"><button class="btn btn-danger"><i
                                    class="bi bi-trash"></i></button></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <h3>Total Price : {{ $total }}</h3>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
</div>
@endsection