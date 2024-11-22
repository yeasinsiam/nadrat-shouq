@props([
    'id' => str()->uuid(),
    'type' => 'button',
    'href' => 'javascript:void(0)',
    'varient' => '',
    'color' => 'primary',
    'rounded' => false,
    'icon' => false,
    'confirmableAciton' => false,
    'confirmableTitle' => '',
    'confirmableDesc' => '',
    'size' => '',
    'name' => '',
])

@php
    $component = $type == 'link' ? 'a' : 'button';
    $isSubmitConfirmableAction = $confirmableAciton && $type == 'submit';
@endphp


@if ($isSubmitConfirmableAction)
    <input id="{{ $id }}-submit" type="submit" name="{{ $name }}" class="d-none" />
@endif


<{{ $component }} id="{{ $id }}"
    @if ($component == 'a') {{ 'href=' . $href }} @elseif ($isSubmitConfirmableAction) {{ 'type=button' }} @else {{ 'type=' . $type }} @endif
    {{-- {{ $component == 'a' ? 'href=' . $href : ($isSubmitConfirmableAction ? 'type=button' : 'type=' . $type) }} --}}
    {{ $attributes->class(['btn', 'btn-' . $size => $size, 'btn-' . ($varient ? $varient . '-' : '') . $color, 'rounded-pill' => $rounded, 'btn-icon' => $icon]) }}
    @if ($name) name="{{ $name }}" @endif>
    {{ $slot }}</{{ $component }}>


    @if ($confirmableAciton)
        @push('footer')
            <script>
                $(document).ready(() => {
                    $(`#{{ $id }}`).click((e) => {
                        e.preventDefault();
                        Swal.fire({
                            title: `{{ $confirmableTitle }}`,
                            text: `{{ $confirmableDesc }}`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                            customClass: {
                                confirmButton: 'btn btn-primary me-3',
                                cancelButton: 'btn btn-label-secondary'
                            },
                            buttonsStyling: false
                        }).then(function(result) {
                            if (result.isConfirmed) {
                                @if ($isSubmitConfirmableAction)
                                    $('#{{ $id }}-submit').trigger('click');
                                @else
                                    window.location = `{{ $href }}`
                                @endif
                            }
                        });
                    })
                })
            </script>
        @endpush
    @endif
