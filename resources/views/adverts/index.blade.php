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
                                <th scope="col">Kategorija</th>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Image</th>
                                <th scope="col">Price</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            @foreach($adverts as $advert)
                                <tr>
                                    <td> {{$advert->category->title}}</td>
                                    <td> {{$advert->title}}</td>
                                    <td> {{$advert->content}}</td>
                                    <td><img class="img-fluid" src="{{$advert->image}}" alt="Italian Trulli"></td>
                                    <td> {{$advert->price}}</td>
                                    <td><a href="{{route('advert.edit', $advert->id)}}" class="btn btn-primary">Edit</a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{route('advert.destroy', $advert->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
