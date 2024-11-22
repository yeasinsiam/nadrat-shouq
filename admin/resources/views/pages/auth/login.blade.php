@extends('layout.main')
@section('authLayout', true)
@section('meta-title', 'Login')


@section('content')

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-4" style="max-width: 450px;">
                <!-- Login -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center mb-4 mt-2">
                            <x-layout.logo />
                        </div>
                        <!-- /Logo -->

                        <x-_all-error-alerts />

                        <form class="mb-3" action="{{ route('auth.login.store') }}" method="POST">
                            @csrf
                            <x-forms.__text-field name="password" inputType="password" label="Password"
                                placeholder="Enter your password" class="mb-3" required />

                            <x-forms.__switch-field name="remember" label="Remember Me " class="mb-3" swichSize="sm"
                                checked />

                            <x-__button type="submit" class="w-100">Sign In</x-__button>
                        </form>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>
@endsection
