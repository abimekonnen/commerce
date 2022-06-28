@extends('layouts.app')

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
                    <div class="alert alert-info" role="alert">
                    <form method="POST" action="{{ route('productTyp.store') }}" enctype="multipart/form-data" >   
                        @csrf
                        <div class="row">
                    
                            <div class="col-md-4 col-sm-12 mt-2">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="Enter Product name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-3 col-sm-12 mt-2 ">
                                <select name="category" type="submit" class="form-select @error('category') is-invalid @enderror"  >
                                    <option  disabled selected>Select Category</option>
                                    @foreach ($categories as $category )
                                        <option>{{ $category->name }} </option>
                                    @endforeach
                                </select > 
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> 
                            <div class="col-md-4 col-sm-12 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    Add Product Type
                                </button > 

                            </div> 
                       
                        </div>
                    </form>


                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Category</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types  as $type)
                                <tr>
                                    <td>{{ $type->name  }}</td>
                                    <td>
                                       {{ $type->category  }} 
                                    </td>
                                    <td>
                                        <button  class="btn btn-danger"   id="deleteButton"
                                        onclick="handleDelete({{ $type->id}})">{{ __('Delete') }} </button >
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
            
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
        <!-- Modal Delete -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="deleteMessage" class="modal-body text-primary">
                  Are You Sure Want to Delete
                </div>
                <form action="" method="POST" id="deleteCategorytForm">
                  @csrf 
                  @method('DELETE')
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">No Go back</button>
                    <button type="submit  " class="btn btn-outline-danger">Yes Delete</button>
                  </div>
                </form>
              </div>
            </div>
         </div> 
         
         <script>
    
            function handleDelete(id){
                var form = document.getElementById('deleteCategorytForm');
                form.action = 'productTyp/'+id;
                $('#deleteModal').modal('show');

             }  
         </script>  
@endsection
