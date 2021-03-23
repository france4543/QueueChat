<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListShop;
use App\Rent;
use App\Chat;
use Auth;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_my_order () {
        $rents = Rent::with('get_rents_member')
            ->where('status', '=', 'wait')
            ->get();
        return view('my_order.index', compact('rents'));
    }
}
