<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ asset('assets/logo-circle.svg') }}" type="image/svg+xml">
        <title>{{ config('app.name', '36Degrees') }}</title>

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
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="relative z-10 min-h-screen">
                {{ $slot }}
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>
</html>
