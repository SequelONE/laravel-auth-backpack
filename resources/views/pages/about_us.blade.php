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
                    <div class="card-header bg-primary text-white">{{ !empty($page->name) ? $page->name : '' }}</div>

                    <div class="card-body">
                        {!! !empty($page->content) ? $page->content : '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
