<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .navbar-custom {
            background-color: #ffe7d5;
            /* Warna coklat */
        }

        .full-width-section {
            width: 100%;
            padding: 50px 0;
            /* Sesuaikan padding sesuai kebutuhan */
            background-color: #ffffff;
            /* Sesuaikan warna latar belakang sesuai kebutuhan */
            margin-bottom: 75px;
            /* Tambahkan margin bawah */
        }

        .standard-section {
            padding: 50px 0;
            /* Sesuaikan padding sesuai kebutuhan */
            margin-bottom: 50px;
            /* Tambahkan margin bawah */
        }

        .section2 {
            padding: 50px 0;
            /* Sesuaikan padding sesuai kebutuhan */
            margin-bottom: 50px;
            /* Tambahkan margin bawah */
            background-color: #ffffff
        }

        .section3 {
            padding: 50px 0;
            /* Sesuaikan padding sesuai kebutuhan */
            margin-bottom: 50px;
            /* Tambahkan margin bawah */
            background-color: #ffffff
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            /* Memastikan card mengisi tinggi kontainer */
        }

        .card-body {
            flex: 1;
            /* Memastikan card-body mengisi ruang yang tersedia */
        }

        .card img {
            max-width: 100%;
            height: auto;
        }

        .footer {
            background-color: #B96D40;
            padding: 2rem 0;
        }

        .footer a {
            color: #ffffff;
            /* Warna hitam untuk link di footer */
        }

        .footer a:hover {
            color: #000000;
            /* Warna hitam tetap saat link di-hover */
        }

        /* Custom button style */
        .btn-custom {
            background-color: #82522d;
            border-color: #82522d;
            color: #fff;
        }

        .btn-custom:hover {
            background-color: #6e4525;
            border-color: #6e4525;
        }

        .btn-outline-custom {
            color: #82522d;
            border-color: #82522d;
        }

        .btn-outline-custom:hover {
            background-color: #82522d;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="250" height="75"
                    class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black" href="#">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="full-width-section mt-5">
        <div class="container mt-2">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center">
                    <img src="{{ asset('assets/img/36degree.png') }}" alt="36 Degrees Interior Logo" class="img-fluid">
                    <a href="https://wa.me/6281313150678?text=Halo%20kami%20tertarik%20untuk%20mengetahui%20lebih%20lanjut%20tentang%20produk%20dan%20jasa%20yang%20Anda%20tawarkan."
                        class="btn btn-custom mt-3" type="button">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section2">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h1 class="fw-bold">Make all your designs come true.</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <a href="#"
                        class="btn btn-lg btn-outline-custom me-2">INTERIOR</a>
                    <a href="#"
                        class="btn btn-lg btn-outline-custom">FURNITURE</a>
                </div>
            </div>
        </div>
    </section>

    <section class="section3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card" style="height: 500px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="rounded-circle mx-auto d-block"
                                style="background-color: #d9905c; width: 110px; height: 110px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('assets/img/lightbulb.png') }}" class="rounded-circle"
                                    alt="Profile Image" style="width: 100px; height: 100px; filter: invert(1);">
                            </div>
                            <h5 class="card-title mt-3">End to End Service</h5>
                            <p class="card-text">Memenuhi semua kebutuhan
                                desain dan bangun dalam satu tempat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="height: 500px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="rounded-circle mx-auto d-block"
                                style="background-color: #d9905c; width: 110px; height: 110px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('assets/img/friend.png') }}" class="rounded-circle"
                                    alt="Profile Image" style="width: 100px; height: 100px; filter: invert(1);">
                            </div>
                            <h5 class="card-title mt-3">Free Consultation</h5>
                            <p class="card-text">Konsultasi kebutuhan desain dan bangun dengan desainer 36 Degrees
                                Interior tanpa biaya.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="height: 500px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-body text-center d-flex flex-column justify-content-center">
                            <div class="rounded-circle mx-auto d-block"
                                style="background-color: #d9905c; width: 110px; height: 110px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('assets/img/ribbon.png') }}" class="rounded-circle"
                                    alt="Profile Image" style="width: 100px; height: 100px; filter: invert(1);">
                            </div>
                            <h5 class="card-title mt-3">36 Degrees Warranty Service</h5>
                            <p class="card-text">36 Degrees akan memberikan layanan
                                jasa servis untuk rumah anda
                                setelah proyek selesai .</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <section class="standard-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <H1 class=" text-black mb-4">Kami Merancang untuk Mencerminkan</H1>
                    <h1 class="text-black">Kepribadian dan Selera Anda.</h1>
                    <p class="lead text-black mb-4">
                        36 Degrees Interior adalah sebuah perusahaan
                        yang bergerak dibidang jasa desain interior dan furniture,
                        yang menyediakan layanan produksi, penjualan furniture, dan pemasangan furniture.
                    </p>
                    <a href="#" class="btn btn-lg btn-outline-custom">READ MORE</a>
                </div>
            </div>
        </div>
    </section>

    <section class="standard-section">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Need Help?</h2>
            <h3 class="text-center mb-5">Frequently Ask Questions</h3>

            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Apa itu 36 Degrees Interior?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            36 Degrees Interior adalah sebuah perusahaan
                            yang bergerak dibidang jasa desain interior dan furniture, yang menyediakan layanan
                            produksi, penjualan furniture, dan pemasangan furniture.Dengan pengalaman lebih dari 10
                            tahun, 36 Degrees Interior merupakan solusi untuk membantu segala permasalahan ruangan anda
                            dan merealisasikan rumah impian anda.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Mengapa harus 36 Degrees Interior?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Dengan konsep end to end service, 36 Degrees Interior menyediakan layanan mulai dari proses
                            design hingga proses konstruksi. Setiap proses dikerjakan oleh tim 36 Degrees Interior yang
                            berpengalaman pada bidangnya masing-masing. Sehingga setiap proses mendapatkan kontrol
                            kualitas yang sangat ketat untuk memastikan hasil jadi terbaik untuk rumah Anda.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Apa saja layanan dari 36 Degrees Interior?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <p> 36 Degrees Interior memiliki beberapa layanan yang dapat memudahkan Anda untuk
                                merealisasikan hunian impian, diantaranya:</p>
                            <p class="mt-3">1. Jasa Desain Interior
                            </p>
                            <p>2. Jasa Konstruksi
                            </p>
                            <p>3.Furniture</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer mt-5">
        <div class="container">
            <div class="row text-white">
                <div class="col-md-4">
                    <h5>36 Degrees Interior</h5>
                    <p>Jl. Perjuangan II Persil,
                        Kecamatan Kesambi, Kota Cirebon</p>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white">Info</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="text-white">Follow Us</h5>
                    <ul class="list-unstyled">
                        <li><a
                                href="https://www.instagram.com/36degrees_interior?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}'
            });
        </script>
    @endif
</body>

</html>
