@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
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
                    Profile
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
