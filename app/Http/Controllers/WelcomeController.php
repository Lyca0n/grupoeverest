<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OperationType;
use App\ListingType;
use App\State;
use App\City;

class WelcomeController extends Controller
{
    public function index(){
        return view('welcome', [
            'otypes' => OperationType::all(),
            'ltypes' => ListingType::all(),
            'states' => State::all(),
            'cities' => City::all(),
        ]);
    }

    public function contact(){
        return view('static.contact');
    }
}
