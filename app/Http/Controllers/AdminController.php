<?php

namespace App\Http\Controllers;

use App\Agency;
use App\Property;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        return view('admin.index');
    }

    public function indexProperties()
    {
        $properties = Property::all();
        return view('admin.properties.index')->withProperties($properties);
    }

    public function indexAgencies()
    {
        $agencies = Agency::all();
        return view('admin.agencies.index')->withAgencies($agencies);
    }
};
