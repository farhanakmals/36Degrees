@extends('layouts.base')

@section('content')
    <section>
        <form class="flex flex-col gap-5" action="{{ route('division.score_actual.store') }}" method="post" id="form-add-penilaian">
            @csrf
            <div class="flex justify-between items-center">
                <div>
                    <div class="flex gap-2 mb-3">
                        <img src="{{ asset('assets/header.svg') }}">
                        <h2 class="text-xl font-semibold text-[#B96D40]">Nilai Aktual</h2>
                    </div>
                    <div class="flex gap-1">
                        <a href="{{ route('division.score_actual') }}" class="text-sm text-gray-500">Nilai Aktual</a>
                        <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 5 7 7-7 7"/>
                        </svg>
                        <p class="text-sm text-gray-900">Tambah Penilaian</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <a href="{{ route('division.score_actual') }}" class="text-[#B96D40] text-center border border-[#B96D40] w-32 hover:bg-[#B96D40] hover:text-white font-medium rounded-lg text-sm p-2.5">
                        Batal
                    </a>
                    <button type="button" data-modal-target="modal-konfirmasi" data-modal-toggle="modal-konfirmasi" class="text-white bg-[#B96D40] w-32 font-medium rounded-lg text-sm p-2.5">
                        Simpan
                    </button>
                </div>
            </div>
            <div>
                @if ($errors->any())
                    @foreach ($errors->all() as $i => $item)
                        <div id="alert-{{ $i }}"
                            class="flex items-center p-4 mb-2 text-[#FF0000] rounded-lg bg-[#FAE0DE]"
                            role="alert">
                            <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ms-3 text-sm font-medium">
                                {{ $item }}
                            </div>
                            <button type="button"
                                class="ms-auto -mx-1.5 -my-1.5 text-[#FF0000] cursor-pointer rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-[#FF0000] hover:text-white inline-flex items-center justify-center h-8 w-8 "
                                data-dismiss-target="#alert-{{ $i }}" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endforeach
                @endif

                @if (Session::has('error_exists'))
                    <div id="alert" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50" role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium text-red-800">
                            {{ Session::get('error_exists') }}
                        </div>
                        <button type="button"
                            class="ms-auto -mx-1.5 -my-1.5 text-[#FF0000] cursor-pointer rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-[#FF0000] hover:text-white inline-flex items-center justify-center h-8 w-8 "
                            data-dismiss-target="#alert" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                        </button>
                    </div>

                @endif
            </div>
            <div class="grid grid-cols-2 gap-6">
                <div class="flex flex-col gap-5 bg-white w-full py-4 px-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-[#B96D40]">Karyawan</h2>
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <select id="name" name="employee_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" required>
                            <option disabled selected>Pilih Karyawan</option>
                            @foreach ($employees as $item)
                                <option value="{{ $item->id }}">{{ $item->position }} - {{ $item->role == 'division_head' ? 'Kepala Divisi' : 'Karyawan' }} - {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex flex-col gap-5 bg-white w-full py-4 px-6 rounded-lg shadow-md">
                    <h2 class="text-lg font-semibold text-[#B96D40]">Periode</h2>
                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label for="bulan" class="block mb-2 text-sm font-medium text-gray-900">Bulan</label>
                            <select id="bulan" name="bulan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" required>
                                <option disabled selected>Pilih Bulan</option>
                                <option value="januari">Januari</option>
                                <option value="februari">Februari</option>
                                <option value="maret">Maret</option>
                                <option value="april">April</option>
                                <option value="mei">Mei</option>
                                <option value="juni">Juni</option>
                                <option value="juli">Juli</option>
                                <option value="agustus">Agustus</option>
                                <option value="september">September</option>
                                <option value="oktober">Oktober</option>
                                <option value="november">November</option>
                                <option value="desember">Desember</option>
                            </select>
                        </div>
                        <div>
                            <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun</label>
                            <input type="number" name="tahun" id="tahun" placeholder="Contoh: 2025" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-5 bg-white w-full py-4 px-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold text-[#B96D40]">Aspek Penilaian</h2>
                <div class="grid grid-cols-2 gap-6">
                    @foreach ($aspek as $item)
                        <div>
                            <label for="{{ $item->id }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $item->name }} (Target: {{ $item->target }})</label>
                            <input type="number" name="scores[{{ $item->id }}]" id="{{ $item->id }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" placeholder="Masukkan nilai" required />
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </form>

        {{-- Modal konfirmasi --}}
        <div id="modal-konfirmasi" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-sm">
                    <button type="button" class="absolute top-3 end-2.5 text-gray-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="modal-konfirmasi">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to rate this employee?</h3>
                        <button data-modal-hide="modal-konfirmasi" onclick="event.preventDefault(); document.getElementById('form-add-penilaian').submit();" type="button" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                            Yes, I'm sure
                        </button>
                        <button data-modal-hide="modal-konfirmasi" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                            No, cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- End modal konfirmasi --}}
    </section>
@endsection
