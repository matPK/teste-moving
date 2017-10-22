<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Property;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function indexUsers()
    {

    }
    public function getUser()
    {

    }
    public function createUser()
    {

    }
    public function editUser()
    {

    }
    public function indexProperties()
    {
        return view('properties.index');
    }
    public function getProperty($id)
    {
        $property = Property::find($id);
        if($property){
            return view('properties.show')->with('property', $property);
        }else{
            return abort(404);
        }
    }
    public function createProperty()
    {
        dd("teste");
    }
    public function editProperty()
    {

    }
}
