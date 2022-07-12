<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.user.create');
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
            'fullname' => 'required',
            'nik' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);
        
        $user = new User();

        $user->fullname = $request->fullname;
        $user->email = $request->email;
        $user->nik = $request->nik;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->created_at = date('Y-m-d H:i:s');

        $user->save();

        return redirect('admin/user')->with('success', 'User '.$user->fullname.' successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::firstWhere('id', $id);
        return view('admin.pages.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::firstWhere('id', $id);
        return view('admin.pages.user.edit', compact('user'));
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
            'fullname' => 'required',
            'role' => 'required',
        ]);

        $user = User::firstWhere('id', $id);

        $user->fullname = $request->fullname;
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->updated_at = date('Y-m-d H:i:s');

        $user->save();

        return redirect('admin/user')->with('success', 'User '.$user->fullname.' successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::firstWhere('id', $id);

        if (Auth::user()->id == $id) {
            return redirect('admin/user')->with('error', 'User '.$user->fullname.' cannot be deleted!');
        }

        $user->delete();

        return redirect('admin/user')->with('success', 'User '.$user->fullname.' successfully deleted!');
    }
}
