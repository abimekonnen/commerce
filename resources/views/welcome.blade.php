@extends('layouts.app')
@section('css')
<link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/page.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection
@section('content')
<section class="section bg-gray">
<div class="container">
    <div class="row gap-y" id="defaultData" >

            @if (!$products->isEmpty())
            @foreach ($products as $product)
              <div class="col-md-6 col-xl-3">
                <div class="product-3 mb-2">
                  <div class="product-media">
                    <span class="badge badge-pill badge-success badge-pos-left">{{ $product->name }}</span>
                    <span class="badge badge-pill badge-primary badge-pos-right">
                      <svg class="icon">
                        <use xlink:href="{{ asset('icons/coreui.svg#cil-location-pin') }}"></use>
                      </svg>
                        {{ $product->city }}
                        </span>
                    <div class="slider-dots-fill-primary text-cente" data-provide="slider" data-dots="true">
                      <a href="{{ route('checkout',$product->id) }}">
                        <img src="{{url('images/'.$product->image_1)}}" alt="amedegebeya">
                      </a>
                    </div>
                  </div>
                  <div class="product-detail">
                    <h6><a href="{{ route('checkout',$product->id) }}">{{ $product->model }}</a></h6>
                    <div class="product-price">{{ $product->price }} Birr</div>
                  </div>
                </div>
              </div> 
            @endforeach
            <nav class="mt-7 mb-5">
              <ul class="pagination justify-content-center" >
                {{ $products->links() }}
              </ul>
            </nav>
          @else
          <h1 class="text-center"> No Product found</h1>
          @endif
    </div>
    <div  class="row gap-y" id="Content" >

    </div>

</div>
</section>  
@endsection



