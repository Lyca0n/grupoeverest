<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table="inquiries";
    protected $fillable=['name','phone','email','message','listing_id'];
    public function listing(){
        return $this->belongsTo('App\Listing');
    }
}
