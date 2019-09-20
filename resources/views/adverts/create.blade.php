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
                                <div class="form-group">
                                    <label for="name">Pavadinimas</label>
                                    <input type="text" class="form-control" name="title" placeholder="Pavadinimas">
                                </div>
                                <div class="form-group">
                                    <label for="content_text">Aprašymas</label>
                                    <textarea class="form-control" name="content_text" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="image">Įkelti nuotrauką</label>
                                    <input type="text" class="form-control" name="image" placeholder="Nuotrauka">
                                </div>
                                <div class="form-group">
                                    <label for="price">Kaina</label>
                                    <input class="form-control" type="number" name="price" placeholder="Kaina">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Pasirinkti kategoriją</label>
                                    <select multiple class="form-control col-md-4" name="category_id">
                                         <option> Pasirinkti kategorija</option>
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->id}}"> {{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="attribute_set">Papildoma informacija</label>
                                    <select multiple class="form-control col-md-4" name="attribute_set">
                                        @foreach($attribute_sets as $attributeSet)

                                            <option value="{{($attributeSet->id)}}"> {{($attributeSet->name)}} </option>

                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-info"> Toliau</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
