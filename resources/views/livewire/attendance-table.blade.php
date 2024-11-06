<!-- resources/views/livewire/attendance-table.blade.php -->
<div class="flex flex-col md:rounded-md md:shadow md:bg-white md:p-5 ">
    <div class="flex items-end justify-between">
        <div>
            {{-- <button wire:click='pdfDownload'
                class="inline-flex items-center px-2 py-2 text-sm font-semibold text-white transition duration-200 bg-green-500 rounded shadow hover:bg-green-600 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mr-1 size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                </svg>
                Cetak semua data absen
            </button> --}}
            <button wire:click='pdfDownload'
                class="inline-flex items-center px-2 py-2 text-sm font-semibold text-white transition duration-200 bg-green-500 rounded shadow hover:bg-green-600 w-fit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="mr-1 size-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                Cetak bulan ini
            </button>

        </div>



        <div>

            <select class="text-sm border rounded shadow cursor-pointer border-slate-300" wire:model.live="month">
                @foreach ($availableMonths as $mn)
                    <option value="{{ $mn }}">
                        {{ Carbon\Carbon::createFromFormat('!m', $mn)->translatedFormat('F') }}
                    </option>
                @endforeach
            </select>

            <!-- Dropdown untuk Tahun -->
            <select class="text-sm border rounded shadow cursor-pointer border-slate-300" wire:model.live="year">
                @foreach ($availableYears as $yr)
                    <option value="{{ $yr }}">{{ $yr }}</option>
                @endforeach
            </select>

        </div>

    </div>

    <div class="mt-5 overflow-x-auto">
        <div class="inline-block min-w-full">
            <div class="overflow-hidden">
                <table class="min-w-full divide-y divide-neutral-200">
                    <thead>
                        <tr class="text-neutral-500">
                            <x-table.head label="Tanggal" />
                            <x-table.head label="Kehadiran" />
                            <x-table.head label="Datang" />
                            <x-table.head label="Pulang" />
                            <x-table.head label="Alasan" />
                        </tr>
                    </thead>
                    <tbody wire:loading.remove wire:target="month, year" class="divide-y divide-neutral-200">
                        @forelse ($attendances as $attendance)
                            <tr class="text-neutral-800">
                                <x-table.data>
                                    <span class="block text-xs">
                                        {{ $attendance->created_at->translatedFormat('l') }}
                                    </span>
                                    <span class="block text-xs text-slate-500">
                                        {{ $attendance->created_at->translatedFormat('j F Y') }}
                                    </span>
                                </x-table.data>
                                <x-table.data class="text-xs">
                                    <x-badge :type="$attendance->type" />
                                </x-table.data>
                                <x-table.data class="text-sm" label="{{ $attendance->checkin }}" />
                                <x-table.data class="text-sm" label="{{ $attendance->checkout }}" />
                                <x-table.data class="text-xs md:text-sm" label="{{ $attendance->reason }}" />
                            </tr>
                        @empty
                            <tr class="text-neutral-800">
                                <x-table.data colspan="5" class="py-5 text-sm text-center"
                                    label="Data Tidak Ditemukan" />
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="mt-5">
        {{ $attendances->links(data: ['scrollTo' => false]) }}
    </div>


</div>
