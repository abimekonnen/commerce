@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <form method="POST" action="{{ route('product.update',$productId) }}" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                    @foreach ($products as $product )
                    <div class="row mb-3">
                        <label for="name" class="col-md-3 col-form-label text-md-end">Product Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product->name }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="model" class="col-md-3 col-form-label text-md-end">Model</label>

                        <div class="col-md-7">
                            <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ $product->model }}">

                            @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="price" class="col-md-3 col-form-label text-md-end">Price</label>

                        <div class="col-md-8">
                            <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ $product->price }}">

                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="condition" class="col-md-3 col-form-label text-md-end">Condition</label>

                        <div class="col-md-8">
                            <select name="condition" type="submit" class="form-select @error('condition') is-invalid @enderror"  >
                                <option selected>{{ $product->condition }}</option>
                                @foreach ($conditions as $condition )
                                 @if ($condition->name != $product->condition )
                                    <option value="$condition->name">{{ $condition->name }}</option>  
                                 @endif
                                
                                @endforeach
  
                            </select>

                            @error('condition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="category" class="col-md-3 col-form-label text-md-end">Product category</label>

                        <div class="col-md-8">
                            <select name="category"  type="submit" class="form-select  @error('category') is-invalid @enderror" 
                            id="category"
                            >
                                <option disabled selected value="{{ $product->category }}">{{ $product->category }}</option>
                                @foreach ($categories as $category )
                            
                                    <option value="{{ $category->name  }}">{{ $category->name }}</option> 
                               
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
                        <label for="type" class="col-md-3 col-form-label text-md-end">Product type</label>

                        <div class="col-md-8">
                            <select name="type" type="submit" class="form-select @error('type') is-invalid @enderror" 
                            id="type"  >
                            <option  selected value="{{ $product->type }}">{{ $product->type }}</option>
  
                            </select>

                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-3 col-form-label text-md-end">Description</label>

                        <div class="col-md-8">
                            <trix-editor input="x" id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $product->description }}">
                            </trix-editor>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="picture_one" class="col-md-3 col-form-label text-md-end">Picture one</label>
                        @if ($product->image_1 == null)
                            <div  id="image_1" class="col-md-8">
                                <input id="picture_one" type="file" class="form-control @error('picture_one') is-invalid @enderror" 
                                name="picture_one" value="{{url('images/'.$product->image_1)}}" onchange="loadFile2(event,'picture_one_view','image_1','cacell_image_div_1')">

                                @error('picture_one')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1" style="visibility: hidden" id="cacell_image_div_1">
                                <a class="btn btn-outline-danger" id="imag_btn_1"
                                onclick="cancellImage2('cacell_image_div_1','cancell_imag_btn_1','image_1','picture_one_view','picture_one')"
                                >
                                    Cancell
                            </a>
                            </div>

                        @else
                            <div  id="image_1" class="col-md-7">
                                <input id="picture_one" type="file" class="form-control @error('picture_one') is-invalid @enderror" 
                                name="picture_one" value="{{url('images/'.$product->image_1)}}" onchange="loadFile2(event,'picture_one_view','image_1','cacell_image_div_1')">

                                @error('picture_one')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1" style="visibility: visible" id="cacell_image_div_1">
                                <a class="btn btn-outline-danger" id="imag_btn_1"
                                onclick="cancellImage2('cacell_image_div_1','cancell_imag_btn_1','image_1','picture_one_view','picture_one')"
                                >
                                    Cancell
                            </a>
                            </div>
                        @endif
                    </div>
                    @if ($product->image_1 != null)
                        <div class="row mt-3" id="imageSetion_1">
                            <label for="picture_three" class="col-md-3 col-form-label text-md-end"></label>
                            <div class="col-md-8">
                                <img id="picture_one_view"  class="form-control" src="{{url('images/'.$product->image_1)}}" 
                                name=""  style="visibility: visible">
                            </div>
                        </div>
                        @else
                        <div class="row mt-3" id="imageSetion_1">
                            <label for="picture_three" class="col-md-3 col-form-label text-md-end"></label>
                            <div class="col-md-8">
                                <img id="picture_one_view"  class="form-control" src="" 
                                name=""  style="visibility: hidden">
                            </div>
                        </div>
                    @endif
                    <div class="row mt-3">
                        <label for="picture_two" class="col-md-3 col-form-label text-md-end">Picture two</label>
                        @if ($product->image_2 == null)
                            <div id="image_2" class="col-md-8">
                                <input id="picture_two" type="file" class="form-control @error('picture_two') is-invalid @enderror" 
                                name="picture_two" value="{{url('images/'.$product->image_2)}}" onchange="loadFile2(event,'picture_two_view','image_2','cacell_image_div_2')">

                                @error('picture_two')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-1" style="visibility: hidden" id="cacell_image_div_2">
                                <a class="btn btn-outline-danger" id="imag_btn_2"
                                onclick="cancellImage2('cacell_image_div_2','cancell_imag_btn_2','image_2','picture_two_view','picture_two')"
                                >
                                    Cancell
                                </a>
                            </div>
                        @else
                            <div id="image_2" class="col-md-7">
                                <input id="picture_two" type="file" class="form-control @error('picture_two') is-invalid @enderror" 
                                name="picture_two" value="{{url('images/'.$product->image_3)}}" onchange="loadFile2(event,'picture_two_view','image_2','cacell_image_div_2')">

                                @error('picture_two')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> 
                            <div class="col-md-1" style="visibility: visible" id="cacell_image_div_2">
                                <a class="btn btn-outline-danger" id="imag_btn_2"
                                onclick="cancellImage2('cacell_image_div_2','cancell_imag_btn_2','image_2','picture_two_view','picture_two')"
                                >
                                    Cancell
                                </a>
                            </div>
                        @endif
                    </div>
                    @if ($product->image_2 != null)
                        <div class="row mt-3" id="imageSetion_2">
                            <label for="picture_three" class="col-md-3 col-form-label text-md-end"></label>
                            <div class="col-md-8">
                                <img id="picture_two_view"  class="form-control" src="{{url('images/'.$product->image_2)}}" 
                                name=""  style="visibility: visible">
                            </div>
                        </div>
                        @else
                        <div class="row mt-3" id="imageSetion_2">
                            <label for="picture_three" class="col-md-3 col-form-label text-md-end"></label>
                            <div class="col-md-8">
                                <img id="picture_two_view"  class="form-control" src="" 
                                name=""  style="visibility: hidden">
                            </div>
                        </div>
                    @endif
                    <div class="row mt-3">

                        <label for="picture_three" class="col-md-3 col-form-label text-md-end">Picture three</label>
                        @if ($product->image_3 == null)
                            <div id="image_3" class="col-md-8">
                                <input id="picture_three" type="file" class="form-control @error('picture_three') is-invalid @enderror"
                                name="picture_three" value="{{url('images/'.$product->image_3)}}" onchange="loadFile2(event,'picture_three_view','image_3','cacell_image_div_3')" >

                                @error('picture_three')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1" style="visibility: hidden" id="cacell_image_div_3">
                                <a class="btn btn-outline-danger" id="cancell_imag_btn_3" 
                                onclick="cancellImage2('cacell_image_div_3','cancell_imag_btn_3','image_3','picture_three_view','picture_three')">
                                    Cancell
                                </a >
                            </div>

                        @else
                            <div id="image_3" class="col-md-7">
                                <input id="picture_three" type="file" class="form-control @error('picture_three') is-invalid @enderror"
                                name="picture_three" value="{{url('images/'.$product->image_3)}}" onchange="loadFile2(event,'picture_three_view','image_3','cacell_image_div_3')" >

                                @error('picture_three')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-1" style="visibility: visible" id="cacell_image_div_3">
                                <a class="btn btn-outline-danger" id="cancell_imag_btn_3" 
                                onclick="cancellImage2('cacell_image_div_3','cancell_imag_btn_3','image_3','picture_three_view','picture_three')">
                                    Cancell
                                </a >
                            </div>
                        @endif
                    </div>
                    @if ($product->image_3 != null)
                        <div class="row mt-3" id="imageSetion_3">
                            <label for="picture_three" class="col-md-3 col-form-label text-md-end"></label>
                            <div class="col-md-8">
                                <img id="picture_three_view"  class="form-control" src="{{url('images/'.$product->image_3)}}" 
                                name=""  style="visibility: visible">
                            </div>
                        </div>
                        @else
                        <div class="row mt-3" id="imageSetion_3">
                            <label for="picture_three" class="col-md-3 col-form-label text-md-end"></label>
                            <div class="col-md-8">
                                <img id="picture_three_view"  class="form-control" src="" 
                                name=""  style="visibility: hidden">
                            </div>
                        </div>
                    @endif
                    {{ csrf_field() }}
                    <div class="row mt-3">
                        <div class="col-md-4 offset-md-5">


                                <button type="submit" class="btn btn-primary">
                                    Update Product
                                </button >
                           
                        </div>
                    </div> 
                    @endforeach

              
                </form>
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).ready(function () {
        $('#category').on('change', function () {
        let categoryName = $(this).val();
        var typ = document.getElementById("type");
        var value = typ.options[typ.selectedIndex].value;;
        console.log(value);
        $('#type').empty();
        $('#type').append(`<option value="0" disabled selected>Processing...</option>`);
        $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1:8000/fetchData/' + categoryName,
        success: function (response) {
        var response = JSON.parse(response); 
        $('#type').empty();
        $('#type').append(`<option value="0" disabled selected>Select type</option>`);
        response.forEach(element => {
            $('#type').append(`<option value="${element['name']}">${element['name']}</option>`);
            });
        }
    });
});
});
</script>
</div>
@endsection
