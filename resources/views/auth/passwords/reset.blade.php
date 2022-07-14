@extends('layouts.app')

@section('head')
    <title>{{ trans('auth.resetPassword') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ trans('auth.resetPassword') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ trans('auth.resetPassword') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ trans('auth.resetPassword') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ trans('auth.resetPassword') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">{{ trans('auth.resetPassword') }}</div>

                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ trans('auth.email') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-at"></i></span>
                                    <input id="email" type="email" class="form-control border-primary @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ trans('auth.password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-lock"></i></span>
                                    <input id="password" minlength="8" type="password" class="form-control border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <button type="button" id="hide" class="btn btn-outline-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.showPassword') }}">
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div  class="progress" style="height: 5px;">
                                    <div id="progressbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                                    </div>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    {{ trans('auth.charactersLong') }}
                                </small>
                                <div id="feedbackin" class="valid-feedback">
                                    {{ trans('auth.strongPassword') }}
                                </div>
                                <div id="feedbackirn" class="invalid-feedback">
                                    {{ trans('auth.characters') }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ trans('auth.confirmPassword') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3" id="password-confirm-validated">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-lock"></i></span>
                                    <input id="password-confirm" type="password" class="form-control border-primary" name="password_confirmation" required autocomplete="new-password" disabled>
                                    <button type="button" class="btn btn-outline-primary" id="hideTwo" disabled>
                                        <i class="fa-solid fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="reset" disabled>
                                    {{ trans('auth.resetPassword') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
    <script>
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                let forms = document.getElementsByClassName('needs-validation');
                let validation = Array.prototype.filter.call(forms, function(form) {
                    form.password.addEventListener('keypress', function(event){
                        let checkx = true;
                        let chr = String.fromCharCode(event.which);
                        let matchedCase = [];
                        matchedCase.push("[!@#$%&*_?]");
                        matchedCase.push("[A-Z]");
                        matchedCase.push("[0-9]");
                        matchedCase.push("[a-z]");

                        for (let i = 0; i < matchedCase.length; i++) {
                            if (new RegExp(matchedCase[i]).test(chr)) {
                                checkx = false;
                            }
                        }

                        if(form.password.value.length >= 20)
                            checkx = true;

                        if ( checkx ) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                    });

                    form.password_confirmation.addEventListener('keypress', function(event){
                        let checkx = true;
                        let chr = String.fromCharCode(event.which);

                        let matchedCase = [];
                        matchedCase.push("[!@#$%&*_?]");
                        matchedCase.push("[A-Z]");
                        matchedCase.push("[0-9]");
                        matchedCase.push("[a-z]");

                        for (let i = 0; i < matchedCase.length; i++) {
                            if (new RegExp(matchedCase[i]).test(chr)) {
                                checkx = false;
                            }
                        }

                        if(form.password_confirmation.value.length >= 20)
                            checkx = true;

                        if ( checkx ) {
                            event.preventDefault();
                            event.stopPropagation();
                        }

                    });

                    let matchedCase = [];
                    matchedCase.push("[$@$$!%*#?&]");
                    matchedCase.push("[A-Z]");
                    matchedCase.push("[0-9]");
                    matchedCase.push("[a-z]");

                    form.password.addEventListener('keyup', function(){

                        let messageCase = [];
                        messageCase.push(" {{ trans('auth.specialChars') }}");
                        messageCase.push(" {{ trans('auth.upperCase') }}");
                        messageCase.push(" {{ trans('auth.numbers') }}");
                        messageCase.push(" {{ trans('auth.lowerCase') }}");

                        let ctr = 0;
                        let rti = "";
                        for (let i = 0; i < matchedCase.length; i++) {
                            if (new RegExp(matchedCase[i]).test(form.password.value)) {
                                if(i === 0) messageCase.splice(messageCase.indexOf(" {{ trans('auth.specialChars') }}"), 1);
                                if(i === 1) messageCase.splice(messageCase.indexOf(" {{ trans('auth.upperCase') }}"), 1);
                                if(i === 2) messageCase.splice(messageCase.indexOf(" {{ trans('auth.numbers') }}"), 1);
                                if(i === 3) messageCase.splice(messageCase.indexOf(" {{ trans('auth.lowerCase') }}"), 1);
                                ctr++;
                            }
                        }

                        let progressbar = 0;
                        let strength = "";
                        let bClass = "";
                        switch (ctr) {
                            case 0:
                            case 1:
                                strength = "{{ trans('auth.wayTooWeak') }}";
                                progressbar = 15;
                                bClass = "bg-danger";
                                break;
                            case 2:
                                strength = "{{ trans('auth.veryWeak') }}";
                                progressbar = 25;
                                bClass = "bg-danger";
                                break;
                            case 3:
                                strength = "{{ trans('auth.weak') }}";
                                progressbar = 34;
                                bClass = "bg-warning";
                                break;
                            case 4:
                                strength = "{{ trans('auth.medium') }}";
                                progressbar = 65;
                                bClass = "bg-warning";
                                break;
                        }

                        if (strength === "{{ trans('auth.medium') }}" && form.password.value.length >= 8 ) {
                            strength = "{{ trans('auth.strong') }}";
                            bClass = "bg-success";
                            form.password.setCustomValidity("");
                        } else {
                            form.password.setCustomValidity(strength);
                        }

                        let sometext = "";

                        if(form.password.value.length < 8 ){
                            let lengthI = 8 - form.password.value.length;
                            sometext += ` ${lengthI} {{ trans('auth.moreChars') }}, `;
                        }

                        sometext += messageCase;

                        if(sometext){
                            sometext = " {{ trans('auth.yourRequest') }}" + sometext;
                        }

                        $("#feedbackin, #feedbackirn").text(strength + sometext);
                        $("#progressbar").removeClass( "bg-danger bg-warning bg-success" ).addClass(bClass);
                        let plength = form.password.value.length ;
                        if(plength > 0) progressbar += ((plength - 0) * 1.75) ;
                        let  percentage = progressbar + "%";
                        form.password.parentNode.classList.add('was-validated');
                        $("#progressbar").width( percentage );

                        if(form.password.checkValidity() === true){
                            form.password_confirmation.disabled = false;
                            document.getElementById("hideTwo").disabled = false;
                            form.password_confirmation.classList.add('is-invalid');
                        } else {
                            form.password_confirmation.disabled = true;
                            document.getElementById("hideTwo").disabled = true;
                        }
                    });

                    form.password_confirmation.addEventListener('keyup', function(){
                        function Validate() {
                            let password = document.getElementById("password").value;
                            let confirmPassword = document.getElementById("password-confirm").value;
                            if (password !== confirmPassword) {
                                return false;
                            }
                            return true;
                        }

                        if(form.password_confirmation.checkValidity() === true && Validate() === true){
                            form.password_confirmation.parentNode.classList.add('was-validated');
                            form.reset.disabled = false;
                        } else {
                            form.reset.disabled = true;
                            let element = document.getElementById("password-confirm-validated");
                            element.classList.remove("was-validated");
                        }

                    });

                });
            }, false);
        })();

        let password = document.getElementById("password");
        let password_confirmation = document.getElementById("password-confirm");

        document.getElementById("hide").addEventListener("click", function(e){
            if(password.getAttribute("type") === "password"){
                password.setAttribute("type", "text");
            } else {
                password.setAttribute("type", "password");
            }

            $(this)
                .find('[data-fa-i2svg]')
                .toggleClass('fa-eye')
                .toggleClass('fa-eye-slash');
        });

        document.getElementById("hideTwo").addEventListener("click", function(e){
            if(password_confirmation.getAttribute("type") === "password"){
                password_confirmation.setAttribute("type", "text");
            } else {
                password_confirmation.setAttribute("type", "password");
            }

            $(this)
                .find('[data-fa-i2svg]')
                .toggleClass('fa-eye')
                .toggleClass('fa-eye-slash');
        });
    </script>
@endsection
