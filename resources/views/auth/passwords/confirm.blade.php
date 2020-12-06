@extends('layouts.app')
@section('content')
<!-- ================ contact section start ================= -->
<section class="contact-section section_padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">{{ __('Confirm Password') }}</h2>
            </div>
            <div class="col-12">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form class="form-contact contact_form" method="POST" action="{{ route('password.confirm') }}"
                    id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password"
                                    placeholder="Please confirm your password before continuing.">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 form-group mt-3">
                            <button type="submit" class="button button-contactForm btn_1">
                                {{ __('Confirm Password') }}
                            </button>
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                            @endif
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ================ contact section end ================= -->
@endsection