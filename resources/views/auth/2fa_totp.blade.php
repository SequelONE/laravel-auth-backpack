@extends('layouts.app')

@section('head')
    <title>{{ trans('profile.2faTotp') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ trans('profile.2faTotp') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ trans('profile.2faTotp') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ trans('profile.2faTotp') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ trans('profile.2faTotp') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
			<div class="col-md-8">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">{{ trans('profile.2faTotp') }}</div>
                    <div class="card-body">

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <p>{{ trans('profile.2faTotpEnter') }}:</p>
                        <form class="form-horizontal" action="{{ route('totp2fa') }}" method="POST">
                            @csrf
							<div class="otp">
								<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
									<label for="code" class="control-label">{{ trans('profile.2faTotp') }}</label>
									<input id="code" name="code" class="form-control border-primary"  type="password"/>
								</div>
							</div>
                            <button class="btn btn-primary mt-3" type="submit" id="2faScratch">
                                <i class="fa-solid fa-lock"></i> {{ trans('profile.2faAuthenticate') }}
                            </button>
							<a class="btn btn-link mt-3" href="{{ route('home') }}">{{ trans('profile.2faTotp') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
