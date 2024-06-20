<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'project_id' => 1,
            'name' => fake()->name(), 
            'description' => fake()->word(),
            'created_by' => 1,
            'assigned_to' => 3,
            'estimated_hours' => '2024-06-22',
            'steps_to_reproduce' => fake()->word(),
            'expected_result' => fake()->word(),
            'actual_result'=> fake()->word(),
            'priority'=> "HIGH",
            'bug_type_id'=> 1,
            'test_type_id'=> 1,

            //
        ];
    }
}
