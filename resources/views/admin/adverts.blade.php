{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--          <div class="row justify-content-center">--}}
{{--              @include('admin.sidebar')--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Skelbimai</div>--}}

{{--                    <div class="card-body">--}}
{{--                        @foreach($adverts as $advert)--}}
{{--                            <div class="card mb-3" style="max-width: 900px;">--}}
{{--                                <div class="row no-gutters">--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <img src="{{ $advert-> image}}" class="card-img" alt="...">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-8">--}}
{{--                                        <div class="card-body">--}}
{{--                                            <h6>{{$advert->category->title}}</h6>--}}
{{--                                            <h5 class="card-title">{{$advert->title}}</h5>--}}
{{--                                            <p class="card-text"> {{ $advert-> content}}</p>--}}
{{--                                            <p class="card-text">--}}
{{--                                                <small class="text-muted">Kaina: {{ $advert-> price}} €</small>--}}
{{--                                                <a href="advert/{{$advert->slug}}"--}}
{{--                                                   class="btn btn-outline-secondary float-right btn-sm">Detaliau</a>--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        @endforeach--}}
{{--                        {{$adverts->links()}}--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}











{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            @include('admin.sidebar')--}}

{{--            <div class="col-md-9">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">Adverts</div>--}}

{{--                    <div class="card-body">--}}
{{--                        Adverts.--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}