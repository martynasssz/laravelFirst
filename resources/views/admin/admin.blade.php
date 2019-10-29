@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skelbimų valdymas</div>
                    <table id="mytable" class="table table-bordred table-striped">
                        <thead>
                        <th>ID</th>
                        <th>Nuotrauka</th>
                        <th>Skebimai</th>
                        <th>Redaguoti</th>
                        <th>Neaktyvus</th>
                        <th>Aktyvus</th>
                        </thead>
                        <tbody>
                        @foreach ($adverts as $advert)
                             <tr class="{{ ($advert->active == 0) ? "bg-secondary" : null }}">
                                <td>{{$advert->id}}</td>
                                 <td><img src="{{ $advert-> image}}" width="50" height="50"></td>
                                <td>{{$advert->title}}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('advert.edit', $advert->id)}}"> Redaguoti </a>
                                </td>
                                <td>
                                    <form method="post" action="{{route('admin.destroy', $advert->id)}}">
                                        @method('DELETE')

                                        @csrf
                                        <input type="submit" class="btn btn-danger btn-sm" value="Neaktyvus"/>
                                    </form>
                                </td>
                                <td>
                                     <a class="btn btn-warning btn-sm" href="{{route('admin.show',$advert->id)}}"> Aktyvus </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$adverts -> links()}}
                </div>
            </div>
        </div>
    </div>
@endsection


