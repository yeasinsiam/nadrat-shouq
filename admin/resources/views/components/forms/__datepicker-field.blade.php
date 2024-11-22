@props([
    'label' => '',
    'name',
    'helpText' => '',
    'placeholder' => '',
    'inputSize' => null,
    'horizontal' => false,
    'error' => false,
    'value' => '',
])
@php
    $id = $name . '-switch-field';
@endphp
<div {{ $attributes->class(['row']) }}>
    @if ($label)
        <label for="{{ $id }}" @class(['col-md-12 col-form-label', 'col-md-2' => $horizontal])>{{ $label }}</label>
    @endif
    <div @class(['col-md-12', 'col-md-10' => $horizontal])>
        <div @class([
            'input-group input-group-merge',
            'input-group-' . $inputSize => $inputSize,
        ])>
            <input type="text" id="{{ $id }}" @class(['form-control', 'border-danger' => $error]) name="{{ $name }}"
                placeholder="{{ $placeholder }}" aria-describedby="{{ $name }}-help-text"
                value="{{ $value }}">
        </div>
        @if ($helpText)
            <div id="{{ $name }}-help-text" @class(['form-text', 'text-danger' => $error])>
                {{ $helpText }}
            </div>
        @endif
    </div>
</div>
@push('footer')
    <script>
        $(document).ready(() => {
            const datePickerEl = $('#{{ $id }}')
            if (datePickerEl.length) {
                datePickerEl.datepicker({
                    todayHighlight: true,
                    format: 'dd/mm/yyyy',
                    orientation: isRtl ? 'auto right' : 'auto left'
                });
            }

        })
    </script>
@endpush
