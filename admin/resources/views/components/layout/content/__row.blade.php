@props(['gap' => '3'])
<div {{ $attributes->class(['row', 'g-' . $gap => $gap]) }}>
    {{ $slot }}
</div>
