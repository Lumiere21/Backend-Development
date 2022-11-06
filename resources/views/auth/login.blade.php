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
    <link rel="stylesheet" href="assets/css/landing/login.css" />

  </head>
  <body>
    <div class="container">
      <section class="bg-image">
        <span class="dot"></span>
      </section>
      <section class="login">
        <div class="login-field">
            <h1><span>ePing!</span> Login</h1>
            <form method="POST" action="{{ route('login') }}"> 
                @csrf
                <div class="input-field">
                        {{-- <input type="text" placeholder="Email or Phone number" required /> --}}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                        
                        <br />
                        {{-- <input type="password" placeholder="Password" required /> <br /> --}}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="forgot">
                            {{-- <a href="/html/landing/reset_password.html">Forgot Password?</a> --}}
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        {{-- <button>Sign in</button> --}}
                        <button type="submit">
                                    {{ __('Login') }}
                        </button>
                        <p>
                        New to ePing? &nbsp;&nbsp;<a href="{{ route('register') }}">{{ __('Create an Account') }}</a>
                        </p>
                </div>
            </form>
        </div>
      </section>
    </div>
  </body>
</html>
