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
                <a class="header-brand d-md-none" href="/">Home</a>
                @else
                <a class="header-brand d-md-none text-primary" href="{{ route('product.create') }}">Sell product</a>
            @endauth
            <ul class="header-nav d-none d-md-flex">
                @auth
                  <li class="nav-item"><a class="nav-link " href="/">Home</a></li>
                    @else
                    <li class="nav-item"><a class="nav-link text-primary" href="{{ route('product.create') }}">Sell product</a></li>
                @endauth
              
            </ul>
            <ul class="header-nav ms-auto">

            </ul>
            <ul class="header-nav ms-3">
                @auth
                <li class="nav-item dropdown">
                    
                </li>
                <li class="nav-item dropdown">
                   
                    <a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
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
            <form method="GET" action="{{ route('getSearch') }}" enctype="multipart/form-data" >
              
              <h1 class="display-8 mb-7">Search products </h1>
              <div class="row mb-3">

                <div class="col-md-3 mb-2">
                    <select name="category"   class="form-control  @error('category') is-invalid @enderror" 
                    id="category"
                    >
                        <option disabled selected>Filter by Category</option>
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
                    <select name="type"  type="submit" class="form-control  @error('category') is-invalid @enderror" 
                    id="type"
                    >
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
                    <select name="city"   class="form-control  @error('city') is-invalid @enderror" 
                    id="city"
                    >
                        <option disabled selected>Filter by City</option>
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
                <div class="col-md-3 mb-2">

                  <input type="text" name="name"   class="form-control  @error('category') is-invalid @enderror" 
                    id="name" placeholder="Search here">
                   
                    {{-- <button class="btn btn-outline-primary" type="button" id="button-addon1">Button</button>
                    <input type="text" class="form-control" placeholder="" 
                    aria-label="Example text with button addon" aria-describedby="button-addon1"> --}}
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="col-md-1 mb-2">

                    <button type="button" name="name"   class="btn btn-success" 
                      id="name" placeholder="Search here">Search</button>
                     
                      <button class="btn btn-outline-primary" type="button" id="button-addon1">Button</button>
                      <input type="text" class="form-control" placeholder="" 
                      aria-label="Example text with button addon" aria-describedby="button-addon1">

                </div --}}


                {{-- <div class="col-md-3 mb-2"><span class="input-group-text">
                    <svg class="icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                    </svg></span>
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="{{ __('Email') }}" required
                            autocomplete="email" autofocus value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                </div> --}}
                
              </div>
            </form> 
            </div>
    
        </div>
    </header>
    @endif




    <div class="body flex-grow-1 px-1">
        <div class="container-lg">
            @yield('content')
        </div>
    </div>
    <footer class="footer mt-5" style="">
        {{-- <div>
            <a href="{{ route('home') }}">Gebeya.com </a><a href="https://coreui.io"></a> &copy; 2022
        </div>
        <div class="ms-auto">Developed by&nbsp;<a href="https://nisirweb.great-site.net/">Nisirweb</div> --}}
        <div class="container">
            <form method="POST" action="{{ route('getSearch') }}" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    <div class="col-md-3 mt-2">
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="{{ __('Email') }}" required
                            autocomplete="email" autofocus value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3 mt-2 ">
                        <input class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="{{ __('Phone') }}" required
                        autocomplete="email" autofocus value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 mt-2 ">
                        <textarea class="form-control @error('email') is-invalid @enderror" type="text" name="email" 
                        placeholder="{{ __('Comment') }}" required autocomplete="email" autofocus value="{{ old('email') }}"></textarea>
                        @error('email')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mt-2  offset-md-2 offset-sm-2">
                        <button type="button" class="btn btn-primary">Primary</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="container">

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
    $('#category').on('change', function () {
    let categoryName = $(this).val();
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
    response.forEach(element => {
        $('#type').append(`<option value="${element['name']}">${element['name']}</option>`);
        });
    }
});
});
});
</script>
</body>
</html>