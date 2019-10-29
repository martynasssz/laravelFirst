@extends('layouts.app')

@section('content')
    @if(session()->has('message'))

        <div class="row">
            <div class="col-12">
                <div class="alert alert-success alert-dismissible">

                    {{session()->get('message')}}
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            @include('user.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Žinutė</div>
                    <div class="card-body">
                         <div class="card mt-2">
                                <div class="card-header">
                                    <div>
                                        <small> Žinutė gauta: {{$message->created_at}}</small>
                                    </div>
                                </div>

                                <div class="p-2 pl-5 border-bottom">
                                     <b>{{$message->subject}} </b>

                                </div>
                                <div class="p-2 pl-5">{{$message->message}}</div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection