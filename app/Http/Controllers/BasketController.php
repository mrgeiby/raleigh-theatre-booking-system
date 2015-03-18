<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
        return view('basket.checkout');
    }
}
