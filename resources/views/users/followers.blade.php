@if($users->count() > 0)
    @foreach($users as $follower)
        @php
            $email = isset($follower->email) ? $follower->email : 'admin@sequel.one' . config('app.domain');
            $avatar = isset($follower->avatar) ? asset($follower->avatar) : asset(Gravatar::get($email));
        @endphp
        <div class="col-6 col-md-4 col-lg-3">
            <div class="border border-primary rounded-2 text-center profile-box pt-4 pb-4 mr-4 ml-4 mt-3">
                <img src="{{ $avatar }}" width="50" height="50" class="rounded-circle border border-1">
                <h5 class="m-0"><a href="{{ route('user.view', $follower->id) }}"><strong>{{ $follower->name }}</strong></a></h5>
                <p class="mb-2">
                    <small>{{ trans('users.following') }}: <span class="badge bg-primary @if(auth()->user()->id === $follower->id)tl-following @endif">{{ $follower->followings()->get()->count() }}</span></small><br />
                    <small>{{ trans('users.followers') }}: <span class="badge bg-primary tl-follower">{{ $user->followers()->get()->count() }}</span></small>
                </p>
                <button class="btn btn-outline-primary btn-sm action-follow" data-id="{{ $follower->id }}"  data-followings="{{ $user->followers()->get()->count() }}">
                    <strong>
                        @if(auth()->user()->isFollowing($follower))
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
