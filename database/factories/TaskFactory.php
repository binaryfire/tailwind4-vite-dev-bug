<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->optional(0.7)->words(5, true),
            'due_date' => $this->faker->optional(0.5)->dateTimeBetween('now', '+2 months'),
            'priority' => $this->faker->numberBetween(0, 5),
            'metadata' => $this->faker->optional(0.3)->randomElements([
                'category' => $this->faker->word(),
                'project' => $this->faker->company(),
            ], 2, false),
        ];
    }
}