<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="theme-color" content="#ffffff">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
    @yield('script')
</head>
<body>
<div class="sidebar sidebar-dark sidebar-fixed sidebar-narrow-unfoldable" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">

    </div>
    @include('layouts.navigation')
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
<div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-0">
        <div class="container-fluid">
            <button class="header-toggler px-md-0 me-md-3" type="button"
                    onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
                <svg class="icon icon-lg">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-menu') }}"></use>
                </svg>
            </button>
            @auth
                <a class="header-brand d-md-none" href="{{ route('home') }}">Home</a>
                @else
                <a class="header-brand d-md-none text-primary" href="{{ route('product.create') }}">Sell product</a>
            @endauth
            <ul class="header-nav d-none d-md-flex">
                @auth
                  <li class="nav-item"><a class="nav-link " href="{{ route('home') }}">Home</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('product.create') }}">Sell product</a></li>
                @endauth
            </ul>
            <ul class="header-nav ms-auto">
            </ul>
            <ul class="header-nav ms-1">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link py-0 text-primary" href="{{ route('product.create') }}">
                        {{ __('Sell Product') }}
                    </a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link py-0 text-primary" href="{{ route('product.index') }}">
                        {{ __('My Product') }}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link py-0 text-primary" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pt-0">
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                            </svg>
                            {{ __('My profile') }}
                        </a>
                        <a class="dropdown-item" href="password/reset">
                            <svg class="icon me-2">
                                <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                            </svg>
                            {{ __('Reset Password') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                <svg class="icon me-2">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-account-logout') }}"></use>
                                </svg>
                                {{ __('Logout') }}
                            </a>
                        </form>
                    </div>
                </li> 
                @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif 
                @endauth
            </ul>
 
        </div>

    </header>

    @if (Route::currentRouteName() ==="home" || Route::currentRouteName() ==="welcome" || Route::currentRouteName() ==="getSearch"
    || Route::currentRouteName() ==="getTypes" || Route::currentRouteName() ==="getCategory" )
    <header class="header text-center text-white" style="background-color: #797d97;">
        <div class="container">

           
            <div class="col-md-12 mx-auto"> 
              <h1 class="display-8 mb-7">Search products </h1>
              <div class="row mb-3">
                <div class="col-md-3 mb-2">
                    <select name="category"   class="form-control  @error('category') is-invalid @enderror" id="category">
                        <option disabled selected>Filter by Category</option>
                        <option value="all">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 mb-2">
                    <select name="type"  type="submit" class="form-control  @error('category') is-invalid @enderror" id="type">
                        <option disabled selected>Filter by type</option>
                        <option disabled >Select Category First</option>
                    </select>
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-3 mb-2">
                    <select name="city"   class="form-control  @error('city') is-invalid @enderror" id="city" >
                        <option disabled selected>Filter by City</option>
                        <option value="all">All</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->name }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                {{-- <div class="col-md-3 mx-auto">
                    <div class="input-group">
                        <input  name="query"   id="query" class="form-control py-2 border-right-0 border" type="tex" placeholder="search here" id="example-search-input">
                        <div id="recomendation"  class="">  </div> 
                        <span class="input-group-text">
                            <a id="serchButton">
                              <img style="width: 41.5%" src="{{ asset('icons/icons8-search-58.png') }}">   
                            </a>
                        </span>
                        
                    </div>
                </div> --}}
                <div class="col-md-2 mb-2">
                  <input type="text" name="query"   class="form-control  @error('category') is-invalid @enderror" 
                    id="query" placeholder="Search here">
                    <div id="recomendation"  class="">  </div> 
                </div>
                <div class="col-md-1 mb-2">
                      <button class="btn btn-primary"   id="serchButton">Search</button>
                </div>
              </div>
            </div>
        </div>
    </header>
    @endif
    <div class="body flex-grow-1 px-1">
        <div class="container-lg">
            @yield('content')
        </div>
    </div>
    <footer class="footer mt-5 " style="">
        <div class="container">
            <div class="row">
                <div class="col-11 mx-auto col-md-5 mx-md-0">
                    <form method="POST" action="{{ route('comment') }}" enctype="multipart/form-data" >
                        @csrf

                                <input class="form-control mt-3 @error('email') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Name') }}" >
                                @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror

                                <input class="form-control  mt-3 @error('email') is-invalid @enderror" type="text" name="email" placeholder="{{ __('Email') }}" >
                                @error('email')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror

                                <input class="form-control  mt-3 @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="{{ __('Phone') }}" >
                                @error('phone')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror

                                <textarea  class="form-control  mt-3 @error('comment') is-invalid @enderror" type="text" name="comment" 
                                placeholder="{{ __('Comment') }}" required ></textarea>
                                @error('comment')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                                @enderror

                                <button type="submit" class="btn btn-primary  mt-3 mb-5">Send</button>

                    </form>
                </div>
                <div class="col-md-6 ml-auto order-md-last mb-7 mb-md-0">
                    <label for="" class="col-md-6 col-form-label  mt-3">Phone</label>
                    <label for="" class="col-md-6 col-form-label   mt-3">email</label>
                    <label for="" class="col-md-6 col-form-label  mt-3">Amede Gebeya</label>
                    <label for="" class="col-md-6 col-form-label   mt-3">Web</label>
                </div>
            </div>
        </div>        
    </footer>
</div>
<script src="{{ asset('js/coreui.bundle.min.js') }}"></script>
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<script src="{{ url('js/custem.js') }}"></script>
{{-- <script src="{{ url('js/bootstrap.js"') }}"></script> --}}
<script src="{{ url('js/jquery.js') }}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-3.4.1.js"></script>

<script>

   $(document).ready(function () {
    //search by type
   $('#query').on('keyup',function()
   {
    $query = $(this).val();
    console.log($query);
    if($query !=''){
        var _token = $('input[name="_token"]').val();

        $.ajax({
        type:'get',
        url:'{{ URL::to('search') }}',
        data:{'query1': $query},
        success:function(data){
            $('#recomendation').fadeIn();
            $('#recomendation').html(data);
        }
        });
    }
    var $category = $("#category").val();
    var $type = $("#type").val();
    var $city = $("#city").val();
    console.log($query);
    if($query){
        $('#defaultData').hide();
        $('#Content').show();
    }else{
        $('#defaultData').show();
        $('#Content').hide();
    }
    $.ajax({
        type:'get',
        url:'http://127.0.0.1:8000/search2',
        data:{'query1': $query ,'category1': $category,'type1': $type,'city1': $city},
        success:function(data){
            $('#Content').html(data);
        }
    });
   }
   )
   $('.searchRecomendations').click(function(){
    console.log("value");
        $('#query').val($(this).text());
        $('#recomendation').fadeOut();
   })
   //fade out
   $(document).on('click','li', function(){
    $('#query').val($(this).text());
    console.log($(this).text());
    $('#recomendation').fadeOut();
   })
//    if($("#query").val() ==""){  $('#recomendation').fadeOut(); }
    //search by button
    $('#serchButton').click(function()
   {
    var $query = $("#query").val();
    var $category = $("#category").val();
    var $type = $("#type").val();
    var $city = $("#city").val();
    console.log($query);
    $('#defaultData').hide();
    $('#Content').show();
    $.ajax({
        type:'get',
        url:'{{ URL::to('search2') }}',
        data:{'query1': $query ,'category1': $category,'type1': $type,'city1': $city},
        success:function(data){
            console.log(data);
            $('#Content').html(data);
        }
    });
   }
   ) 
 
      //filter  product type
    $('#category').on('change', function () {
    let categoryName = $(this).val();
    if(categoryName == "all"){
        $('#type').empty();
        $('#type').append(`<option disabled selected>Select Category First</option>`);
    }else{
        $('#type').empty();
        $('#type').append(`<option value="0" disabled selected>Processing...</option>`);
        $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1:8000/fetchData/' + categoryName,
        success: function (response) {
        var response = JSON.parse(response);
        console.log(response);   
        $('#type').empty();
        $('#type').append(`<option value="0" disabled selected>Filter by type</option>`);
        $('#type').append(`<option value="all"  >All</option>`);
        response.forEach(element => {
            $('#type').append(`<option value="${element['name']}">${element['name']}</option>`);
            });
        }
        });
    }

    });
    });
 
</script>

</body>
</html>