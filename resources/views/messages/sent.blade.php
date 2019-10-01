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
            @include('admin.sidebar')

            <div class="col-md-8">

                <div class="card">
                    @foreach($messages as $message)
                <div class="alert-message alert-message-success">

                    <h4>{{$message->subject}}</h4>
                    <p> {{$message->message}}</p>


                 </div>
                    @endforeach
                    {{$messages->links()}}
                </div>

            </div>


{{--           <div class="row justify-content-center">--}}
{{--               @include('admin.sidebar')--}}
{{--            <div class="col-md-8">--}}

{{--                <div class="card">--}}
{{--                    <div class="card-header">Messages</div>--}}
{{--                    @foreach($messages as $message)--}}

{{--                    <div class="card-subtitle">--}}
{{--                        {{$message->subject}}--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        {{$message->message}}--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>

    </div>
@endsection