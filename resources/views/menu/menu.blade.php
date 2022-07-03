@foreach (\App\Models\MenuItem::getTree() as $item)
    <li class="nav-item">
        <a href="{{ $item->url() }}" class="nav-link{{ (url()->current() === $item->url()) ? ' active' : '' }}" aria-current="page">{{ $item->name }}</a>
        @if ($item->children->count() > 0)
            <a href="javascript:;" class="subMenuExpand"><i class="fas fa-sort-down"></i></a>
        @endif
        <ul class="subMenu">
            @foreach ($item->children as $child)
                @include('menu.child', ['child' => $child])
            @endforeach
        </ul>
    </li>
@endforeach
