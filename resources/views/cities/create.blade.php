@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Miestai</div>
                    <div class="card-body">
                        <form method="post" action="{{route('cities.store')}}">
                            @csrf
                            <input name="name" type="text" class="form-control mt-2"  placeholder="Miestai">
                            <button class="btn alert-success mt-2">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection