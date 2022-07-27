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
        <div class="col-md-6  col-sm-12 ml-auto order-md-last mb-7 mb-md-0">
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
        </div>
        <div class="col-md-6 col-sm-12 mx-md-0 ">
          <ul class="list-unstyled">
            <label class="lead-5 mb-0 lh-1 fw-500 text-primary ">{{ $product->name }}</label>
            <br>
            <label class="text-left fw-500 mt-4">{{ $user->city }} , {{ $user->address }} </label>
            <label class="text-left fw-500 ml-4">{{ $product->condition }} </label>
            <label class="text-left fw-500 ml-4">{{ $product->view }} </label>
            <h4  class="text-right text-primary fw-500 mr-6"> {{ $product->price }}  Birr</h4>
          </ul>
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <label  class="text-left fw-500 mt-2">Model</label>
              </div>
              <div class="col-md-9 col-sm-9">
                <label  class="text-left text-primary fw-500 mt-2">{{ $product->model  }}</label>
              </div>
              <div class="col-md-3 col-sm-6">
                <label  class="text-left fw-500 mt-2">Camera </label>
              </div>
              <div class="col-md-9 col-sm-6">
                <label  class="text-left  text-primary fw-500 mt-2">Camera</label>
              </div>
              <div class="col-md-3 col-sm-6">
                <label  class="text-left fw-500 mt-2">Storage</label>
              </div>
              <div class="col-md-9 col-sm-6">
                <label  class="text-left text-primary fw-500 mt-2">Storage</label>
              </div>
              <div class="col-md-3 col-sm-6">
                <label  class="text-left fw-500 mt-2">RAM</label>
              </div>
              <div class="col-md-9 col-sm-6">
                <label  class="text-left text-primary fw-500 mt-2">RAM</label>
              </div>
            </div>
          </div>


          <p class="mt-5">
            {{ $product->description }}
          </p>
          <div class="row gap-y align-items-center text-center bg-light rounded p-5 mt-2">
            <div class="col-md-auto">
              <p class="text-left fw-500 "> Seller</p>
              <p class="text-left fw-500 text-primary"> {{ $user->name }} </p>
              <p class="text-left fw-500 text-primary"> {{ $user->phone_1 }} </p>
              <p class="text-left fw-500 text-primary"> {{ $user->phone_2 }} </p>
             
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <section class="section bg-gray ">
    <div class="container">
      <h4 class="mb-5">Similar products</h4>
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



