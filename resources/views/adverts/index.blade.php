@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skelbimai</div>

                    <div class="card-body">
                        <table class="table">
                           <tr>
                               <th scope="col">Title</th>
                               <th scope="col">Content</th>
                               <th scope="col">Image</th>
                               <th scope="col">Edit</th>
                               <th scope="col">Delete</th>
                           </tr>
                        @foreach($adverts as $advert)
                            <tr>
                                <td> {{$advert->title}}</td>
                                <td> {{$advert->content}}</td>
                                <td>  <img class="img-fluid" src="{{$advert->image}}" alt="Italian Trulli"></td>
                                <td><a href="{{route('advert.edit', $advert->id)}}" class="btn btn-primary">Edit</a> </td>
                                <td><a href="{{route('advert.destroy', $advert->id)}}" class="btn btn-primary">Delete</a> </td>
                            </tr>
                        @endforeach

                            </table >
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
