<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListShop;
use App\Rent;
use App\Chat;
use Auth;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_barber () {
        return view('chats.barber');
    }

    public function get_member () {
        return view('chats.member');
    }
}
