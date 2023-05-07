@extends('layouts.app')

@section('head')
    <title>{{ trans('users.user') }} {{ $user->name }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ trans('users.user') }} {{ $user->name }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ trans('users.user') }} {{ $user->name }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ trans('users.user') }} {{ $user->name }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ trans('users.user') }} {{ $user->name }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:secure_url" content="{{ asset('img/logo.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                @include('alerts.flash')
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-3">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <strong>{{ $user->name }}</strong>
                    </div>

                    <div class="card-body text-center">
                        <img src="@if($user->avatar !== NULL) {{ $user->avatar }} @else {{ Gravatar::get($user->email) }} @endif" width="200" height="200" class="img-fluid rounded-circle border border-1">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">
                        <strong>{{ trans('users.users') }}</strong>
                    </div>

                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="followers-tab" data-bs-toggle="tab" data-bs-target="#followers" type="button" role="tab" aria-controls="followers" aria-selected="true">{{ trans('users.followers') }} <span class="badge bg-primary">{{ $user->followers()->get()->count() }}</span></button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="following-tab" data-bs-toggle="tab" data-bs-target="#following" type="button" role="tab" aria-controls="following" aria-selected="false">{{ trans('users.following') }} <span class="badge bg-primary">{{ $user->followings()->get()->count() }}</span></button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                                <div class="row">
                                    @include('users.followers', ['users' => $user->followers()->with('followers')->get()])
                                </div>
                            </div>
                            <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">
                                <div class="row">
                                    @include('users.followings', ['users' => $user->followings()->with('followable')->get()])
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
    <script>
        $(document).ready(function() {
            $('.action-follow').click(function(){
                let user_id = $(this).data('id');
                let cObj = $(this);
                let followers = $(this).parent("div").find(".tl-follower").text();

                $.ajax({
                    type:'POST',
                    url:'/user/follow',
                    data:{"_token": "{{ csrf_token() }}", "user_id": user_id},
                    success: function(data) {
                        if(data.success === true){
                            cObj.find("strong").text("{{ trans('users.follow') }}");
                            cObj.parent("div").find(".tl-follower").text(parseInt(followers)-1);
                            $("div").find(".tl-following").text(parseInt(data.followings));
                        }else{
                            cObj.find("strong").text("{{ trans('users.unfollow') }}");
                            cObj.parent("div").find(".tl-follower").text(parseInt(followers)+1);
                            $("div").find(".tl-following").text(parseInt(data.followings));
                        }
                    }
                });
            });

        });
    </script>
@endsection
