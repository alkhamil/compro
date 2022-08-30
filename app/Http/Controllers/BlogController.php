<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view('admin.pages.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.blog.create');
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
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:5000',
        ]);

        $blog = new Blog();

        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->user_id = Auth::user()->id;

        if ($request->file('image')) {
            $blog->image = $request->file('image')->store('uploads');
        }

        $blog->created_at = date('Y-m-d H:i:s');

        $blog->save();

        return redirect('admin/blog')->with('success', 'blog ' . $blog->title . ' successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::firstWhere('id', $id);
        return view('admin.pages.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::firstWhere('id', $id);
        return view('admin.pages.blog.edit', compact('blog'));
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
            'title' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:5000',
        ]);

        $blog = Blog::firstWhere('id', $id);

        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->user_id = Auth::user()->id;

        if ($request->file('image')) {
            if ($blog->image) {
                $full_path = public_path() . '/storage/uploads/' . basename($blog->image);
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }


            $blog->image = $request->file('image')->store('uploads');
        }

        $blog->updated_at = date('Y-m-d H:i:s');

        $blog->save();

        return redirect('admin/blog')->with('success', 'blog ' . $blog->name . ' successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::firstWhere('id', $id);
        $full_path = public_path() . '/storage/uploads/' . basename($blog->image);
        if (file_exists($full_path)) {
            unlink($full_path);
        }

        $blog->delete();

        return redirect('admin/blog')->with('success', 'blog ' . $blog->name . ' successfully deleted!');
    }
}
