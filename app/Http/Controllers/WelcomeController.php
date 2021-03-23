<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListShop;
use Auth;

class WelcomeController extends Controller
{
    public function index () {
        $users = User::all()->where('user_role', '=', 'Barber')->where('images', '!=', null);
        return view('home', compact('users'));
    }
}
