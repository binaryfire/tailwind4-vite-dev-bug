<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Code;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Statistic;
use App\Models\SubStatistic;
use App\Models\Task;
use App\Models\TaskTag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(10)->create();

        $taskTags = TaskTag::factory(8)->create();

        // Create 2 tasks with 5 tags each
        for ($i = 0; $i < 2; $i++) {
            $task = Task::factory()->create();
            $task->tags()->attach($taskTags->random(5)->pluck('id'));
        }
    }
}
