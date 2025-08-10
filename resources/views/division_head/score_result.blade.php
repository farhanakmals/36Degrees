@extends('layouts.base')

@section('content')
    <section>
        <div class="flex flex-col gap-3">
            <div class="flex gap-2">
                <img src="{{ asset('assets/header.svg') }}">
                <h2 class="text-xl font-semibold text-[#B96D40]">Hasil Penilaian</h2>
            </div>
            <div>
                <div class="flex justify-between rounded-xl bg-white shadow-lg py-5 px-8">
                    <div>
                        <div class="flex flex-col gap-8 w-full">
                            <div>
                                <h1 class="text-lg font-semibold">Hello,</h1>
                                <p class="text-sm text-gray-500">Kami Merancang untuk Mencerminkan Kepribadian dan Selera Anda</p>
                            </div>
                            <form class="flex gap-5 mb-5 items-end w-full">
                                <div class="w-1/2">
                                    <label for="termin" class="block mb-2 text-sm font-medium text-gray-900">Periode</label>
                                    <select id="termin" name="termin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B96D40] focus:border-[#B96D40] block w-full p-2.5" required>
                                        <option disabled selected>Choose </option>
                                        <option value="januari-maret" {{ request('termin') == 'januari-maret' ? 'selected' : '' }}>Januari - Maret</option>
                                        <option value="april-juni" {{ request('termin') == 'april-juni' ? 'selected' : '' }}>April - Juni</option>
                                        <option value="juli-september" {{ request('termin') == 'juli-september' ? 'selected' : '' }}>Juli - September</option>
                                        <option value="oktober-desember" {{ request('termin') == 'oktober-desember' ? 'selected' : '' }}>Oktober - Desember</option>
                                    </select>
                                </div>
                                <div class="w-1/2">
                                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun</label>
                                    <select id="tahun" name="tahun" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#B96D40] focus:border-[#B96D40] block w-full p-2.5" required>
                                        <option disabled selected>Choose </option>
                                        @foreach ($tahunList as $thn)
                                            <option value="{{ $thn }}" {{ request('tahun') == $thn ? 'selected' : '' }}>{{ $thn }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="text-white bg-[#B96D40] h-fit font-medium rounded-lg text-sm p-2.5">
                                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="hidden sm:block">
                        <img src="{{ asset('assets/asset-1.svg') }}" class="w-64" alt="">
                    </div>
                </div>
            </div>
            <div>
                <h1 class="text-lg font-semibold text-[#B96D40] mt-3 mb-2">Data Hasil Penilaian</h1>
                <div class="overflow-hidden shadow-lg sm:rounded-md">
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
                                    @if ($grouped->isNotEmpty())
                                        @foreach (array_keys($grouped->first()) as $key)
                                            @if (!in_array($key, ['nama', 'divisi', 'rata_rata']))
                                                <th scope="col" class="px-6 py-3">
                                                    {{ $key }}
                                                </th>
                                            @endif
                                        @endforeach
                                    @endif
                                    <th scope="col" class="px-6 py-3">
                                        Rata-Rata
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Reward
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grouped as $item)
                                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                                        <td class="px-6 py-4">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item['nama'] }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item['divisi'] }}
                                        </td>
                                        @foreach (array_keys($grouped->first()) as $key)
                                            @if (!in_array($key, ['nama', 'divisi', 'rata_rata']))
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                    {{ number_format($item[$key], 2, ',', '.') }}
                                                </td>
                                            @endif
                                        @endforeach
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item['rata_rata'] }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item['reward'] ?? '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
