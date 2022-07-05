@extends('layouts.app')

@section('head')
    <title>Second | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="Second | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="Second">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="https://getbootstrap.com/docs/4.2/examples/">
    <meta property="og:title" content="Second | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="Second">
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
                <div class="card">
                    <div class="card-header">{{ !empty($page->name) ? $page->name : '' }}</div>

                    <div class="card-body">
                        {!! !empty($page->content) ? $page->content : '' !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
