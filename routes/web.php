<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingInformationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('admin/user', [UserController::class, 'index'])->name('user.index');
    Route::get('admin/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('admin/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('admin/user/show/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('admin/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('admin/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    
    Route::get('admin/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::get('admin/banner/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('admin/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('admin/banner/show/{id}', [BannerController::class, 'show'])->name('banner.show');
    Route::get('admin/banner/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::post('admin/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::get('admin/banner/destroy/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');

    Route::get('admin/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('admin/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('admin/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('admin/blog/show/{id}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('admin/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('admin/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('admin/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('admin/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('admin/teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('admin/teacher/show/{id}', [TeacherController::class, 'show'])->name('teacher.show');
    Route::get('admin/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::post('admin/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::get('admin/teacher/destroy/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

    Route::get('admin/calendar', [CalendarController::class, 'index'])->name('calendar.index');
    Route::get('admin/calendar/create', [CalendarController::class, 'create'])->name('calendar.create');
    Route::post('admin/calendar/store', [CalendarController::class, 'store'])->name('calendar.store');
    Route::get('admin/calendar/show/{id}', [CalendarController::class, 'show'])->name('calendar.show');
    Route::get('admin/calendar/edit/{id}', [CalendarController::class, 'edit'])->name('calendar.edit');
    Route::post('admin/calendar/update/{id}', [CalendarController::class, 'update'])->name('calendar.update');
    Route::get('admin/calendar/destroy/{id}', [CalendarController::class, 'destroy'])->name('calendar.destroy');

    Route::get('admin/setting/view', [SettingInformationController::class, 'view'])->name('setting.view');
    Route::post('admin/setting/update', [SettingInformationController::class, 'update'])->name('setting.update');
    
    Route::get('auth/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware(['guest'])->group(function () {
    Route::get('auth/login', [AuthController::class, 'login'])->name('login');
    Route::post('auth/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/profile', [HomeController::class, 'profile'])->name('home.profile');
Route::get('/information', [HomeController::class, 'information'])->name('home.information');
Route::get('/blog', [HomeController::class, 'blog'])->name('home.blog');
Route::get('/blog/{title}', [HomeController::class, 'blog_detail'])->name('home.blog_detail');
Route::get('/teacher', [HomeController::class, 'teacher'])->name('home.teacher');
Route::get('/teacher/{id}', [HomeController::class, 'teacher_detail'])->name('home.teacher_detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');