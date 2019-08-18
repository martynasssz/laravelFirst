@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$advert->title}}</div>

                    <div class="card-body">
                        {{$advert->content}}
                        <img class="img-fluid" src="{{$advert->image}}" alt="Italian Trulli">
                       <div class="alert"> Kategorija: {{$advert->category->title}}

                       </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
