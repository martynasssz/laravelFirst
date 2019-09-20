@extends('layouts.app')

@section('content')
{{--    <nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--        <a class="navbar-brand" href="#">Nav88888bar</a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"--}}
{{--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}

{{--        <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--            <ul class="navbar-nav mr-auto">--}}

{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdown" role="button"--}}
{{--                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                        {{ $category->title }}--}}
{{--                    </a>--}}
{{--                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">--}}
{{--                        --}}{{--                        {{dd($category->subCategories)}}--}}
{{--                        @foreach($category->subCategories as $cat)--}}

{{--                            <a class="dropdown-item text-danger" href="#">{{$cat->title}}</a>--}}

{{--                            @foreach($cat->subCategories as $subCat)--}}
{{--                                <a style="padding-left: 100px" class="dropdown-item" href="#">{{$subCat->title}}</a>--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--            </ul>--}}

{{--        </div>--}}
{{--    </nav>--}}

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$category->title}}</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($category->adverts as $advert)

                                <div class="card mb-3" style="max-width: 900px;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <img src="{{ $advert-> image}}" class="card-img" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h6>{{$advert->category->title}}</h6>
                                                <h5 class="card-title">{{$advert->title}}</h5>
                                                <p class="card-text"> {{ $advert-> content}}</p>
                                                <p class="card-text">
                                                    <small class="text-muted">Kaina: {{ $advert-> price}} €</small>
                                                    <a href="advert/{{$advert->slug}}"
                                                       class="btn btn-outline-secondary float-right btn-sm">Detaliau</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>                {{--                <div class="row justify-content-center">--}}
                        {{--                    <div class="col-md-8">--}}
                        {{--                        <div class="card">--}}
                        {{--                            <div class="card-header">{{$category->title}}</div>--}}

                        {{--                            <div class="card-body">--}}
                        {{--                                <div class="row">--}}
                        {{--                                    @foreach($category->adverts as $advert)--}}
                        {{--                                        <div class="col-5">--}}
                        {{--                                            <h2 class="card-subtitle">{{$advert->title}}</h2>--}}
                        {{--                                            <div class="text-center">{{$advert->content}}</div>--}}
                        {{--                                        </div>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}

                    </div>
@endsection