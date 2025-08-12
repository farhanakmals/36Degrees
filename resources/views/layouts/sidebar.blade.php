<nav class="fixed top-0 z-40 w-full bg-[#B96D40]">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-start">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-white rounded-lg sm:hidden">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                    </svg>
                </button>
                <a href="{{ route('admin.dashboard') }}"  class="flex items-end">
                    <div  class="flex ms-2 ">
                        <img src="{{ asset('assets/Logo 36 Degrees-White-03.png') }}" class="w-10" alt="36Degrees Logo" />
                    </div>
                    <div class="flex flex-col">
                        <h5 class="text-white font-semibold">36 Degrees Interior</h5>
                        <p class="text-white font-semibold text-[9px] -mt-1">Solution for Customized Furniture</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-30 w-64 h-screen px-4 pt-24 transition-transform -translate-x-full bg-white shadow-lg sm:translate-x-0" aria-label="Sidebar">
    <div class="relative h-full">
        <div class="flex flex-col h-full justify-between">
            <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center p-2 text-gray-900 rounded-lg group {{ request()->routeIs('admin.dashboard') ? 'bg-[#e3c8ab]' : ' hover:bg-gray-100' }}">
                            <div class="p-2.5 rounded-lg shadow {{ request()->routeIs('admin.dashboard') ? 'bg-white' : 'bg-[#e3c8ab]' }}">
                                <img src="{{ asset('assets/sidebar-score-card.svg') }}">
                            </div>
                            <span class="ms-3 text-black font-semibold">Hasil Penilaian</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.aspect') }}" class="flex items-center p-2 text-gray-900 rounded-lg group {{ request()->routeIs('admin.aspect') ? 'bg-[#e3c8ab]' : ' hover:bg-gray-100' }}">
                            <div class="p-2.5 rounded-lg shadow {{ request()->routeIs('admin.aspect') ? 'bg-white' : 'bg-[#e3c8ab]' }}">
                                <img src="{{ asset('assets/sidebar-target.svg') }}">
                            </div>
                            <span class="ms-3 text-black font-semibold">Target Capaian</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.score_actual') }}" class="flex items-center p-2 text-gray-900 rounded-lg group {{ request()->routeIs('admin.score_actual') || request()->routeIs('admin.score_actual.create') || request()->routeIs('admin.score_actual.edit') ? 'bg-[#e3c8ab]' : ' hover:bg-gray-100' }}">
                            <div class="p-2.5 rounded-lg shadow {{ request()->routeIs('admin.score_actual') || request()->routeIs('admin.score_actual.create') || request()->routeIs('admin.score_actual.edit') ? 'bg-white' : 'bg-[#e3c8ab]' }}">
                                <img src="{{ asset('assets/sidebar-nilai-aktual.svg') }}">
                            </div>
                            <span class="ms-3 text-black font-semibold">Nilai Aktual</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.employer') }}" class="flex items-center p-2 text-gray-900 rounded-lg group {{ request()->routeIs('admin.employer') ? 'bg-[#e3c8ab]' : ' hover:bg-gray-100' }}">
                            <div class="p-2.5 rounded-lg shadow {{ request()->routeIs('admin.employer') ? 'bg-white' : 'bg-[#e3c8ab]' }}">
                                <img src="{{ asset('assets/sidebar-karyawan.svg') }}">
                            </div>
                            <span class="ms-3 text-black font-semibold">Data Karyawan</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="flex justify-center items-center p-4">
                <button type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="flex z-20 items-center p-2 w-fit text-gray-900 rounded-lg hover:bg-gray-100 group">
                    <div class="p-2.5 bg-[#e3c8ab] rounded-lg shadow">
                        <img src="{{ asset('assets/sidebar-logout.svg') }}">
                    </div>
                    <span class="ms-3 text-black font-semibold">Logout</span>
                </button>
            </div>
        </div>
        <div class="absolute z-10 bottom-0 -right-4 -left-4">
            <img src="{{ asset('assets/sidebar-assets.svg') }}" class="w-full h-full object-cover" alt="Background Image">
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
    @csrf
    </form>
</aside>
