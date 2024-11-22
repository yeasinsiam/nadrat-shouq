@props([
    'label' => '',
    'name',
    'helpText' => '',
    'inputSize' => null,
    'horizontal' => false,
    'error' => false,
    'accept' => '',
    'multiple' => false,
])
<div {{ $attributes->class(['row']) }}>
    @if ($label)
        <label for="{{ $name }}-file-field" @class(['col-md-12 col-form-label', 'col-md-2' => $horizontal])>{{ $label }}</label>
    @endif
    <div @class(['col-md-12', 'col-md-10' => $horizontal])>
        <div @class(['input-group', 'input-group-' . $inputSize => $inputSize])>


            <input type="file" id="{{ $name }}-file-field" @class(['form-control', 'border-danger' => $error])
                name="{{ $name }}" aria-describedby="{{ $name }}-help-text" @if ($accept)
            accept="{{ $accept }}"
            @endif @if ($multiple)
                multiple
            @endif />



        </div>
        @if ($helpText)
            <div id="{{ $name }}-help-text" @class(['form-text', 'text-danger' => $error])>
                {{ $helpText }}
            </div>
        @endif
    </div>
</div>
