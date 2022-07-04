@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-12">
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
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
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3">
                                <p><img src="{{ Auth::user()->avatar() }}" alt="{{ Auth::user()->name }}" /></p>
                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="avatar" placeholder="E-mail" id="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3">
                                <p><strong>E-mail:</strong></p>
                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="email"><i class="fa-solid fa-at"></i></span>
                                    <input type="email" value="{{ Auth::user()->email }}" class="form-control" name="email" id="email" placeholder="E-mail" aria-label="E-mail" aria-describedby="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3">
                                <p><strong>Name:</strong></p>
                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="name"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" id="name" placeholder="Name" aria-label="Name" aria-describedby="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3">

                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-outline-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-12 col-lg-2 col-md-3">
                            <p><strong>{{ __('Reset Password') }}:</strong></p>
                        </div>
                        <div class="col-12 col-lg-10 col-md-9">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>
                                    <button type="submit" class="btn btn-outline-danger">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
