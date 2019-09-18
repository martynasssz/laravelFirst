@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('user.sidebar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Adverts</div>

                    <div class="card-body">
                        <a class="nav-link" href="{{route('user.userAdverts')}}"> My adverts </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
