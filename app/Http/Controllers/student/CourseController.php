<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; // for query builder

use App\Models\Course;
use App\Models\EnrollCourse;
use App\Models\Level;
use App\Models\Video;

class CourseController extends Controller
{
    public function list()
    {
        $courses = DB::table('enrollcourse')
            ->join('course', 'enrollcourse.course_id', '=', 'course.id')
            ->select(
                'course.*',
                'student_id'
            )->where('student_id', $_SESSION['student']->id)->get();

        return view('student.pages.mycourses', compact('courses'));
    }

    public function showVideos($id, $title)
    {
        $courseFound = Course::where('id', $id)->where('title', $title);

        if ($courseFound->count() === 0) {
            return redirect()->route('course.list');
        }

        $lectureVideos = Video::where('course_id', $id)->where('video_type', 'محاضرة')->get();
        $sectionVideos = Video::where('course_id', $id)->where('video_type', 'سكشن')->get();
        $labVideos = Video::where('course_id', $id)->where('video_type', 'معمل')->get();
        return view('student.pages.showVideos', compact('lectureVideos', 'sectionVideos', 'labVideos', 'title'));
    }

    public function create()
    {
        $courses = Course::where('dept_id', $_SESSION['student']->dept_id)->get();
        $levels = Level::all();
        return view('student.pages.enrollcourse', compact('courses', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required',
            'crscode' => 'required|string',
        ]);

        $alreadyEnrolled = EnrollCourse::where('student_id', $_SESSION['student']->id)->where('course_id', $request->course_id);

        if ($alreadyEnrolled->count() > 0) {
            return redirect()->back()->with('error', 'لقد قمت مسبقا بالتسجيل في هذه المادة.');
        }

        $courseCheck = Course::where('id', $request->course_id)->where('crscode', $request->crscode);
        if ($courseCheck->count() > 0) {
            $enroll = new EnrollCourse();

            $enroll->student_id = $_SESSION['student']->id;
            $enroll->course_id = $request->course_id;

            $enroll->save();
            return redirect()->route('course.list');
        }

        return redirect()->back()->with('error', 'كود مادة خاطئ.');
    }
}
