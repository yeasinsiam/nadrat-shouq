@props([
    'id' => str()->uuid(),
    'name' => 'mediaStore',
    'media' => null,
    'multiple' => false,
    'accept' => '',
    'additional_fields' => [],
    'error' => false,
    'helpText' => '',
    'label' => '',
    'previewFileWidth' => 100,
    'previewFileHeight' => 100,
    'isRoundedPreviewFile' => false,
    'fileItemMinWidth' => 800,
])
@php
    if ($media && !$media instanceof Illuminate\Database\Eloquent\Collection) {
        $media = collect([$media]);
    }
@endphp


<div id="{{ $id }}" class="rich-file-filed ">
    @if ($label)
        <div class="form-label">
            {{ $label }}
        </div>
    @endif
    <div data-id="files-table" class="table-responsive text-nowrap mb-2">
        <table class="table table-bordered" style="min-width: {{ $fileItemMinWidth }}px">
            <tbody data-id="file-items" class="table-border-bottom-0"></tbody>
        </table>
    </div>

    <label data-id="file-upload-btn" tabindex="-1" @class([
        'py-4 px-4 border  border-2 border-dashed rounded d-flex gap-2 cursor-pointer d-block w-100',
        'border-danger text-danger' => $error,
    ]) @if ($accept)
        accept="{{ $accept }}"
        @endif>
        <i class="ti ti-cloud-upload"></i>
        <span>Drop file here or click to upload. </span>
        <input type="file" class="d-none" @if ($accept) accept="{{ $accept }}" @endif
            @if ($multiple) multiple @endif />
    </label>
    @if ($helpText)
        <div id="{{ $name }}-help-text" @class(['form-text', 'text-danger' => $error])>
            {{ $helpText }}
        </div>
    @endif
</div>

@push('footer')
    <script>
        $(document).ready(() => {
            const containerEl = $('#{{ $id }}');
            const fileUploadBtnEl = containerEl.find('[data-id="file-upload-btn"]')
            const fileUploadInputEl = fileUploadBtnEl.find('input[type="file"]')
            const filesTableEl = containerEl.find('[data-id="files-table"]')
            const filesTableBodyListEl = filesTableEl.find('[data-id="file-items"]')


            // Init
            Sortable.create(filesTableEl.find('tbody')[0], {
                animation: 150,
                group: 'taskList',
                handle: '.drag-handle'
            });


            // Actions
            const isImageFile = (file) => {
                return file.type.startsWith('image/');
            }
            const getPreviewImageURL = (file) => {
                return new Promise((resolve, reject) => {
                    const reader = new FileReader();

                    reader.onload = (event) => {
                        resolve(event.target.result);
                    };

                    reader.onerror = (event) => {
                        reject(event.target.error);
                    };

                    reader.readAsDataURL(file);
                });
            }
            const getUUID = () => {
                const timestamp = new Date().getTime();
                const randomNum = Math.random() * 1000000000000000000; // Adjust the range as needed
                const uuid = `${timestamp}${randomNum}`;

                return uuid;
            }
            const getFileSize = (file) => {
                const fileSizeInBytes = file.size;
                let fileSize, unit;

                if (fileSizeInBytes < 1024) {
                    fileSize = fileSizeInBytes;
                    unit = 'B';
                } else if (fileSizeInBytes < 1024 * 1024) {
                    fileSize = (fileSizeInBytes / 1024).toFixed(2);
                    unit = 'KB';
                } else {
                    fileSize = (fileSizeInBytes / (1024 * 1024)).toFixed(2);
                    unit = 'MB';
                }

                return fileSize + ' ' + unit;
            }

            const getFileItemHtml = (previewUrl, fileExtension, fileSize, fileName,
                fileOriginalName, additionalFieldValues = null) => {
                const id = `file-item-${getUUID()}`
                return ` <tr data-id="${ id }" data-select="file-item">
                                @if ($multiple)
                                    <td class="drag-handle cursor-pointer border-0 border-start px-3" style="background-color: #f4f4f5; width: 50px;"><i
                                            class="ti ti-arrows-sort "></i>
                                    </td>
                                @endif
                                <td class="border-0 @if (!$multiple) border-start @endif">
                                    ${ previewUrl ? `<img class="img-fluid d-flex mx-auto rounded"
                                                                                                                                                                                                                style="width: {{ $previewFileWidth }}px; height: {{ $previewFileHeight }}px;object-fit:cover;"
                                                                                                                                                                                                                src="${previewUrl}"
                                                                                                                                                                                                                />` :
                                            `<div class="d-flex justify-content-center position-relative">
                                                                                                                                                                                                            <svg style="width: {{ $previewFileWidth }}px; height: {{ $previewFileHeight }}px;" xmlns="http://www.w3.org/2000/svg"
                                                                                                                                                                                                                data-name="Layer 1" viewBox="0 0 24 24" x="0px" y="0px"
                                                                                                                                                                                                                transform="matrix(1, 0, 0, 1, 0, 0)">
                                                                                                                                                                                                                <path
                                                                                                                                                                                                                    d="M6,22.5H18A2.50294,2.50294,0,0,0,20.5,20V7.82861a2.48418,2.48418,0,0,0-.73242-1.76806L15.93945,2.23242A2.48418,2.48418,0,0,0,14.17139,1.5H6A2.50294,2.50294,0,0,0,3.5,4V20A2.50294,2.50294,0,0,0,6,22.5ZM14.5,2.539a1.49048,1.49048,0,0,1,.73242.40045l3.82813,3.82813A1.49048,1.49048,0,0,1,19.461,7.5H16A1.50164,1.50164,0,0,1,14.5,6ZM4.5,4A1.50164,1.50164,0,0,1,6,2.5h7.5V6A2.50294,2.50294,0,0,0,16,8.5h3.5V20A1.50164,1.50164,0,0,1,18,21.5H6A1.50164,1.50164,0,0,1,4.5,20Z"
                                                                                                                                                                                                                    fill="#b7b5be" />
                                                                                                                                                                                                            </svg>
                                                                                                                                                                                                            <span style="position:absolute;top:50%;left:50%;transform: translate(-50%,-30%);">${fileExtension}</span>
                                                                                                                                                                                                        </div>`
                                    }
                                </td>
                                <td class="border-0">
                                        <span  style="font-style:italic;">${fileExtension}</span> |
                                        <span style="font-style:italic;">${fileSize}</span>
                                        <input type="text" name="{{ $name }}[${fileName}][original_name]" class="form-control form-control-sm mt-1" placeholder="File Name"
                                            value="${fileOriginalName}" required style="max-width:250px" />
                                </td>
                                @if (!empty($additional_fields))
                                    <td class="border-0">
                                        <div class="d-flex flex-column align-items-center gap-2">
                                            @foreach ($additional_fields as $fieldName => $additional_field)
                                                <input type="text" class="form-control form-control-sm" placeholder="{{ $additional_field['placeholder'] }}"
                                                    value="${additionalFieldValues ? additionalFieldValues['{{ $fieldName }}'] : ''}" name="{{ $name }}[${fileName}][additional_fields][{{ $fieldName }}]" @if ($additional_field['required']) required @endif style="max-width:250px" />
                                            @endforeach
                                        </div>
                                    </td>
                                @endif
                                <td data-id="remove" class="border-0 border-end cursor-pointer"><i class="ti ti-trash"></i></td>
                            </tr>
                            `
            }

            const handleUploadFile = async (file) => {
                const formData = new FormData();
                formData.append('file', file);

                const id = `file-item-${getUUID()}`

                $.ajax({
                    url: '{{ route('temporary-store-media') }}',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    xhrFields: {
                        withCredentials: true
                    },
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = parseInt((evt.loaded / evt
                                    .total) * 100);

                                // Update the progress bar or display the percentage
                                filesTableBodyListEl.find(`[data-id="${ id }"]`)
                                    .html(
                                        `
                                        @if ($multiple)
                                            <td class="drag-handle cursor-pointer border-0 border-start px-3" style="background-color: #f4f4f5; width: 50px;"><i
                                                    class="ti ti-arrows-sort "></i>
                                            </td>
                                        @endif
                                        <td colspan="7"  @if (!$multiple) class="border-start" @endif>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped" role="progressbar" style="width: ${percentComplete}%"
                                                    aria-valuenow="${percentComplete}" aria-valuemin="0" aria-valuemax="100">
                                                    ${percentComplete}%
                                                </div>
                                            </div>
                                        </td>
                                       `
                                    )
                            }
                        }, false);
                        return xhr;
                    },
                    beforeSend: function(xhr) {
                        filesTableBodyListEl.append(
                            `<tr data-id="${ id }" data-select="file-item">
                                 @if ($multiple)
                                    <td class="drag-handle cursor-pointer border-0 border-start px-3" style="background-color: #f4f4f5; width: 50px;"><i
                                            class="ti ti-arrows-sort "></i>
                                    </td>
                                @endif
                                <td colspan="7" @if (!$multiple) class="border-start" @endif>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 0%"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                            0%
                                        </div>
                                    </div>
                                </td>
                            </tr>`
                        )
                    },
                    success: async function(response) {
                        const previewUrl = isImageFile(file) ? await getPreviewImageURL(file) :
                            null;
                        const fileExtension = file.name.split('.').pop().toUpperCase();
                        const fileSize = getFileSize(file);
                        const fileName = response.name;
                        const fileOriginalName = response.original_name.substring(0, response
                            .original_name
                            .lastIndexOf('.'));


                        const html = getFileItemHtml(previewUrl, fileExtension,
                            fileSize, fileName, fileOriginalName)

                        @if (!$multiple)
                            filesTableBodyListEl.html(html)
                        @else
                            filesTableBodyListEl.find(`[data-id="${ id }"]`).replaceWith(html)
                        @endif

                    },
                    error: function(xhr, status, error) {
                        // Handle error
                    }
                });

            }



            // Set default
            @foreach ($media ?? [] as $singleMedia)
                filesTableBodyListEl.append(getFileItemHtml(
                    {!! $singleMedia->isImage() ? "'" . $singleMedia->getUrl() . "'" : 'null' !!},
                    '{{ strtoupper($singleMedia->extension) }}', '{{ $singleMedia->getFileSize() }}',
                    '{{ $singleMedia->file_name }}',
                    '{{ $singleMedia->name }}', @js(
                        collect($additional_fields)->isNotEmpty()
                            ? collect($additional_fields)->keys()->reduce(function (array $carry, $name) use ($singleMedia) {
                                    $carry[$name] = $singleMedia->getCustomProperty($name, '');
                                    return $carry;
                                }, [])
                            : []
                    )))
            @endforeach





            fileUploadBtnEl.on('drag dragstart dragend dragover dragenter dragleave drop', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                })
                .on('dragover dragenter', function() {
                    fileUploadBtnEl.addClass('is-dragover');
                })
                .on('dragleave dragend drop', function() {
                    fileUploadBtnEl.removeClass('is-dragover');
                })
                .on('drop', function(e) {

                    // e.originalEvent.dataTransfer.files.forEach(file => {
                    //     handleUploadFile(file)
                    // });

                    e.preventDefault(); // Prevent the default behavior of opening the file in the browser

                    // Get the accepted file extensions from the accept attribute
                    var acceptedExtensions = fileUploadBtnEl.attr('accept').split(',');


                    Array.from(e.originalEvent.dataTransfer.files).forEach(file => {
                        // Check if the file extension matches any of the accepted extensions
                        var fileExtension = file.name.split('.').pop().toLowerCase();
                        if (acceptedExtensions.includes('.' + fileExtension)) {
                            handleUploadFile(file);
                        } else {
                            window.alert('File extension not allowed: ' + fileExtension);
                        }
                    });

                });

            fileUploadInputEl.on('change', function(e) {
                // e.target.files.forEach(file => {
                //     handleUploadFile(file)
                // });


                e.preventDefault(); // Prevent the default behavior of opening the file in the browser

                // Get the accepted file extensions from the accept attribute
                var acceptedExtensions = fileUploadBtnEl.attr('accept').split(',');

                Array.from(e.target.files).forEach(file => {
                    // Check if the file extension matches any of the accepted extensions
                    var fileExtension = file.name.split('.').pop().toLowerCase();
                    console.log(acceptedExtensions, fileExtension)
                    if (acceptedExtensions.includes('.' + fileExtension)) {
                        handleUploadFile(file);
                    } else {
                        window.alert('File extension not allowed: ' + fileExtension);
                    }
                });

            })

            // Remove
            $('body').on('click',
                '#{{ $id }} [data-id="files-table"] [data-id="file-items"] [data-id="remove"]',
                function(e) {
                    $(e.target).parents('[data-select="file-item"]').remove();
                });

        })
    </script>
@endpush


@push('head')
    <style>
        .rich-file-filed [data-id="file-upload-btn"] {
            background-color: #f4f4f5;
            color: #5d596c;
            font-weight: 400;
            font-style: italic;
            /* background-color: var(--bs-body-bg); */
        }

        .rich-file-filed [data-id="file-upload-btn"].is-dragover {
            background-color: inherit;
        }
    </style>
@endpush
