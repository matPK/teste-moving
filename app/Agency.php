<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Property;

class Agency extends Model
{
    protected $fillable = [
        'name', 'description'
    ];

    public function properties()
    {
        return $this->hasMany('App\Property');
    }
}
