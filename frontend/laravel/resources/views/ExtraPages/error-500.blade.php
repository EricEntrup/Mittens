@include('partials._body_style')


<div class="wrapper">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm-12 text-center">
                <div class="iq-error">
                    <img src="{{ asset('assets/images/error/03.png') }}" class="img-fluid iq-error-img" alt="">
                    <h1>500</h1>
                    <h3 class="mb-0 mt-4">Oops! This Page is Not Working.</h3>
                    <p>The requested is Internal Server Error.</p>
                    <a class="btn btn-primary mt-3" href="{{ route('dashboard-1') }}"><i class="ri-home-4-line"></i>Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>

