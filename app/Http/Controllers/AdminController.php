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

    //
    public function getIndex()
    {
        return view('admin.index');
    }

    public function indexProperties()
    {
        $properties = Property::all();
        return view('admin.properties.index')->withProperties($properties);
    }

    public function createProperty()
    {
        return view('admin.properties.create');
    }

    public function editProperty($id)
    {
        $property = Property::find($id);
        return view('admin.properties.edit')->withProperty($property);
    }


    public function indexAgencies()
    {
        $agencies = Agency::all();
        return view('admin.agencies.index')->withAgencies($agencies);
    }

    public function createAgency()
    {
        return view('admin.agencies.create');
    }

    public function editAgency($id)
    {
        $agency = Agency::find($id);
        return view('admin.agencies.edit')->withAgency($agency);
    }

};
