@extends('layouts.app')

@section('head')
    <style>
        .btn {
            min-width: 200px;
            text-align: left;
        }
    </style>
@endsection

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
                    <div class="card-header">{{ __('Social Providers') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <p>You can log in to social networks for easy login.</p>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2 col-12">
                                <p><strong>Google:</strong></p>
                            </div>
                            <div class="col-md-10 col-12">
                                <a href="#" class="btn btn-danger btn-block disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Google">
                                    <i class="fa-brands fa-google"></i> Login with Google
                                </a>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2 col-12">
                                <p><strong>Facebook:</strong></p>
                            </div>
                            <div class="col-md-10 col-12">
                                <a href="#" class="btn btn-outline-primary btn-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Facebook">
                                    <i class="fa-brands fa-facebook"></i> Login with Facebook
                                </a>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2 col-12">
                                <p><strong>Yandex:</strong></p>
                            </div>
                            <div class="col-md-10 col-12">
                                <a href="#" class="btn btn-warning btn-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Yandex">
                                    <i class="fa-brands fa-yandex"></i> Login with Yandex
                                </a>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2 col-12">
                                <p><strong>VK:</strong></p>
                            </div>
                            <div class="col-md-10 col-12">
                                <a href="#" class="btn btn-primary btn-block disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with VK">
                                    <i class="fa-brands fa-vk"></i> Login with VK
                                </a>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2 col-12">
                                <p><strong>Twitter:</strong></p>
                            </div>
                            <div class="col-md-10 col-12">
                                <a href="#" class="btn btn-outline-primary btn-block disabled" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with Twitter">
                                    <i class="fa-brands fa-twitter"></i> Login with Twitter
                                </a>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-2 col-12">
                                <p><strong>GitHub:</strong></p>
                            </div>
                            <div class="col-md-10 col-12">
                                <a href="#" class="btn btn-dark btn-block" data-bs-toggle="tooltip" data-bs-placement="top" title="Login with GitHub">
                                    <i class="fa-brands fa-github"></i> Login with GitHub
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascripts')
    <script>
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endsection
