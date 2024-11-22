@props([
    'gap' => 2,
    'wrap' => false,
])



<div {{ $attributes->class(['d-flex', 'gap-' . $gap, 'flex-wrap' => $wrap]) }}>
    {{ $slot }}
</div>

{{--

@props([
    'gap' => 2,
    'gapLg' => null,

    'wrap' => true,
    'noWrap' => false,
    'wrapLg' => null,
])



<div
    {{ $attributes->class([
        'd-flex',

        'gap-' . $gap,
        'gap-lg-' . $gapLg => $gapLg,

        'flex-wrap' => $wrap,

        'flex-lg-wrap' => $wrapLg != null && $wrapLg,
        'flex-lg-nowrap' => $wrapLg != null && !$wrapLg,
    ]) }}>
    {{ $slot }}
</div> --}}
