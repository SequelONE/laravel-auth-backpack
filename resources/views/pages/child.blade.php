<li>
    <a class="level-{{ $child->level }}" href="{{ $child->link }}">
        {{ $child->alias }}
    </a>
    @if ($child->pages)
        <ul class="subMenuExpand">
            @foreach ($child->pages as $child)
                @include('pages.child', ['child' => $child])
            @endforeach
        </ul>
    @endif
</li>
