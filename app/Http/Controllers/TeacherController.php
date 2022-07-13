<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::paginate(5);
        return view('admin.pages.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'lesson' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'image' => 'image|file|max:1024',
        ]);

        $teacher = new Teacher();

        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->fb = $request->fb;
        $teacher->tw = $request->tw;
        $teacher->ig = $request->ig;
        $teacher->bio = $request->bio;
        $teacher->lesson = $request->lesson;

        if ($request->file('image')) {
            $teacher->image = $request->file('image')->store('uploads');
        }

        $teacher->created_at = date('Y-m-d H:i:s');

        $teacher->save();

        return redirect('admin/teacher')->with('success', 'teacher ' . $teacher->name . ' successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::firstWhere('id', $id);
        return view('admin.pages.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::firstWhere('id', $id);
        return view('admin.pages.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'lesson' => 'required',
            'phone' => 'required',
            'email' => 'email',
            'image' => 'image|file|max:1024',
        ]);

        $teacher = Teacher::firstWhere('id', $id);

        $teacher->name = $request->name;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->fb = $request->fb;
        $teacher->tw = $request->tw;
        $teacher->ig = $request->ig;
        $teacher->bio = $request->bio;
        $teacher->lesson = $request->lesson;

        if ($request->file('image')) {
            if ($teacher->image) {
                $full_path = public_path() . '/storage/uploads/' . basename($teacher->image);
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }

            $teacher->image = $request->file('image')->store('uploads');
        }

        $teacher->updated_at = date('Y-m-d H:i:s');

        $teacher->save();

        return redirect('admin/teacher')->with('success', 'teacher ' . $teacher->name . ' successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::firstWhere('id', $id);
        $full_path = public_path() . '/storage/uploads/' . basename($teacher->image);
        if (file_exists($full_path)) {
            unlink($full_path);
        }

        $teacher->delete();

        return redirect('admin/teacher')->with('success', 'teacher ' . $teacher->name . ' successfully deleted!');
    }
}
