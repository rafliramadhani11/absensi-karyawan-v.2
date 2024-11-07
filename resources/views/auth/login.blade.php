<x-guest-layout>


    <div class="w-5/6 sm:max-w-md sm:bg-white sm:rounded-lg sm:py-5 sm:px-8 sm:shadow-md md:max-w-lg">

        <div class="mb-5">
            <h1 class="text-3xl font-semibold text-center sm:text-start sm:text-2xl text-slate-700">Login
                Account
            </h1>
            <p class="invisible sm:visible sm:text-sm sm:text-slate-500 ">
                Masukan Akun anda yang HRD anda buatkan
            </p>
        </div>

        <form action="{{ route('auth') }}" method="POST" class="space-y-5">
            @method('post')
            @csrf

            @foreach ($errors->all() as $error)
                <div x-data="{ alertIsVisible: true }" x-show="alertIsVisible" x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 transform scale-90"
                    x-transition:enter-end="opacity-100 transform scale-100"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-100 transform scale-100"
                    x-transition:leave-end="opacity-0 transform scale-90"
                    class="flex items-center justify-between px-4 py-2 bg-red-600 rounded">
                    <svg class="w-5 h-5 mr-3 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" /></svg>

                    <p class="text-sm font-semibold text-white">{{ $error }}</p>
                    <button type="button" @click="alertIsVisible = false" class="p-1 ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true"
                            stroke="currentColor" fill="none" stroke-width="2.5"
                            class="w-4 h-4 text-white ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endforeach

            {{-- EMAIL --}}
            <div>
                <x-label label="Email address" for="email" />
                <div class="mt-2">
                    <x-input name="email" id="email" type="email" />
                </div>
            </div>

            {{-- PASSWORD --}}
            <div>
                <x-label label="Password" for="password" />
                <div class="mt-2">
                    <x-input name="password" type="password" id="password" />
                </div>
            </div>
            <div class="mt-5 space-y-2">
                <x-button label="Login" class="w-full " />
                <p class="text-sm text-slate-500">Belum punya akun? Hubungi HRD anda segera</p>
            </div>
        </form>


    </div>

</x-guest-layout>
