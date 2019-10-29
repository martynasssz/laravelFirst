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
                            <div class="form-group">
                                <input class="form-control" name="subject" type="text"  placeholder="Žinutės antraštė">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Žinutės tekstas" name="message"></textarea>
                            </div>
                            <button class="btn btn-secondary btn-sm mt-2">Siųsti</button>
                        </form>
                    </div>
                    <div class="card-header">Išsiųstos žinutės</div>




                </div>
             </div>
        </div>
    </div>
@endsection
