<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; // for query builder

use App\Models\Instructor;
use App\Models\Department;

class InstructorController extends Controller
{

    public function list()
    {
        $instructors = DB::table('instructor')
            ->join('department', 'instructor.dept_id', '=', 'department.id')
            ->select('instructor.*', 'department.name AS dept_name')
            ->get();
        return view('admin.pages.listinstructors', compact('instructors'));
    }

    public function create()
    {
        $depts = Department::all();
        return view('admin.pages.addinstructor', compact('depts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|between:3,100',
            'address' => 'required|max:200',
            'email' => 'required|email|unique:instructor,email',
            'password' => 'required|between:8,30',
            'dept_id' => 'required',
            'job_title' => 'required',
        ]);

        $instructor = new Instructor();

        $instructor->name = $request->name;
        $instructor->address = $request->address;
        $instructor->email = $request->email;
        $instructor->password = $request->password;
        $instructor->dept_id = $request->dept_id;
        $instructor->job_title = $request->job_title;

        $instructor->save();

        return redirect()->back()->with('message', 'تم إضافة المعلم بنجاح.');
    }

    public function destroy($id)
    {
        $instructor = instructor::find($id);
        $instructor->delete();

        return redirect()->back()->with("message", "تم حذف المعلم بنجاح");
    }
}
