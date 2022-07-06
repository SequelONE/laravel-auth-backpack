@extends('layouts.app')

@section('head')
    <title>{{ __('Reset Password') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ __('Reset Password') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ __('Reset Password') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="https://getbootstrap.com/docs/4.2/examples/">
    <meta property="og:title" content="{{ __('Reset Password') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ __('Reset Password') }}">
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
                <div class="card-header bg-primary text-white">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-at"></i></span>
                                    <input id="email" type="email" class="form-control border-primary @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-lock"></i></span>
                                    <input id="password" minlength="8" type="password" class="form-control border-primary @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                </div>
                                <div  class="progress" style="height: 5px;">
                                    <div id="progressbar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                                    </div>
                                </div>
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Your password must be 8-20 characters long,  must contain special characters "!@#$%&*_?", numbers, lower and upper letters only.
                                </small>
                                <div id="feedbackin" class="valid-feedback">
                                    Strong Password!
                                </div>
                                <div id="feedbackirn" class="invalid-feedback">
                                    Atlead 8 characters,
                                    Number, special character
                                    Caplital Letter and Small letters
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-lock"></i></span>
                                    <input id="password-confirm" minlength="8" type="password" class="form-control border-primary" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div  class="progress" style="height: 5px;">
                                    <div id="progressbar2" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">

                                    </div>
                                </div>
                                <div id="feedbackin" class="valid-feedback">
                                    Strong Password!
                                </div>
                                <div id="feedbackirn" class="invalid-feedback">
                                    Atlead 8 characters,
                                    Number, special character
                                    Caplital Letter and Small letters
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" id="reset" disabled>
                                    {{ __('Reset Password') }}
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
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                let forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                let validation = Array.prototype.filter.call(forms, function(form) {
                    // making sure password enters the right characters
                    form.password.addEventListener('keypress', function(event){
                        console.log("keypress");
                        console.log("event.which: " + event.which);
                        let checkx = true;
                        let chr = String.fromCharCode(event.which);
                        console.log("char: " + chr);


                        let matchedCase = [];
                        matchedCase.push("[!@#$%&*_?]"); // Special Charector
                        matchedCase.push("[A-Z]");      // Uppercase Alpabates
                        matchedCase.push("[0-9]");      // Numbers
                        matchedCase.push("[a-z]");

                        for (let i = 0; i < matchedCase.length; i++) {
                            if (new RegExp(matchedCase[i]).test(chr)) {
                                console.log("checkx: is true");
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
                        console.log("keypress");
                        console.log("event.which: " + event.which);
                        let checkx = true;
                        let chr = String.fromCharCode(event.which);
                        console.log("char: " + chr);


                        let matchedCase = [];
                        matchedCase.push("[!@#$%&*_?]"); // Special Charector
                        matchedCase.push("[A-Z]");      // Uppercase Alpabates
                        matchedCase.push("[0-9]");      // Numbers
                        matchedCase.push("[a-z]");

                        for (let i = 0; i < matchedCase.length; i++) {
                            if (new RegExp(matchedCase[i]).test(chr)) {
                                console.log("checkx: is true");
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

                    //Validate Password to have more than 8 Characters and A capital Letter, small letter, number and special character
                    // Create an array and push all possible values that you want in password
                    let matchedCase = [];
                    matchedCase.push("[$@$$!%*#?&]"); // Special Charector
                    matchedCase.push("[A-Z]");      // Uppercase Alpabates
                    matchedCase.push("[0-9]");      // Numbers
                    matchedCase.push("[a-z]");     // Lowercase Alphabates

                    form.password.addEventListener('keyup', function(){

                        let messageCase = [];
                        messageCase.push(" Special Charector"); // Special Charector
                        messageCase.push(" Upper Case");      // Uppercase Alpabates
                        messageCase.push(" Numbers");      // Numbers
                        messageCase.push(" Lower Case");     // Lowercase Alphabates

                        let ctr = 0;
                        let rti = "";
                        for (let i = 0; i < matchedCase.length; i++) {
                            if (new RegExp(matchedCase[i]).test(form.password.value)) {
                                if(i === 0) messageCase.splice(messageCase.indexOf(" Special Charector"), 1);
                                if(i === 1) messageCase.splice(messageCase.indexOf(" Upper Case"), 1);
                                if(i === 2) messageCase.splice(messageCase.indexOf(" Numbers"), 1);
                                if(i === 3) messageCase.splice(messageCase.indexOf(" Lower Case"), 1);
                                ctr++;
                                //console.log(ctr);
                                //console.log(rti);
                            }
                        }

                        //console.log(rti);
                        // Display it
                        let progressbar = 0;
                        let strength = "";
                        let bClass = "";
                        switch (ctr) {
                            case 0:
                            case 1:
                                strength = "Way too Weak";
                                progressbar = 15;
                                bClass = "bg-danger";
                                break;
                            case 2:
                                strength = "Very Weak";
                                progressbar = 25;
                                bClass = "bg-danger";
                                break;
                            case 3:
                                strength = "Weak";
                                progressbar = 34;
                                bClass = "bg-warning";
                                break;
                            case 4:
                                strength = "Medium";
                                progressbar = 65;
                                bClass = "bg-warning";
                                break;
                        }

                        if (strength === "Medium" && form.password.value.length >= 8 ) {
                            strength = "Strong";
                            bClass = "bg-success";
                            form.password.setCustomValidity("");
                        } else {
                            form.password.setCustomValidity(strength);
                        }

                        let sometext = "";

                        if(form.password.value.length < 8 ){
                            let lengthI = 8 - form.password.value.length;
                            sometext += ` ${lengthI} more Characters, `;
                        }

                        sometext += messageCase;
                        console.log(sometext);

                        console.log(sometext);

                        if(sometext){
                            sometext = " You Need" + sometext;
                        }

                        $("#feedbackin, #feedbackirn").text(strength + sometext);
                        $("#progressbar").removeClass( "bg-danger bg-warning bg-success" ).addClass(bClass);
                        let plength = form.password.value.length ;
                        if(plength > 0) progressbar += ((plength - 0) * 1.75) ;
                        //console.log("plength: " + plength);
                        let  percentage = progressbar + "%";
                        form.password.parentNode.classList.add('was-validated');
                        //console.log("pacentage: " + percentage);
                        $("#progressbar").width( percentage );

                        if(form.password.checkValidity() === true){
                            form.reset.disabled = false;
                            form.password_confirmation.disabled = false;
                        } else {
                            form.reset.disabled = true;
                            form.password_confirmation.disabled = true;
                        }



                    });

                    form.password_confirmation.addEventListener('keyup', function(){

                        let messageCase = [];
                        messageCase.push(" Special Charector"); // Special Charector
                        messageCase.push(" Upper Case");      // Uppercase Alpabates
                        messageCase.push(" Numbers");      // Numbers
                        messageCase.push(" Lower Case");     // Lowercase Alphabates

                        let ctr = 0;
                        let rti = "";
                        for (let i = 0; i < matchedCase.length; i++) {
                            if (new RegExp(matchedCase[i]).test(form.password_confirmation.value)) {
                                if(i === 0) messageCase.splice(messageCase.indexOf(" Special Charector"), 1);
                                if(i === 1) messageCase.splice(messageCase.indexOf(" Upper Case"), 1);
                                if(i === 2) messageCase.splice(messageCase.indexOf(" Numbers"), 1);
                                if(i === 3) messageCase.splice(messageCase.indexOf(" Lower Case"), 1);
                                ctr++;
                                //console.log(ctr);
                                //console.log(rti);
                            }
                        }

                        //console.log(rti);
                        // Display it
                        let progressbar2 = 0;
                        let strength = "";
                        let bClass2 = "";
                        switch (ctr) {
                            case 0:
                            case 1:
                                strength = "Way too Weak";
                                progressbar2 = 15;
                                bClass2 = "bg-danger";
                                break;
                            case 2:
                                strength = "Very Weak";
                                progressbar2 = 25;
                                bClass2 = "bg-danger";
                                break;
                            case 3:
                                strength = "Weak";
                                progressbar2 = 34;
                                bClass2 = "bg-warning";
                                break;
                            case 4:
                                strength = "Medium";
                                progressbar2 = 65;
                                bClass2 = "bg-warning";
                                break;
                        }

                        if (strength === "Medium" && form.password_confirmation.value.length >= 8 ) {
                            strength = "Strong";
                            bClass2 = "bg-success";
                            form.password_confirmation.setCustomValidity("");
                        } else {
                            form.password_confirmation.setCustomValidity(strength);
                        }

                        let sometext = "";

                        if(form.password_confirmation.value.length < 8 ){
                            let lengthI = 8 - form.password_confirmation.value.length;
                            sometext += ` ${lengthI} more Characters, `;
                        }

                        sometext += messageCase;
                        console.log(sometext);

                        console.log(sometext);

                        if(sometext){
                            sometext = " You Need" + sometext;
                        }

                        $("#feedbackin, #feedbackirn").text(strength + sometext);
                        $("#progressbar2").removeClass( "bg-danger bg-warning bg-success" ).addClass(bClass2);
                        let plength = form.password_confirmation.value.length ;
                        if(plength > 0) progressbar2 += ((plength - 0) * 1.75) ;
                        //console.log("plength: " + plength);
                        let  percentage = progressbar2 + "%";
                        form.password_confirmation.parentNode.classList.add('was-validated');
                        //console.log("pacentage: " + percentage);
                        $("#progressbar2").width( percentage );

                        function Validate() {
                            let password = document.getElementById("password").value;
                            let confirmPassword = document.getElementById("password-confirm").value;
                            if (password !== confirmPassword) {
                                return false;
                            }
                            return true;
                        }

                        if(form.password.checkValidity() === true){
                            form.reset.disabled = false;
                        } else {
                            form.reset.disabled = true;
                        }

                        Validate();

                    });

                });
            }, false);
        })();
    </script>
@endsection
