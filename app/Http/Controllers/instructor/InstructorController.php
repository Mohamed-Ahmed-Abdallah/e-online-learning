<?php

namespace App\Http\Controllers\instructor;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;



class InstructorController extends Controller
{
    public function index()
    {
        if (empty($_SESSION['instructor'])) {
            return view('instructor.index');
        } else {
            return view('instructor.pages.home');
        }
    }

    public function login(Request $request) // This function deals with database.
    {
        $result = Instructor::where('email', $request->email)->where('password', $request->password);

        if ($result->count() === 1) {
            $_SESSION['instructor'] = $result->first();
            return view('instructor.pages.home');
        } else {
            return view('instructor.index');
        }
    }

    public function logout()
    {
        $_SESSION['instructor'] = null;
        return redirect()->route('instructor.index');
    }
}
