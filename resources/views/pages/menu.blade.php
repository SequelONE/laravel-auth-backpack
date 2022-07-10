@foreach (\App\Models\MenuItem::getTree() as $item)
    <li class="nav-item">
        <a href="{{ $item->url() }}" class="nav-link{{ (request()->is($item->url())) ? ' active' : '' }}" aria-current="page">{{ $item->name }}45345</a>
        @if ($item->children->count() > 0)
            <a href="javascript:;" class="subMenuExpand"><i class="fas fa-sort-down"></i></a>
        @endif
        <ul class="subMenu">
            @foreach ($item->children as $child)
                @include('pages.child', ['child' => $child])
            @endforeach
        </ul>
    </li>
@endforeach
