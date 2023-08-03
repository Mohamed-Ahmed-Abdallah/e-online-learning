<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; // for query builder

use App\Models\Course;
use App\Models\Department;
use App\Models\Level;
use App\Models\Instructor;

class CourseController extends Controller
{
    public function list()
    {
        $courses = DB::table('course')
            ->join('department', 'course.dept_id', '=', 'department.id')
            ->join('level', 'course.level_id', '=', 'level.id')
            ->join('instructor', 'course.instructor_id', '=', 'instructor.id')
            ->join('instructor as TA', 'course.TA_id', '=', 'TA.id')
            ->select(
                'course.*',
                'department.name AS dept_name',
                'instructor.name AS instructor_name',
                'instructor.job_title',
                'TA.name AS TA_name',
                'TA.job_title AS TA_title',
                'level.name As level_name'
            )->get();

        return view('admin.pages.listcourses', compact('courses'));
    }

    public function create()
    {
        $depts  = Department::all();
        $levels = Level::all();
        $doctors = Instructor::where('job_title', 'دكتور')->get();
        $TAs = Instructor::where('job_title', 'معيد')->get();
        return view('admin.pages.addcourse', compact('depts', 'levels', 'doctors', 'TAs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'crscode' => 'required|string',
            'dept_id' => 'required',
            'level_id' => 'required',
            'term_name' => 'required',
            'doctor_id' => 'required', // doctor id
            'TA_id' => 'required', // TA id
        ]);

        $course = new Course();

        $course->title = $request->title;
        $course->crscode = $request->crscode;
        $course->dept_id = $request->dept_id;
        $course->level_id = $request->level_id;
        $course->term_name = $request->term_name;
        $course->instructor_id = $request->doctor_id;
        $course->TA_id = $request->TA_id;

        $course->save();

        return redirect()->back()->with('message', 'تم إضافة المادة بنجاح.');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->back()->with("message", "تم حذف المادة بنجاح");
    }
}
