@extends('layouts.app')

@section('head')
    <title>{{ trans('users.users') }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@sequeloneinc">
    <meta name="twitter:creator" content="@sequeloneinc">
    <meta name="twitter:title" content="{{ trans('users.users') }} | {{ config('app.name', 'Laravel') }}">
    <meta name="twitter:description" content="{{ trans('users.users') }}">
    <meta name="twitter:image" content="{{ asset('img/logo.png') }}">

    <!-- Facebook -->
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ trans('users.users') }} | {{ config('app.name', 'Laravel') }}">
    <meta property="og:description" name="description" content="{{ trans('users.users') }}">
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
            <div class="col-md-12">
                <div class="card border-primary">
                    <div class="card-header bg-primary text-white">{{ trans('users.users') }}</div>
                    <div class="card-body">
                        <div class="row">
                            @if(Auth::check() === true)
                                @include('users.list', ['users' => $users])
                            @else
                                <div class="alert alert-warning" role="alert">
                                    {{ trans('users.withoutAuth') }}
                                </div>
                            @endif
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
