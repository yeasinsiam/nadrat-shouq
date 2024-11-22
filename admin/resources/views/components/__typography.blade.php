@props([
    'component' => 'p',
    'medium' => false,
    'muted' => false,
])

<{{ $component }} {{ $attributes->class(['fw-medium' => $medium, 'text-light' => $muted]) }}>
    {{ $slot }}
    </{{ $component }}>
