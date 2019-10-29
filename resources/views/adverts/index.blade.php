@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{--            @include('admin.sidebar')--}}
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skelbimai</div>
                    <div>
                        <form action="{{route('adverts.index')}}" method="get">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control">
                                <span class="input-group-prepend">
                                    <button type="submit"  class="btn btn primary">Ieškoti</button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($adverts as $advert)
                                <div class="card mb-3 " style="max-width: 900px;  ">
                                    <div class="row no-gutters">
                                        <div class="col-md-4 " style="height: 200px">
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
                            {{$adverts ->  links()}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
