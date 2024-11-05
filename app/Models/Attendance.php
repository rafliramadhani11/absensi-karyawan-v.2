<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    /** @use HasFactory<\Database\Factories\AttendanceFactory> */
    use HasFactory;
    // protected $casts = ['date' => 'date'];

    protected $fillable = ['user_id', 'type', 'checkin', 'checkout', 'reason'];

    public function scopeForMonthAndYear($query, $year, $month)
    {
        return $query->whereYear('created_at', $year)
            ->whereMonth('created_at', $month);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
