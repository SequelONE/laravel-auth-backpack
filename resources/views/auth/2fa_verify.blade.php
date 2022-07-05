@extends('layouts.app')

@section('head')
    <title>{{ __('2FA Verify') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ __('2FA Verify') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ __('2FA Verify') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="https://getbootstrap.com/docs/4.2/examples/">
    <meta property="og:title" content="{{ __('2FA Verify') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ __('2FA Verify') }}">
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
                <div class="card">
                    <div class="card-header">Two-factor authentication</div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <p>Enter the PIN from the Google Authenticator app:</p>
                        <form class="form-horizontal" action="{{ route('2faVerify') }}" method="POST">
                            {{ csrf_field() }}
							<div class="otp">
								<div class="form-group{{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">
									<label for="one_time_password" class="control-label">One Time Password</label>
									<input id="one_time_password" name="one_time_password" class="form-control col-md-4"  type="text"/>
								</div>
							</div>
                            <button class="btn btn-primary" type="submit">Authenticate</button>
							<a class="btn" href="/user/2fa/scratch">One-time password</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
