<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Blog;
use App\Models\SettingInformation;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::get();
        $teachers = Teacher::take(3)->get();
        $blogs = Blog::take(5)->get();
        return view('home.pages.index', compact('banners', 'teachers', 'blogs'));
    }

    public function profile()
    {
        $settings = SettingInformation::pluck('value', 'key');
        return view('home.pages.profile', compact('settings'));
    }

    public function information()
    {
        $settings = SettingInformation::pluck('value', 'key');
        $teachers = Teacher::paginate(5);
        return view('home.pages.information', compact('settings', 'teachers'));
    }

    public function blog()
    {
        $blogs = Blog::paginate(5);
        return view('home.pages.blog', compact('blogs'));
    }

    public function blog_detail($title)
    {
        $blog = Blog::firstWhere('title', $title);
        return view('home.pages.blog_detail', compact('blog'));

    }

    public function teacher()
    {
        $teachers = Teacher::paginate(5);
        return view('home.pages.teacher', compact('teachers'));
    }

    public function teacher_detail($id)
    {
        $teacher = Teacher::firstWhere('id', $id);
        return view('home.pages.teacher_detail', compact('teacher'));
    }

    public function contact()
    {
        $settings = SettingInformation::pluck('value', 'key');
        return view('home.pages.contact', compact('settings'));
    }
}
