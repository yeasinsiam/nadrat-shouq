@extends('layout.main')
@section('meta-title', 'Product Categories')


@section('content')



    <x-layout.content.__row class="mb-4">
        <x-layout.content.__col lg="7">
            <x-layout.content.__breadcrumb :items="[
                ['title' => 'Product List', 'link' => route('products.index')],
                ['title' => 'Manage Categories'],
            ]" />
        </x-layout.content.__col>
        <x-layout.content.__col lg="5">
            <div class="d-flex gap-2 flex-column flex-lg-row justify-content-lg-end">
                <x-__button color="primary" type='link' :href="route('product-categories.create')">
                    <span class="ti ti-plus me-0 me-sm-1 ti-xs"></span> Add
                    Category</x-__button>


            </div>
        </x-layout.content.__col>
    </x-layout.content.__row>

    <x-layout.content.__row gap='4' class="justify-content-center">
        <x-layout.content.__col lg="7">
            <x-layout.content.__card>
                <x-slot:body>

                    <livewire:pages.products.cotagories.index.category-list />
                    {{-- <div class="pt-5 px-4 pb-3">
                        {{ $productCategories->links('components.__table-pagination') }}
                    </div> --}}
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
