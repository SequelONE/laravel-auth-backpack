<li>
    <a class="dropdown-item{{ (url()->current() === $child->url()) ? ' active ' : '' }}" href="{{ LaravelLocalization::localizeUrl($child->url()) }}">
        {{ $child->title }}
    </a>
    @if ($child->children->count() !== 0)
        <ul class="submenu dropdown-menu" aria-labelledby="dropdownMenuReference">
            @foreach ($child->children as $child)
                @include('menu.child', ['child' => $child])
            @endforeach
        </ul>
    @endif
</li>
