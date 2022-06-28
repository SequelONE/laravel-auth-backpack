@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4">
				<div class="card">
					<div class="card-header">{{ __('Navigation') }}</div>

					<div class="card-body">
                        @include('auth.profile.sidebar')
					</div>
				</div>
			</div>
			<div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Two-factor authentication</strong></div>
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

                        @if($data['user']->loginSecurity == null)
                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Generate Secret Key to Enable 2FA
                                    </button>
                                </div>
                            </form>
                        @elseif(!$data['user']->loginSecurity->two_factor_auth_enable)
                            <ol>
                                <li>
                                    <p>Scan this QR code with your Google Authenticator app. Alternatively, you can use the code: <code>{{ $data['secret'] }}</code></p>
                                    <p><img src="{{ $data['google2fa_url'] }}" alt="" /></p>
                                </li>
                                <li>
                                    <p>Enter the PIN from the Google Authenticator app:</p>
                                    <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                                            <label for="secret" class="control-label">Authenticator Code</label>
                                            <input id="secret" type="password" class="form-control" name="secret" required>
                                            @if ($errors->has('verify-code'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('verify-code') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary">
                                            Enable 2FA
                                        </button>
                                    </form>
                                </li>
                            </ol>
                        @elseif($data['user']->loginSecurity->two_factor_auth_enable)
                            <div class="alert alert-success">
                                2FA is currently <strong>enabled</strong> in your account.
                            </div>
                            <p>Two-factor authentication contributes to higher account security.</p>
                            <p>Two-factor authentication is <strong>enabled</strong> for your account.</p>
                            <p>If you have misplaced your one-time password or have already used it, you can reset it here.</p>
                            <form class="form-horizontal" method="POST" action="{{ route('newTotp2fa') }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary ">Create a new one-time password</button>
                            </form>
                            <hr>
                            <p>If you want to disable two-factor authentication. Please confirm your password and click the disable 2FA button.</p>
                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="change-password" class="control-label">Current Password</label>
                                    <div class="row">
                                        <div class="col-6 col-lg-9 col-md-8">
                                            <input id="current-password" type="password" class="form-control col-md-4" name="current-password" required>
                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-4">
                                            <button type="submit" class="btn btn-primary ">Disable 2FA</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
