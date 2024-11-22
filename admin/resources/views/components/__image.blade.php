@props(['src', 'alt' => ''])
<img {{ $attributes->class(['img-fluid  rounded']) }} src="{{ $src }}" alt="{{ $alt }}" />
