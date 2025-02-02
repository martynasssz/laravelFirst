<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user = Auth::user();
//        if ($user && ($user->hasRole('user'))) {
//            return view('user.user');
//        } else {
//            echo 'No permissions';
//        }

        $user = Auth::user();
        if ($user && ($user->hasRole('user'))) {
            $adverts =Advert::where('active', '=', 1)->where('user_id', '=', $user->id)->get();
            $data['adverts'] = $adverts;
          //  dd($data['adverts']);
            return view('user.advert', $data);
               // return view('advert.index', $data);
        }

//echo "rrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr";

    }







//    public function userAdverts()
//    {
//        $user = Auth::user();
//        if ($user && ($user->hasRole('user'))) {
//            $adverts =Advert::where('active', '=', 1)->where('user_id', '=', $user->id)->get();
//            $data['adverts'] = $adverts;
//            return view('adverts.index', $data);
//        }
//
//
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

}
