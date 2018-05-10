<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SecurityController extends Controller
{
    public function index()
    {
        return view('settings.security');
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);

        $user->update([
            'password' => bcrypt($request->password),
        ]);

        flash('Your security settings have been updated!');

        return back();
    }
}
