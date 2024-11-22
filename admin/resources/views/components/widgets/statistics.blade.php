@props(['title' => '', 'subtitle' => '', 'items' => []])

<div {{ $attributes->class(['card h-100']) }}>
    @if ($title || $subtitle)
        <div class="card-header">
            <div class="d-flex justify-content-between mb-3">
                <h5 class="card-title mb-0">{{ $title }}</h5>
                <small class="text-muted">{{ $subtitle }}</small>
            </div>
        </div>
    @endif
    <div class="card-body">
        <div class="row gy-3">

            @foreach ($items as $item)
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="badge rounded-pill bg-label-{{ $item['color'] ?? 'primary' }} me-3 p-2">
                            <i class="{{ $item['icon'] }}"></i>
                        </div>
                        <div class="card-info">
                            <h5 class="mb-0">{{ $item['count'] }}</h5>
                            <small>{{ $item['title'] }}</small>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
