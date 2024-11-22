@props([
    'varient' => '',
    'color' => 'primary',
    'rounded' => false,
])
<span
    {{ $attributes->class(['badge', 'bg-' . ($varient ? $varient . '-' : '') . $color, 'rounded-pill' => $rounded]) }}>{{ $slot }}</span>
