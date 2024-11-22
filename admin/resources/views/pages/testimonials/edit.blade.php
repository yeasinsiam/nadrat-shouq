@extends('layout.main')
@section('meta-title', 'Edit Testimonial')



@section('content')



    <x-layout.content.__row class="mb-5">
        <x-layout.content.__col lg="7">
            <x-layout.content.__breadcrumb :items="[
                ['title' => 'Testimonials', 'link' => route('testimonials.index')],
                ['title' => $testimonial->name],
            ]" />

        </x-layout.content.__col>
        <x-layout.content.__col lg="5">
            <div class="d-flex gap-2 flex-column flex-lg-row justify-content-lg-end">
                <x-__button color="secondary" varient="outline" type='link' :href="route('testimonials.index')"><span
                        class="ti ti-arrow-left me-0 me-sm-1 ti-xs"></span> Back</x-__button>
                <x-__button color="primary" type='link' :href="route('testimonials.create')">
                    <span class="ti ti-plus me-0 me-sm-1 ti-xs"></span> Add
                    Testimonial</x-__button>
            </div>
        </x-layout.content.__col>
    </x-layout.content.__row>

    <x-layout.content.__row gap='4' class="justify-content-center">
        <x-layout.content.__col lg="7">
            <x-layout.content.__card>
                <x-slot:body>
                    <form action="{{ route('testimonials.update', $testimonial->id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <x-layout.content.__row gap='2'>

                            <x-layout.content.__col lg="12">
                                <x-forms.__rich-file-field name="avatar" :media="$testimonial->avatar" label="Avatar"
                                    accept=".jpg,.jpeg,.png" :previewFileWidth="56" :previewFileHeight="56" :fileItemMinWidth="400"
                                    helpText="Please Select .jpg or .png file for avatar" :error="$errors->has('avatar')"
                                    :helpText="$errors->has('avatar') ? $errors->first('avatar') : ''" />
                            </x-layout.content.__col>
                            <x-layout.content.__col lg="6">
                                <x-forms.__text-field name="name" :value="old('name', $testimonial->name)" label="Name"
                                    placeholder="Enter Name" inputType="text" required :error="$errors->has('name')"
                                    :helpText="$errors->has('name') ? $errors->first('name') : ''" />
                            </x-layout.content.__col>
                            <x-layout.content.__col lg="6">
                                <x-forms.__text-field name="designation" :value="old('comment', $testimonial->designation)" label="Designation"
                                    placeholder="Enter Designation" inputType="text" required :error="$errors->has('designation')"
                                    :helpText="$errors->has('designation') ? $errors->first('designation') : ''" />
                            </x-layout.content.__col>
                            <x-layout.content.__col lg="12">
                                <x-forms.__textarea-field name="comment" :value="old('comment', $testimonial->comment)" label="Comment"
                                    placeholder="Enter Comment" required :error="$errors->has('comment')" :helpText="$errors->has('comment') ? $errors->first('comment') : ''" />
                            </x-layout.content.__col>

                            <x-layout.content.__col lg="6">
                                <div class="d-flex gap-3 flex-column flex-lg-row ">
                                    <div>
                                        <x-__button color="primary" type='submit' size="small" size='sm'>
                                            <span class="ti ti-device-floppy me-0 me-sm-1 ti-xs"></span> Save
                                        </x-__button>
                                    </div>

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
