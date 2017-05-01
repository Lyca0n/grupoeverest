<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OperationType extends Model
{
    protected $table = "operation_types";
    protected $fillable = ['name'];
    public function listing()
    {
        return $this->belongsTo('App\Listing');
    }
}
