<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',['inquiries' => Inquiry::all()] );
    }

    public function delete($id)
    {
        Inquiry::destroy($id);

        return redirect()->route('home');
    }
}
