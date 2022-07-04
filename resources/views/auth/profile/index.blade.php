@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>

    <style type="text/css">
        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
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
                        <div class="row">
                            <div class="col-12 col-lg-2 col-md-3">
                                <p><img class="rounded-circle border border-1" src="{{ Auth::user()->avatar() }}" alt="{{ Auth::user()->name }}" /></p>
                            </div>
                            <div class="col-12 col-lg-10 col-md-9">
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control image" name="avatar" placeholder="Avatar" id="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Upload avatar</h5>
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
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="crop">Crop</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
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
                        <hr class="dropdown-divider"><br />
                    </div>
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
                minCropBoxWidth: 100,
                minCropBoxHeight: 100,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function () {
            cropper.destroy();
            cropper = null;
        });
        $("#crop").click(function(){
            canvas = cropper.getCroppedCanvas({
                width: 100,
                height: 100,
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
                            alert("Crop image successfully uploaded");
                        }
                    });
                }
            });
        })
    </script>
@endsection
