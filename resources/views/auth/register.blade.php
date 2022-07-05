@extends('layouts.guest')

@section('content')
    <div class="col-md-6 ">
        <div class="card mb-4 mx-4">
            
            <div class="card-body p-4">
                <h1 class="text-right" >Register</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                    </svg></span>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="{{ __('Name') }}" required
                               autocomplete="name" autofocus value="{{ old('name') }}" >
                        @error('name')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
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
                    </div>

                    <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-mobile') }}"></use>
                        </svg></span>
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="{{ __('Phone number') }}" required
                                   autocomplete="phone" autofocus value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div>

                    {{-- <div class="input-group mb-3"><span class="input-group-text">
                        <svg class="icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-location-pin') }}"></use>
                        </svg></span>
                            <select class="form-control @error('phone') is-invalid @enderror"
                             type="text" name="city" placeholder="{{ __('City') }}" >
                                <option  selected>fgfd</option>      
                                <option value="fdf">gfhgfh</option>
                            </select>
                            @error('phone')
                            <span class="invalid-feedback">
                                {{ $message }}
                            </span>
                            @enderror
                    </div> --}}

                    <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                        <input class="form-control @error('password') is-invalid @enderror" type="password"
                               name="password" placeholder="{{ __('Password') }}" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-4"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                    </svg></span>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                               name="password_confirmation" placeholder="{{ __('Confirm Password') }}" required
                               autocomplete="new-password">
                    </div>

                    <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button>

                </form>
            </div>
            
        </div>
    </div>

@endsection