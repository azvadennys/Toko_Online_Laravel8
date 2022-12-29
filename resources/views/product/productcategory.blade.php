@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card my-3">
                @if($product->first() != NULL)
                <div class="card-header">{{ $product->first()->categorydetail->name }}
                </div>

                <div class="card-body">
                    <div class="row justify-content-start">
                        @foreach($product as $index)
                        <div class="mx-2 col-2 mb-2">
                            <div class="card mr-3 col-2 mb-2" style="width: 200px;">
                                <a href="/detail-product/{{ $index->id }}"><img
                                        src="{{asset('storage/images') }}/{{ $index->photo }}" class="img-thumbnail"
                                        style="max-width: 200px; max-height: 200px" alt="..."></a>
                                <div class="card-body">
                                    <p class="card-text">{{substr($index->name, 0, 20);}}...</p>
                                    <h6 class="card-title">IDR {{number_format($index->price,0,',','.'); }}</h6>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @else
                <div class="alert alert-danger alert-dismissible fade show my-auto" role="alert">
                    Tidak ada Product
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            {{ $product->onEachSide(0)->links() }}
        </div>
    </div>
</div>
@endsection