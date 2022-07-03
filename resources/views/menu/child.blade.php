<li>
    <a class="dropdown-item{{ (url()->current() === $child->url()) ? ' active ' : '' }}" href="{{ $child->url() }}">
        {{ $child->name }}
    </a>
    @if ($child->items)
        <ul class="submenu dropdown-menu">
            @foreach ($child->item as $child)
                @include('menu.child', ['child' => $child])
            @endforeach
        </ul>
    @endif
</li>
