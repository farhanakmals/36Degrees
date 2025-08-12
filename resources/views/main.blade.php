<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="{{ asset('assets/Logo 36 Degrees-White-03.png') }}">
        <title>36 Degrees Interior</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />

        <style>
            .abhaya-libre-extrabold {
                font-family: "Abhaya Libre", serif;
                font-weight: 800;
                font-style: normal;
            }
        </style>
    </head>
    <body class="bg-[#fafafa]">
        {{-- Navbar --}}
        <nav class="fixed top-0 z-40 w-full bg-[#B96D40]">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
                <div class="relative items-center justify-start">
                    <div class="flex items-center justify-start rtl:justify-end">
                        {{-- <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden">
                            <span class="sr-only">Open sidebar</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                            </svg>
                        </button> --}}
                        <a href="{{ route('home') }}"  class="flex items-end">
                            <div  class="flex ms-2 ">
                                <img src="{{ asset('assets/Logo 36 Degrees-White-03.png') }}" class="w-10" alt="36Degrees Logo" />
                            </div>
                            <div class="flex flex-col">
                                <h5 class="text-white font-semibold">36 Degrees Interior</h5>
                                <p class="text-white font-semibold text-[9px] -mt-1">Solution for Customized Furniture</p>
                            </div>
                        </a>
                    </div>
                    <div class="absolute right-0 top-0 -mt-3 -me-5">
                        <img src="{{ asset('assets/home-navbar.svg') }}" class="w-28" alt="Home Icon">
                    </div>
                </div>
            </div>
        </nav>
        {{-- End Navbar --}}

        {{-- Content --}}
        <div class="px-5 md:px-8 pt-24">
            {{-- Hero --}}
            <section class="md:h-screen">
                <div class="flex items-center md:mt-7">
                    <div class="w-full md:w-1/2 px-5">
                        <div class="flex md:hidden justify-center mb-8">
                            <img src="{{ asset('assets/Logo 36 Degrees-02.png') }}" class="block md:hidden w-44" alt="hero image">
                        </div>
                        <h2 class="text-center md:text-start text-4xl md:text-6xl abhaya-libre-extrabold">Make all your Designs Come true</h2>
                        <p class="text-md text-gray-400 mt-4">36 Degrees Interior adalah sebuah perusahaan  yang bergerak dibidang jasa desain interior dan furniture, yang menyediakan layanan produksi, penjualan furniture, dan pemasangan furniture.</p>
                        <a href="#footer" data-modal-target="modal-add-karyawan" data-modal-toggle="modal-add-karyawan" class="flex gap-2 mt-4 text-white bg-[#B96D40] h-fit w-full md:w-fit justify-center font-medium rounded-lg text-sm py-3 px-7">
                            Hubungi Kami
                        </a>
                    </div>
                    <div class="w-1/2 hidden md:flex justify-center">
                        <img src="{{ asset('assets/home-hero.svg') }}" class="w-96" alt="hero image">
                    </div>
                </div>
            </section>

            {{-- Section 2 --}}
            <section class="md:h-screen mt-20 md:mt-0">
                <div class="flex flex-col items-center justify-center gap-3">
                    <h3 class="abhaya-libre-extrabold text-3xl text-center">Kami Merancang untuk Mencerminkan <br> Kepribadian dan Selera Anda</h3>
                    <p class="text-sm text-gray-400 text-center">36 Degrees Interior adalah sebuah perusahaan yang bergerak dibidang jasa desain interior dan furniture, yang menyediakan layanan <br> produksi, penjualan furniture, dan pemasangan furniture.</p>
                    <div class="grid md:grid-cols-3 justify-center items-center gap-5 w-full mt-5">
                        <div class="flex flex-col justify-center items-center px-7 py-12 bg-white rounded-lg shadow-2xl w-full">
                            <img src="{{ asset('assets/home-section2-1.svg') }}" class="w-24" alt="">
                            <h2 class="font-bold mt-3">End to End Service</h2>
                            <p class="text-md text-gray-400 text-center mt-5">Memenuhi semua kebutuhan desain dan bangun dalam satu tempat</p>
                        </div>
                        <div class="flex flex-col justify-center items-center px-7 py-12 bg-white rounded-lg shadow-2xl w-full">
                            <img src="{{ asset('assets/home-section2-2.svg') }}" class="w-24" alt="">
                            <h2 class="font-bold mt-3">Free Consultation</h2>
                            <p class="text-md text-gray-400 text-center mt-5">Konsultasi kebutuhan desain dan bangun dengan desainer 36 Degrees Interior tanpa biaya</p>
                        </div>
                        <div class="flex flex-col justify-center items-center px-7 py-12 bg-white rounded-lg shadow-2xl w-full">
                            <img src="{{ asset('assets/home-section2-3.svg') }}" class="w-24" alt="">
                            <h2 class="font-bold mt-3">36 Degrees Warranty Service</h2>
                            <p class="text-md text-gray-400 text-center mt-5">36 Degrees akan memberikan layanan jasa servis untuk rumah anda setelah proyek selesai</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- Section 3 --}}
            <section class="mt-20 md:mt-0">
                <div class="w-full">
                    <h3 class="abhaya-libre-extrabold text-3xl text-center">Need Help?</h3>
                    <p class="font-light text-lg text-center">Frequently Ask Questions</p>
                    <div class="flex justify-center items-center gap-5 w-full mt-5">
                        <div id="accordion-collapse" data-accordion="collapse" class="w-full max-w-2xl">
                            <h2 id="accordion-collapse-heading-1">
                                <button type="button" class="cursor-pointer text-start flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border-gray-200 hover:bg-[#B96D40] hover:text-white hover:rounded-t-xl gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
                                    <span>Apa itu 36 Degrees Interior</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                                <div class="p-5">
                                    <p class="mb-2 text-gray-500">
                                        36 Degrees Interior adalah sebuah perusahaan yang bergerak dibidang jasa desain interior dan furniture, yang menyediakan layanan produksi, penjualan furniture, dan pemasangan furniture.Dengan pengalaman lebih dari 10 tahun
                                    </p>
                                </div>
                            </div>
                            <h2 id="accordion-collapse-heading-2">
                                <button type="button" class="cursor-pointer text-start flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border-gray-200 hover:bg-[#B96D40] hover:text-white hover:rounded-t-xl gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                                    <span>Mengapa harus 36 Degrees Interior?</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                                <div class="p-5">
                                    <p class="mb-2 text-gray-500">
                                        Dengan konsep end to end service, 36 Degrees Interior menyediakan layanan mulai dari proses
                                        design hingga proses konstruksi. Setiap proses dikerjakan oleh tim 36 Degrees Interior yang
                                        berpengalaman pada bidangnya masing-masing. Sehingga setiap proses mendapatkan kontrol
                                        kualitas yang sangat ketat untuk memastikan hasil jadi terbaik untuk rumah Anda.
                                    </p>
                                </div>
                            </div>
                            <h2 id="accordion-collapse-heading-3">
                                <button type="button" class="cursor-pointer text-start flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border-gray-200 hover:bg-[#B96D40] hover:text-white hover:rounded-t-xl gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                                    <span>Apa saja layanan dari 36 Degrees Interior?</span>
                                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                                    </svg>
                                </button>
                            </h2>
                            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                                <div class="p-5 border border-t-0 border-gray-200">
                                    <p class="mb-2 text-gray-500">
                                        36 Degrees Interior memiliki beberapa layanan yang dapat memudahkan Anda untuk
                                        merealisasikan hunian impian, diantaranya:
                                    </p>
                                    <ul class="ps-5 text-gray-500 list-disc">
                                        <li>Jasa Desain Interior</li>
                                        <li>Jasa Konstruksi</li>
                                        <li>Furniture</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        {{-- End Content --}}

        {{-- Footer --}}
        <section class="bg-[#B9752E] text-white py-10 md:px-20 relative mt-20" id="footer">
            <div class="grid grid-cols-1 md:grid-cols-3 px-5 border-b gap-8 md:gap-0 border-white pb-5">
                <div class="flex flex-col items-center md:items-start  md:gap-5 w-full">
                    <img src="{{ asset('assets/Logo 36 Degrees-White-04.png') }}" alt="Logo" class="h-16 mb-10 md:mb-0">
                    <p class="text-white text-sm md:ms-2 text-center md:text-start mb-5 md:mb-0">Jl. Perjuangan II Persil, Kecamatan <br> Kesambi, Kota Cirebon</p>
                    <a href="mailto:36degrees@gmail.com" class="flex gap-2 items-center">
                        <img src="{{ asset('assets/footer-mail.svg') }}" alt="">
                        <p class="text-white text-sm">36degrees@gmail.com</p>
                    </a>
                    <div class="flex gap-2 items-center">
                        <img src="{{ asset('assets/footer-phone.svg') }}" alt="">
                        <p class="text-white text-sm">+62 813 - 1315 - 0678</p>
                    </div>
                </div>
                <div class="flex flex-col items-center md:items-start gap-5 w-full">
                    <h3 class="text-white font-semibold">Info</h3>
                    <a href="#" class="text-white text-sm">Tentang Kami</a>
                    <a href="#" class="text-white text-sm">Kontak</a>
                    <a href="#" class="text-white text-sm">FAQ</a>
                </div>
                <div class="flex flex-col items-center md:items-start gap-5 w-full">
                    <h3 class="text-white font-semibold">Follow Us</h3>
                    <a href="https://www.instagram.com/36degrees_interior" target="_blank" rel="noopener noreferrer" class="flex gap-2 items-center">
                        <img src="{{ asset('assets/footer-ig.svg') }}" alt="Logo" class="">
                        <p class="text-white">36degrees_interior</p>
                    </a>
                </div>
            </div>
            <div class="flex justify-center md:justify-start items-center mt-5">
                <p class="text-white text-sm">© 2025 36 Degrees Interior. All rights reserved.</p>
            </div>
            <div class="absolute bottom-0 right-0">
                <img src="{{ asset('assets/footer-asset.svg') }}" class="w-64">
            </div>
        </section>
        {{-- End Footer --}}

        @yield('scripts')
        <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    </body>
</html>
