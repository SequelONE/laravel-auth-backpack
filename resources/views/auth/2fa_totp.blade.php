@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
			<div class="col-md-8">
                <div class="card">
                    <div class="card-header">Two-factor authentication</div>
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

                            <p>Enter the one-time password that you received when you enable two-factor authentication:</p>
                        <form class="form-horizontal" action="{{ route('totp2fa') }}" method="POST">
                            {{ csrf_field() }}
							<div class="otp">
								<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
									<label for="code" class="control-label">One-time password</label>
									<input id="code" name="code" class="form-control col-md-4"  type="password"/>
								</div>
							</div>
                            <button class="btn btn-primary" type="submit">Authenticate</button>
							<a class="btn" href="/user/2fa">One Time Passwort</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
