@props(['link'])
<li>
    <a class="dropdown-item" href="{{ $link }}" id="user-logout-dropdown-menu-item">
        <i class="ti ti-logout me-2 ti-sm"></i>
        <span class="align-middle">Log Out</span>
    </a>
</li>
@push('footer')
    <script>
        $(document).ready(() => {
            $('#user-logout-dropdown-menu-item').click((e) => {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You will be redirected to login page.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    customClass: {
                        confirmButton: 'btn btn-primary me-3',
                        cancelButton: 'btn btn-label-secondary'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location = @js($link);
                    }
                });
            })
        })
    </script>
@endpush
