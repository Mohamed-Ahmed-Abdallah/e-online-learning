<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        if (empty($_SESSION['admin'])) {
            return view('admin.index');
        } else {
            return view('admin.pages.home');
        }
    }

    public function login(Request $request) // This function deals with database.
    {
        $result = Admin::where('username', $request->username)->where('password', $request->password);

        if ($result->count() === 1) {
            $_SESSION['admin'] = $result->first();
            return view('admin.pages.home');
        } else {
            return view('admin.index');
        }
    }

    public function logout()
    {
        $_SESSION['admin'] = null;
        return redirect()->route('admin.index');
    }
}
