@extends('layouts.base')

@section('content')
    <section>
        <div class="flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <div class="flex gap-2">
                    <img src="{{ asset('assets/header.svg') }}">
                    <h2 class="text-xl font-semibold text-[#B96D40]">Data Karyawan</h2>
                </div>
                {{-- <div>
                    <button type="button" data-modal-target="modal-add-karyawan" data-modal-toggle="modal-add-karyawan" class="flex gap-2 text-white bg-[#B96D40] h-fit font-medium rounded-lg text-sm p-2.5">
                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                        Tambah Karyawan
                    </button>
                </div> --}}
            </div>

            <div>
                <div class="overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg">
                        <table id="default-table" class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Divisi
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jabatan
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NIP
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item->name }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item->position }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            @if ($item->role === 'division_head')
                                                Kepala Divisi
                                            @elseif ($item->role === 'employee')
                                                Karyawan
                                            @endif
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item->nip ?? '-' }}
                                        </td>
                                    </tr>

                                    {{-- Modal konfirmasi --}}
                                    <div id="modal-konfirmasi{{ $item->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-white rounded-lg shadow-sm">
                                                <button type="button" class="absolute top-3 end-2.5 text-gray-600 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="modal-konfirmasi{{ $item->id }}">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete this employee?</h3>
                                                    <button data-modal-hide="modal-konfirmasi{{ $item->id }}" onclick="event.preventDefault(); document.getElementById('form-delete-employer-{{ $item->id }}').submit();" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button data-modal-hide="modal-konfirmasi{{ $item->id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
                                                        No, cancel
                                                    </button>
                                                    <form id="form-delete-employer-{{ $item->id }}" action="{{ route('admin.employer.destroy', $item->id) }}" method="post">@csrf @method('delete')</form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End modal konfirmasi --}}

                                    {{-- Modal edit karyawan --}}
                                    <div id="modal-edit-karyawan{{ $item->id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow-sm">
                                                <!-- Modal header -->
                                                <div class="pt-4">
                                                    <img src="{{ asset('assets/Logo 36 Degrees-03.png') }}" alt="36 Degrees Logo" class="w-16 mx-auto">
                                                    <h3 class="text-xl text-center font-semibold text-gray-900">Edit Karyawan</h3>
                                                    <p class="text-xs text-gray-400 text-center">Kami Merancang untuk Mencerminkan Kepribadian dan Selera Anda</p>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:py-5 md:px-8">
                                                    <form class="" action="{{ route('admin.employer.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                                            <input type="text" name="nama" value="{{ $item->name }}" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" placeholder="Contoh: John Doe" required />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nip" class="block mb-2 text-sm font-medium text-gray-900">NIP</label>
                                                            <input type="text" name="nip" value="{{ $item->nip }}" id="nip" placeholder="Contoh: 1234xxxxxxx" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" required />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                                            <select id="divisi" name="divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" required>
                                                                <option disabled selected>Pilih divisi</option>
                                                                <option value="Finance" {{ $item->position === 'Finance' ? 'selected' : '' }}>Finance</option>
                                                                <option value="Sales dan Marketing" {{ $item->position === 'Sales dan Marketing' ? 'selected' : '' }}>Sales dan Marketing</option>
                                                                <option value="Div. Operasional dan Proyek" {{ $item->position === 'Div. Operasional dan Proyek' ? 'selected' : '' }}>Div. Operasional dan Proyek</option>
                                                                <option value="Div. Desain dan Kreatif" {{ $item->position === 'Div. Desain dan Kreatif' ? 'selected' : '' }}>Div. Desain dan Kreatif</option>
                                                                <option value="Div. Pengendalian Kualitas" {{ $item->position === 'Div. Pengendalian Kualitas' ? 'selected' : '' }}>Div. Pengendalian Kualitas</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                                                            <select id="jabatan" name="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5">
                                                                <option disabled selected>Pilih Jabatan</option>
                                                                <option value="division_head" {{ $item->role === 'division_head' ? 'selected' : '' }}>Kepala Divisi</option>
                                                                <option value="employee" {{ $item->role === 'employee' ? 'selected' : '' }}>Karyawan</option>
                                                            </select>
                                                        </div>
                                                        <div class="flex justify-center mt-8 gap-5">
                                                            <button type="button" data-modal-hide="modal-edit-karyawan{{ $item->id }}" class="w-fit text-black bg-[#c4bcbc] shadow-lg hover:bg-[#d1cfcfb7] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                close
                                                            </button>
                                                            <button type="submit" class="w-fit text-white bg-black hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                                                Simpan
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End modal edit karyawan --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal tambah karyawan --}}
        <div id="modal-add-karyawan" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm">
                    <!-- Modal header -->
                    <div class="pt-4">
                        <img src="{{ asset('assets/Logo 36 Degrees-03.png') }}" alt="36 Degrees Logo" class="w-16 mx-auto">
                        <h3 class="text-xl text-center font-semibold text-gray-900">Tambah Karyawan</h3>
                        <p class="text-xs text-gray-400 text-center">Kami Merancang untuk Mencerminkan Kepribadian dan Selera Anda</p>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:py-5 md:px-8">
                        <form class="" action="{{ route('admin.employer.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" placeholder="Contoh: John Doe" required />
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="block mb-2 text-sm font-medium text-gray-900">NIP</label>
                                <input type="text" name="nip" id="nip" placeholder="Contoh: 1234xxxxxxx" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" required />
                            </div>
                            <div class="mb-3">
                                <label for="divisi" class="block mb-2 text-sm font-medium text-gray-900">Divisi</label>
                                <select id="divisi" name="divisi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" required>
                                    <option disabled selected>Pilih divisi</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Sales dan Marketing">Sales dan Marketing</option>
                                    <option value="Div. Operasional dan Proyek">Div. Operasional dan Proyek</option>
                                    <option value="Div. Desain dan Kreatif">Div. Desain dan Kreatif</option>
                                    <option value="Div. Pengendalian Kualitas">Div. Pengendalian Kualitas</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900">Jabatan</label>
                                <select id="jabatan" name="jabatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" required>
                                    <option disabled selected>Pilih Jabatan</option>
                                    <option value="division_head">Kepala Divisi</option>
                                    <option value="employee">Karyawan</option>
                                </select>
                            </div>
                            <div class="flex justify-center mt-8 gap-5">
                                <button type="button" data-modal-hide="modal-add-karyawan" class="w-fit text-black bg-[#c4bcbc] shadow-lg hover:bg-[#d1cfcfb7] font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    close
                                </button>
                                <button type="submit" class="w-fit text-white bg-black hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End modal tambah karyawan --}}
    </section>
@endsection
