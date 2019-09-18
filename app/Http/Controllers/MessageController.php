<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __contruct()
    {
        $this->middleware('auth'); //pasiekiamas tik autorizuotiems
    }

    public function index()
    {
        // echo 'ok';
        $data['messages'] = Message::active()->where('receiver_id', auth()->id())->get();
        return view('messages.index',$data);
    }

    public function indexAdmin()
    {
        // echo 'ok';
       // $messages = Message::active()->where('reception_id', auth()->id()->get());
        return view('admin.messages');
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
    public function show($id) //traukiam visa objekta
    {
        $message = Message::find($id);
        if ($message->status != 0) {
            $message->status = 0;
            $message->save();
        }
        $data['message'] = $message;
        return view('messages.single', $data);
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
    public function destroy($id)
    {
        //
    }
}
