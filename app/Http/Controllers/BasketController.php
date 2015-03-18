<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Seat;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    public function index()
    {
        return view('basket.index');
    }

    public function checkout()
    {
        $basket = Session::get('basket');

        foreach ($basket as $row) {
            $row->options->seats = Seat::all();
            $tickets = Ticket::where('perfID', '=', $row->id)->get();
            foreach ($tickets as $ticket) {
                foreach ($row->options->seats as $key => $seat) {
                    if ($seat->id == $ticket->seatID) {
                        unset($row->options->seats[$key]);
                    }
                }
            }
        }
        return view('basket.checkout', compact('basket'), compact('seats'), compact('tickets'));
    }
}
