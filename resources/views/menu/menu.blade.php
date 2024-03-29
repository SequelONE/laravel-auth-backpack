@foreach ($items as $i => $item)
    @if($item->status === 1)
        <li class="nav-item">
            @if ($item->children->count() === 0)
                <a href="{{ LaravelLocalization::localizeUrl($item->url()) }}" class="nav-link{{ (url()->current() === $item->url()) ? ' active ' : '' }}" aria-current="page">{{ $item->title }}</a>
            @endif
            @if ($item->children->count() > 0)
                <div class="btn-group">
                    <a href="{{ LaravelLocalization::localizeUrl($item->url()) }}" class="btn @if(url()->current() === $item->url()) btn-primary active @endif " aria-current="page">{{ $item->title }}</a>
                    <a href="#" class="btn @if(url()->current() === LaravelLocalization::localizeUrl($item->url())) btn-primary active @endif dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent"><span class="visually-hidden">Toggle Dropdown</span></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                        @foreach ($item->children as $child)
                            @include('menu.child', ['child' => $child])
                        @endforeach
                    </ul>
                </div>
            @endif
        </li>
    @endif
@endforeach
