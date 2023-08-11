<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'names' => $this->faker->firstName(),
            'first_lastname' => $this->faker->lastName(),
            'second_lastname' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->numerify('########'),
            'program_id' => $this->faker->numberBetween(1, 4),
            'semester' => $this->faker->numberBetween(1, 8),
            'user_id' => function () {
                return User::factory()->create(['role_id' => 1])->id;
            },
        ];
    }
}
