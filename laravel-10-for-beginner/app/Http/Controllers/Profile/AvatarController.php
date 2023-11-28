<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    //
    public function update()
    {
        // option 1
        // return response()->redirectTo('/profile');

        // Option 2
        // return response()->redirectTo(route('profile.edit'));

        // Option 3
        // return back();

        // Return with a response
        return back()->with('message', 'Avatar is Added');

        // Only redirecting
        // return redirect(route('profile.edit'));
    }
}
