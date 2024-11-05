<!-- resources/views/livewire/attendance-table.blade.php -->
<div class="flex flex-col md:rounded-md md:shadow md:bg-white md:p-5 ">

    <div class="flex items-center justify-between mb-5">

        <span class="block px-5 text-xl font-bold">
            {{ Date::now()->translatedFormat('j F Y') }} <br>
            <div wire:poll.1ms class="text-sm text-slate-500">
                {{ Date::now()->translatedFormat('H:i:s') }}
            </div>
        </span>

        <div class="px-5">
            <select class="text-sm border rounded shadow cursor-pointer border-slate-300" wire:model.live="month">
                @foreach ($availableMonths as $mn)
                    <option value="{{ $mn }}">
                        {{ Carbon\Carbon::createFromFormat('!m', $mn)->translatedFormat('F') }}
                    </option>
                @endforeach
            </select>
            <select class="text-sm border rounded shadow cursor-pointer border-slate-300" wire:model.live="year">
                @foreach ($availableYears as $yr)
                    <option value="{{ $yr }}">{{ $yr }}</option>
                @endforeach
            </select>

        </div>
    </div>

    <div class="overflow-x-auto">
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
                    <tbody class="divide-y divide-neutral-200">
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
