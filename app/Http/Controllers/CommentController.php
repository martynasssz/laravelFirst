<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Advert;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
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

        $user = Auth::user();
        if ($user) {
            $comment = new Comment();
            $user = auth()->user();
            $comment->user_id = $user->id;
            $comment->advert_id = $request->advertId;
            $comment->content = $request->content_text;
            $comment->save();
            return redirect()->back();
        }


//        }else{
//            echo ':(';
//        }
        //return redirect()->route('advert', $request->adId);
        //return redirect()->action('AdvertController@show', $request->slug);
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
//        $comments = Comment::where('active', '=', 1)->where('advert_id','=',$advert->id)->get();
//
//
//        $categories= Category::where('active','=',1)->get();
//        $data['comments'] = $comments;
//        $cat =Category::find($id);
//        $data['cat'] = $cat;
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
    public function destroy($id)
    {
        $user = Auth::user();
        if ($user) {
            $comment = new Comment();
            $comment = Comment::find($id);
            $comment->active = 0;
            $comment->save();
            return redirect()->back();
        }
    }
}
