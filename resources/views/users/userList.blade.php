@if($users->count())
        @foreach($users as $user)
            <div class="col-6 col-md-2">
                <div class="border border-primary rounded-2 text-center profile-box pt-4 pb-4 mr-4 ml-4 mt-3">
                    <img src="@if($user->avatar !== NULL) {{ $user->avatar }} @else {{ Gravatar::get($user->email) }} @endif" width="50" height="50" class="rounded-circle border border-1">
                    <h5 class="m-0"><a href="{{ route('user.view', $user->id) }}"><strong>{{ $user->name }}</strong></a></h5>
                    <p class="mb-2">
                        <small>{{ trans('users.following') }}: <span class="badge bg-primary">{{ $user->followings()->get()->count() }}</span></small><br />
                        <small>{{ trans('users.followers') }}: <span class="badge bg-primary tl-follower">{{ $user->followers()->get()->count() }}</span></small>
                    </p>
                    <button class="btn btn-outline-primary btn-sm action-follow" data-id="{{ $user->id }}">
                        <strong>
                            @if(auth()->user()->isFollowing($user))
                                {{ trans('users.unfollow') }}
                            @else
                                {{ trans('users.follow') }}
                            @endif
                        </strong>
                    </button>
                </div>
            </div>
        @endforeach
@endif
