@foreach ($items as $i => $item)
    @if($item->status === 1)
        <li class="nav-item">
            @if ($item->children->count() === 0)
                <a href="{{ $item->url() }}" class="nav-link{{ (url()->current() === $item->url()) ? ' active ' : '' }}" aria-current="page">{{ $item->name }}</a>
            @endif
            @if ($item->children->count() > 0)
                <div class="btn-group">
                    <a href="{{ $item->url() }}" class="btn{{ (url()->current() === $item->url()) ? ' btn-primary active ' : '' }}" aria-current="page">{{ $item->name }}</a>
                    <a href="#" class="btn{{ (url()->current() === $item->url()) ? ' btn-primary active ' : '' }} dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-bs-toggle="dropdown" aria-expanded="false" data-bs-reference="parent"><span class="visually-hidden">Toggle Dropdown</span></a>
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
