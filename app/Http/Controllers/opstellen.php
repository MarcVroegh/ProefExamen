<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\models\reserveringen;
use App\models\opstellen as opstellens;
use Carbon\Carbon;
use DateTime;

class opstellen extends Controller
{
    public function index(request $request){
      $id = $request->id;
      return view('opstellen')->with('id', $id);
    }

    public function opstellen(request $request){
      $id = $request->input('id');
      $opstellen = new opstellens();
      $reserveringen = new reserveringen();
        $gast = reserveringen::where('id', $request->input('id'))->first()->gast;
        $opstellen->gast = $gast;
        $opstellen->naam = $request->input('naam');
        $opstellen->hoeveel = $request->input('hoeveel');
        $opstellen->prijs = $request->input('prijs');
        $opstellen->save();
        return view('opstellen')->with('id', $id)->with('succes', 'succes');
    }

    public function afrekenen(request $request){
      date_default_timezone_set('Europe/Amsterdam');
      $id = $request->input('id');
      $opstellen = new opstellens();
      $afgerekend = new reserveringen();
      $gast = reserveringen::where('id', $request->input('id'))->first()->gast;
      $date = new DateTime;
      $date->modify('-500 minutes');
      $formatted_date = $date->format('Y-m-d H:i:s');
      $opstellen = opstellens::where('gast', $gast)->where('create_at', '>', $formatted_date)->get();
      $SetAfgerekend = reserveringen::where('id', $request->input('id'))->update(['onoff'=>'on']);
      return view('printen')->with('opstellen', $opstellen);
    }

    public function show(request $request){
      date_default_timezone_set('Europe/Amsterdam');
      $id = $request->input('id');
      $opstellen = new opstellens();
      $afgerekend = new reserveringen();
      $gast = reserveringen::where('id', $request->input('id'))->first()->gast;
      $date = new DateTime;
      $date->modify('-500 minutes');
      $formatted_date = $date->format('Y-m-d H:i:s');
      $opstellen = opstellens::where('gast', $gast)->where('create_at', '>', $formatted_date)->get();
      $SetAfgerekend = reserveringen::where('id', $request->input('id'))->update(['onoff'=>'on']);
      return view('printen')->with('opstellen', $opstellen);
    }
}

