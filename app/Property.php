<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table="properties";
    protected $fillable=['value','property_type_id','listing_id'];

    public function propertyType(){
        return $this->belongsTo('App\PropertyType');
    }
    public function listing(){
        return $this->belongsTo('App\Listing');
    }
}
