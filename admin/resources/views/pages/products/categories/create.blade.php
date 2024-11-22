@extends('layout.main')
@section('meta-title', 'Create Product Categories')


@section('content')



    <x-layout.content.__row class="mb-5">
        <x-layout.content.__col lg="7">
            <x-layout.content.__breadcrumb :items="[
                ['title' => 'Product List', 'link' => route('products.index')],
                ['title' => 'Manage Categories', 'link' => route('product-categories.index')],
                ['title' => 'Create'],
            ]" />
        </x-layout.content.__col>
        <x-layout.content.__col lg="5">
            <div class="d-flex gap-2 flex-column flex-lg-row justify-content-lg-end">
                <x-__button color="secondary" varient="outline" type='link' :href="url()->previous()"><span
                        class="ti ti-arrow-left me-0 me-sm-1 ti-xs"></span> Back</x-__button>
                {{-- <x-__button color="primary" type='submit'>
                        <span class="ti ti-device-floppy me-0 me-sm-1 ti-xs"></span> Create
                    </x-__button> --}}


            </div>
        </x-layout.content.__col>
    </x-layout.content.__row>

    <x-layout.content.__row gap='4' class="justify-content-center">
        <x-layout.content.__col lg="7">
            <x-layout.content.__card>
                <x-slot:body>
                    <form action="{{ route('product-categories.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <x-layout.content.__row gap='2'>
                            <x-layout.content.__col lg="6">
                                <x-forms.__text-field name="name" label="Name" placeholder="Enter Name"
                                    inputType="text" required :error="$errors->has('name')" :helpText="$errors->has('name') ? $errors->first('name') : ''" />
                            </x-layout.content.__col>
                            <x-layout.content.__col lg="6">
                                <x-forms.__text-field name="slug" label="Slug (Optional)" placeholder="Enter Slug"
                                    :error="$errors->has('slug')" :helpText="$errors->has('slug') ? $errors->first('slug') : ''" />
                            </x-layout.content.__col>
                            <x-layout.content.__col lg="12">

                                <x-forms.__rich-file-field label="Icon" name="icon" accept=".png,.svg"
                                    :previewFileWidth="39" :previewFileHeight="39" :fileItemMinWidth="400"
                                    helpText="Please Select .png or .svg file for icon" :error="$errors->has('icon')"
                                    :helpText="$errors->has('icon') ? $errors->first('icon') : ''" />

                            </x-layout.content.__col>
                            <x-layout.content.__col lg="6">
                                <div class="d-flex gap-3 flex-column flex-lg-row ">
                                    {{-- <x-__button color="primary" type="sumbit">Create</x-__button> --}}
                                    <div>
                                        <x-__button color="primary" type='submit' name='create' size="small"
                                            size='sm'>
                                            <span class="ti ti-device-floppy me-0 me-sm-1 ti-xs"></span> Create
                                        </x-__button>
                                    </div>
                                    <div>
                                        <x-__button color="primary" type='submit' name='create-another' varient="outline"
                                            class="text-nowrap" size='sm'>
                                            <span class="ti ti-device-floppy me-0 me-sm-1 ti-xs"></span> Create & create
                                            another
                                        </x-__button>
                                    </div>
                                </div>
                            </x-layout.content.__col>
                        </x-layout.content.__row>
                    </form>

                </x-slot:body>
            </x-layout.content.__card>
        </x-layout.content.__col>

    </x-layout.content.__row>

@endsection

{{-- @push('footer')
    <script>
        $(document).ready(() => {
            @if (request()->has('show-create-modal'))
                $("#create-category").modal('show');
            @endif
        })
    </script>
@endpush --}}
