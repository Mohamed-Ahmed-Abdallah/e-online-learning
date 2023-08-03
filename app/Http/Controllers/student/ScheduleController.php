<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function list()
    {
        $schedules = Schedule::where('dept_id', $_SESSION['student']->dept_id)
        ->where('level_id', $_SESSION['student']->level_id)->get();

        return view('student.pages.schedule', compact('schedules'));
    }
}
