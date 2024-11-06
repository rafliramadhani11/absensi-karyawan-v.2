<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Attendance Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
            text-transform: capitalize
        }
    </style>
</head>

<body>
    <h1>Data Absensi - {{ \Carbon\Carbon::createFromDate($year, $month)->format('F Y') }}</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kehadiran</th>
                <th>Datang</th>
                <th>Pulang</th>
                <th>Alasan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($attendances as $attendance)
                <tr>
                    <td>
                        {{ $attendance->created_at->translatedFormat('l') }}
                        <br>
                        {{ $attendance->created_at->translatedFormat('j F Y') }}
                    </td>
                    <td>{{ $attendance->type }}</td>
                    <td>{{ $attendance->checkin }}</td>
                    <td>{{ $attendance->checkout }}</td>
                    <td>{{ $attendance->reason }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">
                        Data Tidak Ditemukan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
