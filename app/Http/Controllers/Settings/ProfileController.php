<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('settings.profile', ['user' => $request->user()]);
    }

    public function update(Request $request)
    {
        $user = $request->user();

        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|unique:users,username,'.$user->id,
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $user->update($request->only('name', 'username', 'email'));

        flash('Your profile has been updated!');

        return back();
    }
}
