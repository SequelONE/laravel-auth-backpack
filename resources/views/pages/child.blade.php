<li>
    <a class="level-{{ $child->level }}" href="{{ $child->url() }}">
        {{ $child->name }}
    </a>
    @if ($child->items)
        <ul class="subMenuExpand">
            @foreach ($child->items as $child)
                @include('pages.child', ['child' => $child])
            @endforeach
        </ul>
    @endif
</li>
