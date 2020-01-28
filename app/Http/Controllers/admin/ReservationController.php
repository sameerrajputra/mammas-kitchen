<?php

namespace App\Http\Controllers\admin;


use App\Notifications\ReservationConfirmed;
use App\Http\Controllers\Controller;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
    	$reservations = Reservation::all();
    	return view('admin.reservation.index', compact('reservations'));
    }

    public function update($id)
    {
    	$reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Notification::route('mail', $reservation->email)
            ->notify(new ReservationConfirmed());
        return redirect()->back()->with('successMsg', 'Reservation status changed');
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('successMsg', 'Reservation deleted successfully');
    }
}
