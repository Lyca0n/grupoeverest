<?php

namespace App\Http\Controllers;

use App\City;
use App\Inquiry;
use App\ListingType;
use App\OperationType;
use App\State;
use Illuminate\Http\Request;
use App\Listing;
use Illuminate\Support\Facades\Session;
use App\Mail\Inquiry as InquiryMail;


class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('listing.index')->withListings(Listing::all());
    }

    public function search(Request $request,$ltype=null, $otype=null, $state=null, $city=null){
        $listings = Listing::query();
        $filters = array();
        if($ltype){
            $listingtype= ListingType::where('name' ,'=', $ltype)->firstOrFail();
            $listings->where('listing_type_id','=', $listingtype->id);
            array_push($filters,$ltype);
        }
        if($otype) {
            $operationtype = OperationType::where('name', '=', $otype)->firstOrFail();
            $listings->where('operation_type_id', '=', $operationtype->id);
            array_push($filters,$otype);
        }
        if($state) {
            $stateobj = State::where('name', '=', $state)->firstOrFail();
            $listings->where('state_id', '=', $stateobj->id);
            array_push($filters,$state);
        }
        if($city) {
            $operationtype = City::where('name', '=', $city)->firstOrFail();
            $listings->where('city_id', '=', $operationtype->id);
            array_push($filters,$city);
        }
        if($request->input('pricemin')) {
            $listings->where('price', '>=', $request->input('pricemin'));
            array_push($filters,'Precio Minimo: '.$request->input('pricemin'));
        }
        if($request->input('pricemax')) {
            $listings->where('price', '<=', $request->input('pricemax'));
            array_push($filters,'Precio Maximo: '.$request->input('pricemax'));
        }

        return view('listing.index',array(
           'listings' => $listings->get(),
           'filters' => $filters
        ));
    }

    public function show($id){
        return view('listing.show',array('listing' =>Listing::findOrFail($id)));
    }

    public function inquiry(Request $request,$id){
        $inqury = new Inquiry();
        $inqury->name = $request->input('name');
        $inqury->phone = $request->input('phone');
        $inqury->email = $request->input('email');
        $inqury->message = $request->input('description');
        $inqury->listing_id = $id;
        $inqury->save();
        Session::flash('flash_message', 'un asesor te contactará pronto');
        return view('listing.show',array('listing' =>Listing::findOrFail($id)));
    }
}
