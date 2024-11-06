<x-app-layout>

    <x-slot name='header'>
        Profile
    </x-slot>

    <span class="block text-xl font-semibold ">
        Informasi Data Diri
    </span>

    <form action="{{ route('user.profile.update', $user->username) }}" method="post" class="max-w-full space-y-5">
        @method('patch')
        @csrf

        <div>
            <x-label for="fullname" label="Nama Lengkap" />
            <x-input id='fullname' name='fullname' value="{{ $user->fullname }}" />
        </div>
        <div>
            <x-label for="email" label="Email" />
            <x-input id='email' name='email' value="{{ $user->email }}" />
        </div>
        <div>
            <x-label for="address" label="Adrress" />
            <x-input id='address' name='address' value="{{ $user->address }}" />
        </div>
        <div>
            <x-label for="nik" label="Nomor Induk Kependudukan (NIK)" />
            <x-input id='nik' name='nik' value="{{ $user->nik }}" />
        </div>
        <div>
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
        <div>
            <x-label for="nik" label="Tanggal Lahir" />
            <x-input type="date" name="birth_date" id='nik' value="{{ $user->birth_date }}" />
        </div>
        <button type="submit"
            class="px-2 py-1 font-semibold text-white transition duration-200 rounded shadow bg-emerald-500 hover:bg-emerald-600">
            Simpan
        </button>
    </form>

    {{-- <span class="block mt-5 text-xl font-semibold ">
        Informasi Data Diri
    </span>

    <form action="" class="space-y-5">

        <div>
            <x-label for="division" label="Division" />
            <x-select name="division_id">
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </x-select>

        </div>

    </form> --}}


</x-app-layout>
