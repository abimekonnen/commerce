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



                        @foreach ($users as $user)
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus readonly>

                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="phone_1" class="col-md-4 col-form-label text-md-end">Phone Number 1</label>

                            <div class="col-md-6">
                                <input id="phone_1" type="text" class="form-control " name="phone_1" value="{{ $user->phone_1 }}" readonly>

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_2" class="col-md-4 col-form-label text-md-end">Phone Number 2</label>

                            <div class="col-md-6">
                                <input id="phone_2" type="text" class="form-control" name="phone_2" value="{{ $user->phone_2 }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">City</label>

                            <div class="col-md-6">
                                <input  id="city" class="form-control " name="city" value="{{ $user->city }}" readonly>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6">
                                <input  id="address" class="form-control " name="address" value="{{ $user->address }}" readonly>

                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <a  href="profile/{{ Auth::user()->id }}/edit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </a>
                            </div>
                        </div> 
                        @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
@endsection
