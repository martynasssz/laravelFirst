<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Attribute;
use App\Category;
use App\City;
use App\Comment;
use App\Mail\NewAdvert;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str; //nebuvo šio kontrolerio
use App\AttributeSet;
use App\AttributeValue;
use Illuminate\View\View;



class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    public function index()
    {
//      $adverts = Advert::where('active', '=', 1)->get(); uzkomentuota nes naudojam scope apsirase advert modelyje
//      $adverts = Advert::active()->get(); be puslapiavimo
        $adverts = Advert::active()->paginate(5); //visus aktyvius israsus istraukia

        $data['adverts'] = $adverts;


//      $data['categories']=Category::where('active','=',1)->where('parent_id','=',0)->get();
        return view('adverts.index', $data); //atvaizduoja templatą
        // return view('admin.adverts', $data);
    }

    public function search(Request $request){
        $search = $request->get('search');
        if($search !='') {
            $adverts=Advert::active()->where('title','like','%'.$search.'%')->paginate(5);
            $data['adverts'] = $adverts;
            return view ('adverts.index',$data);
        } else
        {
            $adverts= Advert::active()->paginate(3);
            $data['adverts'] = $adverts;
            return view ('adverts.index',$data);
        }
    }

//    public function action(Request $request)
//    {
//        if ($request->ajax()) //This condition will check if this method has receive any Ajax request or not
//            $query = $request->get('query');
//        if ($query != '') {
//
//            $data = advert::active()->where('title', 'like', '%' . $query . '%')->paginate(5);
//            $data['adverts'] = $data;
//            return view('adverts.index', $data);
//        } else {
//            $data = advert::active()->paginate(5);
//            $data['adverts'] = $data;
//            return view('adverts.index', $data);
//        }
//
//        $total_row = $data->count();
//        if ($total_row > 0) {
//            return View::make('adverts.ajax.search_results')->with('adverts', $data)->render();
//
//        } else //write html table code  with no data found message
//        {
//            $output = '
//                <tr>
//                    <td align="center" colspan="5">No Data found </td>
//                </tr>
//                ';
//        }
//        $data = array(
//            'table_data' => $output
//        );
//        echo json_encode($data);
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//      $categories =Category::all(); //galima paprastai netrumpinant
//      $data['categories']=$categories;
        $this->middleware('auth');
        $user = Auth::user();

            $data['categories'] = Category::where('active', '=', 1)->get();   ///---perrasyti i modeli 2019-09-19!!!!-----
            $data['title'] = 'Skelbimų kurimas';
            $data['attribute_sets'] = AttributeSet::all();
            $data['cities'] = City::All();
            return view('adverts.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');
        $user = auth()->user();
        $advert = new Advert();
        $advert->title = $request->title; //duombazes title uzsetina formos lauko reišme
        $advert->content = $request->content_text;
        $advert->category_id = $request->category_id;
        $advert->image = $request->image;
        $advert->city_id = $request->city_id;
        $advert->user_id = $user->id;
        $advert->price = $request->price;
        $advert->slug = Str::slug($request->title, '-');
      //  $advert->attribute_set_id = $request->attribute_set; (laikinai atjungta kol bus sutvarkyta)
        $advert->save();

//        $data = [
//            'name' => 'Martynas'
//        ];
//
//        Mail::to('userio@email.com')->send(new NewAdvert($data));
        return redirect()->action('UserController@index');
        //return redirect()->route('advert.edit', $advert->id); (laikinai atjungta kol bus sutvarkyta)
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $advert = Advert::where('slug', $slug)->first();
        // $advert = Advert::find($id);
        $data['advert'] = $advert;
        $comments = Comment::where('active', '=', 1)->where('advert_id', '=', $advert->id)->get();
        $data['comments'] = $comments;
        $data['attribute_sets'] = AttributeSet::all();
        $data['attributes'] = $advert->attributeSet->relations;
        $data['attributeValues'] = $advert->attributes;



        //  $data['attribute_values'] = $advert->attributeValue->values;

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
        $user = Auth::user();
        $advert = Advert::find($id);
        if ($user && $advert->user_id == (auth()->user()->id) || $user->hasRole('admin')) { //identifikuoja skelbimo useri
            $data['advert'] = $advert;
            $data['attribute_sets'] = AttributeSet::all();
            $data['attributes'] = $advert->attributeSet->relations;
            $data['categories'] = Category::where('active', '=', 1)->get();
            $data['cities'] = City::All();

            return view('adverts.edit', $data);
        } else {
            'no permissions';
        }
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
        $this->middleware('auth');
        $user = auth()->user();
        $data = $request->except('_token');


        // $data  = $request->keys();
        // dd($data);
        $attributes = [];
        foreach ($data as $key => $single) {
            if (strpos($key, 'super_attributes_') !== false) {
                $attributeName = str_replace('super_attributes_', '', $key);
                $attributes[$attributeName] = $single;
            }
        }

            foreach ($attributes as $name => $value) {
                $attributeObject = Attribute::where('name', $name)->first();
                $oldValue = AttributeValue::where('attribute_id', $attributeObject->id)
                ->where('advert_id', $id)->first();
            if ($oldValue === null) {
                $newValue = new AttributeValue();
                $newValue->attribute_id = $attributeObject->id;
                $newValue->advert_id = $id;
                $newValue->value = $value;
                $newValue->save();
            } else {
                $oldValue->value = $value;
                $oldValue->save();
            }
        }

        $advert = Advert::find($id);
        $advert->title = $request->title; //duombazes title uzsetina formos lauko reišme
        $advert->content = $request->content_text;
        $advert->category_id = $request->category_id;
        $advert->image = $request->image;
        $advert->city_id = $request->city_id;
        $advert->user_id = $user->id;
        $advert->price = $request->price;
        $advert->slug = Str::slug($request->title, '-');
        $advert->save();
        return redirect()->action('AdvertController@show', ['slug' => $advert->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $advert = Advert::find($id);
        if ($user && $advert->user_id == (auth()->user()->id) || $user->hasRole('admin')) {
            $advert->active = 0;
            $advert->save();
            return redirect()->action('UserController@index');
        } else {
            'no permissions';
        }

    }

    public function restore($id)
    {
        $user = Auth::user();
        $advert = Advert::find($id);
        if ($user && $advert->user_id == (auth()->user()->id) || $user->hasRole('admin')) {
            $advert->active = 1;
            $advert->save();
            return redirect()->action('UserController@index');
        } else {
            'no permissions';
        }

    }



}
