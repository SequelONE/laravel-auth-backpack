@if($users->count())
    @foreach($users as $following)
        @php
            $email = isset($following->followable->email) ? $following->followable->email : 'admin@' . config('app.domain');
            $avatar = isset($following->followable->avatar) ? asset($following->followable->avatar) : asset(Gravatar::get($email));
        @endphp
        <div class="col-6 col-md-4 col-lg-3">
            <div class="border border-primary rounded-2 text-center profile-box pt-4 pb-4 mr-4 ml-4 mt-3">
                <img src="{{ $avatar }}" width="50" height="50" class="rounded-circle border border-1">
                <h5 class="m-0"><a href="{{ route('user.view', $following->followable->id) }}"><strong>{{ $following->followable->name }}</strong></a></h5>
                <p class="mb-2">
                    <small>{{ trans('users.following') }}: <span class="badge bg-primary @if(auth()->user()->id === $following->followable->id)tl-following @endif">{{ $following->followable->followings()->get()->count() }}</span></small><br />
                    <small>{{ trans('users.followers') }}: <span class="badge bg-primary tl-follower">{{ $following->followable->followers()->get()->count() }}</span></small>
                </p>
                <button class="btn btn-outline-primary btn-sm action-follow" data-id="{{ $following->followable->id }}"  data-followings="{{ $following->followable->followers()->get()->count() }}">
                    <strong>
                        @if(auth()->user()->isFollowing($following->followable))
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
