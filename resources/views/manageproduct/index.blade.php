@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between my-4">
        <div class="col-4">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Product Name" name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-secondary" type="submit" id="button-addon2">
                        <i class=" bi bi-search"></i></button>

                </div>
            </form>
        </div>
        <div class="col-2"><a href="/add-product">
                <button class="btn btn-secondary">Add Product <i class="bi bi-plus"></i></button></a>
        </div>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="row justify-content-center">

        @if($product->first() == NULL)
        <div class="alert alert-warning my-1 alert-dismissible fade show" role="alert">
            Tidak Ada Data
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @foreach ($product as $index)
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('storage/images')}}/{{ $index->photo }}" class="img-fluid rounded-start"
                        style="max-height: 200px;" alt="...">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title">{{ $index->name }}</h5>
                    </div>
                </div>
                <div class="col-md-2 my-4">
                    <a href="/edit-product/{{ $index->id }}"><button class="btn btn-warning"><i
                                class="bi bi-pencil-square"></i></button></a>
                    <a href="/delete-product/{{ $index->id }}"><button class="btn btn-danger"><i
                                class="bi bi-trash"></i></button></a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection