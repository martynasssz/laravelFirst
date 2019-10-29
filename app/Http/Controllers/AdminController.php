<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user && ($user->hasRole('admin'))) {
            $adverts = Advert::paginate(10);
            $data['adverts'] = $adverts;
            return view('admin.admin', $data);
        } else if ($user && ($user->hasRole('user'))) {
            return redirect()->action('UserController@index');
        } else {
            echo 'No permissions';
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
//    public function adminIndex()
//    {
//        $user = Auth::user();
//        if ($user && ($user->hasRole('admin'))) {
////            $adverts = Advert::active()->paginate(15);
//            $adverts = Advert::paginate(10);
//            $data['adverts'] = $adverts;
//            //  dd($data['adverts']);
//            return view('admin.admin', $data);
//        }
//
////
////        $adverts = Advert::All();
////        $data['adverts'] = $adverts;
////        return view('admin.admin', $data); //atvaizduoja templatą
//
//    }




    public function destroy($id)
    {
        $user = Auth::user();
        $advert = Advert::find($id);
        if ($user && $advert->user_id == (auth()->user()->id) || $user->hasRole('admin')) {
            $advert->active = 0;
            $advert->save();
            return redirect()->action('AdminController@index');
        } else {
            'no permissions';
        }

    }




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
        {
            $user = Auth::user();
            $advert = Advert::find($id);
            if ($user && $advert->user_id == (auth()->user()->id) || $user->hasRole('admin')) {
                $advert->active = 1;
                $advert->save();
                return redirect()->action('AdminController@index');
            } else {
                'no permissions';
            }

        }
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
