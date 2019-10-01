<?php

namespace App\Http\Controllers;

use App\Message;
use App\MessageType;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        return view('messages.index', $data);
    }

    public function indexAdmin()
    {
        // echo 'ok';
        // $messages = Message::active()->where('reception_id', auth()->id()->get());
        $user = Auth::user();
        if ($user && $user->hasRole('admin')){
            return view('messages.admin');
        } else {
            echo 'no permissions';
        }





    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if ($user && $user->hasRole('admin')) {
            $data['users'] = User::all(); //paimam aktyvius userius User::active()->get()
            $data['msg_types'] = MessageType::all();
            return view('messages.create', $data);
        } else {
            echo 'no permissions';
        }
    }


    public function createMsgType()
    {

    }

    public function storeMsgType()
    {

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        if ($user && $user->hasRole('admin')) {
            if ($request->message_all) {
                foreach (User::all() as $receiver) {
                    $message = new Message();
                    $message->receiver_id = $receiver->id;
                    $message->message = $request->message;
                    $message->sender_id = $user->id;
                    $message->status = 1;
                    $message->state = 1;
                    $message->type_id = $request->type_id;
                    $message->subject = $request->subject;
                    $message->save();
                }
            } else {
                $message = new Message();
                $message->receiver_id = $request->receiver_id;
                $message->message = $request->message;
                $message->sender_id = $user->id;
                $message->status = 1;
                $message->state = 1;
                $message->type_id = $request->type_id;
                $message->subject = $request->subject;
                $message->save();
            }
            return redirect()->back();
        } else {
            echo 'no permissions';
        }
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

public function showAllMsg(){
    $user =Auth:: user();
    if ($user &&$user->hasRole('admin')) {
            $data['messages']= Message::paginate(5);
            return view ('messages.sent',$data);
       }
}



/**
 * Show the form for editing the specified resource.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */







public
function edit($id)
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
public
function update(Request $request, $id)
{
    //
}

/**
 * Remove the specified resource from storage.
 *
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public
function destroy($id)
{
    //
}
}
