@extends('layouts.app1')

@section('content')
    <div class="container">

        <h1 class="h1">Atrask savo naujus namus</h1>




        <div class="flex-container">
            <div class="flex-item"><a href="{{route('categories.show','nekilnojamas-turtas')}}">Nekilnojamas turtas</a></div>
            <div class="flex-item"><a href="{{route('categories.show','interjeras')}}">Interjeras</a></div>
            <div class="flex-item"><a href="{{route('categories.show','eksterjeras')}}">Eksterjeras</a></div>
            <div class="flex-item"><a href="{{route('categories.show','paslaugos')}}">Paslaugos</a></div>

        </div>
    </div>


@endsection