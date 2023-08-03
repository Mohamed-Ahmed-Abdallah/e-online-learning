<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; // for query builder

use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        if (empty($_SESSION['student'])) {
            return view('student.index');
        } else {
            return view('student.pages.home');
        }
    }

    public function login(Request $request) // This function deals with database.
    {
        $result = Student::where('code', $request->code)->where('password', $request->password);

        if ($result->count() === 1) {
            $_SESSION['student'] = $result->first();
            return view('student.pages.home');
        } else {
            return redirect()->back()->with('error', 'أدخل بيانات صحيحة');
        }
    }

    public function logout()
    {
        $_SESSION['student'] = null;
        return redirect()->route('student.index');
    }

    public function info()
    {
        $info = DB::table('student')
            ->join('department', 'student.dept_id', 'department.id')
            ->join('level', 'student.level_id', 'level.id')
            ->where('student.id', $_SESSION['student']->id)
            ->select('student.*', 'department.name as dept_name', 'level.name as level_name')->first();

        return view('student.pages.info', compact('info'));
    }
}
