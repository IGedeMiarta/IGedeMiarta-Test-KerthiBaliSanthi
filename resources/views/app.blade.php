<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TEST II - Kerthi Bali Santhi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.6/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
    <script>
        function reloadTable() {
            $('.dataTable').dataTable({
                searching: false,
                info: true
            });
            $('.dt-length').addClass('d-none');
        }
        $(document).ready(function() {
            // Call the reloadTable function when the document is ready
            reloadTable();
        });
    </script>

    @stack('style')
    @livewireStyles
</head>

<body>
    @include('navbar')
    <div class="container mt-5">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('script')
</body>

</html>
