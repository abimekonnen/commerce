@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header">
            {{ __('Users') }}
        </div>

        <div class="alert alert-info" role="alert">Sample table page</div>
        <div class="container overflow-auto ">
            <div>
              <table class="table">
                <thead>
                  <tr>

      
                    <th scope="col" style="width: 25%;" style="overflow:auto;">Name</th>
                    <th scope="col" style="width: 45%;" style="overflow:auto;">Email</th>
                    <th scope="col" style="width: 35%;" style="overflow:auto;">Phone Number</th>

                  </tr>
                </thead>
              </table>
            </div>
            
            <div  style="margin-bottom: 2%">
                <table class="table">
                  <tbody >
                    @foreach ($users as $key=>$user)
                        <tr>
                            <td style="width: 25%;"style="overflow:auto;">{{ $user->name  }}</td>
                            <td style="width: 45%;"style="overflow:auto;"> {{ $user->email }}</td>
                            <td style="width: 35%;" style="overflow:auto;">{{ $user->phone_1  }}</td>
                        </tr>
                    @endforeach                             
                  </tbody>
                </table>
                
            </div>   
        </div>

    </div>
@endsection
