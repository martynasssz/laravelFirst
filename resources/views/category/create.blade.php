@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="row">
            <div class="col-12">
                <div class="lert alert-success alert-dismissible"></div>
                {{session()->get('message')}}

            </div>
        </div>
        {{session()->get('message')}}
@endif


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Kategorijų kūrimas</div>

                        <div class="card-body">
                            <form method="POST" action="{{route('categories.store')}}">
                                @csrf
                                <input class=form-control" type="text" name="title" placeholder="Pavadinimas">

                                <select class="form-control" name="parent_id">


                                    <option value="0">-------</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach


                                </select>
                                <button class="btn btn-light"> Create</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
