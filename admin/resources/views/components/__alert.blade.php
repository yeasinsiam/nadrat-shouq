@props([
    'color' => 'primary',
    'dismissible' => true,
])
<div {{ $attributes->class(['alert', 'alert-' . $color, 'alert-dismissible' => $dismissible]) }} role="alert">
    {{ $slot }}
    @if ($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
