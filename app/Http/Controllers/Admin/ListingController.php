<?php

namespace App\Http\Controllers\Admin;

use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listing;
use App\ListingType;
use App\PropertyType;
use App\OperationType;
use App\City;
use App\State;
use App\Picture;
use Input;

class ListingController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.listing.index')->withListings(Listing::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.listing.create', [
            'ltypes' => ListingType::all(),
            'otypes' => OperationType::all(),
            'states' => State::all(),
            'cities' => City::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listing = new Listing();
        $listing->name = $request->input('name');
        $listing->price = $request->input('price');
        $listing->squaremeters = $request->input('squaremeters');
        $listing->buildsquaremeters = $request->input('buildsquaremeters');
        $listing->number = $request->input('number');
        $listing->street = $request->input('street');
        $listing->neighbourhood = $request->input('neighbourhood');
        $listing->description = $request->input('description');
        $listing->zipcode = $request->input('zipcode');
        $listing->longitude = $request->input('longitude');
        $listing->latitude = $request->input('latitude');
        $listing->listing_type_id = $request->input('ltype');
        $listing->operation_type_id = $request->input('otype');
        $listing->city_id = $request->input('city');
        $listing->state_id = $request->input('state');

        $listing->save();

        foreach ( $request->file('pictures') as $photo) {
            //$filename = $photo->move('../storage/app/pictures',rand(0,9));
            $filename = $photo->store('pictures');
            Picture::create([
                'listing_id' => $listing->id,
                'filename' => $filename
            ]);
        }
        return redirect()->route('listing.properties',['id' => $listing->id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('admin.listing.edit',[
            'listing' => Listing::findOrFail($id),
            'types' => ListingType::all(),
            'otypes' => OperationType::all(),
            'states' => State::all(),
            'cities' => City::all(),
        ]);
    }

    public function properties($id)
    {
            return view('admin.listing.property',[
                'listing' => Listing::find($id),
                'types' => PropertyType::all(),
            ]);


    }

    public function propertiesStore(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $property = new Property();
            $property->property_type_id = $request->input('type');
            $property->value =$request->input('value');
            $property->listing_id = $id;
            $property->save();
            return redirect()->route('listing.properties', ['id' => $id]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $listing = Listing::findOrFail($id);
        $listing->name = $request->input('name');
        $listing->price = $request->input('price');
        $listing->squaremeters = $request->input('squaremeters');
        $listing->squaremeters = $request->input('buildsquaremeters');
        $listing->number = $request->input('number');
        $listing->street = $request->input('street');
        $listing->neighbourhood = $request->input('neighbourhood');
        $listing->description = $request->input('description');
        $listing->zipcode = $request->input('zipcode');
        $listing->longitude = $request->input('longitude');
        $listing->latitude = $request->input('latitude');
        $listing->listing_type_id = $request->input('type');
        $listing->operation_type_id = $request->input('otype');
        $listing->city_id = $request->input('city');
        $listing->state_id = $request->input('state');
        $listing->save();
        return redirect()->route('listing.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Listing::destroy($id);

        return redirect()->route('listing.index');
    }
}
