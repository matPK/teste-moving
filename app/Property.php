<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agency;

class Property extends Model
{
    //
    protected $fillable = [
        'description', 'type', 'address'
    ];

    public function agency()
    {
        return $this->belongsTo('App\Agency');
    }
}
