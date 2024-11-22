<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('assets') }}/" data-template="vertical-menu-template-no-customizer-starter">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('meta-title') - {{ env('APP_NAME') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets') }}/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/tabler-icons.css" />
    <!-- <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/fontawesome.css" /> -->
    <!-- <link rel="stylesheet" href="{{ asset('assets') }}/vendor/fonts/flag-icons.css" /> -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/sweetalert2/sweetalert2.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/tagify/tagify.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/quill/typography.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/toastr/toastr.css" />
    <link rel="stylesheet" href="{{ asset('assets') }}/vendor/libs/animate-css/animate.css" />
    @livewireStyles




    <!-- Page CSS -->
    @if ($__env->yieldContent('authLayout', false))
        <link rel="stylesheet" href="{{ asset('assets') }}/vendor/css/pages/page-auth.css" />
    @endif
    <!-- Helpers -->
    <script src="{{ asset('assets') }}/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets') }}/js/config.js"></script>

    @stack('head')
</head>

<body>


    @if (!$__env->yieldContent('authLayout', false))
        <!-- Layout wrapper -->
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                <!-- Menu -->
                @include('layout.partials.sidebar')
                <!-- / Menu -->

                <!-- Layout container -->
                <div class="layout-page">
                    <!-- Header -->
                    @include('layout.partials.header')


                    <!-- Content wrapper -->
                    <div class="content-wrapper">
                        <!-- Content -->

                        <div class="container-xxl flex-grow-1 container-p-y">
                            @yield('content')
                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div
                                    class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                                    <div>
                                        ©
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>
                                        { App Name }, made with ❤️ by <a href="https://www.facebook.com/siam.rahaman.16"
                                            target="_blank" class="fw-medium">Yeasin</a>
                                    </div>

                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
    @else
        @yield('content')
    @endif

    <script src="{{ asset('assets') }}/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/node-waves/node-waves.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/hammer/hammer.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="{{ asset('assets') }}/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets') }}/vendor/libs/sweetalert2/sweetalert2.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/select2/select2.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/tagify/tagify.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/sortablejs/sortable.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/quill/katex.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/quill/quill.js"></script>
    <script src="{{ asset('assets') }}/vendor/libs/toastr/toastr.js"></script>
    @livewireScripts
    <script src="//cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>





    <!-- Main JS -->
    <script src="{{ asset('assets') }}/js/main.js"></script>

    <!-- Page JS -->
    @if ($__env->yieldContent('authLayout', false))
        <script src="{{ asset('assets') }}/js/pages-auth.js"></script>
    @endif
    {{-- Toaster Script --}}
    <script>
        toastr.options.progressBar = true;
        toastr.options.newestOnTop = true;
        toastr.options.positionClass = "toast-top-right"
        @if (session()->has('toastr-success'))
            toastr.success("{{ session()->get('toastr-success') }}")
        @endif
    </script>




    @stack('footer')
</body>

</html>
