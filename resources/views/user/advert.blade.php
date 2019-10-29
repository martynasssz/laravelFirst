@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('user.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skelbimai</div>

                    <div class="card-body">
                        <div class="row">
                            @foreach($adverts as $advert)
                                <div class="card mb-3 " style="max-width: 900px;  ">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 r" style="height: 200px">
                                            <img src="{{ $advert-> image}} " class="card-img h-100 w-100" alt="...">
                                        </div>
                                        <div class="col-md-8  ">
                                            <div class="card-body">
                                                <h6>{{$advert->category->title}}</h6>
                                                <h5 class="card-title">{{$advert->title}}</h5>
                                                {{-- <p class="card-text"> {{ $advert-> content}}</p>--}}
                                                <p class="card-text"> </p>
                                                <div class="text-muted">Kaina: {{ $advert-> price}} €</div>
                                                <a href="{{route('advert.show', $advert->slug)}}"
                                                   class="btn btn-outline-secondary float-right btn-sm mb-0">Detaliau</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection