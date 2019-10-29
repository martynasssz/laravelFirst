@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Miestai</div>
                    <div class="card-body">
                        <form method="post" action="{{route('cities.store')}}">
                            @csrf
                            <input name="name" type="text" class="form-control mt-2" placeholder="Įveskite miestą">
                            <button class="btn btn-secondary btn-sm mt-2">Sukurti</button>
                        </form>
                    </div>
                </div>

                <table id="mytable" class="table table-bordred table-striped">

                    <thead>

                    <th>ID</th>
                    <th>Miestai</th>
                    <th>Redaguoti</th>
                    <th>Trinti</th>
                    </thead>
                    <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td>{{$city->id}}</td>
                            <td>{{$city->name}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('cities.edit',$city->id)}}"> Redaguoti </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('cities.destroy', $city->id)}}">
                                    @method('DELETE')

                                    @csrf
                                    <input type="submit" class="btn btn-danger btn-sm" value="Trinti"/>
                                </form>

                            </td>
                        </tr>
                    @endforeach


                    </tbody>
                </table>


            </div>


        </div>
    </div>
@endsection