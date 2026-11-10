<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Task dates are relative to today so the Welcome page always shows
     * today's tasks regardless of when the project is run.
     *
     * @return void
     */
    public function run()
    {
        $today     = Carbon::today()->toDateString();
        $yesterday = Carbon::yesterday()->toDateString();
        $twoDaysAgo = Carbon::today()->subDays(2)->toDateString();
        $tomorrow  = Carbon::tomorrow()->toDateString();

        $tasks = [
            // ── Today (4 tasks) ────────────────────────────────────────────
            [
                'title'     => 'Review and finalize project documentation',
                'status'    => 'pending',
                'task_date' => $today,
            ],
            [
                'title'     => 'Fix login form validation bug',
                'status'    => 'completed',
                'task_date' => $today,
            ],
            [
                'title'     => 'Team stand-up meeting at 9 AM',
                'status'    => 'completed',
                'task_date' => $today,
            ],
            [
                'title'     => 'Deploy hotfix to staging server',
                'status'    => 'in-progress',
                'task_date' => $today,
            ],

            // ── Yesterday (2 tasks) ─────────────────────────────────────────
            [
                'title'     => 'Write unit tests for Customer model',
                'status'    => 'completed',
                'task_date' => $yesterday,
            ],
            [
                'title'     => 'Update database seeder with sample data',
                'status'    => 'completed',
                'task_date' => $yesterday,
            ],

            // ── Two days ago (2 tasks) ──────────────────────────────────────
            [
                'title'     => 'Set up Laravel project structure',
                'status'    => 'completed',
                'task_date' => $twoDaysAgo,
            ],
            [
                'title'     => 'Configure MySQL connection in .env',
                'status'    => 'completed',
                'task_date' => $twoDaysAgo,
            ],

            // ── Tomorrow (1 task) ───────────────────────────────────────────
            [
                'title'     => 'Prepare presentation slides for TSA3 demo',
                'status'    => 'pending',
                'task_date' => $tomorrow,
            ],
        ];

        foreach ($tasks as $data) {
            Task::firstOrCreate(
                ['title' => $data['title'], 'task_date' => $data['task_date']],
                $data
            );
        }
    }
}

