<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; // for query builder

use App\Models\Student;
use App\Models\Department;
use App\Models\Level;

class StudentController extends Controller
{
    public function list()
    {
        $students = DB::table('student')
            ->join('department', 'student.dept_id', '=', 'department.id')
            ->join('level', 'student.level_id', '=', 'level.id')
            ->select('student.*', 'department.name AS dept_name', 'level.name AS level_name')
            ->get();
        return view('admin.pages.liststudents', compact('students'));
    }

    public function create()
    {
        $depts = Department::all();
        $levels = Level::all();
        return view('admin.pages.addstudent', compact('depts', 'levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'address' => 'required|max:200',
            'code' => 'required|numeric|unique:student,code',
            'password' => 'required|between:8,30',
            'dept_id' => 'required',
            'level_id' => 'required'
        ]);

        $student = new Student();

        $student->name = $request->name;
        $student->address = $request->address;
        $student->code = $request->code;
        $student->password = $request->password;
        $student->dept_id = $request->dept_id;
        $student->level_id = $request->level_id;

        $student->save();

        return redirect()->back()->with('message', 'تم إضافة الطالب بنجاح.');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->back()->with("message", "تم حذف الطالب بنجاح");
    }
}
