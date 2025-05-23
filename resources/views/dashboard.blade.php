<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('dashAdmin/assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('dashAdmin/assets/css/styles.min.css') }}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        @include('layouts.dashPart.sidebar')

        <!--  Main wrapper -->
        <div class="body-wrapper">
            @include('layouts.dashPart.header')

            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('dashAdmin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('dashAdmin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dashAdmin/assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('dashAdmin/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('dashAdmin/assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('dashAdmin/assets/js/dashboard.js') }}"></script>

    <script>
        // Tunggu sampai halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            // Pilih semua alert
            const alerts = document.querySelectorAll('.alert');

            alerts.forEach(function(alert) {
                // Setelah 5 detik, hilangkan alert dengan animasi fade out
                setTimeout(function() {
                    alert.classList.add('fade');
                    alert.classList.add('show');

                    // Setelah fade, sembunyikan total
                    alert.style.transition = 'opacity 0.5s ease';
                    alert.style.opacity = '0';

                    setTimeout(function() {
                        alert.remove();
                    }, 500); // setelah animasi selesai (0.5 detik)
                }, 5000); // tunggu 5 detik
            });
        });
    </script>
</body>

</html>
