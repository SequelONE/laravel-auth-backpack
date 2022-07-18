@extends('layouts.app')

@section('head')
    <title>{{ trans('profile.profile') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ trans('profile.profile') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ trans('profile.profile') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ trans('profile.profile') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ trans('profile.profile') }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>

    <style type="text/css">
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin-left: 15px;
            border: 1px solid red;
        }
        .modal-lg{
            max-width: 1000px !important;
        }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">{{ trans('profile.navigation') }}</div>
                <div class="card-body">
                    @include('auth.profile.sidebar')
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card border-primary">
                <div class="card-header bg-primary text-white">{{ trans('profile.profile') }}</div>

                <div class="card-body">
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3 text-center">
                                <p><img class="rounded-circle border-primary border" width="100" height="100" src="{{ Auth::user()->avatar() }}" alt="{{ Auth::user()->name }}" /></p>
                                @if(Auth::user()->avatar !== NULL)
                                    <p><a href="#" class="btn btn-outline-danger btn-sm btn-block" id="avatarDelete">{{ trans('profile.deleteAvatar') }}</a></p>
                                @endif
                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control image border-primary" value="{{ Auth::user()->avatar }}" name="avatar" id="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg border-warning">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning text-black">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ trans('profile.uploadAvatar') }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="img-container">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <img id="image" src="">
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="preview"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('profile.close') }}</button>
                                        <button type="button" class="btn btn-primary" id="crop">{{ trans('profile.crop') }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3">
                                <p><strong>{{ trans('profile.email') }}:</strong></p>
                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="email"><i class="fa-solid fa-at"></i></span>
                                    <input type="email" value="{{ Auth::user()->email }}" class="form-control border-primary" name="email" id="email" placeholder="{{ trans('profile.email') }}" aria-label="{{ trans('profile.email') }}" aria-describedby="email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3">
                                <p><strong>{{ trans('profile.name') }}:</strong></p>
                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-primary bg-primary text-white" id="name"><i class="fa-solid fa-user"></i></span>
                                    <input type="text" value="{{ Auth::user()->name }}" class="form-control border-primary" name="name" id="name" placeholder="{{ trans('profile.name') }}" aria-label="{{ trans('profile.name') }}" aria-describedby="name">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3">

                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-outline-primary">
                                        <i class="fa-solid fa-user-pen"></i> {{ trans('profile.update') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <hr class="dropdown-divider"><br />
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 col-md-3">
                            <p><strong>{{ trans('auth.resetPassword') }}:</strong></p>
                        </div>
                        <div class="col-12 col-lg-10 col-md-9">
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <input id="email" type="hidden" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" autofocus>
                                <button type="submit" class="btn btn-outline-danger">
                                    <i class="fa-solid fa-envelope"></i> {{ trans('auth.sendResetLink') }}
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <hr class="dropdown-divider"><br />
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 col-md-3">
                            <p><strong>{{ trans('auth.socialProviders') }}:</strong></p>
                        </div>
                        <div class="col-12 col-lg-10 col-md-9">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <p>{{ trans('auth.loginSocialProvider') }}</p>
                                </div>

                                <div class="col-md-1 col-2">
                                    <a href="{{ route('social.redirect','google') }}" class="btn btn-danger btn-block @if(\App\Models\SocialAccount::where('user_id', Auth::id())->where('provider_name', 'google')->first()->provider_name ?? '' === 'google') disabled @endif " data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.google') }}">
                                        <i class="fa-brands fa-google"></i>
                                    </a>
                                </div>
                                <div class="col-md-1 col-2">
                                    <a href="{{ route('social.redirect','facebook') }}" class="btn btn-outline-primary btn-block @if(\App\Models\SocialAccount::where('user_id', Auth::id())->where('provider_name', 'facebook')->first()->provider_name ?? '' === 'facebook') disabled @endif " data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.facebook') }}">
                                        <i class="fa-brands fa-facebook"></i>
                                    </a>
                                </div>
                                <div class="col-md-1 col-2">
                                    <a href="{{ route('social.redirect','yandex') }}" class="btn btn-warning btn-block @if(\App\Models\SocialAccount::where('user_id', Auth::id())->where('provider_name', 'yandex')->first()->provider_name ?? '' === 'yandex') disabled @endif " data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.yandex') }}">
                                        <i class="fa-brands fa-yandex"></i>
                                    </a>
                                </div>
                                <div class="col-md-1 col-2">
                                    <a href="{{ route('social.redirect','vkontakte') }}" class="btn btn-primary btn-block @if(\App\Models\SocialAccount::where('user_id', Auth::id())->where('provider_name', 'vkontakte')->first()->provider_name ?? '' === 'vkontakte') disabled @endif " data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.vk') }}">
                                        <i class="fa-brands fa-vk"></i>
                                    </a>
                                </div>
                                <div class="col-md-1 col-2">
                                    <a href="{{ route('social.redirect','twitter') }}" class="btn btn-outline-primary btn-block @if(\App\Models\SocialAccount::where('user_id', Auth::id())->where('provider_name', 'twitter')->first()->provider_name ?? '' === 'twitter') disabled @endif " data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.twitter') }}">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                </div>
                                <div class="col-md-1 col-2">
                                    <a href="{{ route('social.redirect','github') }}" class="btn btn-dark btn-block @if(\App\Models\SocialAccount::where('user_id', Auth::id())->where('provider_name', 'github')->first()->provider_name ?? '' === 'github') disabled @endif " data-bs-toggle="tooltip" data-bs-placement="top" title="{{ trans('auth.github') }}">
                                        <i class="fa-brands fa-github"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <hr class="dropdown-divider"><br />
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 col-md-3">
                            <p><strong>{{ trans('profile.2fa') }}:</strong></p>
                        </div>
                        <div class="col-12 col-lg-10 col-md-9">
                            <a href="{{ route('profile.2fa') }}" class="btn btn-outline-danger"><i class="fa-solid fa-key"></i> {{ trans('profile.2fa') }}</a>
                        </div>
                    </div>
                    <div class="row">
                        <hr class="dropdown-divider"><br />
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-2 col-md-3">
                            <p><strong>{{ trans('profile.lastActivity') }}:</strong></p>
                        </div>
                        <div class="col-12 col-lg-10 col-md-9">
                            <div class="alert alert-warning" role="alert">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-warning"><strong>{{ trans('profile.ipAddresses') }}:</strong></li>
                                    @foreach($sessions as $session)
                                        <li class="list-group-item list-group-item-warning">{{ $session->ip_address }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
    <script>
        var $modal = $('#modal');
        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e){
            var files = e.target.files;
            var done = function (url) {
                image.src = url;
                $modal.modal('show');
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function (e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
        $modal.on('shown.bs.modal', function () {
            cropper = new Cropper(image, {
                aspectRatio: 1/1,
                minCropBoxWidth: 200,
                minCropBoxHeight: 200,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 200,
                height: 200,
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "{{ route('profile.avatar.update') }}",
                        data: {"_token": "{{ csrf_token() }}", 'image': base64data},
                        success: function(data){
                            console.log(data);
                            $modal.modal('hide');
                            location.reload();
                        }
                    });
                }
            });
        });
        $("#avatarDelete").click(function(){
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route('profile.avatar.delete') }}",
                data: {"_token": "{{ csrf_token() }}"},
                success: function(data){
                    console.log(data);
                    location.reload();
                }
            });
        });
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    </script>
@endsection

