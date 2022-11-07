@extends('layouts.app')

@section('title', 'User Profile')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>User Profile</h4>
                <div class="underline mb-4"></div>    
            </div>

            <div class="col-md-10">

                @if (session('message'))
                    <p class="alert alert-success">{{ session('message') }}</p>
                @endif

                <div class="card shadow">
                    <div class="card-header bg-primary">
                        <h4 class="mb-0 text-white">User Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="cold-md-6 mb-3">
                                    <label for="firstName">{{ __('First Name') }}</label>
                                    <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ Auth::user()->firstName }}" required autocomplete="firstName" autofocus>

                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="lastName">{{ __('Last Name') }}</label>
                                    <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ Auth::user()->lastName }}" required autocomplete="lastName" autofocus>
            
                                    @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="phoneNumber">{{ __('Phone Number') }}</label>
                                    <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ Auth::user()->phoneNumber }}" required autocomplete="phoneNumber" autofocus>
            
                                    @error('phoneNumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="col-md-6 mb-3">
                                    <label for="emergencyNumber1">{{ __('Emergency Contact 1') }}</label>
                                    <input id="emergencyNumber1" type="tel" class="form-control @error('emergencyNumber1') is-invalid @enderror" name="emergencyNumber1" value="{{ Auth::user()->emergencyNumber1 }}" required autocomplete="emergencyNumber1" autofocus>
            
                                    @error('emergencyNumber1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="col-md-6 mb-3">
                                    <label for="emergencyNumber2">{{ __('Emergency Contact 2') }}</label>
                                    <input id="emergencyNumber2" type="tel" class="form-control @error('emergencyNumber2') is-invalid @enderror" name="emergencyNumber2" value="{{ Auth::user()->emergencyNumber2 }}" required autocomplete="emergencyNumber2" autofocus>
            
                                    @error('emergencyNumber2')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="col-md-6 mb-3">
                                    <label for="address">{{ __('Address') }}</label>
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" required autocomplete="address" autofocus>
            
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="col-md-6 mb-3">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" readonly class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" placeholder="example@gmail.com">
            
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="gender">{{ __('Gender') }}</label>
                                    <input id="gender" type="gender" class="form-control @error('email') is-invalid @enderror" name="gender" value="{{ old('gender')}}" required autocomplete="email">
            
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                 </div> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection