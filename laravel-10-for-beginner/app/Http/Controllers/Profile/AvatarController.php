<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAvatarRequest;


class AvatarController extends Controller
{
    //
    public function update(UpdateAvatarRequest $request)
    {
       
       


        // dd($request->input('avatar'));
        dd($request->all());

        return redirect(route('profile.edit'));
    }
}
