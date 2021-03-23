<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ListShop;
use App\Rent;
use App\Chat;
use Auth;

class BarberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_for_rent () {
        //$rents = Rent::all()->where('user_id', '=', Auth::user()->id);
        
        $rents = Rent::with('get_rents_barber')
            ->where('status', '=', 'wait')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        return view('my_customer.index', compact('rents'));
    }

    public function post_for_rent (Request $request, $id) {
        $rents = new Rent([
            'user_id' => $id,
            'customer_id' => Auth::user()->id,
            'status' => 'wait'
        ]);
        $rents -> save();
        return redirect('/member/order');
    }

    public function reject_for_rent (Request $request, $id) {
        $rents = Rent::find($id);
        $rents->status = 'cancel';
        $rents->save();
        return redirect('/barber/customer');
    }
}
