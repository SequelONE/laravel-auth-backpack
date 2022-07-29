@extends('layouts.app')

@section('head')
    <title>{{ trans('profile.2faSettings') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ trans('profile.2faSettings') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ trans('profile.2faSettings') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ trans('profile.2faSettings') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ trans('profile.2faSettings') }}">
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
            <div class="col-md-3">
				<div class="card border-primary mb-3">
					<div class="card-header bg-primary text-white">{{ trans('profile.navigation') }}</div>

					<div class="card-body">
                        @include('auth.profile.sidebar')
					</div>
				</div>
			</div>
			<div class="col-md-9">
                <div class="card border-primary mb-3">
                    <div class="card-header bg-primary text-white"><strong>{{ trans('profile.2fa') }}</strong></div>
                    <div class="card-body">
                        @if($data['user']->loginSecurity === null)
                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-key"></i> {{ trans('profile.2faGenerate') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @elseif(!$data['user']->loginSecurity->google2fa_enable)
                            <ol>
                                <li>
                                    <p>{{ trans('profile.2faScanQRCode') }}:</p>
                                    <div class="alert alert-warning" role="alert">
                                        <i class="fa-solid fa-circle-check"></i><code style="padding-left: 10px;">{{ $data['secret'] }}</code>
                                    </div>
                                    <p><img src="{{ $data['google2fa_url'] }}" alt="" /></p>
                                </li>
                                <li>
                                    <p>{{ trans('profile.2faEnterPIN') }}:</p>
                                    <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-12 col-lg-12">
                                                <label for="secret" class="control-label"><strong>{{ trans('profile.2faAuthenticatorCode') }}</strong></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8 col-lg-9">
                                                <div class="form-group{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                                                    <input id="secret" type="text" class="form-control border-primary" name="secret" required>
                                                    @if ($errors->has('verify-code'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('verify-code') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-4 col-lg-3">
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-primary" id="2fa-enable">
                                                        <i class="fa-solid fa-lock"></i> {{ trans('profile.2faEnable') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ol>
                        @elseif($data['user']->loginSecurity->google2fa_enable)
                            <div class="alert alert-success">
                                {!! trans('profile.2faEnableInAccount') !!}
                            </div>
                            <p>{{ trans('profile.2faAccountSecurity') }}</p>
                            <p>{!! trans('profile.2faEnabledAccount') !!}</p>
                            <p>{{ trans('profile.canResetHere') }}</p>
                            <form class="form-horizontal" method="POST" action="{{ route('newTotp2fa') }}">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-primary ">{{ trans('profile.createNewOTP') }}</button>
                            </form>
                            <hr>
                            <p>{{ trans('profile.passwordConfirm') }}</p>
                            <form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <label for="change-password" class="control-label"><strong>{{ trans('profile.passwordCurrent') }}</strong></label>
                                    <div class="row">
                                        <div class="col-6 col-lg-9 col-md-8">
                                            <input id="current-password" type="password" class="form-control col-md-4 border-primary" name="current-password" required>
                                            @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-6 col-lg-3 col-md-4">
                                            <div class="d-grid gap-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa-solid fa-unlock"></i> {{ trans('profile.2faDisable') }}
                                                </button>
                                            </div>
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

@section('javascripts')
    <script>
        function inputFloat() {
            this.value = this.value.replace (/[^0-9]/g, '');
            if (!/^\.?$/.test(this.value) && !isFinite(this.value)) {
                this.value = parseFloat(this.value) || this.value.slice(0, -1);
            }
            (this.value < 1 || this.value > 999999) && (this.value = '');
        }
        secret.oninput = secret.onkeydown = inputFloat;

        document.querySelector('input[name=secret]').addEventListener('keyup', function(e) {
            if (this.value.length === 6) {
                document.getElementById('2fa-enable').click();
                document.getElementById('2fa-enable').disabled = true;
                document.getElementById('2fa-enable').innerHTML = '';
                document.getElementById('2fa-enable').innerHTML += '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">{{ trans('profile.loading') }}</span> {{ trans('profile.2faEnable') }}';
            }
        });
    </script>
@endsection
