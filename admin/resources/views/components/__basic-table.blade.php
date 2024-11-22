@props([
    'headings' => [],
    'tbodyAttributes' => '',
])
<div {{ $attributes->class(['table-responsive-sm ']) }}>
    <table class="table">
        <thead>
            <tr>
                @foreach ($headings as $heading)
                    <th>{{ $heading }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody class="table-border-bottom-0" {{ $tbodyAttributes }}>
            {{ $slot }}
        </tbody>
    </table>
</div>
