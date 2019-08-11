@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ssdfsdsdd</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('advert.update', $advert->id)}}">
                            <input name="_method" type="hidden" value="PUT">
                            @method('PUT')
                            @csrf
                            <input class="form-control" type="text" name="title" placeholder="Pavadinimas" value="{{$advert->title}}">
                            <textarea class="form-control" name="content_text" placeholder="Skelbimas"> {{$advert->content}}</textarea>
                            <input class="form-control" type="text" name="image" placeholder="Paveiksliukas" value="{{$advert->image}}">
                            <input class="form-control" type="number" name="price" placeholder="Kaina" value="{{$advert->price}}">
                            <select name="category_id">
                                <option > Pasirinkti kategorija  </option>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}" > {{$cat->title}}</option>
                                @endforeach

                            </select>
                            <button class="btn btn-info"> Koreguoti</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection