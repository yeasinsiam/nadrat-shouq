@props([
    'label' => '',
    'name',
    'helpText' => '',
    'swichSize' => null,
    'error' => false,
    'checked' => false,
    'required' => false,
])
<div {{ $attributes->class(['row']) }}>
    <div @class(['col-md-12'])>
        <label id="{{ $name }}-switch-field" @class(['switch', 'switch-' . $swichSize => $swichSize])>

            <input type="checkbox" @class(['switch-input']) name="{{ $name }}"
                @if ($checked) checked @endif @if ($required) required @endif />
            <span class="switch-toggle-slider"
                @if ($error) style="border-color:var(--bs-red) !important;" @endif>
                <span class="switch-on"><i class="ti ti-check"></i></span>
                <span class="switch-off">
                    <i class="ti ti-x"></i>
                </span>
            </span>
            @if ($label)
                <span @class(['switch-label', 'text-danger' => $error])>{{ $label }}</span>
            @endif
        </label>
        @if ($helpText)
            <div id="{{ $name }}-help-text" @class(['form-text', 'text-danger' => $error])>
                {{ $helpText }}
            </div>
        @endif
    </div>
</div>
