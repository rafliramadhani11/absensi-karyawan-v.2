<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithoutUrlPagination;


class AttendanceTable extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $user;
    public $year;
    public $month;
    public $availableYears = [];
    public $availableMonths = [];

    public function mount()
    {
        // Ambil tahun dari tanggal absensi menggunakan YEAR untuk MySQL
        $this->availableYears = $this->user->attendances()
            ->selectRaw("YEAR(created_at) as year")
            ->distinct()
            ->pluck('year')
            ->sortDesc()
            ->toArray();

        // Ambil bulan dari tanggal absensi menggunakan MONTH untuk MySQL
        $this->availableMonths = $this->user->attendances()
            ->selectRaw("MONTH(created_at) as month")
            ->distinct()
            ->pluck('month')
            ->sort()
            ->toArray();

        // Set default ke tahun dan bulan saat ini, jika tersedia
        $this->year = now()->format('Y');
        $this->month = now()->format('m');
    }

    public function pdfDownload()
    {
        $attendances = $this->user->attendances()
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->get();

        $pdf = Pdf::loadView('pdf.user-absensi', [
            'attendances' => $attendances,
            'year' => $this->year,
            'month' => $this->month,
        ]);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'absensi-report-' . $this->year . '-' . $this->month . '.pdf');
    }

    public function render()
    {
        $attendances = $this->user->attendances()
            ->whereRaw("YEAR(created_at) = ?", [$this->year])
            ->whereRaw("MONTH(created_at) = ?", [$this->month])
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('livewire.attendance-table', [
            'attendances' => $attendances,
        ]);
    }
}
