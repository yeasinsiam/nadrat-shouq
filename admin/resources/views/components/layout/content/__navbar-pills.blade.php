@props([
    'items' => [],
])

<div {{ $attributes->class(['row']) }}>
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
            @foreach ($items as $item)
                <li class="nav-item">
                    <a @class(['nav-link', 'active' => $item['isActive']]) href="{{ $item['href'] }}"><i class="ti ti-user-check ti-xs me-1"></i>
                        {{ $item['title'] }}</a>
                </li>
            @endforeach

        </ul>
    </div>
</div>
