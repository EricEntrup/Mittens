@include('partials._body_style')

<section class="sign-in-page">
    <div class="container p-0">
        <div class="row no-gutters">
            <div class="col-sm-12 align-self-center">
                <div class="sign-in-from bg-white">
                    <h1 class="mb-0">{{ __('Reset Password') }}</h1>
                    <p>{{ __("Enter your email address and we'll send you an email with instructions to reset your password.")}}</p>
                    <form method="POST" action="{{ route('password.email') }}" class="mt-4">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email Address')}}</label>
                            <input type="email" name="email" class="form-control mb-0 @error('email') is-invalid @enderror" id="email"  value="{{ old('email') }}" required  placeholder="{{ __('Email Address') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-inline-block w-100">
                            <button type="submit" class="btn btn-primary float-right">{{ __('Reset Password') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials._body_scripts')
