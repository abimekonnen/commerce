@extends('layouts.app')
@section('css')

<link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="section">
    <div class="container">

      <div class="row">

        <div class="col-md-6 ml-auto order-md-last mb-7 mb-md-0">
          <div class="slider-dots-fill-primary text-center" data-provide="slider" data-dots="true">
            <div><img src="{{url('images/'.$product->image_1)}}"></div>
            {{-- <div><img src="{{url('images/'.$product->image_2)}}"></div>
            <div><img src="{{url('images/'.$product->image_3)}}"></div> --}}
          </div>
        </div>

        <div class="col-11 mx-auto col-md-5 mx-md-0">

       

          <ul class="list-unstyled">
            <li><span class="mr-1 ti-check text-success small-3"></span>{{ $product->name }}</li>
            <li><span class="mr-1 ti-check text-success small-3"></span>{{ $product->model  }} </li>
          </ul>

          <p >
            {{ $product->description }}
          </p>

          <div class="row gap-y align-items-center text-center bg-light rounded p-5 mt-7">
            <div class="col-md-auto ml-auto order-md-last">
              <h4 class="lead-5 mb-0 lh-1 fw-500 text-primary">{{ $product->price }} Birr</h4>
            </div>

            <div class="col-md-auto">
              <p class="text-left">{{ $user->phone_1 }} </p>
              <p class="text-left">{{ $user->phone_2 }} </p>
              <p class="text-left">{{ $user->city }} </p>
            </div>
          </div>
        </div>

      </div>


    </div>
  </section>
  <section class="section bg-gray bt-1">
    <div class="container">

      <h4 class="mb-7">Similar products</h4>

      <div class="row gap-y">
        @foreach ($similarProducts as $similarProduct)
          <div class="col-md-6 col-xl-3">
            <div class="product-3">
              <a class="product-media" href="item.html">
                <span class="badge badge-pill badge-primary badge-pos-left">New</span>
                <img src="../assets/img/shop/10.jpg" alt="product">
              </a>

              <div class="product-detail">
                <h6><a href="#">{{ $similarProduct->name }}</a></h6>
                <div class="product-price">{{ $similarProduct->price }} Birr</div>
              </div>
            </div>
          </div>
        @endforeach

    </div>
  </section> 
@endsection



