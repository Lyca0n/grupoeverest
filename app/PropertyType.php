<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    protected $table = "property_types";
    protected $fillable= ['name'];
    public function property()
    {
        return $this->hasMany('App\Property');
    }
}
