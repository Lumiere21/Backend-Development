@extends('layouts.app')

@section('title', 'Admin Create User')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        {{--@if ($errors->any())
            <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif--}}

        <div class="card">
            <div class="card-header">
            <h2>Add User</h2>
            <a class="btn btn-primary" href="{{ url('admin/users') }}"> Back</a>
            </div>
        </div>
        <div class="card-body">

            <form action="{{ url('admin/users') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">{{ __('First Name') }}</label>
                        <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                        @error('firstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="lastName">{{ __('Last Name') }}</label>
                        <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                        @error('lastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="phoneNumber">{{ __('Phone Number') }}</label>
                        <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" autofocus>

                        @error('phoneNumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="emergencyNumber1">{{ __('Emergency Contact 1') }}</label>
                        <input id="emergencyNumber1" type="tel" class="form-control @error('emergencyNumber1') is-invalid @enderror" name="emergencyNumber1" value="{{ old('emergencyNumber1') }}" required autocomplete="emergencyNumber1" autofocus>

                        @error('emergencyNumber1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="emergencyNumber2">{{ __('Emergency Contact 2') }}</label>
                        <input id="emergencyNumber2" type="tel" class="form-control @error('emergencyNumber2') is-invalid @enderror" name="emergencyNumber2" value="{{ old('emergencyNumber2') }}" required autocomplete="emergencyNumber2" autofocus>

                        @error('emergencyNumber2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="address">{{ __('Address') }}</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="example@gmail.com">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="minimum of 8">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="role">{{ __('Role') }}</label>
                        <select name="role" class="form-control">
                            <option value="">Select Role</option>
                            <option value="1">Admin</option>
                            <option value="0">User</option>
                        </select>
                    </div>
                    <div class="col-md-12 text-end">
                       <button type="submit" class="btn btn-primary">Add</button>
                    </div> 
                </div>
            </form>
        </div>
    </div>
</div>
@endsection