@props(['items'])
<h4 {{ $attributes->class('m-0') }}>
    @if (count($items) > 1)
        @foreach ($items as $item)
            @if (!$loop->last)
                <a href="{{ $item['link'] ?? false ? $item['link'] : 'javascript:void(0)' }}"
                    class="text-muted fw-light">{{ $item['title'] }} /</a>
            @else
                {{ $item['title'] }}
            @endif
        @endforeach
    @else
        {{ $items[0]['title'] }}
    @endif

</h4>
