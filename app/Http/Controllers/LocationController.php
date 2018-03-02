<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Location;
use App\Http\Resources\Location as LocationResource;
use App\Http\Requests;


class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::paginate(15);
        return LocationResource::collection($locations);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $location = $request->isMethod('put') ? Location::findOrFail($request->id) : new Location;
        $location->id = $request->input('id');
        $location->mac = $request->input('mac');
        $location->fecha = $request->input('fecha');
        $location->hora = $request->input('hora');
        $location->latitud = $request->input('latitud');
        $location->longitud = $request->input('longitud');

        if($location->save()){
            return new LocationResource($location);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$location = Location::findOrFail();
        $locations = Location::where('mac', $id)->orderBy('id', 'desc')->paginate(10);
        //return new LocationResource($location);
        return LocationResource::collection($locations);
    }

    /**
     * Display the specified resource by date.
     *
     * @param  int  $id
     * @param  int  $date
     * @return \Illuminate\Http\Response
     */
    public function showByDate($id, $date)
    {
        //$location = Location::findOrFail();
        $locations = Location::where('mac', $id)->where('fecha',$date)->orderBy('hora', 'desc')->get();
        
        //return new LocationResource($location);
        return LocationResource::collection($locations);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
