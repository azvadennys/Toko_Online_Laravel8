@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between my-4">
        <div class="col-4">
            <a href="/manage-product">
                <button class="btn btn-secondary"> <i class="bi bi-arrow-left"></i> Back</button></a>
        </div>
        <div class="col-2">
        </div>
    </div>

    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}
                    @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="/update-product/{{ $product->id }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-12 col-form-label text-md-start">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name',$product->name) }}" required autocomplete="name"
                                    autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-start">{{ __('Category')
                                }}</label>

                            <div class="col-md-12">
                                <select class="form-select @error('category') is-invalid @enderror" name="category"
                                    id="category" aria-label="Default select example" required>
                                    <option disabled>Choose a category</option>
                                    @foreach ($category as $index)

                                    <option @if (old('category',$product->category_id)=='{{$index->id}}' ) selected
                                        @endif value='{{ $index->id }}' >{{$index->name }}</option>
                                    @endforeach
                                </select>

                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="detail" class="col-md-4 col-form-label text-md-start">{{ __('Detail')
                                }}</label>

                            <div class="col-md-12">
                                <textarea class="form-control @error('detail') is-invalid @enderror" id="detail"
                                    name="detail" rows="10"
                                    value="{{ old('detail',$product->description) }}">{{ old('detail',$product->description) }}</textarea>

                                @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-md-12 col-form-label text-md-start">{{ __('Price') }}</label>

                            <div class="col-md-12">
                                <input id="price" type="number"
                                    class="form-control @error('price') is-invalid @enderror" name="price"
                                    value="{{ old('price',$product->price) }}" required autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-12 col-form-label text-md-start">{{ __('Photo') }}</label>

                            <div class="col-md-12">
                                <input type="file" class="form-control @error('photo') is-invalid @enderror" id="image"
                                    name="photo" value="{{ old('photo') }}"
                                    placeholder="Empty if not want to update image">
                                <span class="mx-3 text-sm">Empty if not want to update image</span>
                                @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 ">
                                <button type="submit" class="btn btn-outline-secondary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection