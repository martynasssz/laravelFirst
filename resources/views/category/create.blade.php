@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skelbimai</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('category.store')}}">
                            @csrf
                            <input class=form-control" type="text" name="title" placeholder="Pavadinimas">

                            <select name="parent_id">
                                    <option value="0">-------
                                    </option>
                            </select>
                            <button class="btn btn-light"> Create </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
