@extends('layouts.app')
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
