<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{

    protected $table="listings";
    protected $fillable=['name','price','squaremeters','buildsquaremeters','number',
        'street','neighbourhood','description','description',
        'zipcode','longitude','latitude', 'listing_type_id','operation_type_id','state_id','city_id', ];
    public function listingType(){
        return $this->hasOne('App\ListingType', 'id');
    }
    public function operationType(){
        return $this->hasOne('App\OperationType', 'id');
    }
    public function pictures(){
        return $this->hasMany('App\Picture', 'listing_id');
    }
    public function properties(){
        return $this->hasMany('App\Property', 'listing_id');
    }
    public function state(){
        return $this->belongsTo('App\State');
    }
    public function city(){
        return $this->belongsTo('App\City');
    }
    public function inquiries(){
        return $this->hasMany('App\Inquiry', 'listing_id');
    }
}
