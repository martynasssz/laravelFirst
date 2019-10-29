@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategorijos</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('category.update', $cat->id)}}">
                            <input name="_method" type="hidden" value="PUT">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                            <input class=fform-group" type="text" name="title" placeholder="Pavadinimas" value="{{$cat->title}}">
                            </div>
                            <div class="form-group">
                            <select name="parent_id">
                                <option value="0"> Koreguojama parent kategorija</option>
                                @foreach($categories as $category)

                                   @if($category->parent_id ==0 && !($category->id ==$cat->id)) {{-- tikriname, kad parent kategorijai nepriskirtumėm to pačios kategorijos--}}
                                <option value="{{$category->id}}"> {{$category->title}}</option>
                                 @endif
                                        @endforeach
                            </select>
                                </div>
                            <button class="btn btn-secondary btn-sm mt-2"> Atnaujinti </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
