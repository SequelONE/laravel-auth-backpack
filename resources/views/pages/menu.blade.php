@foreach (\App\Models\MenuItem::getTree() as $page)
    <li class="nav-item">
        <a href="{{ $page->link }}" class="nav-link{{ (request()->is($page->link)) ? ' active' : '' }}" aria-current="page">{{ $page->name }}</a>
        @if ($page->children->count() > 0)
            <a href="javascript:;" class="subMenuExpand"><i class="fas fa-sort-down"></i></a>
        @endif
        <ul class="subMenu">
            @foreach ($page->children as $child)
                @include('pages.child', ['child' => $child])
            @endforeach
        </ul>
    </li>
@endforeach
