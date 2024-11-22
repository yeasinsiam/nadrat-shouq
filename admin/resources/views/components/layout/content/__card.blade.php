@props(['header' => '', 'body' => ''])

<div {{ $attributes->class(['card']) }}>
    @if ($header)
        <div {{ $header->attributes->class(['card-header']) }}>{{ $header }}</div>
    @endif
    {{ $slot }}
    @if ($body)
        <div {{ $body->attributes->class(['card-body']) }}>{{ $body }}</div>
    @endif
</div>
