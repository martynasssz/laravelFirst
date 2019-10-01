@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Miestai</div>
                    <div class="card-body">
                        <form method="post" action="{{route('cities.update', $city->id)}}">
                            @csrf
                            @method('PUT')
                            <input value="{{$city->name}}" name="name" type="text" class="form-control mt-2"  placeholder="Miestai">
                            <button class="btn alert-success mt-2">Atnaujinti</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
