@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Messages</div>
                    <a class="nav-link" href="{{route('messages.create')}}"> Create message </a>
                    <a class="nav-link" href="{{route('messages.sent')}}"> Sent messages</a>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
