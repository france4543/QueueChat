<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_barberProfile () {
        return view('profile.barber');
    }

    public function post_barberProfile (Request $request) {
        $users = User::find(Auth::user()->id);
        if ($request -> file('images') !== null) {
            $users->update($request->all());
            $users->images = $request -> file('images')->store('/images', 'public');
            $users->save();
        } else {
            $users->images = $users->images;
            $users->update($request->all());
            $users->save();
        }
        return redirect('/barber/profile');
    }

    public function get_memberProfile () {
        return view('profile.member');
    }

    public function post_memberProfile (Request $request) {
        $users = User::find(Auth::user()->id);
        $users->update($request -> all());
        return redirect('/member/profile');
    }
}
