@props([
    'label' => '',
    'name',
    'value' => '',
    'helpText' => '',
    'placeholder' => '',
    'inputType' => 'text',
    'inputSize' => null,
    'inputPrefix' => null,
    'inputSuffix' => null,
    'horizontal' => false,
    'error' => false,
    'required' => false,
    'min' => null,
    'max' => null,
])
<div {{ $attributes->class(['row', 'form-password-toggle' => $inputType == 'password']) }}>
    @if ($label)
        <label for="{{ $name }}-text-field" @class(['col-md-12 form-label', 'col-md-2' => $horizontal])>{{ $label }}</label>
    @endif
    <div @class(['col-md-12', 'col-md-10' => $horizontal])>
        <div @class([
            'input-group input-group-merge',
            'input-group-' . $inputSize => $inputSize,
        ])>

            @if ($inputPrefix)
                <span class="input-group-text">
                    {!! $inputPrefix !!}
                </span>
            @endif
            <input type="{{ $inputType }}" id="{{ $name }}-text-field" @class(['form-control', 'border-danger' => $error])
                name="{{ $name }}" placeholder="{{ $placeholder }}"
                aria-describedby="{{ $name }}-help-text" @if ($required)
            required
            @endif
            @if ($min)
                min="{{ $min }}"
            @endif
            @if ($max)
                max="{{ $max }}"
            @endif
            @if ($value)
                value="{{ $value }}"
            @endif
            autocomplete="off"
            >

            @if ($inputSuffix)
                <span class="input-group-text">
                    {!! $inputSuffix !!}
                </span>
            @endif
            @if ($inputType == 'password')
                <span class="input-group-text">
                    <i class="ti ti-eye-off"></i>
                </span>
            @endif

        </div>
        @if ($helpText)
            <div id="{{ $name }}-help-text" @class(['form-text', 'text-danger' => $error])>
                {{ $helpText }}
            </div>
        @endif
    </div>
</div>
