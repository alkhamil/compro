<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $user = User::count();
        $blog = Blog::count();
        $teacher = Teacher::count();
        return view('admin.pages.dashboard.index', compact('user', 'blog', 'teacher'));
    }
}
