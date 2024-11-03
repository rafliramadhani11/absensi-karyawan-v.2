<?php

namespace Database\Factories;

use App\Models\Division;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $fullname = fake()->name();
        $gender = ['Laki-Laki', 'Perempuan'];
        $role = ['Admin', 'HRD', 'Karyawan'];
        $divisions = Division::all();
        return [
            'division_id' => $divisions->random()->id,

            'username' => Str::slug($fullname),
            'password' => static::$password ??= Hash::make(123),
            'email' => fake()->unique()->safeEmail(),

            'nik' => fake()->nik(),
            'fullname' => $fullname,
            'gender' => Arr::random($gender),
            'address' => fake()->address(),
            'birth_date' => fake()->date(),

            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
