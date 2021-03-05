@include('partials._body_style')
<!-- loader Start -->
<div id="loading">
         
</div>
<!-- loader END -->
<section class="sign-in-page">
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-sm-12 align-self-center">
                <div class="sign-in-from bg-white">
                    <h1 class="mb-0">{{ __('Sign in')}}</h1>
                    <p>{{ __('Enter your email address and password to access admin panel.') }}</p>
                    <form class="mt-4" method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email Address') }}</label>
                            <input name="email" type="email" value="demo@metorik.com"  id="email" class="form-control mb-0 @error('email') is-invalid @enderror" placeholder="{{ __('Email Address')}}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            @if (Route::has('password.request'))
                                <a class="float-right" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                            <input name="password" type="password" value="12345678" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password')}}" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-inline-block w-100">
                            <div class="custom-control custom-checkbox d-inline-block mt-2 pt-1">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">{{ __('Remember Me') }}</label>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">{{ __('Sign in') }}</button>
                        </div>
                        <div class="sign-info">
                            <span class="dark-color d-inline-block line-height-2">{{ __("Don't have an account ?")}} <a href="{{ route('register') }}">Sign up</a></span>

                            <!-- Social Login [START] -->
                            @include('auth.social-login')
                            <!-- Social Login [END] -->
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials._body_scripts')