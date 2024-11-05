<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class AttendanceTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $user;
    public $year;
    public $month;
    public $availableYears = [];
    public $availableMonths = [];
    public $sortAsc = true;

    public function mount()
    {
        // Ambil tahun dari tanggal absensi menggunakan strftime untuk SQLite
        $this->availableYears = $this->user->attendances()
            ->selectRaw("strftime('%Y', created_at) as year")
            ->distinct()
            ->pluck('year')
            ->sortDesc()
            ->toArray();

        // Ambil bulan dari tanggal absensi menggunakan strftime untuk SQLite
        $this->availableMonths = $this->user->attendances()
            ->selectRaw("strftime('%m', created_at) as month")
            ->distinct()
            ->pluck('month')
            ->sort()
            ->toArray();

        // Set default ke tahun dan bulan saat ini, jika tersedia
        $this->year = now()->format('Y');
        $this->month = now()->format('m');
    }

    public function ascending()
    {
        $this->sortAsc = !$this->sortAsc;
    }

    public function render()
    {
        $attendances = $this->user->attendances()
            ->whereRaw("strftime('%Y', created_at) = ?", [$this->year])
            ->whereRaw("strftime('%m', created_at) = ?", [$this->month])
            ->orderBy('created_at', $this->sortAsc ? 'asc' : 'desc')
            ->paginate(8);

        return view('livewire.attendance-table', [
            'attendances' => $attendances,
        ]);
    }
}
