@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Žinučių tipai</div>
                    <div class="card-body">
                        <form method="post" action="{{route('cities.store')}}">
                            @csrf
                            <input name="name" type="text" class="form-control mt-2" placeholder="Miestai">
                            <button class="btn alert-success mt-2">Create</button>
                        </form>
                    </div>
                </div>

                <table id="mytable" class="table table-bordred table-striped">

                    <thead>

                    <th><input type="checkbox" id="checkall"></th>
                    <th>City</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </thead>
                    <tbody>
                    @foreach ($cities as $city)
                        <tr>
                            <td><input type="checkbox" class="checkthis"></td>
                            <td>{{$city->name}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{route('cities.edit',$city->id)}}"> Edit </a>
                            </td>
                            <td>
                                <form method="post" action="{{route('cities.destroy', $city->id)}}">
                                    @method('DELETE')

                                    @csrf
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete"/>
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
