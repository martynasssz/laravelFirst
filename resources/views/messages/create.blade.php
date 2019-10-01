@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Sukurti žinutė</div>
                    <div class="card-body">
                        <form method="post" action="{{route('messages.store')}}">
                            <label for="message_all">Siųsti visiems</label>
                            <input id="message_all" name="message_all" type="checkbox">
                            @csrf

                            <select name="type_id">
                                @foreach($msg_types as $msg_types)
                                    <option  class="form-control" value="{{$msg_types->id}}">{{$msg_types->type}}</option>
                                @endforeach
                            </select>
                            <select id="receiver" name="receiver_id">
                                @foreach($users as $user)
                                    <option  class="form-control" value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                            <input class="form-control" name="subject" type="text"  placeholder="Subject">
                            <textarea class="form-control" placeholder="Message" name="message"></textarea>

                            <button class="btn alert-success mt-2">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
