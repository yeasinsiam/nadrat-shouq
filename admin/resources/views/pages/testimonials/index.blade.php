@extends('layout.main')
@section('meta-title', 'Testimonials')


@section('content')



    <x-layout.content.__row class="mb-4">
        <x-layout.content.__col lg="7">
            <x-layout.content.__breadcrumb :items="[['title' => 'Testimonials']]" />
        </x-layout.content.__col>
        <x-layout.content.__col lg="5">
            <div class="d-flex gap-2 flex-column flex-lg-row justify-content-lg-end">
                <x-__button color="primary" type='link' :href="route('testimonials.create')">
                    <span class="ti ti-plus me-0 me-sm-1 ti-xs"></span> Add
                    Testimonial</x-__button>


            </div>
        </x-layout.content.__col>
    </x-layout.content.__row>

    <x-layout.content.__row gap='4' class="justify-content-center">
        <x-layout.content.__col lg="9">
            <x-layout.content.__card>
                <x-slot:body>

                    <livewire:pages.testimonials.index.testimonial-list />
                    {{-- <div class="pt-5 px-4 pb-3">
                        {{ $productCategories->links('components.__table-pagination') }}
                    </div> --}}
                </x-slot:body>

            </x-layout.content.__card>
        </x-layout.content.__col>

    </x-layout.content.__row>
@endsection
