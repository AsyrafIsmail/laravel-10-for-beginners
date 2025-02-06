<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function update(UpdateAvatarRequest $request){

        $path = ($request->file('avatar')->store('avatars', 'public'));
        auth()->user()->update(['avatar' => $path]);
        // dd(auth()->user());

        // return response()->redirectTo('/profile');
        // return back()->with('message', 'Avatar is changed.');
        return redirect(route('profile.edit'))->with('message', 'Avatar is updated');
    }
}
