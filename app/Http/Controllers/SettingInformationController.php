<?php

namespace App\Http\Controllers;

use App\Models\SettingInformation;
use Illuminate\Http\Request;

class SettingInformationController extends Controller
{
    public function view()
    {
        $settings = SettingInformation::pluck('value', 'key');
        return view('admin.pages.setting.view', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'APP_NAME' => 'required',
            'LOGO' => 'image|file|max:2048',
            'PAVICON' => 'image|file|max:2048',
            'ABOUT' => 'required',
            'STRUCTURAL' => 'image|file|max:2048',
            'PHONE' => 'required',
            'EMAIL' => 'required|email',
            'ADDRESS' => 'required',
        ]);

        if ($request->APP_NAME) {
            SettingInformation::where('key', 'APP_NAME')->update(['value' => $request->APP_NAME]);
        }

        if ($request->file('LOGO')) {
            $LOGO = SettingInformation::firstWhere('key', 'LOGO');
            if ($LOGO->value) {
                $full_path = public_path() . '/storage/uploads/' . basename($LOGO->value);
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }

            SettingInformation::where('key', 'LOGO')
                ->update(['value' => $request->file('LOGO')->store('uploads')]);
        }

        if ($request->file('PAVICON')) {
            $PAVICON = SettingInformation::firstWhere('key', 'PAVICON');
            if ($PAVICON->value) {
                $full_path = public_path() . '/storage/uploads/' . basename($PAVICON->value);
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }

            SettingInformation::where('key', 'PAVICON')
                ->update(['value' => $request->file('PAVICON')->store('uploads')]);
        }

        if ($request->ABOUT) {
            SettingInformation::where('key', 'ABOUT')->update(['value' => $request->ABOUT]);
        }

        if ($request->file('STRUCTURAL')) {
            $STRUCTURAL = SettingInformation::firstWhere('key', 'STRUCTURAL');
            if ($STRUCTURAL->value) {
                $full_path = public_path() . '/storage/uploads/' . basename($STRUCTURAL->value);
                if (file_exists($full_path)) {
                    unlink($full_path);
                }
            }

            SettingInformation::where('key', 'STRUCTURAL')
                ->update(['value' => $request->file('STRUCTURAL')->store('uploads')]);
        }

        if ($request->PHONE) {
            SettingInformation::where('key', 'PHONE')->update(['value' => $request->PHONE]);
        }

        if ($request->EMAIL) {
            SettingInformation::where('key', 'EMAIL')->update(['value' => $request->EMAIL]);
        }

        if ($request->ADDRESS) {
            SettingInformation::where('key', 'ADDRESS')->update(['value' => $request->ADDRESS]);
        }

        if ($request->MAPS) {
            SettingInformation::where('key', 'MAPS')->update(['value' => $request->MAPS]);
        }

        if ($request->FB) {
            SettingInformation::where('key', 'FB')->update(['value' => $request->FB]);
        }

        if ($request->IG) {
            SettingInformation::where('key', 'IG')->update(['value' => $request->IG]);
        }

        if ($request->TW) {
            SettingInformation::where('key', 'TW')->update(['value' => $request->TW]);
        }


        return redirect('admin/setting/view')->with('success', 'successfully updated!');
    }
}
