<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reserveringen;
use Carbon\Carbon;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        date_default_timezone_set('Europe/Amsterdam');
        $reserveringen = new reserveringen();

        $date = new DateTime;
        $date->modify('-1440 minutes');
        $formatted_date = $date->format('Y-m-d H:i:s');
        $AllReserveringenOpenstaand = reserveringen::where('create_at', '>', $formatted_date)->where('onoff', 'off')->orderBy('id', 'desc')->get();
        $AllReserveringenAfgerekend = reserveringen::where('create_at', '>', $formatted_date)->where('onoff', 'on')->orderBy('id', 'desc')->get();


        return view('home')->with('AllReserveringenOpenstaand', $AllReserveringenOpenstaand)->with('AllReserveringenAfgerekend', $AllReserveringenAfgerekend);
    }
}
