@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$title}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('advert.store')}}">
                            @csrf
                            <input class="form-control" type="text" name="title" placeholder="Pavadinimas">
                            <textarea class="form-control" name="content_text" placeholder="Skelbimas"> </textarea>
                            <input class="form-control" type="text" name="image" placeholder="Paveiksliukas">
                            <input class="form-control" type="number" name="price" placeholder="Kaina">
                            <select name="category_id">
                                <option > Pasirinkti kategorija  </option>
                                @foreach($categories as $cat)
                                  <option value="{{$cat->id}}" > {{$cat->title}}</option>
                                @endforeach

                            </select>
                            <button class="btn btn-info"> Sukurti</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
