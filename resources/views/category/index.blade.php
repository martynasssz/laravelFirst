@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('admin.sidebar')
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Kategorijos</div>
                    {{--                    -------kategorijos kurimo pradžia---------}}

                    <div class="card">

                        <div class="card-body">

                            <form method="POST" action="{{route('categories.store')}}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control mt-2" type="text" name="title"
                                           placeholder="Naujos kategorijos pavadinimas">
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="parent_id">

                                        <option value="0">Kuriama parent kategorija</option>
                                        @foreach($categories_create as $cat_create)
                                            <option value="{{$cat_create->id}}">{{$cat_create->title}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <button class="btn btn-secondary btn-sm mt-2"> Sukurti</button>
                            </form>

                        </div>
                    </div>

                    {{--                --- Kategorijos kurimo pabaiga------}}
                    <div class="card-body">
                        <table id="mytable" class="table table-bordred table-striped">
                            <thead>
                            <th>ID</th>
                            <th>Tėvinė kategorija/Kategorija/Subkategorija</th>
                            <th>Redaguoti</th>
                            <th>Trinti</th>
                            </thead>
                            <tbody>
                            @foreach($categories as $parent)
                                <tr>
                                    <td><b>{{$parent->id}}</b></td>
                                    <td><b>{{$parent->title}}</b></td>
                                    <td><a class="btn btn-primary btn-sm"
                                           href="{{route('categories.edit',$parent->id)}}"> Redaguoti </a></td>
                                    <td>
                                        <form method="post" action="{{route('categories.destroy', $parent->id)}}">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger btn-sm" value="Trinti"/>
                                        </form>
                                    </td>
                                </tr>
                                @foreach($parent->subCategories as $subCategory)
                                    <tr>
                                        <td>{{$parent->id}}->{{$subCategory->id}}</td>
                                        <td style="padding-left: 15px">/{{$subCategory->title}}</td>
                                        <td><a class="btn btn-primary btn-sm"
                                               href="{{route('categories.edit',$subCategory->id)}}"> Redaguoti </a></td>
                                        <td>
                                            <form method="post"
                                                  action="{{route('categories.destroy', $subCategory->id)}}">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" class="btn btn-danger btn-sm" value="Trinti"/>
                                            </form>
                                        </td>
                                    </tr>
                                    @foreach($subCategory->subCategories as $subSubCategory)
                                        <tr>
                                            <td>{{$parent->id}}->{{$subCategory->id}}->{{$subSubCategory->id}}</td>
                                            <td style="padding-left: 30px">/{{$subSubCategory->title}}</td>
                                            <td><a class="btn btn-primary btn-sm"
                                                   href="{{route('categories.edit',$subSubCategory->id)}}"> Redaguoti </a>
                                            </td>
                                            <td>
                                                <form method="post"
                                                      action="{{route('categories.destroy', $subSubCategory->id)}}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <input type="submit" class="btn btn-danger btn-sm" value="Trinti"/>
                                                </form>


                                            </td>

                                        </tr>
                                    @endforeach

                                @endforeach
                            @endforeach
                          </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection