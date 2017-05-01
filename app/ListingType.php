<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListingType extends Model
{
    protected $table = "listing_types";
    protected $fillable= ['name'];
    public function listing()
    {
        return $this->belongsTo('App\listing');
    }
}
