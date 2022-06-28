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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus readonly>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="phone_1" class="col-md-4 col-form-label text-md-end">Phone Number 1</label>

                            <div class="col-md-6">
                                <input id="phone_1" type="text" class="form-control @error('phone_1') is-invalid @enderror" name="phone_1" value="{{ $user->phone_1 }}" readonly>

                                @error('phone_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone_2" class="col-md-4 col-form-label text-md-end">Phone Number 2</label>

                            <div class="col-md-6">
                                <input id="phone_2" type="text" class="form-control" name="phone_2" value="{{ $user->phone_2 }}" readonly>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" readonly>
                                </textarea>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
