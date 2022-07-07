@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" integrity="sha512-5m1IeUDKtuFGvfgz32VVD0Jd/ySGX7xdLxhqemTmThxHdgqlgPdupWoSN8ThtUSLpAGBvA8DY2oO7jJCrGdxoA==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js" integrity="sha512-2RLMQRNr+D47nbLnsbEqtEmgKy67OSCpWJjJM394czt99xj3jJJJBQ43K7lJpfYAYtvekeyzqfZTx2mqoDh7vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
<div class="container">
    <div class="card ">
        <div class="card-header">
            {{ __('Products') }}
        </div>

        <div class="alert alert-info" role="alert"></div>
        <div class="container overflow-auto">
            <div class="">
              <table class="table ">
                <thead>
                  <tr>

                    <th scope="col" style="width: 5%;" style="overflow-x:auto;">No</th>
                    <th scope="col" style="width: 20%;" style="overflow-x:auto;">Name</th>
                    <th scope="col" style="width: 25%;" style="overflow-x:auto;">Model</th>
                    <th scope="col" style="width: 10%;" style="overflow-x:auto;">Category</th>
                    <th scope="col" style="width: 10%;" style="overflow-x:auto;">Type</th>
                    <th scope="col" style="width: 10%;" style="overflow-x:auto;">Price</th>
                    <th scope="col" style="width: 10%;" style="overflow-x:auto;">View </th>
                    <th scope="col" style="width: 10%;" style="overflow-x:auto;">Delete</th>

                  </tr>
                </thead>
              </table>
            </div>
            
            <div class=""  style="margin-bottom: 2%">
                <table class="table">
                  <tbody >
                       @foreach ($products as $key=>$product)
                        <tr>
                            <td style="width: 5%;"style="overflow-x:auto;">{{ 1+$key  }}</td>
                            <td style="width: 20%;"style="overflow-x:auto;">{{ $product->name  }}</td>
                            <td style="width: 25%;"style="overflow-x:auto;"> {{ $product->model }}</td>
                            <td style="width: 10%;"style="overflow-x:auto;"> {{ $product->category }}</td>
                            <td style="width: 10%;"style="overflow-x:auto;"> {{ $product->type }}</td>
                            <td style="width: 10%;" style="overflow-x:auto;">{{ $product->price  }}</td>
                            <td style="width: 10%;" style="overflow-x:auto;">
                              <a  href="product/{{ $product->id }}/edit" class="btn btn-primary">
                                {{ __('View') }}
                              </a>
                            </td>
                            <td style="width: 10%;" style="overflow-x:auto;">
                              <button   href="" class="btn btn-danger"  id="deleteButton"
                              onclick="handleDelete({{$product->id }})">
                                {{ __('Delete') }}
                              </button >
                            </td>
                        </tr>
                        @endforeach                                      
                  </tbody>
                </table>
                
            </div>   
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
      
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
                form.action = 'product/'+id;
                console.log(form);
                $('#deleteModal').modal('show');
                // $(function () {
                //   $("#deleteButton").click(function () {
                //       $("#deleteModal").modal("show");
                //   });
                // });
             }  
         </script>    
</div>
@endsection
