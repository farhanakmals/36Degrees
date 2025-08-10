<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '36 Degrees')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

    <style>
        .datatable-top {
            /* display: none !important; */
            padding: 1rem;
            background-color: white;
            margin-bottom: 0rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .datatable-empty {
            text-align: center;
            padding: 1rem;
            margin-top: 1rem;
        }

        .datatable-input {
            padding: 0.5rem;
            border-radius: 100px;
            border: 1px solid #D1D5DB; /* Gray-300 */
        }

        .datatable-selector {
            padding: 0.5rem;
            border-radius: 0.375rem;
            border: 1px solid #D1D5DB; /* Gray-300 */
            background-color: white;
            color: #4B5563; /* Gray-700 */
            width: 70px;
            margin-right: 0.5rem;
        }

        .datatable-bottom {
            display: flex;
            text-align: right;
            padding: 1rem;
            font-size: 0.875rem; /* 14px */
            justify-content: space-between;
            align-items: center;
        }

        .datatable-pagination {
            display: flex;
            justify-content: end;
            align-items: end;
        }

        .datatable-pagination-list {
            display: flex;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .datatable-pagination-list-item {
            padding: 0rem 1rem;
            border: 1px solid #D1D5DB; /* Gray-300 */
            background-color: white;
            color: #4B5563; /* Gray-700 */
            cursor: pointer;
        }
    </style>
</head>
<body class="bg-[#F7F7F7]">
    @php
        $user = Auth::user();
        $user = auth()->user();
    @endphp
    @if ($user->role === 'admin')
        @include('layouts.sidebar')
    @else
        @include('layouts.sidebarEmployer')
    @endif

    <div class="px-4 py-8 sm:ml-64">
        <div class="p-2 mt-14">
            @yield('content')
        </div>
    </div>

    <div class="fixed top-1/4 -z-10 right-0">
        <img src="{{ asset('assets/asset-2.svg') }}" class="w-56"lt="">
    </div>

    @yield('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("default-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#default-table", {
                searchable: true,
                paging: true,
                perPage: 5,
                perPageSelect: [5, 10, 15, 20, 25],
            });
        }
    </script>
</body>
</html>
