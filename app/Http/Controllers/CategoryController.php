<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     //   $categories= Category::where('active','=',1)->where('parent_id','=',0)->get();
      //  $subcategories=Category::where('active','=',1)->where('parent_id','!=',0)->get();
      //  $data['categories']= $categories;
      $data['categories']=Category::where('active','=',1)->where('parent_id','=',0)->get();

       // $data['subcategories']=$subcategories;
      $data['categories_create'] = Category::all();
        //dd($categories);
        return view('category.index', $data);
    }

    public function search(Request $request){
        $search = $request->get('search');
        if($search !='') {
            $adverts=Advert::active()->where('title','like','%'.$search.'%')->paginate(5);
            $data['adverts'] = $adverts;
            return view ('category.show',$data);
        } else
        {
            $adverts= Advert::active()->paginate(3);
            $data['adverts'] = $adverts;
            return view ('category.show',$data);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view ('category.create', $data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title =$request->title;
        $category->slug =Str::slug($request->title,'-');
        $category->parent_id=$request->parent_id;
        $category->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function  show(Category $category)
    {
       $data['category'] = $category;
       $categoryIds = Category::getCategoriesBranchIds($category->id);
       $data['adverts']=Advert::whereIn('category_id', $categoryIds)->paginate(3);

       return view('category.single',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories= Category::where('active','=',1)->get(); //visos aktyvios kategorijos
        $data['categories']= $categories;
        $cat =Category::find($id); //pagal konkretų ID
        $data['cat'] = $cat;
        return view('category.edit',$data);


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
        $category=Category::find($id);
        $category->title =$request->get('title');
        $category->slug =Str::slug($request->get('title'),'-');
        $category->parent_id=$request->parent_id;
        $category->save();
        return redirect()->action('CategoryController@index');
//        return redirect()->back()->with('message','Kategorija sukurta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->active = 0;
        $category->save();
        return redirect()->back();
    }
}
