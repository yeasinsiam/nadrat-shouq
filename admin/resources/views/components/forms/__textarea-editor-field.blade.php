@props([
    'id' => 'texteditor-item-' . str()->uuid(),
    'label' => '',
    'name',
    'helpText' => '',
    'placeholder' => '',
    'error' => false,
    'required' => false,
    'value' => '',
])
<div id="{{ $id }}" {{ $attributes }}>
    @if ($label)
        <label class="form-label">{{ $label }}</label>
    @endif
    <div @class(['form-control p-0 pt-1', 'border-danger' => $error])>
        <div class="comment-toolbar border-0 border-bottom">
            <div class="d-flex justify-content-start">
                <span class="ql-formats me-0">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <button class="ql-link"></button>
                    <button class="ql-image"></button>
                </span>
            </div>
        </div>
        <textarea name="{{ $name }}" data-id="textarea" class="d-none">{!! $value !!}</textarea>
        <div class="comment-editor border-0 pb-4">{!! $value !!}</div>
    </div>
    @if ($helpText)
        <div id="{{ $name }}-help-text" @class(['form-text', 'text-danger' => $error])>
            {{ $helpText }}
        </div>
    @endif
</div>

@push('footer')
    <script>
        $(document).ready(() => {
            const fieldEl = $('#{{ $id }} .comment-editor')
            if (fieldEl.length) {
                const quill = new Quill(fieldEl[0], {
                    modules: {
                        toolbar: '#{{ $id }} .comment-toolbar'
                    },
                    placeholder: "{{ $placeholder }}",
                    theme: 'snow'
                });

                quill.on('text-change', function(delta, oldDelta, source) {
                    $('#{{ $id }} [data-id="textarea"]').html(fieldEl.find('.ql-editor').html())
                });
            }

        })
    </script>
@endpush
