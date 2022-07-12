<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::paginate(5);
        return view('admin.pages.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.banner.create');
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
            'image' => 'image|file|max:5000',
        ]);

        $banner = new Banner();

        $banner->name = $request->name;
        $banner->desc = $request->desc;

        if ($request->file('image')) {
            $banner->image = $request->file('image')->store('uploads');
        }

        $banner->created_at = date('Y-m-d H:i:s');

        $banner->save();

        return redirect('admin/banner')->with('success', 'Banner ' . $banner->name . ' successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = Banner::firstWhere('id', $id);
        return view('admin.pages.banner.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = Banner::firstWhere('id', $id);
        return view('admin.pages.banner.edit', compact('banner'));
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
            'image' => 'image|file|max:5000',
        ]);

        $banner = Banner::firstWhere('id', $id);

        $banner->name = $request->name;
        $banner->desc = $request->desc;

        if ($request->file('image')) {
            if ($banner->image) {
                $full_path = public_path() . '/storage/uploads/' . basename($banner->image);
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }

            $banner->image = $request->file('image')->store('uploads');
        }

        $banner->created_at = date('Y-m-d H:i:s');

        $banner->save();

        return redirect('admin/banner')->with('success', 'Banner ' . $banner->name . ' successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::firstWhere('id', $id);
        $full_path = public_path() . '/storage/uploads/' . basename($banner->image);
        if (file_exists($full_path)) {
            unlink($full_path);
        }

        $banner->delete();

        return redirect('admin/banner')->with('success', 'Banner '.$banner->name.' successfully deleted!');
    }
}
