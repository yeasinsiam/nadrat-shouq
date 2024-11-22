@props([
    'label' => '',
    'name',
    'value' => '',
    'helpText' => '',
    'placeholder' => '',

    'horizontal' => false,
    'error' => false,
    'required' => false,
    'textAreaHeight' => '55',
])
<div {{ $attributes->class(['row']) }}>
    @if ($label)
        <label for="{{ $name }}-text-field" @class(['col-md-12 form-label', 'col-md-2' => $horizontal])>{{ $label }}</label>
    @endif
    <div @class(['col-md-12', 'col-md-10' => $horizontal])>
        <div @class(['input-group input-group-merge'])>

            <textarea id="{{ $name }}-text-field" name="{{ $name }}" @class(['form-control', 'border-danger' => $error])
                placeholder="{{ $placeholder }}" style="height: {{ $textAreaHeight }}px;" @if ($required) required
                @endif autocomplete="off">{{ $value }}</textarea>

        </div>
        @if ($helpText)
            <div id="{{ $name }}-help-text" @class(['form-text', 'text-danger' => $error])>
                {{ $helpText }}
            </div>
        @endif
    </div>
</div>
