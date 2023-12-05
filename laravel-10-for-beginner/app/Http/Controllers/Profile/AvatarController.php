<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Support\Facades\Storage;


class AvatarController extends Controller
{
    //
    public function update(UpdateAvatarRequest $request)
    {
       
    //   $path = $request->file('avatar')->store('avatars','public' );

    // alternatively
    $path = Storage::disk('public')->put('avatars', $request->file('avatar'));


      // delete the older avatar if it exists
      if ($oldAvatar = $request->user()->avatar)
      {
        Storage::disk('public')->delete($oldAvatar);
      }




      auth()->user()->update(['avatar'=> $path ]);

        return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
    }
}
