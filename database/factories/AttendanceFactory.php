<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('2024-01-01', '2024-12-30');
        $type = Arr::random(['hadir', 'tidak hadir', 'izin']);
        return [
            'user_id' => 1,
            'type' => $type,
            'checkin' => $type === 'hadir' ? fake()->time() : null,
            'checkout' => $type === 'hadir' ? fake()->time() : null,
            'reason' => $type === 'tidak hadir' ? "Tidak ada Alasan" : ($type === 'izin' ? fake()->sentence() : null),
            'created_at' => $date,
            'updated_at' => $date,
        ];
    }
}
