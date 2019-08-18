@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategorijos</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('category.update', $cat->id)}}">
                            <input name="_method" type="hidden" value="PUT">
                            @method('PUT')
                            @csrf
                            <input class=form-control" type="text" name="title" placeholder="Pavadinimas" value="{{$cat->title}}">





                            <select name="parent_id">
                                <option value="0"> Parent kategorijai</option>
                                @foreach($categories as $category)
                                    @if($category->parent_id ==0 && !($category->id ==$cat->id))
                                    <option value="{{$category->id}}"> {{$category->title}}</option>
                                 @endif
                                        @endforeach


                            </select>
                            <button class="btn btn-light"> update </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
