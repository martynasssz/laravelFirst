<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::All();
        $data['cities'] = $cities;
        return view ('cities.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        if ($user && $user->hasRole('admin')) {
            return view ('cities.create');
        }
        else {
            echo "Prisijunkite";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user && $user->hasRole('admin')) {
            $city = new City();
            $city->name = $request->name;
            $city->save();
            return redirect()->back();
        }
        else {
            echo "Prisijunkite";
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        if ($user && $user->hasRole('admin')) {
            $city = City::find($id);
            $data['city']= $city;
            return view ('cities.edit', $data);
        }
        else {
            echo "Prisijunkite";
        }
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
        $user = auth()->user();
        if ($user && $user->hasRole('admin')) {
            $city = City::find($id);
            $city->name = $request->name;
            $city->save();
            return redirect()->action('CityController@index');
        }
        else {
            echo "Prisijunkite";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::destroy($id);
        return redirect()->action('CityController@index');
    }
}
