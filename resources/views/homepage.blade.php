@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-4">
        <form method="post" action="/search-product" enctype="multipart/form-data">
            @method('post')
            <div class="col-12">
                <div class="input-group">
                    @csrf
                    <input type="text" id="search" name="search" class="form-control" placeholder="Search Product Name"
                        aria-label="Product Name" aria-describedby="button-addon2">
                    <button class="btn btn-secondary" type="submit" id="button-addon2">
                        <i class=" bi bi-search"></i></button>

                </div>
            </div>
        </form>
    </div>
    <div class="row justify-content-center">
        <div class="col-12">
            @foreach($category as $index)
            <div class="card my-3">
                <div class="card-header">{{ $index->name }} <a href="/product-category/{{ $index->id }}"> View All</a>
                </div>

                <div class="card-body">
                    <div class="row justify-content-start">
                        @php $total = 0;@endphp
                        @foreach($index->productlist as $index)
                        <div class="mr-3 col-2 mb-2">
                            <div class="card mr-3 col-2 mb-2" style="width: 200px;">
                                <a href="/detail-product/{{ $index->id }}"><img
                                        src="{{asset('storage/images') }}/{{ $index->photo }}" class="img-thumbnail"
                                        style="max-width: 200px; max-height: 200px" alt="..."></a>
                                <div class="card-body">
                                    <p class="card-text">{{ substr($index->name, 0, 20); }}...</p>
                                    <h6 class="card-title">IDR {{number_format($index->price,0,',','.'); }}</h6>
                                </div>
                            </div>
                        </div>
                        @php
                        $total++;
                        if ($total >= 5) {
                        break;
                        }
                        @endphp
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection