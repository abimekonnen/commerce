@extends('layouts.app')

@section('content')
    <div class="card ">
        <div class="card-header">
            {{ __('Users') }}
        </div>

        <div class="alert alert-info" role="alert">Sample table page</div>
        <div class="container">
            <table class="table">
                <thead>
                  <tr>

      
                    <th scope="col" style="width: 25%;" style="overflow-x:auto;">Name</th>
                    <th scope="col" style="width: 45%;" style="overflow-x:auto;">Email</th>
                    <th scope="col" style="width: 35%;" style="overflow-x:auto;">Phone Number</th>

                  </tr>
                </thead>
            </table>
            
            <div class="overflow-auto "  style="margin-bottom: 2%">
                <table class="table">
                  <tbody >
                    @foreach ($users as $key=>$user)
                        <tr>
                            <td style="width: 25%;"style="overflow-x:auto;">{{ $user->name  }}</td>
                            <td style="width: 45%;"style="overflow-x:auto;"> {{ $user->email }}</td>
                            <td style="width: 35%;" style="overflow-x:auto;">{{ $user->phone_1  }}</td>
                        </tr>
                    @endforeach                             
                  </tbody>
                </table>
                
            </div>   
        </div>

    </div>
@endsection
