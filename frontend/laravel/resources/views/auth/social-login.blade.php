
<ul class="iq-social-media">
    @if(config('config.social_login_provider'))
        @foreach(config('config.social_login_provider') as $provider)
            @switch($provider)
                @case('facebook')
                <li><a href="{{ route('social.login', ['provider' => 'facebook']) }}"><i class="ri-facebook-box-line"></i></a></li>
                @break;
                @case('google')
                    <li><a href="{{ route('social.login', ['provider' => 'google']) }}"><i class="ri-google-line"></i></a></li>
                @break;
            @endswitch
        @endforeach
    @endif
</ul>
