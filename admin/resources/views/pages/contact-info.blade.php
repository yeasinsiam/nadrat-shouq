@extends('layout.main')
@section('meta-title', 'Contact Information')


@section('content')



    <x-layout.content.__row class="mb-5">
        <x-layout.content.__col lg="7">
            <x-layout.content.__breadcrumb :items="[['title' => 'Contact Information']]" />
        </x-layout.content.__col>
        <x-layout.content.__col lg="5">
            <div class="d-flex gap-2 flex-column flex-lg-row justify-content-lg-end">
                {{-- <x-__button color="secondary" varient="outline" type='link' :href="url()->previous()"><span
                        class="ti ti-arrow-left me-0 me-sm-1 ti-xs"></span> Back</x-__button> --}}
            </div>
        </x-layout.content.__col>
    </x-layout.content.__row>

    <x-layout.content.__row gap='4' class="justify-content-center">
        <x-layout.content.__col lg="7">
            <x-layout.content.__card>
                <x-slot:body>
                    <form action="{{ route('contact-info.update') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <x-layout.content.__row gap='2'>
                            <x-layout.content.__col lg="12">
                                <x-forms.__text-field name="phone_number" label="Phone Number"
                                    placeholder="Enter Phone Number" inputType="text" :value="old('phone_number', $contact_info->phone_number)" required
                                    :error="$errors->has('phone_number')" :helpText="$errors->has('phone_number') ? $errors->first('phone_number') : ''" />
                            </x-layout.content.__col>
                            <x-layout.content.__col lg="12">
                                <x-forms.__text-field name="email" label="Email" placeholder="Enter Email"
                                    inputType="email" :value="old('email', $contact_info->email)" required :error="$errors->has('email')" :helpText="$errors->has('email') ? $errors->first('email') : ''" />
                            </x-layout.content.__col>
                            <x-layout.content.__col lg="12">
                                <x-forms.__textarea-field name="address" label="Address" placeholder="Enter Address"
                                    :value="old('address', $contact_info->address)" required :error="$errors->has('address')" :helpText="$errors->has('address') ? $errors->first('address') : ''" />
                            </x-layout.content.__col>
                            <x-layout.content.__col lg="12">
                                <x-forms.__textarea-field name="google_map_location_embedded_url"
                                    label="Google map location embedded url"
                                    placeholder="Enter google map location embedded url" :value="old(
                                        'google_map_location_embedded_url',
                                        $contact_info->google_map_location_embedded_url,
                                    )"
                                    textAreaHeight="100" required :error="$errors->has('google_map_location_embedded_url')" :helpText="$errors->has('google_map_location_embedded_url')
                                        ? $errors->first('google_map_location_embedded_url')
                                        : ''" />
                            </x-layout.content.__col>

                            <x-layout.content.__col lg="6">
                                <div class="d-flex gap-3 flex-column flex-lg-row ">
                                    {{-- <x-__button color="primary" type="sumbit">Create</x-__button> --}}
                                    <div>
                                        <x-__button color="primary" type='submit' size="small" size='sm'>
                                            <span class="ti ti-device-floppy me-0 me-sm-1 ti-xs"></span> Save
                                        </x-__button>
                                    </div>
                                    {{-- <div>
                                        <x-__button color="primary" type='submit' name='create-another' varient="outline"
                                            class="text-nowrap" size='sm'>
                                            <span class="ti ti-device-floppy me-0 me-sm-1 ti-xs"></span> Create & create
                                            another
                                        </x-__button> --}}
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
