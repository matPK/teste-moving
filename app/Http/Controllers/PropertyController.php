<?php

namespace App\Http\Controllers;

use App\Property;
use App\Agency;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Property::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:2000',
            'address' => 'required|string|max:255',
            'type' => 'required|in:Casa,Apartamento',
            'agency_id' => 'required|integer|exists:agencies,id',
        ]);
        $property = new Property;
        $property->description = $request->get('description');
        $property->address = $request->get('address');
        $property->type = $request->get('type');
        $agency = Agency::find($request->get('agency_id'));

        $property->agency()->associate($agency);

        $property->save();

        return response($property, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return $property;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:2000',
            'address' => 'required|string|max:255',
            'type' => 'required|in:Casa,Apartamento',
            'agency_id' => 'required|integer|exists:agencies,id',
        ]);
        $property = Property::find($id);
        $property->description = $request->get('description');
        $property->address = $request->get('address');
        $property->type = $request->get('type');
        $agency = Agency::find($request->get('agency_id'));

        $property->agency()->associate($agency);

        $property->save();
        return $property;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return response(null, 204);
    }
}
