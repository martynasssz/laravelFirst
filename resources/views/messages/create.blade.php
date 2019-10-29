@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Žinučių siuntimas</div>
                    <div class="card-body">
                        <form method="post" action="{{route('messages.store')}}">

                            <label for="message_all">Siųsti visiems</label>
                            <input id="message_all" name="message_all" type="checkbox">
                            @csrf
                            <select name="type_id">
                                @foreach($msg_types as $msg_types)
                                    <option class="form-control"
                                            value="{{$msg_types->id}}">{{$msg_types->type}}</option>
                                @endforeach
                            </select>
                            <select id="receiver" name="receiver_id">
                                @foreach($users as $user)
                                    <option class="form-control" value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <div class="form-group">
                                <input class="form-control" name="subject" type="text" placeholder="Žinutės antraštė">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Žinutės tekstas" name="message"></textarea>
                            </div>
                            <button class="btn btn-secondary btn-sm mt-2">Siųsti</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Išsiųstos žinutės</div>
                    <div class="card-body">
                        @foreach($messages as $message)
                            <div class="card mt-2">
                                <div class="card-header d-flex justify-content-between msg_head ">
                                    <div>Gavėjas: {{$message-> users_name->name}}</div>
                                    <div>
                                        <small> Žinutė išsiųsta: {{$message->created_at}}</small>
                                    </div>


                                </div>

                                <div class="p-2 pl-5 border-bottom "><h6><b>{{$message->subject}} </b></h6></div>
                                <div class="p-2 pl-5">{{$message->message}}</div>
                            </div>
                        @endforeach
                        {{$messages->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection







{{--            --}}
{{--                    ----Isiusitos zinites pradzia-----}}

{{--                <div class="card">--}}
{{--                    <div class="card-header">Išsiųstos žinutės</div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="col-md-8">--}}

{{--                            <div class="card">--}}
{{--                                @foreach($messages as $message)--}}
{{--                                    <div class="alert-message alert-message-success">--}}

{{--                                        <h4>{{$message->subject}}</h4>--}}
{{--                                        <p> {{$message->message}}</p>--}}


{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                                {{$messages->links()}}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                    ---- Išsiųstos žinutės pabaiga---- --}}
{{--            </div>--}}


