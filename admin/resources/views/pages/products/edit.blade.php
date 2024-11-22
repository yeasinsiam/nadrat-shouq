@extends('layout.main')
@section('meta-title', 'Edit Product')


@section('content')

    {{-- @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif --}}

    <form action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <x-layout.content.__row class="mb-5">
            <x-layout.content.__col lg="7">
                <x-layout.content.__breadcrumb :items="[
                    ['title' => 'Product List', 'link' => route('products.index')],
                    ['title' => $product->name],
                ]" />
            </x-layout.content.__col>
            <x-layout.content.__col lg="5">
                <div class="d-flex gap-2 flex-column flex-lg-row justify-content-lg-end">
                    <x-__button color="secondary" varient="outline" type='link' :href="url()->previous()"><span
                            class="ti ti-arrow-left me-0 me-sm-1 ti-xs"></span> Back</x-__button>
                    <x-__button color="primary" varient="outline" type='link' :href="route('products.create')">
                        <span class="ti ti-plus me-0 me-sm-1 ti-xs"></span> Add Product
                    </x-__button>

                    <x-__button confirmableAciton confirmableTitle='Are you sure?'
                        confirmableDesc="This will delete this product permanently." color="danger" type='submit'
                        name="delete" varient="outline"><span class="ti ti-trash me-0 me-sm-1 ti-xs text-danger"></span>
                        Delete</x-__button>
                    <x-__button color="primary" type='submit'>
                        <span class="ti ti-device-floppy me-0 me-sm-1 ti-xs"></span> Save
                    </x-__button>


                </div>
            </x-layout.content.__col>
        </x-layout.content.__row>

        {{-- ------------------------ --}}
        @php
            $permalink = env('FRONTEND_URL') . '/products/' . $product->meta_slug;
        @endphp
        <p class="text-body">Permalink: <a href="{{ $permalink }}" target="_blank">{{ $permalink }}</a></p>
        {{-- ------------------------ --}}
        <x-layout.content.__row gap='4' class="justify-content-center">
            <x-layout.content.__col lg="6">
                <x-layout.content.__row gap='4' class="justify-content-center">
                    <x-layout.content.__col lg="12">
                        <x-layout.content.__card>
                            <x-slot:header>
                                <h5 class="card-title mb-0">Product information</h5>
                            </x-slot:header>
                            <x-slot:body>

                                <x-layout.content.__row gap='3'>
                                    {{-- Name --}}
                                    <x-layout.content.__col lg="12">
                                        <x-forms.__text-field name="name" label="Name" placeholder="Enter Name"
                                            inputType="text" :value="old('name', $product->name)" required :error="$errors->has('name')"
                                            :helpText="$errors->has('name') ? $errors->first('name') : ''" />
                                    </x-layout.content.__col>
                                    <x-layout.content.__col lg="12">
                                        <x-forms.__select-field label="Select Category" name="product_category_id"
                                            :value="old('product_category_id', $product->product_category_id)" placeholder="Select Category" :options="$productCategories->toArray()" required
                                            :error="$errors->has('product_category_id')" :helpText="$errors->has('product_category_id')
                                                ? $errors->first('product_category_id')
                                                : ''" />
                                    </x-layout.content.__col>

                                    {{-- Fabric --}}
                                    <x-layout.content.__col lg="6">
                                        <x-forms.__text-field name="fabric" :value="old('fabric', $product->fabric)" label="Fabric"
                                            placeholder="Enter Fabric" :error="$errors->has('fabric')" :helpText="$errors->has('fabric') ? $errors->first('fabric') : ''" />
                                    </x-layout.content.__col>
                                    {{-- Material --}}
                                    <x-layout.content.__col lg="6">
                                        <x-forms.__text-field name="material" :value="old('material', $product->material)" label="Material"
                                            placeholder="Enter Material" :error="$errors->has('material')" :helpText="$errors->has('material') ? $errors->first('material') : ''" />
                                    </x-layout.content.__col>
                                    {{-- Measurement --}}
                                    <x-layout.content.__col lg="6">
                                        <x-forms.__text-field name="measurement" :value="old('measurement', $product->measurement)" label="Measurement"
                                            placeholder="Enter Measurement" :error="$errors->has('measurement')" :helpText="$errors->has('measurement') ? $errors->first('measurement') : ''" />
                                    </x-layout.content.__col>
                                    {{-- Warranty --}}
                                    <x-layout.content.__col lg="6">
                                        <x-forms.__text-field name="warranty" :value="old('warranty', $product->warranty)" label="Warranty"
                                            placeholder="Enter Warranty" :error="$errors->has('warranty')" :helpText="$errors->has('warranty') ? $errors->first('warranty') : ''" />
                                    </x-layout.content.__col>
                                    {{-- Description --}}
                                    <x-layout.content.__col lg="12">
                                        <x-forms.__textarea-editor-field name="description" :value="old('description', $product->description)"
                                            label="Description" placeholder="Enter Description" :error="$errors->has('description')"
                                            :helpText="$errors->has('description') ? $errors->first('description') : ''" />
                                    </x-layout.content.__col>


                                </x-layout.content.__row>

                            </x-slot:body>
                        </x-layout.content.__card>
                    </x-layout.content.__col>
                    {{-- <x-layout.content.__col lg="12">
                        <x-layout.content.__card>
                            <x-slot:header>
                                <h5 class="card-title mb-0">Meta (SEO)</h5>
                            </x-slot:header>
                            <x-slot:body>
                                <x-layout.content.__row gap='3'>
                                    // Slug
                                    <x-layout.content.__col lg="12">
                                        <x-forms.__text-field name="meta_slug" label="Slug (Optional)"
                                            placeholder="Enter Slug" :error="$errors->has('meta_slug')" :helpText="$errors->has('meta_slug') ? $errors->first('meta_slug') : ''" />
                                    </x-layout.content.__col>
                                </x-layout.content.__row>
                            </x-slot:body>
                        </x-layout.content.__card>
                    </x-layout.content.__col> --}}

                </x-layout.content.__row>
            </x-layout.content.__col>

            {{-- ------------------------ --}}

            <x-layout.content.__col lg="6">
                <x-layout.content.__card>
                    <x-slot:header>
                        <h5 class="card-title mb-0">Gallery</h5>
                    </x-slot:header>
                    <x-slot:body>
                        <x-forms.__rich-file-field {{-- label="Gallery" --}} multiple name="gallery" :media="$product->gallery"
                            accept=".jpg,.jpeg" :previewFileWidth="150" :previewFileHeight="150" :fileItemMinWidth="500" :error="$errors->has('gallery')"
                            :helpText="$errors->has('gallery') ? $errors->first('gallery') : ''" />

                    </x-slot:body>
                </x-layout.content.__card>
            </x-layout.content.__col>


            {{-- ------------------------ --}}

        </x-layout.content.__row>
    </form>

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
