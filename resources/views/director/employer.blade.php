@extends('layouts.base')

@section('content')
    <section>
        <div class="flex flex-col gap-3">
            <div class="flex justify-between items-center">
                <div class="flex gap-2">
                    <img src="{{ asset('assets/header.svg') }}">
                    <h2 class="text-xl font-semibold text-[#B96D40]">Data Karyawan</h2>
                </div>
                <div>
                    <button type="button" data-modal-target="modal-add-karyawan" data-modal-toggle="modal-add-karyawan" class="flex gap-2 text-white bg-[#B96D40] h-fit font-medium rounded-lg text-sm p-2.5">
                        <svg class="w-[20px] h-[20px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                        Tambah Karyawan
                    </button>
                </div>
            </div>

            <div>
                @if (Session::has('success_add_employer'))
                    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium text-green-800">
                            {{ Session::get('success_add_employer') }}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif

                @if (Session::has('success_edit_employer'))
                    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium text-green-800">
                            {{ Session::get('success_edit_employer') }}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif

                @if (Session::has('success_delete_employer'))
                    <div id="alert-3" class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50" role="alert">
                        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div class="ms-3 text-sm font-medium text-green-800">
                            {{ Session::get('success_delete_employer') }}
                        </div>
                        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                        </button>
                    </div>
                @endif

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
                                        Email
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
                                    <th scope="col" class="px-6 py-3">
                                        Aksi
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
                                            {{ $item->email }}
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
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            <div class="flex gap-2">
                                                <button type="button" data-modal-target="modal-edit-karyawan{{ $item->id }}" data-modal-toggle="modal-edit-karyawan{{ $item->id }}" class="cursor-pointer p-2 text-xs font-medium text-center text-white bg-blue-600 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                                    <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                                    </svg>
                                                </button>
                                                <button type="button" data-modal-target="modal-konfirmasi{{ $item->id }}" data-modal-toggle="modal-konfirmasi{{ $item->id }}" class="cursor-pointer p-2 text-xs font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                                                    <svg class="w-5 h-5 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                                    </svg>
                                                </button>
                                            </div>
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
                                                    <p class="text-xs text-gray-400 text-center mb-3">Kami Merancang untuk Mencerminkan Kepribadian dan Selera Anda</p>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-4 md:py-5 md:px-8 overflow-y-auto max-h-[calc(100vh-200px)]">
                                                    <form class="" action="{{ route('admin.employer.update', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                                            <input type="text" name="nama" value="{{ $item->name }}" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" placeholder="Contoh: John Doe" required />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                                            <input type="email" name="email" value="{{ $item->email }}" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" placeholder="Contoh:
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
        <div id="modal-add-karyawan" tabindex="-1" aria-hidden="true" class="hidden overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm">
                    <!-- Modal header -->
                    <div class="pt-4">
                        <img src="{{ asset('assets/Logo 36 Degrees-03.png') }}" alt="36 Degrees Logo" class="w-16 mx-auto">
                        <h3 class="text-xl text-center font-semibold text-gray-900">Tambah Karyawan</h3>
                        <p class="text-xs text-gray-400 text-center mb-3">Kami Merancang untuk Mencerminkan Kepribadian dan Selera Anda</p>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:py-5 md:px-8 overflow-y-auto max-h-[calc(100vh-200px)]">
                        <form class="" action="{{ route('admin.employer.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" placeholder="Contoh: John Doe" required />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B9752E] focus:border-[#B9752E] block w-full p-2.5" placeholder="Contoh: johndoe@36degrees.com" required />
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
