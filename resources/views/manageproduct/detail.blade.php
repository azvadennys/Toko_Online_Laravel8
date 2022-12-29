@extends('layouts.app')

@section('content')
<div class="container">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row justify-content-center my-auto">
        <div class="card mb-3">
            <div class="row g-0 mb-4">
                <div class="col-md-4">
                    <img src="{{ asset('storage/images')}}/{{ $product->photo }}" class="img-fluid rounded-start"
                        style="max-height: 200px;" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body mb-3">
                        <h5 class="card-title">{{ $product->name }}</h5>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>

                        <div class="col-sm-10 mb-1">
                            <p style="white-space: pre-line;">{{ $product->description }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">
                            Price
                        </label>

                        <div class="col-sm-10 mb-1">
                            <p style="white-space: pre-line;">IDR {{number_format($product->price,0,',','.'); }}</p>
                        </div>
                    </div>
                    @auth
                    @if(auth()->user()->role == 'customer')
                    <form method="POST" action="/create-cart-product/{{ $product->id }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="row mb-3">
                            <label for="qty" class="col-sm-2 col-form-label">Qty</label>
                            <div class="col-sm-10">

                                <input type="number" class="form-control" name="qty" id="qty">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Purchase</button>
                    </form>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection