<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str; //nebuvo šio kontrolerio



class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::where('active', '=', 1)->get();
        $data['adverts'] = $adverts;

//        echo 'cia indexax';
        return view('adverts.index', $data); //atvaizduoja templatą
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//      $categories =Category::all(); //galima paprastai netrumpinant
//      $data['categories']=$categories;
        $user = Auth::user();
        if ($user && ($user->hasRole('admin') || $user->hasRole('user'))) {
            $data['categories'] = Category::where('active', '=', 1)->get();
            $data['title'] = 'Skelbimų kurimas';
            return view('adverts.create', $data);
        } else {
            echo 'no permissions';
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $advert = new Advert();
        $advert->title = $request->title; //duombazes title uzsetina formos lauko reišme
        $advert->content = $request->content_text;
        $advert->category_id = $request->category_id;
        $advert->image = $request->image;
        $advert->city_id = 1;
        $advert->user_id = $user->id;
        $advert->price = $request->price;
        $advert->slug = Str::slug($request->title, '-');
        $advert->save();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        //$advert =Advert::where('slug',$slug) ->first(); galima ir taip jei daro find
        //$advert = Advert::find($id);
        $data['advert'] = $advert;
//        echo '<pre>';
//        print_r( $data['advert']);
//        echo '</pre>';
        return view('adverts.single', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advert::find($id);
//        $advert=Advert::find($id);
        $data['advert'] = $advert;
        $data['categories'] = Category::where('active', '=', 1)->get();
        return view('adverts.edit', $data);
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
        $advert = Advert::find($id);
        $advert->title = $request->get('title'); //duombazes title uzsetina formos lauko reišme
        $advert->content = $request->get('content_text');
        $advert->category_id = $request->get('category_id');
        $advert->image = $request->get('image');
        $advert->city_id = 1;
        $advert->user_id = 1;
        $advert->price = $request->get('price');
        $advert->slug = Str::slug($request->get('title'), '-');
        $advert->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advert = Advert::find($id);
        $advert->active = 0;
        $advert->save();

    }
}
