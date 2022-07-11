@extends('layouts.app')
@section('css')

<link href="{{ asset('css/page.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
{{-- <link href="{{ asset('css/page.css') }}" rel="stylesheet"> --}}
@endsection

@section('content')
<section class="section">
    <div class="container">
      <div class="row">

        <div class="col-md-6 ml-auto order-md-last mb-7 mb-md-0">
          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{url('images/'.$product->image_1)}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{url('images/'.$product->image_2)}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{url('images/'.$product->image_1)}}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          {{-- <div class="slider-dots-fill-primary text-center" data-provide="slider" data-dots="true">
            <div><img src="{{url('images/'.$product->image_1)}}" style="width: 400px;"></div>
            <div><img src="{{url('images/'.$product->image_2)}}" style="width: 400px;"></div>
            <div><img src="{{url('images/'.$product->image_3)}}" style="width: 400px;"></div>
          </div> --}}
        </div>

        <div class="col-11 mx-auto col-md-5 mx-md-0">

       

          <ul class="list-unstyled">
            <li class="lead-5 mb-0 lh-1 fw-500 text-primary mt-1">{{ $product->name }}</li>
            <li class="lead-5 mb-0 lh-1 fw-500 text-primary mt-5">{{ $product->model  }} </li>
          </ul>

          <p class="mt-5">
            {{ $product->description }}
          </p>

          <div class="row gap-y align-items-center text-center bg-light rounded p-5 mt-7">
            <div class="col-md-auto ml-auto order-md-last">
              <h4 class="lead-5 mb-0 lh-1 fw-500 text-primary">{{ $product->price }} Birr</h4>
            </div>

            <div class="col-md-auto">
              <p class="text-left fw-500 text-primary">{{ $user->phone_1 }} </p>
              <p class="text-left fw-500 text-primary">{{ $user->phone_2 }} </p>
              <p class="text-left fw-500 text-primary">{{ $user->city }} </p>
              <p class="text-left fw-500 text-primary">{{ $user->address }} </p>
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
              <a class="product-media" href="{{ route('checkout',$similarProduct->id) }}">
                <span class="badge badge-pill badge-success badge-pos-left">{{ $similarProduct->name }}</span>
                <span class="badge badge-pill badge-primary badge-pos-right">{{ $similarProduct->city }}</span>
                <img src="{{url('images/'.$similarProduct->image_1)}}" alt="product" style="width: 300px; height :200px">
              </a>

              <div class="product-detail">
                <h6><a href="{{ route('checkout', $similarProduct->id)  }}">{{ $similarProduct->name }}</a></h6>
                <div class="product-price">{{ $similarProduct->price }} Birr</div>
              </div>
            </div>
           
          </div>
        @endforeach
        <div class="">
          {{ $similarProducts ->links() }}
        </div>

    </div>
  </section> 
@endsection



