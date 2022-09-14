@extends('layouts.app')

@section('head')
    <title>{{ trans('profile.2faVerify') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ trans('profile.2faVerify') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ trans('profile.2faVerify') }}}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ trans('profile.2faVerify') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ trans('profile.2faVerify') }}">
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
                    <div class="card-header bg-primary text-white">{{ trans('profile.2fa') }}</div>
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

                        <p>{{ trans('profile.2faGoogleAuthenticator') }}:</p>
                        <form class="form-horizontal" action="{{ route('2faVerify') }}" method="POST" id="sing_in_two_steps_form">
                            @csrf
							<div class="otp">
								<div class="form-group{{ $errors->has('one_time_password-code') ? ' has-error' : '' }}">
									<label for="one_time_password" class="control-label">{{ trans('profile.2faTotp') }}</label>
                                    <div class="row">
                                        <div class="col-2 col-lg-1 col-md-1">
                                            <input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control border-primary bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                                        </div>
                                        <div class="col-2 col-lg-1 col-md-1">
                                            <input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control border-primary bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                                        </div>
                                        <div class="col-2 col-lg-1 col-md-1">
                                            <input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control border-primary bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                                        </div>
                                        <div class="col-2 col-lg-1 col-md-1">
                                            <input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control border-primary bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                                        </div>
                                        <div class="col-2 col-lg-1 col-md-1">
                                            <input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control border-primary bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                                        </div>
                                        <div class="col-2 col-lg-1 col-md-1">
                                            <input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control border-primary bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                                        </div>
                                    </div>
									<input id="one_time_password" name="one_time_password" class="form-control col-md-4"  type="hidden"/>
								</div>
							</div>
                            <button class="btn btn-primary" type="submit" id="2faAuth">
                                <i class="fa-solid fa-lock"></i> {{ trans('profile.2faAuthenticate') }}
                            </button>
							<a class="btn btn-link" href="{{ route('scratch2fa') }}">{{ trans('profile.2faTotp') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        let form = document.querySelector("form#sing_in_two_steps_form");

        let input1 = form.querySelector("[name=code_1]");
        let input2 = form.querySelector("[name=code_2]");
        let input3 = form.querySelector("[name=code_3]");
        let input4 = form.querySelector("[name=code_4]");
        let input5 = form.querySelector("[name=code_5]");
        let input6 = form.querySelector("[name=code_6]");

        input1.focus();

        input1.addEventListener("keyup", function() {
            if (this.value.length === 1) {
                input2.focus();
            }
        });

        input2.addEventListener("keyup", function(e) {
            if (this.value.length === 1) {
                input3.focus();
            } else if(e.keyCode == 8) {
                input1.focus();
            }
        });

        input3.addEventListener("keyup", function(e) {
            if (this.value.length === 1) {
                input4.focus();
            } else if(e.keyCode == 8) {
                input2.focus();
            }
        });

        input4.addEventListener("keyup", function(e) {
            if (this.value.length === 1) {
                input5.focus();
            } else if(e.keyCode == 8) {
                input3.focus();
            }
        });

        input5.addEventListener("keyup", function(e) {
            if (this.value.length === 1) {
                input6.focus();
            } else if(e.keyCode == 8) {
                input4.focus();
            }
        });

        input6.addEventListener("keyup", function(e) {
            if (this.value.length === 1) {
                input6.blur();

                form.one_time_password.value = input1.value + input2.value + input3.value + input4.value + input5.value + input6.value;

                document.getElementById('2faAuth').click();
                document.getElementById('2faAuth').disabled = true;
                document.getElementById('2faAuth').innerHTML = '';
                document.getElementById('2faAuth').innerHTML += '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span class="visually-hidden">{{ trans('profile.loading') }}</span> {{ trans('profile.2faAuthenticate') }}';
            } else if(e.keyCode == 8) {
                input5.focus();
            }
        });
    </script>
@endsection
