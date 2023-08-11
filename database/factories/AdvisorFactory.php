<?php

namespace Database\Factories;

use App\Models\Advisor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advisor>
 */
class AdvisorFactory extends Factory
{
    protected $model = Advisor::class;

    public function definition(): array
    {
        return [
            'names' => $this->faker->firstName(),
            'first_lastname' => $this->faker->lastName(),
            'second_lastname' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->numerify('########'),
            'program_id' => $this->faker->numberBetween(1, 4),
            'user_id' => function () {
                return User::factory()->create(['role_id' => 2])->id;
            },
        ];
    }
}
