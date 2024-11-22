@props(['sm' => 12, 'lg' => null])


<div {{ $attributes->class(['col-sm-' . $sm, 'col-lg-' . $lg => $lg]) }}>
    {{ $slot }}
</div>
