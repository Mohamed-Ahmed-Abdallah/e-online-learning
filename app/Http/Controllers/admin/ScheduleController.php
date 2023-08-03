<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Schedule;
use App\Models\Department;
use App\Models\Level;

class ScheduleController extends Controller
{
    public function create()
    {
        $depts = Department::all();
        $levels = Level::all();
        return view('admin.pages.addschedule', compact('depts', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'string',
            'file_path' => 'file|mimes:pdf',
        ], [
            'file_path.file' => 'يجب أن يكون الملف من نوع' . ' pdf ',
            'file_path.mimes' => 'يجب أن يكون الملف من نوع' . ' pdf '
        ]);

        $schedule = new Schedule();

        $schedule->title    = $request->title;
        $schedule->dept_id  = $request->dept_id;
        $schedule->level_id = $request->level_id;

        $file_name = '__' . $schedule->title . time() . '.' . $request->file_path->getClientOriginalExtension();
        $request->file_path->move(public_path('upload\pdf'), $file_name);
        $schedule->file_path  = $file_name;

        $schedule->save();

        return redirect()->back()->with('message', 'تم إضافة الجدول الدراسي بنجاح.');
    }
}
