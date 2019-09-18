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
                    <div class="card-header">Messages</div>

                    @foreach($messages as $message)
                        <div class="card-subtitle">
                            <a href="{{route('message.show', $message->id)}}">
                                {{$message->subject}}
                            </a>
                        </div>
                        <div class="card-body">
                            {{$message->message}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection