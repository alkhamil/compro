<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calendars = Calendar::paginate(5);
        return view('admin.pages.calendar.index', compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.calendar.create');
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
            'image' => 'image|file|max:5000',
        ]);

        $calendar = new Calendar();

        if ($request->file('image')) {
            $calendar->image = $request->file('image')->store('uploads');
        }

        $calendar->created_at = date('Y-m-d H:i:s');

        $calendar->save();

        return redirect('admin/calendar')->with('success', 'calendar ' . $calendar->name . ' successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calendar = Calendar::firstWhere('id', $id);
        return view('admin.pages.calendar.show', compact('calendar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calendar = Calendar::firstWhere('id', $id);
        return view('admin.pages.calendar.edit', compact('calendar'));
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
            'image' => 'image|file|max:5000',
        ]);

        $calendar = Calendar::firstWhere('id', $id);

        if ($request->file('image')) {
            if ($calendar->image) {
                $full_path = public_path() . '/storage/uploads/' . basename($calendar->image);
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }

            $calendar->image = $request->file('image')->store('uploads');
        }

        $calendar->updated_at = date('Y-m-d H:i:s');

        $calendar->save();

        return redirect('admin/calendar')->with('success', 'calendar ' . $calendar->name . ' successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calendar = Calendar::firstWhere('id', $id);
        $full_path = public_path() . '/storage/uploads/' . basename($calendar->image);
        if (file_exists($full_path)) {
            unlink($full_path);
        }

        $calendar->delete();

        return redirect('admin/calendar')->with('success', 'calendar '.$calendar->name.' successfully deleted!');
    }
}
