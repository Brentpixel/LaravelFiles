<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Welcome page – show only today's tasks.
     */
    public function welcome()
    {
        $today = Carbon::today()->toDateString();

        $tasks = Task::whereDate('task_date', $today)
                     ->orderBy('status')
                     ->orderBy('title')
                     ->get();

        return view('welcome', compact('tasks', 'today'));
    }

    /**
     * Task List page – every task ordered by date, then title.
     */
    public function index()
    {
        $tasks = Task::orderBy('task_date', 'asc')
                     ->orderBy('title', 'asc')
                     ->get();

        return view('tasks', compact('tasks'));
    }

    /**
     * Profile page – display the single seeded developer user.
     */
    public function profile()
    {
        $user = User::where('username', 'bverdera')->first()
              ?? User::first();

        return view('profile', compact('user'));
    }
}

