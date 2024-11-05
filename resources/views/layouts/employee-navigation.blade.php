@props(['user'])

<nav x-data="{ open: false }" class="relative w-full p-3 py-4 bg-white shadow sm:px-6 lg:px-16">

    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold tracking-wide">PT. Birdie</h1>

        <div x-data="{ showDropdown: false }" class="hidden sm:flex sm:items-center ">
            <div class="mr-3 border-r-2 border-slate-300 lg:block sm:hidden">

                <x-nav-link label="Data Absensi" />
                <x-nav-link label="Penggajian" />

            </div>

            <button @click="showDropdown = !showDropdown" class="flex items-center text-sm">
                {{ $user->fullname }}
                <x-icons.arrow-down />
            </button>

            {{-- DROPDOWN MENU --}}
            <div x-show="showDropdown" x-cloak x-transition:enter="transition duration-300"
                x-transition:enter-start="opacity-0 -translate-y-6" x-transition:enter-end="opacity-100 "
                x-transition:leave="transition  duration-300" x-transition:leave-start="opacity-100 "
                x-transition:leave-end="opacity-0 -translate-y-6"
                class="absolute md:max-w-64 sm:w-1/3 py-1.5 gap-y-3 bg-white rounded shadow sm:right-4 lg:right-16 top-[4.5rem]">

                <span class="px-3 text-xs ">
                    {{ $user->division->name }} |
                    {{ $user->divisionPosition->name }}
                </span>

                <hr class="my-2">
                <div class="lg:hidden">
                    <x-dropdown-link>
                        <x-icons.absensi class="mr-2 size-4" />
                        Data Absensi
                    </x-dropdown-link>
                    <x-dropdown-link>
                        <x-icons.penggajian class="mr-2 size-4" />
                        Penggajian
                    </x-dropdown-link>
                </div>

                <hr class="my-2 lg:hidden">

                <x-dropdown-link>
                    <x-icons.profile class="mr-2 size-4" />
                    Profile
                </x-dropdown-link>

                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button
                        class="flex items-center w-full px-3 py-1 text-sm transition duration-300 hover:bg-red-500 hover:text-white hover:font-semibold text-start">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="mr-2 size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                        </svg>
                        Sign Out
                    </button>
                </form>

            </div>
        </div>

        {{-- MOBILE DROPDOWN --}}
        <div @click="open = !open" class="sm:hidden tham tham-e-squeeze tham-w-6">
            <div class="tham-box">
                <div class="tham-inner" />
            </div>
        </div>

    </div>

    {{-- MOBILE MENU --}}
    <div x-show="open" x-cloak x-transition:enter="transition duration-300"
    x-transition:enter-start="opacity-0 -translate-y-6" x-transition:enter-end="opacity-100 "
        x-transition:leave="transition  duration-300" x-transition:leave-start="opacity-100 "
        x-transition:leave-end="opacity-0 -translate-y-6"
        class="absolute left-0 right-0 z-50 overflow-hidden bg-white shadow sm:hidden top-16">

        <x-mobile-menu-link>
            <x-icons.absensi class="mr-3 size-5" />
            Data Absensi
        </x-mobile-menu-link>

        <x-mobile-menu-link>
            <x-icons.penggajian class="mr-3 size-5" />
            Penggajian
        </x-mobile-menu-link>

        <hr>

        <div class="inline-block w-full p-3 sm:px-6">
            <span class="block font-semibold">
                {{ $user->fullname }}
            </span>
            <span class="text-xs">
                {{ $user->division->name }} | {{ $user->divisionPosition->name }}
            </span>
        </div>

        <x-mobile-menu-link>
            <x-icons.profile class="mr-3 size-5" />
            Profile
        </x-mobile-menu-link>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button
                class="flex items-center w-full px-3 py-2 mb-2 font-semibold tracking-wide transition duration-200 sm:px-6 fle text-start hover:text-white hover:bg-red-500 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mr-3 size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>

                Sign Out</button>
        </form>

    </div>

</nav>
