<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- font awesome cdn link -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- local css file  -->
    <link rel="stylesheet" href="assets/css/landing/register.css" />
  </head>
  <body>
    <section class="main">
      <nav>
        <span></span>
        <ul>
          <li><a href="/html/landing/index.html">Home</a></li>
        </ul>
      </nav>
      <div class="signup-container">
        <div class="signup-form">
            <h1><span>ePing!</span> Sign up</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-fields">
                    <div class="row1">
                        {{-- <input type="text" placeholder="First name" /> --}}
                        {{-- <input type="text" placeholder="Last name" />
                        <input type="text" placeholder="Phone number" /> --}}

                        
                        <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus placeholder="First Name">
                        <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus placeholder="Last Name">
                        <input id="phoneNumber" type="text" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') }}" required autocomplete="phoneNumber" autofocus placeholder="Phone number">

                    </div>
                    {{-- <div class="row2">
                        <input type="text" placeholder="Address" />

                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Address">

                    </div> --}}
                    <div class="row3">
                        {{-- <input type="text" placeholder="Email" />
                        <input type="text" placeholder="Confirm email" /> --}}
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Home Address">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">


                    </div>
                    <div class="row4">
                        {{-- <input type="text" placeholder="Password" />
                        <input type="text" placeholder="Confirm password" /> --}}

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                    </div>
                    <div class="">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    
                    <div class="submission">
                        <button type="submit">
                                    {{ __('Sign Up') }}
                        </button>
                        <p>
                            Already have an account?
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </p>
                    </div>
                </div>
            </form>
            
        </div>
      </div>
    </section>
  </body>
  <script src="../js/script.js"></script>
</html>
