<x-app-layout>

    <x-slot name='header'>
        Profile
    </x-slot>

    <div>
        <span class="block mb-3 text-xl font-semibold">
            Informasi Data Diri
        </span>

        <form action="{{ route('personalInformation.update', $user->username) }}" method="post" class="max-w-full ">
            @method('patch')
            @csrf

            <div class="mb-5">
                <x-label for="fullname" label="Nama Lengkap" />
                <x-input id='fullname' name='fullname' value="{{ $user->fullname }}" />
            </div>
            <div class="mb-5">
                <x-label for="email" label="Email" />
                <x-input id='email' name='email' value="{{ $user->email }}" />
            </div>
            <div class="mb-5">
                <x-label for="address" label="Adrress" />
                <x-input id='address' name='address' value="{{ $user->address }}" />
            </div>
            <div class="mb-5">
                <x-label for="nik" label="Nomor Induk Kependudukan (NIK)" />
                <x-input id='nik' name='nik' value="{{ $user->nik }}" />
            </div>
            <div class="mb-5">
                <x-label for="gender" label="Jenis Kelamin" />
                <x-select name="gender">
                    @if ($user->gender === 'Laki-Laki')
                        <option selected value="{{ $user->gender }}">
                            {{ $user->gender }}
                        </option>
                        <option value="Perempuan">Perempuan</option>
                    @else
                        <option selected value="{{ $user->gender }}">
                            {{ $user->gender }}
                        </option>
                        <option value="Laki-Laki">Laki - Laki</option>
                    @endif
                </x-select>
            </div>
            <div class="mb-3">
                <x-label for="nik" label="Tanggal Lahir" />
                <x-input type="date" name="birth_date" id='nik' value="{{ $user->birth_date }}" />
            </div>
            <button type="submit"
                class="px-3 py-2 text-sm font-semibold text-white transition duration-200 rounded shadow bg-emerald-500 hover:bg-emerald-600">
                Simpan
            </button>
        </form>
    </div>

    <div class="mt-10">
        <span class="block mb-3 text-xl font-semibold">
            Ubah Password
        </span>

        <form action="{{ route('password.update', $user->username) }}" method="post" class="max-w-full ">
            @method('patch')
            @csrf

            <div class="mb-5">
                <x-label for="current_password" label="Password Lama" />
                <x-input id="current_password" type="password" name="current_password" />
                @error('current_password')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <x-label for="password" label="Password Baru" />
                <x-input id="password" type="password" name="password" />
                @error('password')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <x-label for="password_confirmation" label="Konfirmasi Password" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" />
                @error('password_confirmation')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="px-3 py-2 text-sm font-semibold text-white transition duration-200 rounded shadow bg-emerald-500 hover:bg-emerald-600">
                Simpan
            </button>

        </form>
    </div>


</x-app-layout>
