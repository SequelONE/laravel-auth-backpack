@extends('layouts.app')

@section('head')
    <title>{{ !empty($page->meta_title) ? $page->meta_title : '' }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ !empty($page->meta_title) ? $page->meta_title : '' }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ !empty($page->meta_description) ? $page->meta_description : '' }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ !empty($page->meta_title) ? $page->meta_title : '' }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ !empty($page->meta_description) ? $page->meta_description : '' }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="keywords" content="{{ !empty($page->meta_keywords) ? $page->meta_keywords : '' }}">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">{{ !empty($page->title) ? $page->title : '' }}</div>

                    <div class="card-body">
                        {!! !empty($page->content) ? $page->content : '' !!}

                        <form method="POST" action="{{ route('contacts') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>{{ trans('mail.name') }}:</strong>
                                        <input type="text" name="name" class="form-control" placeholder="{{ trans('mail.name') }}" value="{{ old('name') }}">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>{{ trans('mail.email') }}:</strong>
                                        <input type="text" name="email" class="form-control" placeholder="{{ trans('mail.email') }}" value="{{ old('email') }}">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>{{ trans('mail.phone') }}:</strong>
                                        <input type="text" name="phone" class="form-control" placeholder="{{ trans('mail.phone') }}" value="{{ old('phone') }}">
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>{{ trans('mail.subject') }}:</strong>
                                        <input type="text" name="subject" class="form-control" placeholder="{{ trans('mail.subject') }}" value="{{ old('subject') }}">
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>{{ trans('mail.attachment') }}:</strong>
                                        <div class="input-group mb-3">
                                            <input type="file" name="files[]" class="form-control" id="files" multiple="multiple">
                                        </div>
                                        @if ($errors->has('files'))
                                            <span class="text-danger">{{ $errors->first('files') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>{{ trans('mail.message') }}:</strong>
                                        <textarea name="message" rows="3" class="form-control">{{ old('message') }}</textarea>
                                        @if ($errors->has('message'))
                                            <span class="text-danger">{{ $errors->first('message') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <strong>{{ trans('mail.captcha') }}:</strong>
                                        {!! htmlFormSnippet() !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <button class="btn btn-success btn-submit">{{ trans('mail.submit') }}</button>
                                    </div>
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
    {!! ReCaptcha::htmlScriptTagJsApi() !!}
@endsection
